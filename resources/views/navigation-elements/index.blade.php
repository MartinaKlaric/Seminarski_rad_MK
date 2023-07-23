<!-- index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="p-6">

        <div class="p-6">
            <a href="{{route('navigation-elements.create')}}"
               class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                Add navigation
            </a>



        </div>


        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($navigationElements as $navigationElement)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $navigationElement->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right">
                            @can('update', $navigationElement)
                                <a href="{{ route('navigation-elements.edit', $navigationElement->id) }}" class="text-indigo-600 hover:text-gray-900">Edit</a>
                            @endcan
                            @can('delete', $navigationElement)
                                <form class="inline-block" action="{{ route('navigation-elements.destroy', $navigationElement->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-gray-900">Delete</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{ $navigationElements->links() }}
    </div>
@endsection
