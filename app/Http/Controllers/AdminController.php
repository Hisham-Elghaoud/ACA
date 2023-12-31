<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Draw;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.index');
    }

    public function randomSelect()
    {
        return Draw::inRandomOrder()->first();
    }
}