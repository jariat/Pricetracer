<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        $userNotifications = Notification::where(['user_id'=> $user,'trashed'=>false])->get();
        $realCount = count($userNotifications);
        $trashed = Notification::where(['user_id'=> $user,'trashed'=>true])->get();
        $trashedCount = count($trashed);
        $starred = Notification::where(['user_id'=> $user,'starred'=>true])->get();
        $starredCount = count($starred);


       return view('notifications.index',compact('userNotifications','trashedCount','starredCount','realCount'));
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
    public function star($id)
    {
        $not = Notification::findOrFail($id);
        $not->starred= true;
        $not->save();

        return redirect()->back();
        //
    }
    public function unStar($id)
    {
        $not = Notification::findOrFail($id);
        $not->starred= false;
        $not->save();

        return redirect()->back();
    }
    public function trash($id)
    {
        $not = Notification::findOrFail($id);
        $not->trashed= true;
        $not->save();

        return redirect()->back();
    }
    public function unTrash($id)
    {
        $not = Notification::findOrFail($id);
        $not->trashed= false;
        $not->save();

        return redirect()->back();
    }
    public function starred()
    {
        $user = Auth::user()->id;
        $real = Notification::where(['user_id'=> $user,'trashed'=>false])->get();
        $realCount = count($real);

        $trashed = Notification::where(['user_id'=> $user,'trashed'=>true])->get();
        $trashedCount = count($trashed);
        $starred = Notification::where(['user_id'=> $user,'starred'=>true])->get();
        $starredCount = count($starred);
        $userNotifications = Notification::where(['user_id'=> $user,'starred'=>true])->get();


        return view('notifications.starred',compact('userNotifications','trashedCount','starredCount','realCount'));
    }
    public function trashed()
    {
        $user = Auth::user()->id;
        $trashed = Notification::where(['user_id'=> $user,'trashed'=>true])->get();
        $real = Notification::where(['user_id'=> $user,'trashed'=>false])->get();
        $realCount = count($real);
        $trashedCount = count($trashed);
        $starred = Notification::where(['user_id'=> $user,'starred'=>true])->get();
        $starredCount = count($starred);
        $userNotifications = Notification::where(['user_id'=> $user,'trashed'=>true])->get();

        return view('notifications.trashed',compact('userNotifications','trashedCount','starredCount','realCount'));
    }
}
