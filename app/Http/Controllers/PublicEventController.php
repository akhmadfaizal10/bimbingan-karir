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
}
