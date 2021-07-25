<?php
namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class WelcomeController extends Controller{

	function welcome(){
		$title = "Welcome";
		return view('welcome',['title'=>$title]);
	}

	function home(){
		$name = "Home";
		return view('home',['title'=>$name]);
	}

	function form(Request $req){
		$req->validate([
			"username"=>"required | min:5",
			"password"=>"required | min:8"
		]);
		return $req->input();
	}

}
