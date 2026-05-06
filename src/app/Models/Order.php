<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;


#[Fillable(['product_id', 'product_price', 'product_qty', 'status', 'error', 'tran_date', 'amount', 'bank_tran_id', 'card_issuer', 'card_brand', 'val_id', 'card_type'])]

class Order extends Model
{
    //
}
