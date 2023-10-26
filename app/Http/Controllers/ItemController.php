<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ItemType;
use App\Models\ItemCondition;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        $itemTypes = ItemType::all();
        $itemConditions = ItemCondition::all();
        return view('items.create', compact('itemTypes', 'itemConditions'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|exists:item_types,id',
            'condition' => 'required|exists:item_conditions,id',
            'description' => 'required|string',
            'defects' => 'nullable|string',
            'quantity' => 'required|numeric|min:1',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->route('items.create')
                ->withErrors($validator)
                ->withInput();
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/items'), $imageName);
        }

        // Create a new item model instance
        $item = new Item();
        $item->item_type_id = $request->input('type');
        $item->item_condition_id = $request->input('condition');
        $item->description = $request->input('description');
        $item->defects = $request->input('defects');
        $item->quantity = $request->input('quantity');
        $item->image = $imageName; 

        $item->save();

        return redirect()->route('items.index')->with('success', 'Item created successfully');
    }

    public function show($id)
    {
        $item = Item::findOrFail($id);
        return view('items.show', compact('item'));
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $itemTypes = ItemType::all();
        $itemConditions = ItemCondition::all();
        return view('items.edit', compact('item', 'itemTypes', 'itemConditions'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|exists:item_types,id',
            'condition' => 'required|exists:item_conditions,id',
            'description' => 'required|string',
            'defects' => 'nullable|string',
            'quantity' => 'required|numeric|min:1',
            'image' => 'image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->route('items.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $item = Item::findOrFail($id);
        $item->item_type_id = $request->input('type');
        $item->item_condition_id = $request->input('condition');
        $item->description = $request->input('description');
        $item->defects = $request->input('defects');
        $item->quantity = $request->input('quantity');

        if ($request->hasFile('image')) {

            Storage::delete('images/items/' . $item->image);

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/items'), $imageName);

            $item->image = $imageName;
        }

        $item->save();

        return redirect()->route('items.index')->with('success', 'Item updated successfully');
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        Storage::delete('images/items/' . $item->image);
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Item deleted successfully');
    }
}
