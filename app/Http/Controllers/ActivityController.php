<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Activity;
use Auth;
use App\Category;
use App\Location;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     * GET /activities/
     *
     *
     * @return Response
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
     * Store a newly created resource in storage.
     *
     * @param int $request->category The category id
     * @param float $request->hours The count of hours
     * @param varchar $request->location['name'] Location name
     * @param float $request->location['latitude'] Location latitude
     * @param float $request->location['longitude'] Location longitude
     * @return array of all categories with activities
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['category'] = intval($input['category']);
        $input['hours'] = floatval($input['hours']);
        if ( !isset($input['location']) ) {
            $input['location']['id'] = 1;      // PLUG!!!
        } else {
            $input['location'] = Location::create([
                'title' => $input['location']['name'],
                'latitude' => $input['location']['latitude'],
                'longitude' => $input['location']['longitude']
            ]);
        }

        $activity = new Activity;
        $activity->category_id = $input['category'];
        $activity->location_id = $input['location']['id'];
        $activity->user_id = Auth::id();
        $activity->title = $input['title'];
        $activity->hours = $input['hours'];
        $activity->date = \Carbon\Carbon::now()->addHours(3);
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
                    ->where('date', '=', substr(\Carbon\Carbon::now()->addHours(3), 0, 10))
                    ->get();


        $result = [];
        // Copy category object
        foreach ( $category_types as $category) {
            $result[$category->id] = [
                "hours" => 0,
                "category" => $category,
            ];
        }

        // Calculate total hours
        foreach ( $activity_to_date as $activity ) {
            $result[$activity->category_id]['hours'] += $activity->hours;
        }

        return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id The activity id
     * @return Deleted activity
     */
    public function destroy($id)
    {
        return Activity::where('id', '=', $id)->delete();
    }
}
