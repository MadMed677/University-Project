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



        /**
         * It works but we can do something like that:
         *
         * SELECT c.id, c.title, SUM(ua.hours) as hours
         * FROM categories c
         * JOIN user_activities ua ON c.id = ua.category_id
         * WHERE ua.user_id = 1
         * GROUP BY c.id
         *
         * But I don't know how Laravel can do it
         */
    }
}
