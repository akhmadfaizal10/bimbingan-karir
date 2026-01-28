<?php

namespace App\Http\Controllers;

use App\Models\Event;

class PublicEventController extends Controller
{
    public function show($id)
    {
        $event = Event::with('tikets')->findOrFail($id);
        return view('events.show', compact('event'));
    }
    public function edit($id)
    {
        $event = Event::with('tikets')->findOrFail($id);
        return view('events.show', compact('event'));
    }
}

//https://folder-structure-sca-xlcj.bolt.host/ untuk mencari folder structure tapi gaguna 
