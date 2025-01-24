<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $items = Item::where('customer_id', Auth::id())
                     ->orderBy('created_at', 'desc')
                     ->paginate(10);
                     
        return view('customer.page.index', compact('items'));
    }

    public function create()
    {
        return view('customer.page.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'type' => ['required', 'in:building,animal'],
            'start_date' => ['required', 'date', 'after_or_equal:today'],
            'end_date' => ['required', 'date', 'after:start_date'],
            'notes' => ['nullable', 'string'],
        ]);

        $item = Item::create([
            'customer_id' => Auth::id(),
            'name' => $validated['name'],
            'description' => $validated['description'],
            'type' => $validated['type'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'notes' => $validated['notes'],
            'status' => 'pending',
        ]);

        return redirect()->route('customer.page.show', $item)
            ->with('success', 'Permintaan penitipan berhasil dibuat');
    }

    public function show(Item $item)
    {
        $this->authorize('view', $item);
        return view('customer.page.show', compact('item'));
    }
} 