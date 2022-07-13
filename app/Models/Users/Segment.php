<?php

namespace App\Models\Users;

use App\Models\System\Segments;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Segment extends Model {
    use HasFactory;

    protected $table = 'users_segments';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'segment_id',
    ];
    protected $casts = [];

    public function segment () {
        return $this->belongsTo(Segments::class, 'segment_id', 'id');
    }
}
