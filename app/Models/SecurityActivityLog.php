<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecurityActivityLog extends Model
{
    public $timestamps = false; // We only use created_at

    protected $fillable = [
        'user_id',
        'action',
        'ip_address',
        'user_agent',
        'created_at',
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
