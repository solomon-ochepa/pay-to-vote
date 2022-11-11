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

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'started_at' => ['required', 'date'],
            'ended_at' => ['required', 'date'],
            'default' => ['nullable', 'string'],
            'image' => ['required', 'image', "max:{$this->max}", "mimes:jpg,jpeg,png,svg"],
        ]);

        $event = Event::firstOrCreate([
            'name' => $validated['name'],
            'started_at' => $validated['started_at'],
            'ended_at' => $validated['ended_at'],
        ], [
            'active' => $validated['active'] == 'on' ? 1 : 0,
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
