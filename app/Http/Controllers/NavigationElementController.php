<?php

namespace App\Http\Controllers;

use App\Models\NavigationElement;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NavigationElementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $navigationElements = NavigationElement::query()->paginate(perPage: request()->query('per_page', 10), page: request()->query('page', 1));

        return view('navigation-elements.index', compact('navigationElements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pages = Page::all();

        return view('navigation-elements.create', compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', NavigationElement::class);

        $validated = $request->validate([
            'name' => ['required', 'string'],
            'page_id' => ['required', 'exists:pages,id'],
        ]);

        NavigationElement::query()->create($validated);

        return redirect(route('navigation-elements.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(NavigationElement $navigationElement): View
    {
        return view('navigation-elements.show', compact('navigationElement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NavigationElement $navigationElement): View
    {
        $pages = Page::all();

        return view('navigation-elements.edit', compact('navigationElement', 'pages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NavigationElement $navigationElement)
    {
        $this->authorize('update', $navigationElement);

        $validated = $request->validate([
            'name' => ['string'],
            'page_id' => ['exists:pages,id'],
        ]);

        $navigationElement->update($validated);

        return redirect(route('navigation-elements.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NavigationElement $navigationElement)
    {
        $this->authorize('delete', $navigationElement);

        $navigationElement->delete();

        return redirect(route('navigation-elements.index'));
    }
}
