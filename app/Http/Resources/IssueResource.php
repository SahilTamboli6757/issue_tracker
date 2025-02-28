<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IssueResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'title'         => $this->title,
            'description'   => $this->description,
            'time_taken'    => $this->time_taken,
            'time_required' => $this->time_required,
            'time_worked'   => $this->time_worked,
            'status'        => $this->status,
            'assigned_to'   => new UserResource( $this->assignedTo),
            'assigned_by'   => new UserResource( $this->assignedBy),
            'reported_to'   => new UserResource( $this->reportedTo),
            'raised_by'     => new UserResource( $this->raisedBy),
        ];
    }
}
