<?php

namespace App\Models\Mentee;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model {
    use HasFactory;

    protected $table = 'mentee_challenges';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'mentee_id',
        'mentor_id',
        'segments',
        'interests',
        'challenge',
        'solution',
        'status',
        'solution_status',
        'active',
        'progress',
        'deleted_at',
    ];
    protected $casts = [
        'active' => 'boolean',
    ];

    public function mentee () {
        return $this->belongsTo(User::class, 'mentee_id', 'id');
    }

    public function mentor () {
        return $this->belongsTo(User::class, 'mentor_id', 'id');
    }
}
