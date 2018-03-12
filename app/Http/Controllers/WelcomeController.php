<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        if (\Auth::check()) {
            return redirect(route('entries.index'));
        }

        return view('welcome');
    }
}
