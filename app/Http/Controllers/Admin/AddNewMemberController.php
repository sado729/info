<?php

namespace App\Http\Controllers\Admin;

use App\Extensions\Date;
use App\Http\Controllers\Admin\Concerns\Statistician;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Support\Facades\Auth;

class AddNewMemberController extends Controller
{
    protected function index()
    {

        return view('admin.network.addNewMember');
    }

}
