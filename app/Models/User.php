<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */

    protected $fillable = [
        'first_name',
        'last_name',
        'role',
        'email',
        'password',
        'phone_number',
        'address',
        'city',
        'state',
        'zip_code'
    ];
    protected $hidden = ['password', 'remember_token'];


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the appropriate dashboard route based on user role.
     */
    public function getRedirectRoute(): string
    {
        return $this->role === 'admin' ? route('admin.dashboard') : route('dashboard');
    }
}
