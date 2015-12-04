<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Category;
use App\Http\Requests;
use App\Http\Input;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($date = null)
    {
        // Get category types
        $category_types = Category::all();

        // Get activity to date
        $activity_to_date = Auth::user()
                                ->activities()
                                ->where('date', '=', $date)
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($date)
    {
        return \Carbon\Carbon::now();
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
