<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserEditProfileController extends Controller
{
    protected function index()
    {

        return view('admin.account.editProfile');
    }
}
