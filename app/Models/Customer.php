<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'kana',  
        'tel', 
        'email',
        'birthday',
        'firstvisit'
    ];

    public function scopeSearch ($query, $input)
    {
        return $query
        ->where('kana', 'like', '%' . $input . '%')
        ->orWhere('name', 'like', '%' . $input . '%');
    }

}
