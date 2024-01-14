<?php

namespace App\Http\Controllers;

use App\Models\Category; // Import the Category class

use Illuminate\Http\Request;

class ExploreController extends Controller
{
    /**
     * Display the explore index page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories = [
            'Categories' => [
                'Programming languages',
                'Web development',
                'Mobile app development',
                'DevOps',
            ],
        ];

        return view('explore.index', compact('categories'));
    }
    public function create()
    {
        $categories = Category::all();

        return view('create', compact('categories'));
    }
}
