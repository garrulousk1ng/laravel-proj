<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index_projects()
    {
        return view('pages.projects');
    }
}
