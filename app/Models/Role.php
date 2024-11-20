<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

class Role extends Model
{
    protected $table = 'roles';

    // Thiết lập mối quan hệ 1-n: Một role có nhiều user
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
