<?php

namespace App\Http\Controllers;

use App\Models\Town;
use Illuminate\Http\Request;

class TownController extends Controller
{
    public function index(){
        return view('towns.index', ['towns' => Town::orderBy('title')->get()]);
    }
    // ATTENTION :: we need countries to be able to assign them
    public function create(){
        $countries = \App\Models\Country::orderBy('title')->get();
        return view('towns.create', ['countries' => $countries]);
    }
    public function store(Request $request){
        $this->validate($request, [
            
            'title' => 'required|unique:towns',
            'population' => 'required',
            'country_id' => 'required',
        ]);
        $town = new Town();
        // can be used for seeing the insides of the incoming request
        // var_dump($request->all()); die();
        $town->fill($request->all());
        $town->save();
        return redirect()->route('towns.index')->with('status_success', 'Town created!');
    }
    
    // ATTENTION :: we need countries to be able to assign them
    public function edit(Town $town){
        $countries = \App\Models\Country::orderBy('title')->get();
        return view('towns.edit', ['town' => $town, 'countries' => $countries]);
    }
    public function update(Request $request, Town $town){
        $this->validate($request, [
            
            'title' => 'required',
            'population' => 'required',
            'country_id' => 'required',
        ]);
        $town->fill($request->all());
        $town->save();
        return redirect()->route('towns.index')->with('status_success', 'Town updated!');
    }
    public function destroy(Town $town){
        $town->delete();
        return redirect()->route('towns.index')->with('status_success', 'Town deleted!');
    }

}
