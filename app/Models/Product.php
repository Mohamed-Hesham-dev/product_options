<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function optionValue()
    {
        return $this->belongsToMany(OptionValue::class,'product_option_value','product_id','option_value_id');
    }
}
