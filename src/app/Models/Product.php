<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['p_name', 'p_price', 'p_image'])]

class Product extends Model
{
    
}
