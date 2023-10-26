@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>item Created Successfully</h1>
        <p>Your item has been created successfully.</p>
        <a href="{{ route('items.index') }}" class="btn btn-primary">Back to item List</a>
    </div>
@endsection
