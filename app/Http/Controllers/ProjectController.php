<?php

namespace App\Http\Controllers;

use App\Models\BusinessUnit;
use App\Models\Project;
use App\Models\ProgressReport;
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

        $progress = ProgressReport::whereHas('project', function (Builder $query) use ($id) {
            $query->where('projects.id', $id);
        })->latest()->first();

        $businessUnits = BusinessUnit::all()
            ->where('id', '!=', $project->bu_id);

        $personInCharge = User::whereHas('projects', function (Builder $query) use ($id) {
            $query->where('projects.id', $id);
        })->where('user_level', 3)->first();

        $otherPersonsInCharge = User::whereDoesntHave('projects', function (Builder $query) use ($id) {
            $query->where('projects.id', $id);
        })->where('user_level', 3)->get();

        $otherDevelopers = User::where('user_level', '!=', 0)
            ->where('user_level', '!=', 3)
            ->whereDoesntHave('projects', function (Builder $query) use ($id) {
                $query->where('projects.id', $id);
        })->get();

        $developmentTeam = User::whereHas('projects', function (Builder $query) use ($id) {
            $query->where('projects.id', $id);
        })->where('user_level', '!=', 3)->get();

        return view('project.edit', compact(['project', 'progress', 'businessUnits', 'personInCharge', 
            'otherPersonsInCharge','otherDevelopers', 'developmentTeam']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project) {
        
        if($request->hasAny(['name', 'description'])) {
            $project->name = $request->name;
            if($request->input('description') == null) {
                $project->description = $project->description;
            } else {
                $project->description = $request->input('description');
            }
        } elseif($request->hasAny(['start_date', 'end_date', 'status', 'remarks'])) {
            if($request->date('start_date') == null || $request->date('end_date') == null) {
                $project->start_date = $project->start_date;
                $project->end_date = $$project->end_date;
            } else {
                $project->start_date = $request->date('start_date');
                $project->end_date = $request->date('end_date');
            }
            $progressReport = new ProgressReport([
                'status' => $request->status,
                'remarks' => $request->remarks
            ]);
            $project->progressReports()->save($progressReport);
        } elseif($request->hasAny(['platform', 'methodology', 'deployment'])) {
            $project->platform = $request->platform;
            $project->methodology = $request->methodology;
            $project->deployment = $request->deployment;
        } else {
            $businessUnit = BusinessUnit::find($request->businessUnitId);
            $project->businessUnit()->associate($businessUnit);
        }
        $project->save();
        
        return redirect()->route('project.edit', [$project])
            ->withSuccess('Project details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
