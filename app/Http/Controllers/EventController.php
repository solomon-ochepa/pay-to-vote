<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public $data;

    public function __construct()
    {
        $this->data['title'] = 'Apartments';

        $this->middleware('auth');
        // $this->middleware(['permission:event.list'])->only('index');
        // $this->middleware(['permission:event.create'])->only('create', 'store');
        // $this->middleware(['permission:event.edit'])->only('edit', 'update');
        // $this->middleware(['permission:event.delete'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();

        return view('event.office.index', [
            'events' => $events,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.office.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'start_at' => ['required', 'date'],
            'end_at' => ['required', 'date'],
            'active' => ['nullable', 'string'],
        ]);

        $event = Event::firstOrCreate([
            'name' => $validated['name'],
            'start_at' => $validated['start_at'],
            'end_at' => $validated['end_at'],
        ], [
            'active' => $validated['active'] == 'on' ? 1 : 0,
        ]);

        if ($event) {
            session()->flash('status', 'Event created successfully!');

            return redirect()->route('office.event.show', ['event' => $event->slug]);
        } else {
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('event.office.show', [
            'events' => $event,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
