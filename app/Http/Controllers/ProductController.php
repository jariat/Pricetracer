<?php

namespace App\Http\Controllers;

use App\Category;
use App\Follow;
use App\Notification;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['wholesaler'], ['only' => ['create']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->is_admin){
            $products= Product::all();
        }
        else{
            $products= Product::where('user_id','=',$user->id)->get();
        }
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $validate = $request->validate([
            'picture' => 'image|required',
            'name' => 'required|string',
            'price' => 'required',
            'quantity' => 'required',
            'category_id' => 'required',
        ]);
        if (!$validate) {
            return Redirect::back()->withErrors($validate)->withInput();

        } else {
            $imagePath = $this->uploadImage($request->picture,'products');

            Product::create(['image' => $imagePath, 'name' => $request->name, 'price' => $request->price,
                             'category_id' => $request->category_id, 'user_id' => Auth::user()->id, 'quantity' => $request->quantity]);

            $followers = Follow::where(['followee'=>$user->id])->get();
                foreach ($followers as $follower) {
                    Notification::create(['title'=>'New Product','message'=>$user->name.', uploaded a new product!! Check out his product list',
                                          'user_id'=>$follower->id,'new'=>true,'starred'=>false,'trashed'=>false]);
                }
            return redirect()->back()->with('success', 'Product Successfully Created!!');
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
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $authorised_user = $product->user->id;
        $authenticated_user= Auth::user();

        if($authenticated_user->id==$authorised_user | $authenticated_user->is_admin ){
            return view('products.edit',compact('product','categories'));
        }
        else{
            return abort(403,'Unauthorized');
        }

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
        $product = Product::findOrFail($id);

        $validate = $request->validate([
            'picture' => 'image',
            'name' => 'required|string',
            'price' => 'required',
            'quantity' => 'required',
            'category_id' => 'required',
        ]);
        if (!$validate) {
            return Redirect::back()->withErrors($validate)->withInput();

        } else {
            if ($request->hasFile('picture')){
                $imagePath = $this->uploadImage($request->picture,'products');
                $request = array_merge(request(['name', 'description', 'price',
                    'quantity', 'category_id']), ['image' => $imagePath]);
            }
            else{
                $request= $request->toArray();
            }
            $product->fill($request)->save();
            return redirect()->back()->with('success', 'Product Successfully Updated!!');
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
        Product::destroy($id);
        return redirect()->back()->with('success', 'Product Successfully Deleted!!');
    }
}
