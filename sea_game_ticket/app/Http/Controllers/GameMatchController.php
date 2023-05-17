<?php

namespace App\Http\Controllers;

use App\Models\GameMatch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class GameMatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $gameOFMatches = GameMatch::get();

        return response()->json([
            'success'=>true, 
            'data'=>$gameOFMatches,
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
            'title' => 'nullable',
            'start_time' => 'required',
            'event_id' => 'required',
        ]);
        if($validator->fails()){
            return $validator->errors();
        }
        $validator = GameMatch::create($validator->validated());
        return response()->json([
            'message'=>'Store game match successfully', 
            'data'=>$validator,
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(GameMatch $gameMatch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = Validator::make($request->all(),
        [
            'title' => 'nullable',
            'start_time' => 'required',
            'event_id' => 'required',
        ]);

        if($validator->fails()){
            return $validator->errors();
        }
        if(GameMatch::find($id) != null){
            $match = GameMatch::find($id);
            $match->update($validator->validated());
            return response()->json([
                'message'=>'Update match id: '. $id . ' successfully', 
                'data'=>$match,
            ],201);
        }
        return response()->json([
            'message'=>'Cannot find match id: '. $id, 
        ],401);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GameMatch $gameMatch)
    {
        //
        
    }
}
