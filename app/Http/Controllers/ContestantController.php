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
        // restrict multiple reg
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
        $mimes = ['jpg', 'jpeg', 'png', 'svg'];

        $request->validate([
            'image' => ['bail', 'required', 'image', "max:1024", "mimes:jpg,jpeg,png,svg"],
        ]);

        $validated_user_details = $request->validate([
            'first_name' => ['required', 'string', 'max:32'],
            'last_name' => ['required', 'string', 'max:32'],
            'username' => ['required', 'string', 'max:32'],
            'phone' => ['required', 'string', 'max:32'],
            'email' => ['required', 'string', 'email', 'max:32']
        ]);

        // Update User
        $user = auth()->user();
        $user->update($validated_user_details);

        // Contestant Number
        $latest = Contestant::latest()->first();
        if ($latest)
            $number = $latest->number + 1;
        else
            $number = 1000;

        // Create Contestant
        $contestant = Contestant::firstOrCreate([
            'user_id' => $user->id,
            'event_id' => $event->id,
        ], [
            'number' => $number,
        ]);


        if ($contestant->media and $contestant->media->first())
            $this->media = $contestant->media->first();
        else
            $this->media = null;

        // Upload file
        $upload = MediaUploader::fromSource($request->file('image'))
            ->toDisk('public')
            ->toDirectory('pictures/')
            // ->setAllowedExtensions(['jpg', 'jpeg', 'png', 'svg'])
            // ->setAllowedAggregateTypes(['image/jpeg'])
            // ->setAllowUnrecognizedTypes(true)
            ->onDuplicateUpdate()
            ->useHashForFilename()
            ->makePrivate()
            ->upload();

        // Media table entry
        if ($upload) {
            if ($this->media) {
                // Replace existing media
                $contestant->syncMedia($upload, ['profile']);

                session()->flash('status', 'Document updated successfully.');
                return back();
            } else {
                // Store new media
                if ($contestant) {
                    $contestant->attachMedia($upload, ['profile']);
                }

                session()->flash('status', 'Document uploaded successfully.');
                return back();
            }
        } else {
            session()->flash('status', 'Error uploading document');
            return back()->withInput();
        }

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
