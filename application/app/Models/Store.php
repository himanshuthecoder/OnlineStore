<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    public function getselecttype($column)
    {
        $storetype = [
            1=>'Clothing',
            2=>'Food Items',  
            3=>'Electronics',            

        ];
        if($column == 'storetype') return $storetype;
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'store_id', 'id');
    }
}
