<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'gender_id';

    public function account(){
        return $this->hasMany(Account::class, 'gender_id', 'gender_id');
    }
}
