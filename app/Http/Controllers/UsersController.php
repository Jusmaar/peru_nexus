<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Illuminate\Support\Facades\Auth;

class UsersController extends Controller{
    
    public function  __construct(){

        $this->middleware("auth",["except"=>"show"]);



    }
    
    public function index()
    {
        $users=User::all();
        return view("users.index",["users" => $users]);
    }
    
}