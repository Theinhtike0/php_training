<?php

namespace App\Http\Controllers;

use App\Imports\PostsImport;
use App\Exports\PostsExport;
use App\Models\Post;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PostController extends Controller
{
    public function post(){
        $posts = Post::all();
        return view('post', compact('posts'));
    }
    public function importPosts(Request $request){
        $request->validate([
            'file' => 'required',
        ]);
        Excel::import(new PostsImport,$request->file('file'));
        return back();
    }
    public function exportPosts(){
        return Excel::download(new PostsExport, 'posts.xlsx');
    }
}
