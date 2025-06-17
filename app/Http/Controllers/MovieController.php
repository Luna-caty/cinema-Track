<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('home', compact('movies'));
    }
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'genre' => 'nullable',
            'year' => 'nullable|integer|min:1900|max:2025',
            'image' => 'nullable|image|max:2048'
        ], [
            'year.min' => 'L\'année doit être supérieure ou égale à 1900',
            'year.max' => 'L\'année doit être inférieure ou égale à 2025'
        ]);


        try {
            if ($request->hasFile('image')) {
                $filename = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images'), $filename);
                $data['image'] = $filename;
            }

            Movie::create($data);

            return redirect()->route('home')->with('success', 'Film ajouté avec succès !');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de l\'ajout du film !');
        }
    }
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return redirect()->route('admin')->with('success', 'Film supprimé avec succès !');
    }
    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        return view('edit', compact('movie'));
    }

    public function update(Request $request, $id)
    {
        // we call that validation rules we can have any validation rule we want 

        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'genre' => 'nullable',
            'year' => 'nullable|integer|min:1900|max:2025',
            'image' => 'nullable|image|max:2048'
        ], [
            'year.min' => 'L\'année doit être supérieure ou égale à 1900',
            'year.max' => 'L\'année doit être inférieure ou égale à 2025'
        ]);

        $movie = Movie::findOrFail($id);

        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $filename);
            $data['image'] = $filename;
        }

        $movie->update($data);

        return redirect()->route('admin')->with('success', 'Film mis à jour avec succès !');
    }
    public function adminIndex()
    {
        $movies = Movie::all();
        return view('admin', compact('movies'));
    }
}
