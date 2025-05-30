<?php
namespace App\Models;

use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;
use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains;

    protected $fillable = [
        'user_id',
        'password',
        'name',
        'email',
        'id'
    ];

    public static function getCustomColumns(): array
    {
        return [
            'id',
            'user_id',
            'password',
            'name',
            'email'
        ];
    }
}
