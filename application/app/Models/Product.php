<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function tag()
    {

        return $this->belongsToMany(Tag::class);
        
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function store()
    {
        return $this->hasOne(Store::class, 'id', 'store_id');
    }

    public function getselecttype($column)
    {
        $category = [
            1=>'Clothing',
            2=>'Food Items',        
            3=>'Mobile',        
            4=>'Laptop',
            5=>'Electronics',
        ];
        if($column == 'category') return $category;
    }
}
