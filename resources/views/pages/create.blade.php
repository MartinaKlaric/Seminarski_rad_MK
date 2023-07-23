<!-- create.blade.php -->
@extends('layouts.app')

@section('content')

    <div class="p-6">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="p-6">
                <form action="{{ route('pages.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="p-4">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" required
                               class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1">
                    </div>

                    <div class="p-4">
                        <label for="body">Body</label>
                        <textarea type="text" name="body" id="body" required
                                  class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1">
                        </textarea>
                    </div>

                    <div class="form-group p-4">
                        <label for="image">Choose Image</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                    </div>

                    <div class="p-4">
                        <button type="submit"
                                class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                            Create
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
