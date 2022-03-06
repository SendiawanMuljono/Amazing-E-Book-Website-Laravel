<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'ebook_id';

    public function order(){
        return $this->hasMany(Order::class, 'ebook_id', 'ebook_id');
    }
}
