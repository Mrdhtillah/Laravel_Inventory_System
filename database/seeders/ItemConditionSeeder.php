<?php

use Illuminate\Database\Seeder;
use App\Models\ItemCondition;

class ItemConditionSeeder extends Seeder
{
    public function run()
    {
        ItemCondition::create(['name' => 'New']);
        ItemCondition::create(['name' => 'Used']);
        ItemCondition::create(['name' => 'Refurbished']);
    }
}
