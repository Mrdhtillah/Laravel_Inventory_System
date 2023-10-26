<?php

use Illuminate\Database\Seeder;
use App\Models\ItemType;

class ItemTypeSeeder extends Seeder
{
    public function run()
    {
        ItemType::create(['name' => 'Electronics']);
        ItemType::create(['name' => 'Clothing']);
        ItemType::create(['name' => 'Furniture']);
    }
}
