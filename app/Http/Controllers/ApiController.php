<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function getWholeSalers()
    {
        $wholeSalers = User::all()->take(10);
        return json_encode($wholeSalers);
    }

    public function getNewWholeSalers()
    {
        $wholeSalers = User::orderBy('created_at', 'desc')->get()->take('10');
        return json_encode($wholeSalers);
    }
//    public function folowWholeSaler($retailer, $wholesaler){
//        $retailer = User::findOrFail($retailer)->first();
//        $wholesaler = User::findOrFail($wholesaler)->first();
//
//
//
//        return json_encode();
//    }

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

//https://www.maps.ie/coordinates.html
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
    public function monthlyFollowers()
    {
        $something = DB::table("follows")
            ->select(DB::raw("(COUNT(*)) as total,MONTHNAME(created_at) as month"))
            ->where('followee','=',1)
            ->groupBy(DB::raw("MONTH(created_at)"))
            ->orderBy('created_at','asc')
            ->get();
        return $something;
    }
	public function post_login(Request $request){
    $data = User::where('email' , $request->email)->first();
    if($data){ 
        if(Hash::check($request->password, $data->password)){
            return json_encode($data->id);
        }
    }
    return json_encode('false');
}
}
