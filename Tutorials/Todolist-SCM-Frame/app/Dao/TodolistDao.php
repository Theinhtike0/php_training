<?php
namespace App\Dao\Todolist;

use App\Models\Todolist;
use Illuminate\Http\Request;
use App\Contracts\Dao\TodolistDaoInterface;

class TodolistDao implements TodolistDaoInterface
{
  
    public function index(){
           $todolists = Todolist::all();
           return view('home', compact('todolists'));
    }
    public function store (Request $request)
    {
        $data = $request ->validate([
            'content' => 'required'
        ]);
        Todolist::create($data);
        return back();
    }

    public function destroy (Todolist $todolist)
    {
        $todolist->delete();
        return back();
    }
}
