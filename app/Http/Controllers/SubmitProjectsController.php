<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubmitProjectsController extends Controller
{

    public int $itemPerPage = 5;

    public function index(): View|Factory|Application
    {
        $projects = Project::where('created_by', Auth::id())->paginate($this->itemPerPage);

        $authenticated = Auth::user();

        $technologies = (object)DB::select('SELECT * FROM technologies');

        return view('projects.submit', [
            'projects' => $projects,
            'authenticated' => $authenticated,
            'technologies' => $technologies
        ]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'date_end' => 'required',
            'content' => 'required',
            'technologies' => 'required',
            'created_by' => 'required',
        ]);

        if ($request->created_by != Auth::id()) {
            return redirect()->back()->withErrors('Você não está autorizado a executar esta ação.');
        }

        $create = (new Project())->createProject($request->only([
            'title',
            'date_end',
            'content',
            'technologies',
            'created_by',
        ]));

        if (!$create) {
            return redirect()->back()->withErrors('Erro ao criar projeto!');
        }

        return redirect()->back()->with('success', 'Projeto criado com sucesso!');
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
