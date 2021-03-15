<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {



        return redirect()->route('project.index');
    }
}
