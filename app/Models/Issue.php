<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Issue extends Model
{
    /** @use HasFactory<\Database\Factories\IssueFactory> */
    use HasFactory, SoftDeletes;

    protected $guarded = ["id"];

    public function assignedTo()
    {
        return $this->belongsTo(User::class,'assigned_to','id');
    }

    public function assignedBy()
    {
        return $this->belongsTo(User::class,'assigned_by','id');
    }

    public function reportedTo()
    {
        return $this->belongsTo(User::class,'reported_to','id');
    }

    public function raisedBy()
    {
        return $this->belongsTo(User::class,'raised_by','id');
    }
}
