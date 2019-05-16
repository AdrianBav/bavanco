<?php

namespace App\Http\Controllers;

use App\Card;
use App\DefaultDeckRepository;

class HomeController extends Controller
{
    /**
     * Show the home page.
     *
     * @return Response
     */
    public function index()
    {
        $cards = Card::all();

        return view('home', compact('cards'));
    }

    /**
    * Show the home page with all the official monopoly properties.
    *
    * @return Response
    */
    public function monopoly()
    {
        $cards = DefaultDeckRepository::getCards();

        return view('monopoly', compact('cards'));
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
