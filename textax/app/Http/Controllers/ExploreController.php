<?php

namespace App\Http\Controllers;

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
            'Programming and Development' => [
                'Programming languages',
                'Web development',
                'Mobile app development',
                'DevOps',
            ],
        ];

        return view('explore.index', compact('categories'));
    }
}
