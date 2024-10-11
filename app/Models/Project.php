<?php

namespace App\Models;

use App\ProjectStatusEnum;
use Carbon\Carbon;
use Database\Factories\ProjectFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Project extends Model
{
    /** @use HasFactory<ProjectFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'ends_at',
        'tech_stack',
        'created_by'
    ];

    // Mutator para data_emission
    public function setEndsAtAttribute($value): void
    {
        if ($value) {
            $this->attributes['date_emission'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
        }
    }


    public function createProject(array $project): bool
    {
        try {
            DB::beginTransaction();

            self::create([
                'title' => $project['title'],
                'description' => $project['content'],
                'ends_at',
                'tech_stack' => $project['technologies'],
                'created_by'
            ]);

        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
        return true;
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function proposals(): HasMany
    {
        return $this->hasMany(Proposal::class);
    }

    public function casts(): array
    {
        return [
            'tech_stack' => 'array',
            'status' => ProjectStatusEnum::class,
            'ends_at' => 'datetime',
        ];
    }
}
