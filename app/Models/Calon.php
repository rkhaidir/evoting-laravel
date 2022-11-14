<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calon extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function vote()
    {
        return $this->hasOne(Calon::class);
    }
}
