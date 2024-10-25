<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use App\Models\Task;
use Illuminate\Http\Request;
use Laravel\Prompts\Concerns\Fallback;
use App\Http\Requests\TaskRequest;







// Route::get('/hallo', function(){
//     return redirect()->route('hello');
// })->name('hallo');

// Route::get('/', function () use ($tasks) {
//     return view('index', [
//          'tasks'=>$tasks,

//     ]);
// });
Route::get('/', function () {

});


Route::get('/tasks', function(Task $task) {
    return view('index', [
        'tasks'=> Task::latest()->get(),
        // 'tasks'=> \App\Models\Task::latest()->where('completed',false)->get(),
        //\App\Models\Task::all() permet de récupérer toutes les tâches par contre latest() permet de récupérer les tâches les plus récentes
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::post('/tasks', function(TaskRequest $request) {
    $task = Task::create([
        $task = Task::create($request->validated())

    ]);
    return redirect()->route('tasks.show', ['task'=>$task->id])->with('success','Task created with success');

})->name('tasks.store');


Route::get('/tasks/{task}/edit', function (Task $task) {
    return view( 'edit', ['task'=>$task->id]);

})->name('tasks.edit');




Route::get('/tasks/{task}', function (Task $task) {
    return view( 'show', ['task'=>$task]);

    //La commande FindOrfail est différente de find
    // findorfail cherche la ligne et l'abstient de l'erreur
    // si la ligne n'existe pas par contre abort renvoie une erreur 404 et find renvoie null

})->name('tasks.show');


// Route::get('/tasks/{id}', function ($id) use ($tasks) {
//     $task= collect($tasks)->firstWhere('id',$id);

//     if(!$task){
//         abort(Response::HTTP_NOT_FOUND);
//     }
//     return view('show', ['task'=>$task]);
// })->name('tasks.show');




// Route::get('/xxx', function () {
//     return 'Hello';
// })->name('hello');

// Route::get('/greet/{name}', function($name){
//     return 'Hello '.$name;
// })->name('Melomane');
Route::post('/tasks', function(Request $request) {


    $data = $request->validate([
        'title'=>'required|max:255',
        'description'=>'required',
        'long_description'=>'required',
    ]);

    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();

    return redirect()->route('tasks.show', ['task'=>$task->id])->with('success','Task created with success');


    //dd($request->all());
    // \App\Models\Task::create([
    //     'title'=>request('title'),
    //     'description'=>request('description'),
    //     'completed'=>request('completed'),
    // ]);
    // return redirect('/tasks');
})->name('tasks.store');




// Route::put('/tasks/{id}/edit', function($id,Request $request) {


//     $data = $request->validate([
//         'title'=>'required|max:255',
//         'description'=>'required',
//         'long_description'=>'required',
//     ]);

//     $task = Task::findOrFail($id);
//     $task->title = $data['title'];
//     $task->description = $data['description'];
//     $task->long_description = $data['long_description'];
//     $task->save();

//     return redirect()->route('tasks.show', ['id'=>$task->id])->with('success','Task updated with success !');


//     //dd($request->all());
//     // \App\Models\Task::create([
//     //     'title'=>request('title'),
//     //     'description'=>request('description'),
//     //     'completed'=>request('completed'),
//     // ]);
//     // return redirect('/tasks');
// })->name('tasks.update');

Route::put('/tasks/{task}', function(Task $task,TaskRequest $request) {

    $task->update($request->validated());
    return redirect()->route('tasks.show', ['task'=>$task->id])->with('success','Task updated with success !');

})->name('tasks.update');


Route::fallback( function(){
    return 'Cette route est inexistante';
});


