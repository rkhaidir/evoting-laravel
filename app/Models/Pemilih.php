<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pemilih extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['cari'] ?? false, function ($query, $search) {
            return $query->where('nomor_pemilih', 'like', '%' . $search . '%')
                ->orWhere('nama_pemilih', 'like', '%' . $search . '%');
        });
    }

    protected $hidden = [
        'password',
    ];
}
