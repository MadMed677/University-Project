<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Activity;
use Auth;
use App\Category;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::all();

        foreach ($activities as $activity) {
            $activity->user->get();
            $activity->location->get();
            $activity->category->get();
            $activity->tags->all();
        }

        return $activities;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $input = $request->all();
        $input['category'] = intval($input['category']);
        $input['hours'] = floatval($input['hours']);

//        return $input;
        $activity = new Activity;
        $activity->category_id = $input['category'];
        $activity->location_id = 1;
        $activity->user_id = Auth::id();
        $activity->title = $input['title'];
        $activity->hours = $input['hours'];
        $activity->date = \Carbon\Carbon::now();
        $activity->category->get();

        $activity->save();

        if ( isset($input['tags']) ) $activity->tags()->attach($input['tags']);

        /**
         * Return New Application State
         */

        // Get category types
        $category_types = Category::all();

        // Get activity to date
        $activity_to_date = Auth::user()
                    ->activities()
                    ->where('date', '=', substr(\Carbon\Carbon::now(), 0, 10))
                    ->get();

//        return $activity_to_date;

        // Copy category object
        foreach ( $category_types as $category) {
            $total_categories[] = [
                'category' => $category,
                'hours' => 0
            ];
        }

        // Calculate total hours
        foreach ( $category_types as $category ) {
            foreach ( $activity_to_date as $activity ) {
                if ( $category->id == $activity->category_id ) {
                    for ( $i = 0; $i < count($total_categories); $i++ ) {
                        if ( $total_categories[$i]['category']->id == $activity->category_id ) {
                            $total_categories[$i]['hours'] += $activity->hours;
                            break;
                        }
                    }
                }
            }
        }

        return $total_categories;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
