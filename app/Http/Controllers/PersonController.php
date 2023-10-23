<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
{
    // public function create()
    // {
    //     return view('guests.form');
    // }

    public function index()
    {
        $persons = Person::all();
        return view('dashboard', ['persons' => $persons]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'quote' => 'required|string|max:255',
            'biograph' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10048',
            'date' => 'required|date',
        ]);

        $imagePath = $request->file('image')->store('persons', 'public');
        $validatedData['image'] = $imagePath;

        Person::create($validatedData);

        return redirect(route('dashboard'))->with('success', 'person added successfully.');
    }
}
