<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'create_at', 'update_at'];

    //Relación uno a muchos
    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
}
