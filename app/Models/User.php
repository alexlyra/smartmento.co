<?php

namespace App\Models;

use App\Models\System\Interests;
use App\Models\System\Role as SystemRole;
use App\Models\System\Segments;
use App\Models\Users\CustomParameter;
use App\Models\Users\Interest;
use App\Models\Users\Role;
use App\Models\Users\Segment;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
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

    public static function booted (): void {
        static::addGlobalScope('NotDeleted', function (Builder $builder) {
            $builder->whereNull('users.deleted_at');
        });
    }

    public function setFirstNameAttribute (string $value): void {
        $this->attributes['first_name'] = ucfirst($value);
    }

    public function setLastNameAttribute (string $value): void {
        $this->attributes['last_name'] = ucfirst($value);
    }

    public function getFullNameAttribute (): string {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getIsMentorAttribute (): bool {
        return $this->roles->where('tag', 'mentor')->count() > 0 ? true : false;
    }

    public function getSegmentsAttribute (): Collection {
        $segments = $this->segmentsRelation->map(function ($item, $key) {
            return $item->name;
        });
        return $segments;
    }

    public function getInterestsAttribute (): Collection {
        $interests = $this->interestsRelation->map(function ($item, $key) {
            return $item->name;
        });
        return $interests;
    }

    public function getStatusIconAttribute (): string {
        $icon = "fa-solid fa-seal-question";

        switch ($this->status) {
            case 'pending': $icon = 'fa-solid fa-clock-rotate-left text-info'; break;
            case 'approved': $icon = 'fa-solid fa-badge-check text-success'; break;
            case 'unapproved': $icon = 'fa-solid fa-circle-xmark text-danger'; break;
            case 'authorized': $icon = 'fa-solid fa-user-check text-success'; break;
            case 'unauthorized': $icon = 'fa-solid fa-user-xmark text-danger'; break;
            case 'analyzing': $icon = 'fa-solid fa-magnifying-glass-chart text-info'; break;
            case 'reviewing': $icon = 'fa-solid fa-print-magnifying-glass text-info'; break;
            case 'reported': $icon = 'fa-solid fa-circle-exclamation text-warning'; break;
            case 'cancelled': $icon = 'fa-solid fa-ban text-danger'; break;
            case 'robot': $icon = 'fa-solid fa-robot-astromech text-secondary'; break;
            case 'deleted': $icon = 'fa-solid fa-trash-can text-danger'; break;
        }
        
        return $icon;
    }

    public function getStatusLabelAttribute (): string {
        $label = 'Desconhecido';

        switch ($this->status) {
            case 'pending': $label = 'Pendente'; break;
            case 'approved': $label = 'Aprovado'; break;
            case 'unapproved': $label = 'Não aprovado'; break;
            case 'authorized': $label = 'Autorizado'; break;
            case 'unauthorized': $label = 'Não autorizado'; break;
            case 'analyzing': $label = 'Em análise'; break;
            case 'reviewing': $label = 'Em revisão'; break;
            case 'reported': $label = 'Reportado'; break;
            case 'cancelled': $label = 'Cancelado'; break;
            case 'robot': $label = 'Robô'; break;
            case 'deleted': $label = 'Deletado'; break;
        }

        return $label;
    }

    public function getPriceAttribute () {
        if ($this->is_mentor === true) {
            $price = $this->customs->where('key', 'mentor:pricing')->first();
            if ($price) {
                $content = $price->content;

                if ($content) {
                    return (object) $content;
                }
            }
        }
        return null;
    }

    public function roles (): HasManyThrough {
        return $this->hasManyThrough(SystemRole::class, Role::class, 'user_id', 'id', 'id', 'role_id');
    }

    public function segmentsRelation (): HasManyThrough {
        return $this->hasManyThrough(Segments::class, Segment::class, 'user_id', 'id', 'id', 'segment_id');
    }

    public function interestsRelation (): HasManyThrough {
        return $this->hasManyThrough(Interests::class, Interest::class, 'user_id', 'id', 'id', 'interest_id');
    }

    public function customs (): HasMany {
        return $this->hasMany(CustomParameter::class, 'user_id', 'id')->where('active', 1);
    }

    public function challenge (): BelongsTo {
        return $this->belongsTo(Challenge::class, 'id', 'user_id');
    }
}
