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
        'zip_code',
        'is_banned',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'two_factor_confirmed_at',
        'notify_new_device_login',
    ];
    
    protected $hidden = [
        'password', 
        'remember_token',
        'two_factor_secret',
        'two_factor_recovery_codes',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'two_factor_recovery_codes' => 'array',
            'two_factor_confirmed_at' => 'datetime',
            'notify_new_device_login' => 'boolean',
        ];
    }

    /**
     * Get the appropriate dashboard route based on user role.
     */
    public function getRedirectRoute(): string
    {
        return $this->role === 'admin' ? route('admin.dashboard') : route('dashboard');
    }

    // ─ Relationships ─

    /**
     * All orders placed by this user.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * The user's shopping cart.
     */
    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    /**
     * Connected social accounts for this user.
     */
    public function connectedAccounts()
    {
        return $this->hasMany(ConnectedAccount::class);
    }

    /**
     * Security activity logs.
     */
    public function securityActivityLogs()
    {
        return $this->hasMany(SecurityActivityLog::class);
    }


}
