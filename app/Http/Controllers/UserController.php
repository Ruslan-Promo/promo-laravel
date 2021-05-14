<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        if(Auth::user()->isAdmin()){
            return view('users.index', ['users' => $model->paginate(15)]);
        }else{
            abort(403, 'Only admin!');
        }

    }
}
