<?php
use App\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/",function(){
  return view('tasks.index');
});

Route::post("/task", function(Request $request){
    $validator = Validator::make($request->all(),[
        'name'=>'required|max:255',
    ]);
    if($validator->false()){
        return redirect('/')
        ->withInput()
        ->withErrors($validator);
    }
    $task = new Task;
    $task->name = $request->name;
});

Route::delete("/task/{task}", function(){
  //
});
