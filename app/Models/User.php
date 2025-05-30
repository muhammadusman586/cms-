<?php
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Traits\HasRoles;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        // 'lastname',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }

//     public static function boot()
//     {
//         parent::boot();
//         static::creating(function ($model) {
//             if (tenancy()->tenant && Schema::hasColumn($model->getTable(), 'tenant_id')) {
//                 $model->tenant_id = tenancy()->tenant->id;
//             }
//         });
//     }

//     protected static function booted()
//     {
//         // Apply tenant scope automatically for all queries
//         static::addGlobalScope('tenant_id', function (Builder $builder) {
//             // Check if tenant_id exists in the table
//             if (Schema::hasColumn((new static )->getTable(), 'tenant_id')) {
//                 if ($tenant = tenancy()->tenant) {
//                     $builder->where('tenant_id', $tenant->id);
//                 }
//             }
//         });
//     }

//     public function tenants()
// {
//     return $this->hasMany(Tenant::class, 'user_id', 'id');
// }
}
