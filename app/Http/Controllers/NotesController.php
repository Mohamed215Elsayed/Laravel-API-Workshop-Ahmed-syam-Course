<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Crm\Customer\Models\Note;
use \Symfony\Component\HttpFoundation\Response;
class NotesController extends Controller
{
    public function index(Request $request, $customerId)
    {
        return Note::where('customer_id', $customerId)->get();
    }
    // public function show($id)
    // {
    //     return Note::find($id) ?? response()->json(['status'=> 'Note Not found'], Response::HTTP_NOT_FOUND);
    // }
    public function show($customerId, $noteId)
    {
        $note = Note::where('customer_id', $customerId)
            ->where('id', $noteId)
            ->first();

        return $note ?? response()->json(['status'=> 'Note Not found'], Response::HTTP_NOT_FOUND);
    }

    public function create(Request $request, $customerId)
    {
        $note = new Note();
        $note->customer_id = $customerId;
        $note->note = $request->get('note');
        $note->save();
        return $note;
    }
    public function update(Request $request, $customerId, $id)
    {
        $note = Note::find($id);
        if (!$note) {
            return response()->json(['status' => 'Note Not found'], Response::HTTP_NOT_FOUND);
        }
        $customerId = (int)$customerId; //casting customerId to int
        if ($note->customer_id !== $customerId) {
            return response()->json(['status' => 'Invalid Data'], Response::HTTP_BAD_REQUEST);
        }
        $note->note = $request->get('note');
        $note->save();
        return $note;
    }


    public function delete(Request $request, $customerId, $id)
    {
        $note = Note::find($id);
        if (!$note) {
            return response()->json(['status' => 'Note Not found'], Response::HTTP_NOT_FOUND);
        }

        $customerId = (int)$customerId;//very useful casting
        if ($note->customer_id !== $customerId) {
            return response()->json(['status' => 'Invalid Data'], Response::HTTP_BAD_REQUEST);
        }
        $note->delete();
        return response()->json(['status' => 'Note is deleted successfully'], Response::HTTP_OK);
    }
}
