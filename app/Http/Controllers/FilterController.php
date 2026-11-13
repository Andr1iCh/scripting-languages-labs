<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterRequest;
use App\Models\Filter;

class FilterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filters = Filter::query()
            ->orderBy('filter_name')
            ->paginate(5);
        return view('filters.index', compact('filters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('filters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FilterRequest $request)
    {
        Filter::create($request->validated());
        return redirect()->route('filters.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Filter $filter)
    {
        return view('filters.edit', compact('filter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FilterRequest $request, Filter $filter)
    {
        $filter->update($request->validated());
        return redirect()->route('filters.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Filter $filter)
    {
        $filter->delete();
        return redirect()->route('filters.index');
    }
}
