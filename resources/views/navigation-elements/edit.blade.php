<!-- edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="p-6">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="p-6">
                <form action="{{ route('navigation-elements.update', $navigationElement) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="name">Title</label>
                        <input type="text" name="name" id="name" value="{{ $navigationElement->name }}" required class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1">
                    </div>

                    <label for="page_id">Page</label>
                    <select name="page_id" id="page_id" required class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1">
                        @foreach ($pages as $page)
                            <option value="{{ $page->id }}" {{ $page->id == $navigationElement->page_id ? 'selected' : '' }}>{{ $page->title }}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
