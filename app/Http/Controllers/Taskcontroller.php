<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Resources\TaskResource;
use App\Traits\HttpResponses;
use Database\Factories\TaskFactory;
use Illuminate\Support\Facades\Auth;

class Taskcontroller extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TaskResource::collection(
            Task::where('user_id', Auth::user()->id)->get()
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $request->validated($request->all());
        $task = Task::create(
            [
                'user_id' => Auth::user()-> id,
                'name'=>$request->name,
                'Description'=>$request->Description,
                'priority'=>$request->priority
            ]);

            return new TaskResource($task);

    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        if(auth::user()->id !== $task -> user_id){
            return $this->error('','you are not authorised for this request',403);
        }
        return new TaskResource($task);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        if(auth::user()->id !== $task -> user_id){
            return $this->error('','you are not authorised for this request',403);
        }
        $task->update($request->all());

        return new TaskResource($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        if(auth::user()->id !== $task -> user_id){
            return $this->error('','you are not authorised for this request',403);
        }
      $task->delete();

      return response(null,203);
    }
}
