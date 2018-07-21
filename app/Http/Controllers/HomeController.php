<?php

namespace App\Http\Controllers;

use App\Category;
use App\Follow;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['auth', 'admin'], ['only' => ['addUser']]);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wholesalers = User::where(['is_wholesaler' => true])->get();
        $wholesalersCount = count($wholesalers);
        $retailers = User::where(['is_retailer' => true])->get();
        $retailersCount = count($retailers);
        $products = Product::all();
        $totalProducts = count($products);

        $user = Auth::user();


        $monthlyWholesalers = $this->monthlyWholesalers();
        $monthlyRetailers = $this->monthlyRetailers();
        $monthlyProducts = $this->monthlyProducts();
        $monthlyFollowers = $this->monthlyFollowers($user->id);
        $w_products = Product::where(['user_id' => $user->id])->get();

        $most_viewed = $this->mostViewed($user->id);
        $followers = Follow::where(['followee' => $user->id])->get();
        $followers_count = count($followers);
        $wCount = count($w_products);

        if($user->is_wholesaler){
            return view('index-wholesaler', compact('most_viewed', 'wCount', 'monthlyFollowers','followers_count'));

        }
        else if ($user->is_admin){
            return view('index', compact('wholesalersCount', 'retailersCount', 'totalProducts','monthlyWholesalers','monthlyRetailers','monthlyProducts'));

        }
        else{
            return abort(404, 'Forbidden');
        }

    }

    public function addUser(Request $request)
    {
        $imagePath = null;
        $is_admin = false;
        $is_wholesaler = false;
        $is_retailer = false;

        $validate = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:4|confirmed',
                'type' => 'required',
                'picture' => 'image',
                'category_id' => 'required',
                'contact' => 'required',
				'location' => 'required',
				
            ]
        );
        if (!$validate) {
            return Redirect::back()->withErrors($validate)->withInput();

        } else {
            switch ($request->type) {
                case 'is_retailer':
                    $is_retailer = true;
                    break;
                case 'is_admin':
                    $is_admin = true;
                    break;
                case 'is_wholesaler':
                    $is_wholesaler = true;
                    break;
                default:
                    break;
            }
            if ($request->hasFile('picture')) {
                $imagePath = $this->uploadImage($request->picture, 'avatars');
            }

            User::create(['avatar' => $imagePath, 'email' => $request->email, 'name' => $request->name, 'password' => bcrypt($request->password),
                'is_admin' => $is_admin, 'is_retailer' => $is_retailer, 'is_wholesaler' => $is_wholesaler, 'category_id' => $request->category_id,
                'longitude' => $request->longitude, 'latitude' => $request->latitude,'contact'=>$request->contact,'location'=>$request->location]);
            return redirect()->back()->with('success', 'User Successfully Created!!');
        }
    }

    public function updateUser(Request $request, $id)
    {
        $is_admin = false;
        $is_wholesaler = false;
        $is_retailer = false;
        $user = User::findOrFail($id);
        $imagePath = $user->avatar;

        $validate = $request->validate([
                'name' => 'required|string|max:255',
                'type' => 'required',
                'picture' => 'image',
                'category_id' => 'required',
            ]
        );
        if (!$validate) {
            return Redirect::back()->withErrors($validate)->withInput();

        } else {
            switch ($request->type) {
                case 'is_retailer':
                    $is_retailer = true;
                    break;
                case 'is_admin':
                    $is_admin = true;
                    break;
                case 'is_wholesaler':
                    $is_wholesaler = true;
                    break;
                default:
                    break;
            }
            if ($request->hasFile('picture')) {
                $imagePath = $this->uploadImage($request->picture, 'avatars');
            }

            $request = array_merge(request(['email' => $request->email, 'name' => $request->name,
                'is_admin' => $is_admin, 'is_retailer' => $is_retailer, 'is_wholesaler' => $is_wholesaler, 'category_id' => $request->category_id,
                'longitude' => $request->longitude, 'latitude' => $request->latitude]), ['image' => $imagePath]);
            $user->fill($request)->save();

            return redirect()->back()->with('success', 'User Successfully Created!!');
        }

    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        $categories = Category::all();
        $authorised_user = $user->id;
        $authenticated_user = Auth::user();

        if ($authenticated_user->id == $authorised_user | $authenticated_user->is_admin) {
            return view('users.edit', compact('user', 'categories'));
        } else {
            return abort(403, 'Unauthorized');
        }
    }
    public function monthlyWholesalers()
    {
        $something = DB::table("users")
            ->select(DB::raw("(COUNT(*)) as total,MONTHNAME(created_at) as month"))
            ->where('is_wholesaler',true)
            ->groupBy(DB::raw("MONTH(created_at)"))
            ->orderBy('created_at','asc')
            ->get();
        return $something;

    }


    public function monthlyRetailers()
    {
        $something = DB::table("users")
            ->select(DB::raw("(COUNT(*)) as total,MONTHNAME(created_at) as month"))
            ->where('is_retailer',true)
            ->groupBy(DB::raw("MONTH(created_at)"))
            ->orderBy('created_at','asc')
            ->get();
        return $something;


    }
    public function monthlyProducts()
    {
        $something = DB::table("products")
            ->select(DB::raw("(COUNT(*)) as total,MONTHNAME(created_at) as month"))
            ->groupBy(DB::raw("MONTH(created_at)"))
            ->orderBy('created_at','asc')
            ->get();
        return $something;
    }
    public function monthlyFollowers($id)
    {
        $something = DB::table("follows")
            ->select(DB::raw("(COUNT(*)) as total,MONTHNAME(created_at) as month"))
            ->where('followee','=',$id)
            ->groupBy(DB::raw("MONTH(created_at)"))
            ->orderBy('created_at','asc')
            ->get();
        return $something;
    }

    public function mostViewed($id)
    {
        $something = Product::where('user_id','=',$id)->orderBy('views','desc')->first();
        return $something;
    }



}
