<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIssueRequest;
use App\Http\Requests\UpdateIssueRequest;
use App\Http\Resources\IssueResource;
use App\Models\Issue;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $issues = Issue::all();

        return IssueResource::collection($issues);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIssueRequest $request)
    {
        $params = $request->validated();

        $issue = Issue::create($params);

        return new IssueResource($issue);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $issue = Issue::find($id);

        if (!$issue) {
            return response()->json(["message" => "issues not found"], 404);
        }

        return new IssueResource($issue);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIssueRequest $request, string $id)
    {
        $issue = Issue::find($id);

        $params = $request->validated();

        if (!$issue) {
            return response()->json(["message" => "issues not found"], 404);
        }

        $issue->update($params);

        return new IssueResource($issue);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $issue = Issue::find($id);

        if (!$issue) {
            return response()->json(["message" => "issues not found"], 404);
        }

        $issue->delete();

        return response()->json(["message"=> "issues deleted successfully"],200);

    }
}
