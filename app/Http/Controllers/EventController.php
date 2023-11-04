<?php

namespace App\Http\Controllers;

use App\Models\PhotoshootType;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $photoshootTypes = PhotoshootType::all();

        return view('admin.admin-event', compact('photoshootTypes'));
    }
    public function eventStore(Request $request)
    {
        $data = $request->validate([
            'type_name' => 'required',
            'type_desc' => 'required',
        ]);

        PhotoshootType::create($data);

        return redirect()->route('event.index')->with('success', 'Package created successfully');
    }
    public function updateEvent(Request $request)
    {
        $typeId = $request->input('event_type_id');
        $type = PhotoshootType::findOrFail($typeId);

        $type->type_name = $request->input('type_name');
        $type->type_desc= $request->input('type_desc');

        $type->save();

        return redirect()->back()->with('success', 'type updated successfully');
    }
    public function deleteEvent($id)
    {
        $types =PhotoshootType::findOrFail($id);

        $types->delete();

        return response()->json(['success' => true]);
    }
}
