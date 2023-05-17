<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $venues = Venue::get();

        return response()->json([
            'success'=>true, 
            'data'=>$venues,
            'status' => 200   
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),
        [
            'name' => 'required',
        ]);
    if($validator->fails()){
        return $validator->errors();
    }
    $validator = Venue::create($validator->validated());
    return response()->json([
        'message'=>'Store venue successfully', 
        'data'=>$validator,
    ],201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $venue = Venue::find($id);

        if($venue != null)
        {
            return response()->json([
                'success'=>true, 
                'data'=>$venue,
            ],201);
        }

        return response()->json([
            'message'=>'Cannot find venue id: '. $id
        ],401);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = Validator::make($request->all(),
        [
            'name' => 'required',
        ]);

        if($validator->fails()){
            return $validator->errors();
        }
        if(Venue::find($id) != null){
            $venue = Venue::find($id);
            $venue->update($validator->validated());
            return response()->json([
                'message'=>'Update venue id: '. $id . 'successfully', 
                'data'=>$venue,
            ],201);
        }
        return response()->json([
            'message'=>'Cannot find venue id: '. $id, 
        ],401);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $venue = Venue::find($id);
        if($venue != null)
        {
            $venue->delete();
            return response()->json([
                'message'=>'Venue id: '. $id . ' has been deletes.', 
            ],200);
        }
        return response()->json([
            'message'=>'Cannot find venue id: '. $id, 
        ],401);
    }
}
