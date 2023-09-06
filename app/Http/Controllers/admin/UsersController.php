<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class UsersController extends Controller
{

    public function index(){
        $users = User::
        withCount(['orders'])
        ->get();

        // dd($users);
        return view('admin.users.view',compact('users'));
    }

    public function view_user($id)
    {
        $user = User::find($id);
        return view('admin.users.view-user', compact('user'));
    }

    public function order_list($id){
        return "men at work";
    }

}
