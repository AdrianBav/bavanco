<?php

namespace App\Http\Controllers;

use App\Deck;

class HomeController extends Controller
{
    /**
     * Show the home page.
     *
     * @return Response
     */
    public function index()
    {
        $cards = Deck::whereName('home')->first()->cards;

        return view('home', compact('cards'));
    }

    /**
    * Show the home page with all the official monopoly properties.
    *
    * @return Response
    */
    public function deeds()
    {
        $cards = Deck::whereName('default')->first()->cards;

        return view('deeds', compact('cards'));
    }

    /**
    * Show the about page.
    *
    * @return Response
    */
    public function about()
    {
        return view('about');
    }
}
