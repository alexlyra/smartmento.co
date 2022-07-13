<?php

namespace App\Models\Users;

use App\Models\System\Interests;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interest extends Model {
    use HasFactory;

    protected $table = 'users_interests';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'interest_id',
    ];
    protected $casts = [];

    public function interest () {
        return $this->belongsTo(Interests::class, 'interest_id', 'id');
    }
}
