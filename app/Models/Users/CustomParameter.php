<?php

namespace App\Models\Users;

use App\Casts\Json;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomParameter extends Model {
    use HasFactory;

    protected $table = 'users_custom_parameters';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'key',
        'type',
        'content',
        'active',
        'deleted_at',
    ];
    protected $casts = [
        'active' => 'boolean',
        'content' => Json::class,
    ];

    public function user () {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

/* 3 => mentoring_type => paid */
/* 3 => mentoring_price => 150.0 */
/* 3 => mentoring_face-to-face => true */
/* 3 => city => São Paulo | 1 | */
/* 3 => state => São Paulo | 1 | */
/* 3 => neighborhood => Cambuci | 1 | */
/* 3 => bio => Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque consectetur rhoncus purus quis laoreet. Praesent iaculis magna id mauris rutrum venenatis. Integer cursus ligula vitae urna venenatis tempor. Aliquam erat volutpat. Curabitur pulvinar ac mi id tempor. Ut malesuada nunc in justo feugiat, non consequat nisi aliquam. Curabitur sed turpis non urna sagittis tempor. Nulla risus massa, efficitur quis nulla vel, pellentesque iaculis purus. | 1 | */