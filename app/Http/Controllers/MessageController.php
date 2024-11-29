<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');
    $messages = Message::when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%")
                  ->orWhere('message', 'like', "%$search%");
        })
        ->orderBy('created_at', 'desc')
        ->paginate(10);  // Paginate results with 10 per page

    return view('pesan.daftar', compact('messages', 'search'));
}

    public function create()
    {
        return view('viewpublik.kontak');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'message' => 'required|string',
    ]);

    Message::create($request->all());
    
    // Kirim session flash untuk notifikasi sukses
    return redirect()->back()->with('message', 'Pesan berhasil dikirim!');
}


    public function show(Message $message)
    {
        return view('messages.show', compact('message'));
    }

    public function edit(Message $message)
    {
        return view('messages.edit', compact('message'));
    }

    public function update(Request $request, Message $message)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $message->update($request->all());
        return redirect()->route('messages.index')->with('success', 'Pesan berhasil diperbarui!');
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->back()->with('success', 'Pesan berhasil dihapus!');
    }
}
