<?php

namespace App\Livewire\Proposals;

use App\Actions\ArrangePositions;
use App\Models\Project;
use App\Models\Proposal;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Create extends Component
{
    public Project $project;
    public bool $modal = false;

    public bool $agree = false;

    #[Rule(['required', 'email'])]
    public string $email = '';

    #[Rule(['required', 'numeric', 'gt:0'])]
    public int $hours = 0;

    public function save(): void
    {
        $this->validate();

        if (!$this->agree) {
            $this->addError('agree', 'Você deve concordar com os termos de serviço e a política de privacidade');
            return;
        }

        DB::transaction(function () {
            $proposal = $this->project->proposals()
                ->updateOrCreate(
                    ['email' => $this->email],
                    ['hours' => $this->hours]
                );

            $this->arrangePositions($proposal);
        });

        $this->dispatch('proposal::created');

        $this->modal = false;
    }

    private function arrangePositions(Proposal $proposal): void
    {
        $query = DB::select('
            SELECT *, row_number() OVER (ORDER BY hours) AS newPosition
            FROM proposals
            WHERE project_id = :projectId', ['projectId' => $proposal->project_id]);

        $position = collect($query)
            ->where('id', '=', $proposal->id)
            ->first();

        $otherProposal = collect($query)
            ->where('position', '=', $position->newPosition)
            ->first();

        if ($otherProposal) {
            $proposal->update(['position_status' => 'up']);

            Proposal::query()
                ->where('id', '=', $otherProposal->id)
                ->update(['position_status' => 'down']);
        }

        ArrangePositions::run($proposal->project_id);
    }

    public function render(): View|Factory|Application
    {
        return view('livewire.proposals.create');
    }
}
