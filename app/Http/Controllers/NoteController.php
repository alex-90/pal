<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

use App\Http\Requests\NoteCreateRequest;
use App\Http\Requests\NoteUpdateRequest;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $notes = Note::where([
            'user_id' => $request->user()->id,
        ])->get();

        return response()->json($notes);

        // return view('notes.index', [
        //     'notes' => $notes,
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    public function store(NoteCreateRequest $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');

        Note::create([
            'user_id' => $request->user()->id,
            'title' => $title,
            'content' => $content,
        ]);

        return redirect()->route('note.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(NoteUpdateRequest $request, Note $note)
    {
        if ($note->user_id !== $request->user()->id) {
            abort(403);
        }
        
        $note->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Note $note)
    {
        if ($note->user_id !== $request->user()->id) {
            abort(403);
        }

        $note->delete();
    }
}
