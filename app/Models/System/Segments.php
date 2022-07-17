<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Segments extends Model {
    use HasFactory;

    protected $table = 'segments';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'name',
        'slug',
        'active',
        'deleted_at'
    ];
    protected $casts = [
        'active' => 'boolean',
    ];

    public static function booted () {
        static::addGlobalScope('NotDeleted', function (Builder $builder) {
            $builder->whereNull('segments.deleted_at');
        });
    }

    public function setSlugAttribute (string $value): void {
        $this->attributes['slug'] = Str::slug($value);
    }
}
