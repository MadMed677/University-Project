<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Activity;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Auth::user();
    }

    public function logout() {
        return Auth::logout();
    }

    public function profile() {

        // Get activities for User
        $activities = Auth::user()
                            ->activities()
                            ->take(10)
                            ->orderBy('date', 'asc')
                            ->get();

        // Get Location, Category and Tags
        foreach ( $activities as $activity ) {
            $activity->category->get();
            $activity->location->get();
            $activity->tags->all();
        }

        // Group by 'Date'
        $total_activities = [];
        foreach ( $activities as $activity ) {
            $find = false;
            for ( $i = 0; $i < count($total_activities); $i++ ) {
                if ( $total_activities[$i]['date'] == $activity['date'] ) {
                    array_push($total_activities[$i]['items'], $activity);
                    $find = true;
                    break;
                }
            }

            if ( !$find ) {
                $total_activities[$i] = [
                    'date' => $activity['date'],
                    'items' => [$activity]
                ];
            }
        }

        return [
            'user' => Auth::user(),
            'activities' => $total_activities
        ];
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
        $login = $request->input('login');
        $email = $request->input('email');
        $password = $request->input('password');

        if ( !Auth::check() ) {
            if ( Auth::attempt(['login' => $login, 'password' => $password], true) ) {
                return Auth::user();
            } else {
                $err = new \stdClass();
                return $err->status = 400;
            }
        } else {
            return Auth::user();
        }

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
