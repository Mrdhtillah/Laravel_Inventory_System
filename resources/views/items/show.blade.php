@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Item Details</h1>
        <div class="card">
            <div class="card-body">
                <p>Description: {{ $item->description }}</p>
                <p>Item Type: {{ $item->itemType->name }}</p> 
                <p>Item Condition: {{ $item->itemCondition->name }}</p> 
                <p>Quantity: {{ $item->quantity }}</p>
                <img src="{{ asset('images/items/' . $item->image) }}" alt="Item Image" width="200">
            </div>
        </div>
        <a href="{{ route('items.index') }}" class="btn btn-primary">Back to Item List</a>
    </div>
@endsection
