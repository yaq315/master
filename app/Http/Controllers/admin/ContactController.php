<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['store']);
        $this->middleware('admin')->except(['store']);
    }

    public function index()
    {
        $contacts = Contact::latest()->paginate(10);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(Contact $contact)
    {
        if (!$contact->read_at) {
            $contact->update(['read_at' => now()]);
        }
        
        return view('admin.contacts.show', compact('contact'));
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')
                         ->with('success', 'Message deleted successfully');
    }

    public function markAsRead(Contact $contact)
    {
        $contact->update(['read_at' => now()]);
        return back()->with('success', 'Message marked as read');
    }
    
    public function markAsUnread(Contact $contact)
    {
        $contact->update(['read_at' => null]);
        return back()->with('success', 'Message marked as unread');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|email|max:100',
            'subject' => 'required|string|min:5|max:100',
            'message' => 'required|string|min:10|max:500',
        ]);
        
        Contact::create($validated);
        
        return back()->with('success', 'Thank you for your message!');
    
        
    }
}