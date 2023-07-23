<!-- show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="p-6">
        <div class="bg-white rounded-lg shadow overflow-hidden p-6" style="word-break: normal">
            <h1 class="text-center mb-4" style="font-size: 5rem">{{ $page->title }}</h1>
            <div class="h-screen bg-gray-200">
                <img src="{{ Storage::url($page->image_path) }}" alt="Image" width="640" height="640" class="mx-auto mb-4">
            </div>
            <div style="overflow-wrap: break-word" class="text-center">{{ $page->body }}</div>
        </div>
    </div>
@endsection
