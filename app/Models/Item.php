<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
         'description', 'price', 'image', 'item_type_id', 'item_condition_id', 'defects', 'quantity',
    ];

    public function itemType()
    {
        return $this->belongsTo(ItemType::class, 'item_type_id');
    }

    public function itemCondition()
    {
        return $this->belongsTo(ItemCondition::class, 'item_condition_id');
    }
}
