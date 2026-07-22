<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return view('admin.events.index', ['events' => Event::orderBy('event_date')->get()]);
    }

    public function create()
    {
        return view('admin.events.form', ['event' => new Event()]);
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required', 'description' => 'required', 'event_date' => 'required|date']);
        Event::create($request->all());
        return redirect()->route('admin.events.index')->with('success', 'Event added!');
    }

    public function edit(Event $event)
    {
        return view('admin.events.form', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate(['title' => 'required', 'description' => 'required', 'event_date' => 'required|date']);
        $event->update($request->all());
        return redirect()->route('admin.events.index')->with('success', 'Event updated!');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Event deleted!');
    }
}
