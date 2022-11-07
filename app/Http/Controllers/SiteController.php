<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home(Request $request)
    {
        $events = Event::all();

        return view('welcome', [
            'events' => $events
        ]);
    }

    public function dashboard(Request $request)
    {
        $events = Event::all();

        return view('dashboard', [
            'events' => $events
        ]);
    }
}
