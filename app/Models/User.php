<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = ["id"];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function issues()
    {
        return $this->hasMany(Issue::class,'creator_id','id');
    }

    public function assginedIssues()
    {
        return $this->hasMany(Issue::class,'assigned_to','id');
    }

    public function assginedByIssues()
    {
        return $this->hasMany(Issue::class,'assigned_to','id');
    }

    public function reportedIssues()
    {
        return $this->hasMany(Issue::class,'assigned_to','id');
    }
    public function raisedIssues()
    {
        return $this->hasMany(Issue::class,'assigned_to','id');
    }
}
