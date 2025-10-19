<?php

namespace App\Http\Controllers;

use App\Models\AutoPart;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AutoPartController extends Controller
{
    /**
     * Middleware - samo admin može pristupiti
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!auth()->user()->isAdmin()) {
                abort(403, __('messages.access_denied'));
            }
            return $next($request);
        });
    }

    /**
     * Prikaz svih dijelova (tabelarni pregled)
     */
    public function index()
    {
        $autoParts = AutoPart::with('category')->paginate(15);
        return view('parts.index', compact('autoParts'));
    }

    /**
     * Forma za kreiranje novog dijela
     */
    public function create()
    {
        $categories = Category::all();
        return view('parts.create', compact('categories'));
    }

    /**
     * Čuvanje novog dijela u bazu
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload slike
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('parts', 'public');
            $validated['image'] = $imagePath;
        }

        AutoPart::create($validated);

        return redirect()->route('parts.index')->with('success', __('messages.part_added'));
    }

    /**
     * Forma za izmjenu dijela
     */
    public function edit($id)
    {
        $autoPart = AutoPart::findOrFail($id);
        $categories = Category::all();
        return view('parts.edit', compact('autoPart', 'categories'));
    }

    /**
     * Ažuriranje dijela
     */
    public function update(Request $request, $id)
    {
        $autoPart = AutoPart::findOrFail($id);

        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload nove slike
        if ($request->hasFile('image')) {
            // Obriši staru sliku
            if ($autoPart->image) {
                Storage::disk('public')->delete($autoPart->image);
            }
            $imagePath = $request->file('image')->store('parts', 'public');
            $validated['image'] = $imagePath;
        }

        $autoPart->update($validated);

        return redirect()->route('parts.index')->with('success', __('messages.part_updated'));
    }

    /**
     * Brisanje dijela
     */
    public function destroy($id)
    {
        $autoPart = AutoPart::findOrFail($id);

        // Obriši sliku
        if ($autoPart->image) {
            Storage::disk('public')->delete($autoPart->image);
        }

        $autoPart->delete();

        return redirect()->route('parts.index')->with('success', __('messages.part_deleted'));
    }
}
