<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Review;

class DestinationController extends Controller
{
    /**
     * Tampilkan daftar destinasi dengan filter search, location, category (enum)
     */
    public function index(Request $request)
    {
        $search   = $request->query('search');      // keyword search
        $location = $request->query('location');    // filter lokasi
        $category = $request->query('category');    // filter kategori sesuai enum

        // Karena kategori enum, buat array kategori manual untuk dropdown
        $categories = ['alam', 'budaya', 'pantai'];

        // Query destinations dengan filter
        $destinations = Destination::query()
            ->when($search, function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            })
            ->when($location, function ($q) use ($location) {
                $q->where('location', $location);
            })
            ->when($category, function ($q) use ($category) {
                $q->where('category', $category);
            })
            ->get();

        // Kirim ke view
        return view('home', compact('destinations', 'categories'));
    }

    /**
     * Tampilkan detail destinasi
     */
    public function show(Destination $destination)
    {
        // Jika ada relasi reviews, load saja (relasi category tidak ada)
        $destination->load('reviews');
        return view('detail', compact('destination'));
    }

    /**
     * Simpan review baru
     */
    public function storeReview(Request $request, $id)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'rating'  => 'required|numeric|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        Review::create([
            'destination_id' => $id,
            'name'           => $request->name,
            'rating'         => $request->rating,
            'comment'        => $request->comment,
        ]);

        // Update rata-rata rating di table destinations
        $avg = Review::where('destination_id', $id)->avg('rating');
        Destination::where('id', $id)->update(['rating' => $avg]);

        return back()->with('success', 'Review berhasil ditambahkan!');
    }
}
