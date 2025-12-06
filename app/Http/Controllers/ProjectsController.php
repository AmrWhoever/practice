<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class ProjectsController extends Controller
{
    public function index()
    {
        return Inertia::render('Projects');
    }
}