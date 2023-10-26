@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Item</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="item_type">Item Type</label>
                <select name="type" id="item_type" class="form-control" required>
                    @foreach($itemTypes as $itemType)
                        <option value="{{ $itemType->id }}" {{ $item->item_type_id == $itemType->id ? 'selected' : '' }}>
                            {{ $itemType->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="item_condition">Item Condition</label>
                <select name="condition" id="item_condition" class="form-control" required>
                    @foreach($itemConditions as $itemCondition)
                        <option value="{{ $itemCondition->id }}" {{ $item->item_condition_id == $itemCondition->id ? 'selected' : '' }}>
                            {{ $itemCondition->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" required>{{ $item->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="defects">Defects (optional)</label>
                <textarea name="defects" id="defects" class="form-control">{{ $item->defects }}</textarea>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $item->quantity }}" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-primary">Update Item</button>
        </form>
    </div>
@endsection
