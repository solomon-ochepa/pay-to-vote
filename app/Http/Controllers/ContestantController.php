<?php

namespace App\Http\Controllers;

use App\Models\Contestant;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContestantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Event $event)
    {
        return view('contestant.create', ['event' => $event]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Event $event, Request $request)
    {
        $validated_user_details = $request->validate([
            'first_name' => ['required', 'string', 'max:32'],
            'last_name' => ['required', 'string', 'max:32'],
            'username' => ['required', 'string', 'max:32'],
            'phone' => ['required', 'string', 'max:32'],
            'email' => ['required', 'string', 'email', 'max:32'],
            // Address
            // 'country' => ['nullable', 'string'],
            // 'state' => ['nullable', 'string'],
            // 'town' => ['nullable', 'string'],
        ]);

        // Update User
        $user = auth()->user();
        $user->update($validated_user_details);

        $latest = Contestant::latest()->first();
        if ($latest)
            $number = $latest->number + 1;
        else
            $number = 1000;

        $contestant = Contestant::firstOrCreate([
            'user_id' => $user->id,
            'event_id' => $event->id,
        ], [
            'number' => $number,
        ]);

        session()->flash('status', "Contestant ({$contestant->number}) registered successfully.");

        return redirect()->route('event.show', ['event' => $event->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contestant  $contestant
     * @return \Illuminate\Http\Response
     */
    public function show(Contestant $contestant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contestant  $contestant
     * @return \Illuminate\Http\Response
     */
    public function edit(Contestant $contestant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contestant  $contestant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contestant $contestant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contestant  $contestant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contestant $contestant)
    {
        //
    }
}
