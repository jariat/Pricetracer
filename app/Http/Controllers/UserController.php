<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::all();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('users.create',compact('categories'));
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
        $user = User::findOrFail($id);
        $imagePath = $user->avatar;

        $validate = $request->validate([
                'name' => 'required|string|max:255',
                'picture' => 'image',
                'category_id'=>'required',
            ]
        );
        if (!$validate) {
            return Redirect::back()->withErrors($validate)->withInput();

        } else {
            if ($request->hasFile('picture'))
            {
                $imagePath = $this->uploadImage($request->picture,'avatars');
            }

            $request = array_merge(request(['email' => $request->email, 'name' => $request->name,
                'category_id'=>$request->category_id,'longitude'=>$request->longitude,
                'latitude'=>$request->latitude]), ['avatar' => $imagePath]);
            $user->fill($request)->save();

            return redirect()->back()->with('success', 'Profile Successfully Updated!!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->back()->with('success', 'User Successfully Deleted!!');
    }
}
