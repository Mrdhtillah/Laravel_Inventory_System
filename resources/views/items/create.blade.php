@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Item</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="type">Item Type</label>
                <select name="type" id="type" class="form-control" required>
                    @foreach ($itemTypes as $itemType)
                        <option value="{{ $itemType->id }}">{{ $itemType->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="condition">Item Condition</label>
                <select name="condition" id="condition" class="form-control" required>
                    @foreach ($itemConditions as $itemCondition)
                        <option value="{{ $itemCondition->id }}">{{ $itemCondition->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="description">Item Description</label>
                <textarea name="description" id="description" class="form-control" required>{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="defects">Defects (optional)</label>
                <input type="text" name="defects" id="defects" class="form-control" value="{{ old('defects') }}">
            </div>

            <div class="form-group">
                <label for="quantity">Amount of Items</label>
                <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity') }}" required>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control-file" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Item</button>
        </form>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>
@endsection
