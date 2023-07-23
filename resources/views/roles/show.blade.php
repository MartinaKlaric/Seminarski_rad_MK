<!-- show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="p-6">
        <div class="bg-white rounded-lg shadow overflow-hidden p-6">
            <h1 class="text-center mb-4" style="font-size: 5rem">{{ $role->name }}</h1>
        </div>
    </div>
@endsection
