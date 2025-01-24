<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with('user')->get();
        return view('employee.items.index', compact('items'));
    }

    public function show(Item $item)
    {
        return view('employee.items.show', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $validated = $request->validate([
            'status' => ['required', 'in:pending,accepted,rejected,completed'],
            'notes' => ['nullable', 'string'],
        ]);

        $item->update($validated);
        return redirect()->route('employee.items.index')->with('success', 'Status item berhasil diperbarui');
    }
} 