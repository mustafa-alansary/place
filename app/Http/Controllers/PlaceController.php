<?php

namespace App\Http\Controllers;

use App\Place;
use App\Sitting;
use App\Description;
use App\Time;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rest_times = Place::where('user_id',auth()->user()->id)->get();
       
        return view('rest.index',compact('rest_times'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $times = Time::all();

        return view('rest.create',compact('times'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        //

       request()->validate([

             'name' => 'bail|required|string',

             'location' => 'required|string',

             'price' => 'required|numeric|max:999999',

             'rent_time' => 'required|string',

             'size' => 'required|numeric|min:0|max:999',

             'in_no' => 'required|min:0|numeric|max:9999',

             'in_no_of_seats' => 'required_with:in_no',

             'out_no' => 'required|min:0|numeric|max:9999',

             'out_no_of_seats' => 'required_with:out_no',

             'pool' => 'boolean',

             'football_s' => 'boolean',

             'volleyball_s' => 'boolean',

             'basketball_S' => 'boolean',

             'house' => 'boolean',

             'Kitchen' => 'boolean',

             's_section' => 'boolean',

             'f_section' => 'boolean',

             'lounges' => 'required|numeric|min:0|max:999',

             'rooms' => 'required|numeric|min:0|max:999',

             'bedrooms' => 'required|numeric|min:0|max:999',

             'wc' => 'required|numeric|min:0|max:999'

        ]);
        
         

            $place = Place::create(request()->all());
             
            $sitting = new Sitting(request()->all());

            $description = new Description(request()->all());
             


            $sitting->place()->associate($place)->save();

            $description->place()->associate($place)->save();
         
             return redirect('/');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        //
         $place = Place::with('sitting','description')->findOrFail($place);

         return view('rest.show',compact('place'));
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {
        //
         $place = Place::with('sitting','description')->find($place);
         $times = Time::all();

          return view('rest.edit',compact('place','times'));
       }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     * @param bool $requires
     * @return $this
     */

    public function update(Request $request, Place $place)
    {
        //

      


           request()->validate([

             'name' => 'bail|required|string',

             'location' => 'required|string',

             'price' => 'required|numeric|max:999999',

             'rent_time' => 'required|string',

             'size' => 'required|string',

             'in_no' => 'required|min:0|numeric|max:9999',

             'in_no_of_seats' => 'required_with:in_no',

             'out_no' => 'required|min:0|numeric|max:9999',

             'out_no_of_seats' => 'required_with:out_no',

             'pool' => 'boolean',

             'football_s' => 'boolean',

             'volleyball_s' => 'boolean',

             'basketball_S' => 'boolean',

             'house' => 'boolean',

             'Kitchen' => 'boolean',

             's_section' => 'boolean',

             'f_section' => 'boolean',

             'lounges' => 'required|numeric|min:0|max:999',

             'rooms' => 'required|numeric|min:0|max:999',

             'bedrooms' => 'required|numeric|min:0|max:999',

             'wc' => 'required|numeric|min:0|max:999'

        ]);
        

             $place->description->pool = request()->has('pool') ? 1 : 0;

             $place->description->football_s = request()->has('football_s') ? 1 : 0;

             $place->description->volleyball_s = request()->has('volleyball_s') ? 1 : 0;

             $place->description->basketball_S = request()->has('basketball_S') ? 1 : 0;

             $place->description->house = request()->has('house') ? 1 : 0;

             $place->description->Kitchen = request()->has('Kitchen') ? 1 : 0;

             $place->description->s_section = request()->has('s_section') ? 1 : 0;

             $place->description->f_section = request()->has('f_section') ? 1 : 0;
            
            

             
             $place->update(request()->all());

             $place->sitting->update(request()->all());
             

             $place->description->update(request(['lounges','rooms','bedrooms','wc']));
            

            return redirect('/');

              
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
        //
       
         $place->delete();
        
        return redirect('/');
    }
}
