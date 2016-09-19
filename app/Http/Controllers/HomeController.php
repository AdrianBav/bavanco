<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Card;
use App\Repositories\DeedRepository;

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

        $rankings = Card::rankings();

    	return view('home', compact('cards', 'rankings'));
    }

    /**
    * Show the home page with all the official monopoly properties.
    *
    * @param  DeedRepository $deeds
    * @return Response
    */
    public function monopoly(DeedRepository $deeds)
    {
        $cards = $deeds->getCards();

        return view('pages.monopoly', compact('cards'));
    }  

    /**
    * Show the about page.
    *
    * @return Response
    */
    public function about()
    {
        return view('pages.about');
    }  

}
