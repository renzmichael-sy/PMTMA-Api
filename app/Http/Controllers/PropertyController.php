<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Property;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $property = $request->all();

        // $validated = $request->validate([
        //     'name' => 'required|max:45',
        //     'address' => 'required|max:255',
        //     'maps_link' => 'required',
        // ]);

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:45',
            'address' => 'required|max:255',
        ]);

        if($validator->fails()) {
          return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $property = Property::create($request);

        return response(['property' => $property]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = Property::findorFail($id);

        return view('property.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
