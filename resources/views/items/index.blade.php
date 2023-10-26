@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Item List</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Item Type</th>
                    <th>Item Condition</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->itemType->name }}</td>
                        <td>{{ $item->itemCondition->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>
                            <a href="{{ route('items.show', $item->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('items.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('items.create') }}" class="btn btn-success">Create New Item</a>
    </div>
@endsection
