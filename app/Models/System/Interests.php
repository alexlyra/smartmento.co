<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Interests extends Model {
    use HasFactory;

    protected $table = 'interests';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'segment_id',
        'name',
        'slug',
        'active',
        'deleted_at',
    ];
    protected $casts = [
        'active' => 'boolean',
    ];

    public static function booted () {
        static::addGlobalScope('NotDeleted', function (Builder $builder) {
            $builder->whereNull('interests.deleted_at');
        });
    }
}
