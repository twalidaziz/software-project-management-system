<?php

namespace App\Http\Controllers;

use App\Models\BusinessUnit;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project) {
        $id = $project->id;

        $businessUnits = BusinessUnit::all()
            ->where('id', '!=', $project->bu_id);

        $personInCharge = User::whereHas('projects', function (Builder $query) use ($id) {
            $query->where('projects.id', $id);
        })->where('user_level', 3)->first();

        $otherPersonsInCharge = User::whereDoesntHave('projects', function (Builder $query) use ($id) {
            $query->where('projects.id', $id);
        })->where('user_level', 3)->get();

        $otherDevelopers = User::whereDoesntHave('projects', function (Builder $query) use ($id) {
            $query->where('projects.id', $id);
        })->where('user_level', 2)
            ->where('lead_developer', false)
            ->get();

        $developmentTeam = User::whereHas('projects', function (Builder $query) use ($id) {
            $query->where('projects.id', $id);
        })->where('user_level', '!=', 3)->get();

        return view('project.edit', compact(['project', 'businessUnits', 'personInCharge', 
            'otherPersonsInCharge','otherDevelopers', 'developmentTeam']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $project->update($request->all());

        return redirect()->route('project.index')
            ->withSuccess('Project details updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
