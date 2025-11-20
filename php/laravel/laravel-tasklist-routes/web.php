<?php

use App\Task;
use Illuminate\Http\Request;

Route::post('/task', function(Request $request){
	//
});

Route::delete('/task/{id}', function ($id){
	Task::findOrFail($id)->delete();

	return redirect('/');
});

// Validation for Tasks List form
Route::post('/task', function(Request $request){
	$validator = Validator::make($request->all(), [
		'name' => 'required|max:255',
	]);

	if($validator->fails()){
		return redirect('/')
			->withInput()
			->withErrors($validator);
	}

	// if valid = save & create/set properties for a new Eloquent model
	$task = new Task;
	$task->name = $request->name;
	$task->save();

	return redirect('/');
});


// getting Tasks, displaying and sorting
Route::get('/', function () {
	$tasks = Task::orderBy('created_at', 'asc')->get();

    return view('tasks', [
    	'tasks' => $tasks
    	]);
});
