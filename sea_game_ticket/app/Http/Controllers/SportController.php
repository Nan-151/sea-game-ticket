<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $sports = Sport::get();

        return response()->json([
            'success'=>true, 
            'data'=>$sports,
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
        $validator = Sport::create($validator->validated());
        return response()->json([
            'message'=>'Store sport successfully', 
            'data'=>$validator,
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $sports = Sport::find($id);

        return response()->json([
            'success'=>true, 
            'data'=>$sports,
            'status' => 200   
        ], 200);
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
        if(Sport::find($id) != null){
            $sport = Sport::find($id);
            $sport->update($validator->validated());
            return response()->json([
                'message'=>'Update sport id: '. $id . ' successfully', 
                'data'=>$sport,
            ],201);
        }
        return response()->json([
            'message'=>'Cannot found sport id: '. $id, 
        ],401);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $sport = Sport::find($id);
        if($sport != null)
        {
            $sport->delete();
            return response()->json([
                'message'=>'Sport id: '. $id . ' has been deletes.', 
            ],200);
        }
        return response()->json([
            'message'=>'Cannot found sport id: '. $id, 
        ],401);
    }
}
