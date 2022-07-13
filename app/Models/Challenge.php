<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model {
    use HasFactory;

    protected $table = 'challenges';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'description',
        'solution',
        'tag',
    ];
    protected $casts = [];

    public function user () {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
