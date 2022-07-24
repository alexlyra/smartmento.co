<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail {
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'mobile',
        'birthday',
        'photo',
        'password',
        'active',
        'social_login', /* ['google', 'facebook', 'instagram', 'linkedin', 'twitter'] */
        'social_id',
        'social_name',
        'social_token',
        'first_access',
        'status', /* ['pending', 'approved', 'unapproved', 'authorized', 'unauthorized', 'analyzing', 'reviewing', 'reported', 'cancelled', 'robot', 'deleted'] */
        'deleted_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'social_id',
        'social_name',
        'social_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'active' => 'boolean',
    ];

    public function setFirstNameAttribute (string $value): void {
        $this->attributes['first_name'] = ucfirst($value);
    }

    public function setLastNameAttribute (string $value): void {
        $this->attributes['last_name'] = ucfirst($value);
    }

    public function getFullNameAttribute (): string {
        return "{$this->first_name} {$this->last_name}";
    }
}
