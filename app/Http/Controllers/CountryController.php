<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index() {
        return view('countries.index', ['countries' => Country::orderBy('title')->get()]);
    }
    public function create() {
        return view('countries.create');
    }
    public function store(Request $request) {
        $this->validate($request, [
            
            'title' => 'required|unique:countries',
            'description' => 'required',
            'distance' => 'required',
        ]);
        $country = new Country();
     // can be used for seeing the insides of the incoming request
         // dd($request->all()); die();
        $country->fill($request->all());
        $country->save();
        return redirect()->route('countries.index')->with('status_success', 'Country created!');
    }
    public function edit(Country $country){
        return view('countries.edit', ['country' => $country]);
    }
 
    public function update(Request $request, Country $country){
        $this->validate($request, [
            
            'title' => 'required',
            'description' => 'required',
            'distance' => 'required',
        ]);
        $country->fill($request->all());
        $country->save();
        return redirect()->route('countries.index')->with('status_success', 'Country updated!');
    }
 
    public function destroy(Country $country) {
        if (count($country->towns)){ 
            return back()->withErrors(['error' => ['Can\'t delete country with cities assigned, please unassign cities first!']]);
        }
        $country->delete();
        return redirect()->route('countries.index');
    }

}
