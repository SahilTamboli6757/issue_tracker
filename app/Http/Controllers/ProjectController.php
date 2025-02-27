<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return ProjectResource::collection($projects);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $params = $request->validated();

        $project = Project::create($params);

        return new ProjectResource($project);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $projectId )
    {
        $project = Project::find($projectId);

        if(! $project) {

            return response()->json(["message"=> "no project found"], 404);
        }

        return  ProjectResource::make($project);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request , int $projectId)
    {
        $project = Project::find($projectId);

        if(! $project) {

            return response()->json(["message"=> "no project found"],404);
        }

        $project->update($request->validated());

        return  ProjectResource::make($project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $projectId)
    {
        $project = Project::find($projectId);

        if(! $project) {

            return response()->json(["message"=> "no project found"],404);
        }

        $project->delete();

        return  response()->json([
            "message"=> "project deleted succussfully"
        ],200);
    }
}
