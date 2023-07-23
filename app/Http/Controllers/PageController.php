<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $pages = Page::query()->paginate(perPage: request()->query('per_page', 10), page: request()->query('page', 1));

        return view('pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string'],
            'body' => ['required', 'string'],
            'image' => ['required', 'file'],
        ]);

        $imagePath = $request->file('image')->store('public/images');

        Page::query()->create([
            'title' => $validated['title'],
            'body' => $validated['body'],
            'image_path' => $imagePath,
            'user_id' => auth()->user()->getAuthIdentifier()
        ]);

        return redirect(route('pages.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page): View
    {
        return view('pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page): View
    {
        return view('pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        $this->authorize('update', $page);

        $validated = $request->validate([
            'title' => ['string'],
            'body' => ['string'],
            'image' => ['file'],
        ]);

        $imagePath = $page->image_path;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
        }

        $page->update([
            'title' => $validated['title'],
            'body' => $validated['body'],
            'image_path' => $imagePath,
            'user_id' => auth()->user()->getAuthIdentifier()
        ]);

        return redirect(route('pages.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $this->authorize('delete', $page);

        $page->delete();

        return redirect(route('pages.index'));
    }
}
