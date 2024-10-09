<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index(): View|Factory|Application
    {
        return view('projects.index');
    }

    public function show(Project $project): View|Factory|Application
    {
        return view('projects.show', compact('project'));
    }
}
