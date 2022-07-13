<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model {
    use HasFactory;

    protected $table = 'roles';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'name',
        'tag',
    ];
    protected $casts = [];
}
