<?php

namespace App\Models\Mentors;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model {
    use HasFactory;

    protected $table = 'mentors_reviews';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'mentee_id',
        'mentor_id',
        'challenge_id',
        'stars',
        'review',
    ];
    protected $casts = [
        'stars' => 'integer',
        'review' => 'string',
    ];

    public function mentee () {
        return $this->belongsTo(User::class, 'mentee_id', 'id');
    }

    public function mentor () {
        return $this->belongsTo(User::class, 'mentor_id', 'id');
    }
}
