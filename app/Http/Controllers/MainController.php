<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use App\Services\Operations;
use Illuminate\Support\Facades\Crypt;

class MainController extends Controller
{
    public function index()
    {

        //load user's notes
        $id = session('user.id');
        $user = new User();
        $notas = $user->find($id)->notes()->get()->toArray();
        return view('home', ['notas' => $notas]);
    }

    public function newNote()
    {
        return view('new_note');

    }

    public function newNoteSubmit(Request $request) {

        //validar request
        $request->validate([
            'text_note' => 'required|min:3|max:3000',
            'text_title' => 'required|min:3|max:200'
        ],
        [
            'text_note.required' => 'O texto é obrigatório',
            'text_note.min' => 'O texto deve ter no mínimo :min caracteres',
            'text_note.max' => 'O texto deve ter no máximo :max caracteres',
            'text_title.min' => 'O título deve ter no mínimo :min caracteres',
            'text_title.max' => 'O título deve ter no máximo :max caracteres',
            'text_title.required' => 'O título é obrigatório'
        ]);

        echo 'validado';
        //get user id
        $id = session('user.id');
        //create new note
        $note = new Note();
        $note->title = $request->text_title;
        $note->text = $request->text_note;
        $note->user_id = $id;
        $note->save();


        //redirect to home
        return redirect()->route('home');
    }

    public function editNote($id)
    {
        $decrypted_id = Operations::decryptId($id);

        //obter informacao da nota
        $nota = new Note();
        $nota = $nota->find($decrypted_id);
        return view('edit_note', ['note' => $nota]);



    }

    public function editNoteSubmit(Request $request) {
        $decrypted_id = Operations::decryptId($request->note_id);

        //validar request
        $request->validate([
            "text_title" => "required|min:3|max:200",
            "text_note" => "required|min:3|max:3000"
        ],[
            "text_title.required" => "O título é obrigatório",
            "text_title.min" => "O título deve ter no mínimo :min caracteres",
            "text_title.max" => "O título deve ter no máximo :max caracteres",
            "text_note.required" => "O texto é obrigatório",
            "text_note.min" => "O texto deve ter no mínimo :min caracteres",
            "text_note.max" => "O texto deve ter no máximo :max caracteres"

        ]);
        if ($request->note_id == null) {
            return redirect()->route('home');
        }
        //validar se a nota pertence ao user
        $user_id = session('user.id');
        echo $decrypted_id;
        $note = Note::find($decrypted_id);


        if($note->user_id != $user_id) {
            return redirect()->route('home');
        } else {
            $note->title = $request->text_title;
            $note->text = $request->text_note;
            //atualizar a data de atualizacao
            $note->save();
            return redirect()->route('home');
        }



    }

    public function deleteNote($id)
    {

        $decrypted_id = Operations::decryptId($id);

        //obter informacao da nota
        $nota = new Note();
        $nota = $nota->find($decrypted_id);

        return view('delete_note', ['note' => $nota]);


    }

    public function deleteSubmit($id) {

        $decrypted_id = Operations::decryptId($id);

        //obter info da nota
        $nota = new Note();
        $nota = $nota->find($decrypted_id);

        //validar se a nota pertence ao user
        $user_id = session('user.id');

        if($nota->user_id != $user_id) {
            return redirect()->route('home');
        } else {
            $nota->delete();
            return redirect()->route('home');
        }

    }

    private function decryptId($id)
    {
        //recebemos uma hash encryptada
        try {
            $decrypted_id = Crypt::decrypt($id);

        } catch (DecryptException $e) {
            return redirect()->route('home');
        }

        return $decrypted_id;
    }
}
