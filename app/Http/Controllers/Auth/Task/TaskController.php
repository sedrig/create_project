<?php

namespace App\Http\Controllers\Auth\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Mail\TestMail;
use App\Models\Project;
use App\Models\Status;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{

    public function download($id)
    {
        $name = 'Рисунок' . $id . ".jpg";
        $picture = DB::table('tasks')
            ->where('id', $id)
            ->first();
        return Storage::download($picture->image, $name);
    }

    public function status($pid, $sid)
    {

        $tasks = Task::where('status_id', $pid)->where('project_id', $sid)->paginate(8);

        if ($pid == 1) {

            return view('auth.task.status.new', compact('tasks', 'sid'));
        } elseif ($pid == 2) {
            return view('auth.task.status.in_progress', compact('tasks', 'sid'));
        } elseif ($pid == 3) {
            return view('auth.task.status.done', compact('tasks', 'sid'));
        }
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
        $query = Task::paginate(8);
        return view('auth.task.index', compact('query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $projects = Project::get();
        $status = Status::get();
        return view('auth.task.form', compact('status', 'projects', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
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
        return redirect()->route('status_project', ['pid' => $request->status_id, 'sid' => $request->project_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


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
    public function edit($pid, $id)
    {
        //dd($pid);
        $tasky = DB::table('tasks')
            ->where('id', '=', $pid)
            ->first();


        $status = Status::get();

        //dd($projecty->name);
        return view('auth.task.form', compact('tasky', 'id', 'status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, $id)
    {


        $for_mail = DB::table('tasks')
            ->where('id', $id)
            ->first();
        if ($for_mail->status_id != $request->status_id) {

            $details = [
                'title' => 'зміна з статусу ' . $for_mail->status_id . ' на ' . $request->status_id,
                'body' => 'зміна з статусу ' . $for_mail->status_id . ' на ' . $request->status_id
            ];

            Mail::to("obidos228@gmail.com")->send(new TestMail($details));
        }


        if ($request->has('image')) {
            Storage::delete($request->image);
            $path = $request->file('image')->store('tasks');
            DB::table('tasks')
                ->where('id', $id)
                ->update([
                    'status_id' => $request->status_id,
                    'name' => $request->name,
                    'project_id' => $request->project_id,
                    'image' => $path,
                    'updated_at' => \Carbon\Carbon::now()

                ]);
        } else {
            DB::table('tasks')
                ->where('id', $id)
                ->update([
                    'status_id' => $request->status_id,
                    'name' => $request->name,
                    'project_id' => $request->project_id,
                    'updated_at' => \Carbon\Carbon::now()

                ]);
        }

        return redirect()->route('status_project', ['pid' => $request->status_id, 'sid' => $request->project_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        Task::where('id', $id)->delete();
        return redirect()->back();
    }
}
