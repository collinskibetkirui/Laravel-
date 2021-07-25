<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class Profiles extends Controller
{
    function profile(Request $req){
    	if($req->input('post')){
    		session()->flash('status','Post Published. ');
    	}
    	return view('profile');
    }
	
    function logout(){
    	session()->forget('data');
    	return redirect('login');
    }

    function login(Request $req){
    	$validate = $req->validate([
			"username"=>"required | min:5",
			"password"=>"required | min:8"
		]);
		if($validate){
    		$req->session()->put('data',$req->input());
    		return redirect('profiles');
    		// return $req->session()->get('data');
		}

    }

    function fileupload(Request $request){
        $path = $request->file('image')->store('avatars');
        return ['path'=>$path,"success"=>"Success"];
    }
    

    // Query Builder Function
    function db(){
        return DB::table('users')->get();
        /*

        // Raw Sql 
        return DB::select("SELECT * FROM users");

        // Get Method For getting All data from database
        return DB::table('users')->get();

        // Get With WHERE method
        return DB::table('users')->where('id','1')->get();

        // Count & Find & First
        return DB::table('users')->count();
        return DB::table('users')->first();
        $data =  DB::table('users')->find(1); // Its return a array
        print_r($data);
    
        // =========3 Major Oparations============

        // Delete
        return DB::table('users')->where('id',6)->delete();
        

        // Insert
        return DB::table('users')->insert([
            "name"=>"Emon",
            "email"=>"emon55@gmail.com",
            "password"=>"fjkagsfjafuafasjkfasj8948937"
        ]);

        // Update
        return DB::table('users')->where('id',9)->update([
            "password"=>"passwordforid"
        ]);

        */

    }

    // Join Query
    function join(){

        // Left Join Query
        /*      
        $data =  DB::table('users')
        ->leftJoin('profiles','users.id','=','profiles.user_id')
        ->select('users.name', 'users.email', 'profiles.bio')
        ->where('users.id',9)
        ->get();
        */
    

        // Database Paginations
        $data =  DB::table('users')
        ->leftJoin('profiles','users.id','=','profiles.user_id')
        ->simplePaginate(1);

        return view('database.db',["data"=>$data]);
    }
}

