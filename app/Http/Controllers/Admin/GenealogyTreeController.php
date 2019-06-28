<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenealogyTreeController extends Controller
{
    protected function index()
    {

        return view('admin.network.genealogyTree');
    }
}
