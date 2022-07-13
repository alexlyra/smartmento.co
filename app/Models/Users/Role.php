<?php

namespace App\Models\Users;

use App\Models\System\Role as SystemRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model {
    use HasFactory;

    protected $table = 'users_roles';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'role_id',
    ];
    protected $casts = [];

    public function role () {
        $this->belongsTo(SystemRole::class, 'role_id', 'id');
    }
}
