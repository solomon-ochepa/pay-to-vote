<?php

namespace App\Http\Controllers;

use App\Models\Contestant;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Plank\Mediable\Facades\MediaUploader;

class ContestantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Event $event)
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
        // restrict multiple reg?
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
        $request->validate([
            'image' => ['bail', 'required', 'image', "max:1024", "mimes:jpg,jpeg,png,svg,webp"],
        ]);

        $request->validate([
            'first_name'    => ['required', 'string', 'max:32'],
            'last_name'     => ['required', 'string', 'max:32'],
            'about'         => ['nullable', 'string', 'max:800']
        ]);

        // Get user
        $user = auth()->user();

        // Contestant Number
        $latest = Contestant::latest()->first();
        if ($latest)
            $number = $latest->number + 1;
        else
            $number = 1000;

        // Create Contestant
        $contestant = Contestant::firstOrCreate([
            'user_id'       => $user->id,
            'event_id'      => $event->id,
            'first_name'    => $request['first_name'],
            'last_name'     => $request['last_name'],
        ], [
            'number'    => $number,
            'active'    => 1,
        ]);

        // Check for existing image
        if ($contestant->media and $contestant->media->first())
            $this->media = $contestant->media;
        else
            $this->media = null;

        // Upload file
        $upload = MediaUploader::fromSource($request->file('image'))
            ->toDisk('public')
            ->toDirectory('pictures/contestants/')
            ->onDuplicateUpdate()
            ->useHashForFilename()
            ->makePublic()
            ->upload();

        // Store Media in Database table
        if ($upload) {
            if ($this->media) {
                // Replace existing media
                // $contestant->detachMedia($this->media);
                // $this->media->each->delete();

                $contestant->syncMedia($upload, 'image');
                session()->flash('status', 'Image updated successfully.');
            } else {
                $contestant->attachMedia($upload, 'image');
                session()->flash('status', 'Image uploaded successfully.');
            }
        } else {
            session()->flash('status', 'Image connot be uploaded.');
            return back()->withInput();
        }

        session()->flash('status', "Contestant ID: <strong>{$contestant->number}</strong> <br/ >Note: Please share your ID and link with family, friends and well wishers to vote for you!");

        return redirect()->route('event.show', ['event' => $event->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contestant  $contestant
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event, Contestant $contestant)
    {
        return view('contestant.show', ['contestant' => $contestant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contestant  $contestant
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event, Contestant $contestant)
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
    public function update(Request $request, Event $event, Contestant $contestant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contestant  $contestant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event, Contestant $contestant)
    {
        //
    }
}
