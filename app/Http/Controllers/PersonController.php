<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
{
    public function index()
    {
        $persons = Person::where('user_id', auth()->user()->id)->get();
        return view('person.dashboard', ['persons' => $persons]);
    }

    public function show()
    {
        $persons = Person::paginate(9);

        return view('person.show', ['persons' => $persons]);
    }


    public function detail($id)
    {
        $person = Person::find($id);

        if (!$person) {
        }

        return view('person.detail', ['person' => $person]);
    }

    public function edit($id)
    {
        $person = Person::find($id);

        if (!$person) {
            return redirect()->route('person.dashboard')->with('error', 'Person not found');
        }

        return view('person.edit', ['person' => $person]);
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

        $validatedData['user_id'] = auth()->user()->id;

        Person::create($validatedData);

        return redirect(route('person.dashboard'))->with('success', 'person added successfully.');
    }

    public function update(Request $request, $id)
    {
        $person = Person::find($id);

        if (!$person) {
            return redirect()->route('person.dashboard')->with('error', 'Person not found');
        }

        $validatedData = $request->validate([
            'name' => 'required',
            'quote' => 'required',
            'biograph' => 'required',
            'date' => 'required|date',
        ]);

        // Check if a new image was uploaded
        if ($request->hasFile('image')) {
            // Validate the new image
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:10048',
            ]);

            // Store the new image and update the 'image' field in the database
            $imagePath = $request->file('image')->store('persons', 'public');
            $person->image = $imagePath;
        }

        // Update other fields
        $person->name = $validatedData['name'];
        $person->quote = $validatedData['quote'];
        $person->biograph = $validatedData['biograph'];
        $person->date = $validatedData['date'];

        $person->save();

        return redirect()->route('person.dashboard')->with('success', 'Person updated successfully');
    }

    public function destroy($id)
    {
        $person = Person::find($id);

        if (!$person) {
        }

        $person->delete();
        return redirect(route('person.dashboard'))->with('success', 'Person deleted successfully');
    }
}
