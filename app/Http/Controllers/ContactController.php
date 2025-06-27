<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index_contact()
    {
        return view('pages.contact');
    }
}
