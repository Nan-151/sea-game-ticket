<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Event;
use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $events = Event::get();

        return response()->json([
            'success'=>true, 
            'data'=>$events,
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
            'title' => 'required',
            'date' => 'required',
            'venue_id' => 'required',
            'category_id' => 'required',
        ]);
        if($validator->fails()){
            return $validator->errors();
        }
        $validator = Event::create($validator->validated());
        return response()->json([
            'message'=>'Store event successfully', 
            'data'=>$validator,
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $event = Event::find($id);
        if($event != null)
        {
            $event->delete();
            return response()->json([
                'message'=>'Event id: '. $id . ' has been deletes.', 
            ],200);
        }
        return response()->json([
            'message'=>'Cannot find event id: '. $id, 
        ],401);
    }

    public function getEvent($sport)
    {
        # code...
        $events = Event::get();
        $getEvent = [];
        foreach($events as $event)
        {
            if (str_contains($event['title'], $sport))
            {
                array_push($getEvent, $event);
            }
        }
        if(count($getEvent) > 0)
        {
            return response()->json([
            'message'=>'Get event successfully', 
            'data'=>$getEvent,
            ],201);
        }else
        {
           return response()->json([
            'message'=>'Cannot find event name: '. $sport, 
            ],401); 
        }
    }

    public function getAllSeat()
    {
        # code...
        $seats = DB::table('venues')->get();
    }
}
