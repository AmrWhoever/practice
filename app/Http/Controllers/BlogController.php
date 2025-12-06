<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class BlogController extends Controller
{
    public function index()
    {
        return Inertia::render('Blog'); // This should now work!
    }

    public function show($slug)
    {
        return Inertia::render('BlogPost', [
            'slug' => $slug
        ]);
    }
}