<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @section('content')
        <main>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 text-center">
                            Welcome {{ auth()->user()->name }}! What would you like to do?
                            <div class="p-4 text-left text-indigo-700 hover:text-gray-900">
                                <a href="{{ route('pages.create') }}">Create new page</a>
                            </div>
                            <div class="p-4 text-left text-indigo-700 hover:text-gray-900">
                                <a href="{{ route('pages.index') }}">Go to all pages</a>
                            </div>
                            <div class="p-4 text-left text-indigo-700 hover:text-gray-900">
                                <a href=" {{route('roles.index')}}"> List roles</a>
                            </div>
                            <div class="p-4 text-left text-indigo-700 hover:text-gray-900">
                                <a href="{{ route('navigation-elements.index') }}"> Go to navigation</a>
                            </div>
                            <div class="p-4 text-left text-indigo-700 hover:text-gray-900">
                                <a href="{{ route('users.index') }}"> See other users</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endsection
</x-app-layout>
