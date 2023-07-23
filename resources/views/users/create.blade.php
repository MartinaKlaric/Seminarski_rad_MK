<!-- create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="p-6">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="p-6">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf

                    <div>
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" required class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1">
                    </div>

                    <div>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1">
                    </div>

                    <div>
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1">
                    </div>

                    <div>
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1">
                    </div>

                    <label for="role_id">Role</label>
                    <select name="role_id" id="role_id" required class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
