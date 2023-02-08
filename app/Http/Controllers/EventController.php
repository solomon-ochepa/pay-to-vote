<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Plank\Mediable\Facades\MediaUploader;

class EventController extends Controller
{
    public $data;
    public $media;
    public $max = 1024;

    public function __construct()
    {
        $this->data['title'] = 'Apartments';

        // $this->middleware('auth');
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

        return view('event.index', [
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
        $this->middleware(['auth', 'can:edit.event']);

        if (!auth()->user()->is_admin) {
            return redirect()->route('event.index')->with('status', "You can't create Event!");
        }

        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->middleware(['auth', 'can:edit.event']);

        if (!auth()->user()->is_admin) {
            return redirect()->route('event.index')->with('status', "You can't create Event!");
        }

        $request->validate([
            'name'          => ['required', 'string', 'max:120'],
            'started_at'    => ['required', 'date'],
            'ended_at'      => ['required', 'date'],
            'about'         => ['required', 'string', 'max:800'],
            'min_vote'      => ['required', 'integer', 'min:1'],
            'vote_cost'     => ['required', 'numeric', 'min:1'],
            'default'       => ['nullable', 'string'],
            'image'         => ['required', 'image', "max:{$this->max}", "mimes:jpg,jpeg,png,svg"],
        ]);

        // Reset Default
        if ($request['default'] === "on") {
            $exists = Event::where('default', 1)->first();
            if ($exists) {
                $exists->default = 0;
                $exists->save();
            }
        }

        $event = Event::firstOrCreate([
            'name'          => $request['name'],
            'started_at'    => $request['started_at'],
            'ended_at'      => $request['ended_at'],
        ], [
            'default'       => $request['default'] == 'on' ? 1 : 0,
            'about'         => $request['about'],
            'min_vote'      => $request['min_vote'],
            'vote_cost'     => $request['vote_cost'],
        ]);

        if (!$event) {
            session()->flash('status', 'Connot create Event');
            return back()->withInput();
        }

        // Upload file
        $upload = MediaUploader::fromSource($request->file('image'))
            ->toDisk('public')
            ->toDirectory('pictures/events/')
            ->onDuplicateUpdate()
            ->useHashForFilename()
            ->makePublic()
            ->upload();

        // Check for existing image
        if ($event->media and $event->media->first())
            $this->media = $event->media->first();
        else
            $this->media = null;

        // Media
        if ($upload) {
            if ($this->media) {
                // Replace media
                $event->syncMedia($upload, 'image');
                session()->flash('status', 'Image updated successfully.');
            } else {
                // Store media
                $event->attachMedia($upload, 'image');
                session()->flash('status', 'Image uploaded successfully.');
            }
        } else {
            session()->flash('status', 'Image cannot be uploaded.');
            return back()->withInput();
        }

        session()->flash('status', 'Event created successfully!');
        return redirect()->route('event.show', ['event' => $event->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('event.show', [
            'event' => $event,
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
        $this->middleware(['auth', 'can:event.edit']);

        if (!auth()->user()->is_admin) {
            return redirect()->route('event.index')->with('status', "You can't create Event!");
        }

        return view('event.edit', compact('event'));
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
