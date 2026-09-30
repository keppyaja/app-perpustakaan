<?php

namespace App\Models;

// Note: User model usually extends Authenticatable in Laravel, not standard Model.
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    public function loans(): HasMany
    {
        return $this->hasMany(Loan::class);
    }
}