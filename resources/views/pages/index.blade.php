<!-- index.blade.php -->
@extends('layouts.app')

@section('content')

    <div class="p-6">
        <div class="p-6">
            <a href="{{ route('pages.create') }}"
               class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                Create New Page
            </a>
        </div>
        <div class="bg-white rounded-lg shadow overflow-hidden">

            <table class="w-full border-collapse">
                <tbody class="bg-white divide-y divide-gray-200 min-w-fit">
                <tr style="background: #cbd5e0">
                    <td class="px-6 py-4 whitespace-nowrap">Title</td>
                    <td class="px-6 py-4 whitespace-nowrap">Content</td>
                    <td class="px-6 py-4 whitespace-nowrap">Picture</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right">Permissions</td>
                </tr>
                @foreach($pages as $page)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-green-600 hover:text-gray-900">
                            <a href="{{ route('pages.show', $page) }}">{{ $page->title }}</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap" style="word-break: break-word">
                            {{ $page->body }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <img src="{{ Storage::url($page->image_path) }}" alt="Image" width="80" height="80">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right">
                            @can('update', $page)
                                <a href="{{ route('pages.edit', $page->id) }}"
                                   class="text-indigo-600 hover:text-gray-900">Edit</a>
                            @endcan
                            @can('delete', $page)
                                <form class="inline-block" action="{{ route('pages.destroy', $page->id) }}"
                                      method="POST">
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
        {{ $pages->links() }}
    </div>
@endsection
