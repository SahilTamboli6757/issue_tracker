<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all();

        return TeamResource::collection($teams);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamRequest $request)
    {
        $params = $request->validated();

        $team = Team::create($params);

        return new TeamResource($team);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $teamId )
    {
        $team = Team::find($teamId);

        if(! $team) {

            return response()->json(["message"=> "no team found"], 404);
        }

        return  TeamResource::make($team);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamRequest $request , int $teamId)
    {
        $team = Team::find($teamId);

        if(! $team) {

            return response()->json(["message"=> "no team found"],404);
        }

        $team->update($request->validated());

        return  TeamResource::make($team);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $teamId)
    {
        $team = Team::find($teamId);

        if(! $team) {

            return response()->json(["message"=> "no team found"],404);
        }

        $team->delete();

        return  response()->json([
            "message"=> "team deleted succussfully"
        ],200);
    }
}
