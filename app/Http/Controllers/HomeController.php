<?php

namespace App\Http\Controllers;

use App\Models\AutoPart;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Prikaz home stranice sa svim autodijelovima
     */
    public function index(Request $request)
    {
        // Preuzmi sve kategorije za filter
        $categories = Category::all();

        // Query za autodijelove sa filterom i pretragom
        $query = AutoPart::with('category');

        // Filter po kategoriji
        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }

        // Pretraga
        if ($request->has('search') && $request->search != '') {
            $query->where(function($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('description', 'LIKE', '%' . $request->search . '%');
            });
        }

        // Paginacija
        $autoParts = $query->orderBy('created_at', 'desc')->paginate(12);

        return view('home', compact('autoParts', 'categories'));
    }

    /**
     * Kupovina dijela (simulacija)
     */
    public function purchase($id)
    {
        $autoPart = AutoPart::findOrFail($id);

        // Provjera da li je dio na lageru
        if ($autoPart->stock > 0) {
            // Smanji stock
            $autoPart->decrement('stock');

            return redirect()->back()->with('success', __('messages.purchase_success'));
        }

        return redirect()->back()->with('error', __('messages.out_of_stock'));
    }

    /**
     * Promjena jezika
     */
    public function changeLanguage($locale)
    {
        if (in_array($locale, ['bs', 'en'])) {
            session(['locale' => $locale]);
        }
        return redirect()->back();
    }
}
