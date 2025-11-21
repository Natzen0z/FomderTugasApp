<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::orderBy('name')->get()->map(function ($i) {
            $i->formatted_price = number_format($i->price, 2);
            return $i;
        });

        return view('items.index', compact('items'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(StoreItemRequest $request)
    {
        Item::create($request->validated());

        return redirect()->route('items.index')->with('success', 'Item created.');
    }

    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    public function update(StoreItemRequest $request, Item $item)
    {
        $item->update($request->validated());

        return redirect()->route('items.index')->with('success', 'Item updated.');
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return back()->with('success', 'Item deleted.');
    }
}
