<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('admin.message.index', ['messages' => $messages]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:60'],
            'subject' => ['required', 'string', 'max:50'],
            'message' => ['required', 'string', 'max:255'],
        ]);
        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        return redirect()->route('contact')->with('success', 'MESSAGE_SENT');
    }

    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();
        return redirect()->route('messagedashboard.index')->with('success', "MESSAGE_DELETED");

    }
}
