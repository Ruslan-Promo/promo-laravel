<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:agent']);
    }

    public function agent()
    {
        return view('agent');
    }
}
