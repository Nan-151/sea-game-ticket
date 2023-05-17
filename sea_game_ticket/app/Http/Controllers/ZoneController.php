<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $zones = Zone::get();

        return response()->json([
            'success'=>true, 
            'data'=>$zones,
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
            'number_of_seat' => 'required',
            'venue_id' => 'required',  
        ]);
    if($validator->fails()){
        return $validator->errors();
    }
    $validator = Zone::create($validator->validated());
    return response()->json([
        'message'=>'Store zone successfully', 
        'data'=>$validator,
    ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $zone = Zone::find($id);

        return response()->json([
            'success'=>true, 
            'data'=>$zone,  
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
            'number_of_seat' => 'required',
            'venue_id' => 'required',
        ]);

        if($validator->fails()){
            return $validator->errors();
        }

        if(Zone::find($id) != null){
            $zone = Zone::find($id);
            $zone->update($validator->validated());
            return response()->json([
                'message'=>'Update Zone id: '. $id . 'successfully',
                'data'=>$zone,
            ],201);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $zone = Zone::find($id);
        if($zone != null)
        {
            $zone->delete();
            return response()->json([
                'message'=>'Zone id: '. $id . ' has been deletes.', 
            ],200);
        }
        return response()->json([
            'message'=>'Cannot find zone id: '. $id, 
        ],401);
    }

    public function getAllSeat()
    {
        # code...
        // $seat = DB::table('zones')->where('venue_id', '=', '1')->sum('number_of_seat');
        $seat = DB::table('zones')->sum('number_of_seat');
        return $seat;
    }
}
