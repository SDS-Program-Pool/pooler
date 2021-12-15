<?php

namespace App\Http\Controllers;

use App\Models\UserNotes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserNoteController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'notes' => 'required|max:4096',
        ]);

        $userNotes = UserNotes::updateOrCreate(
            ['user_id' => Auth::id()],
            ['notes' => $request->notes]
        );

        return redirect()->route('dashboard.index')->with('message', 'Note Updated');
    }
}
