<?php

namespace App\Http\Controllers\Auth\Task;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Status;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function status($pid, $sid)
    {
        $tasks = Task::where('status_id', $pid)->where('project_id', $sid)->paginate(8);
        dump($tasks);
        dd('123');
    }

    public function popular($id)
    {
        $status = Status::get();
        //$query = Task::where('project_id', $id)->paginate(8);
        return view('auth.task.status', compact('id', 'status'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd($id);
        /*$tasks = Task::paginate(8);
        return view('auth.task.index', compact('tasks'));**/ }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::get();
        $status = Status::get();
        return view('auth.task.form', compact('status', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $path = $request->file('image')->store('tasks');
        DB::table('tasks')
            ->insert([
                'status_id' => $request->status_id,
                'name' => $request->name,
                'project_id' => $request->project_id,
                'image' => $path,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()

            ]);
        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        /*$tasks = Status::find(1)->tasks;

        foreach ($tasks as $task) {
            dump($task);
        }*/

        $task = Task::find($id);

        //dd($task);


        return view('auth.task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
