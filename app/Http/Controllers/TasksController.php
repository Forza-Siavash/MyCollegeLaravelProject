<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SharedTask;
use App\Models\Tasks;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "وظایف";
        $tasks = Tasks::where('user_id', auth()->user()->id)->orderBy('id', 'asc')->get();
        $sharedTasks = SharedTask::where('user_id', auth()->user()->id)->orderBy('id', 'asc')->get();

        //here the $detailed_posts can be defined in the 'do something' above
        return view('tasks', compact('pageTitle', 'tasks', 'sharedTasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "وظیفه جدید";
        $categories = Category::orderBy('id', 'asc')->get();
        $users = User::orderBy('id', 'asc')->get();
        return view('createTask', compact('pageTitle', 'categories', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'description.required' => 'برای وظیفه چیزی وارد نکردید',
            'description.unique' => 'این وظیفه موجود است',
            'deadline.required' => 'برای مهلت چیزی وارد نکردید'
        ];
        $validated = $request->validate([
            'description' => 'required|unique:tasks',
            'priority' => 'required',
            'deadline' => 'required'
        ], $messages);
        $task = new  Tasks(
            [
                'user_id' => auth()->user()->id,
                'description' => $request->get('description'),
                'priority' => $request->get('priority'),
                'deadline' => $request->get('deadline'),
                'category_id' => $request->get('category_id')
            ]
        );
        $task->save();

        $arr = preg_split('#\s+#', $request->get('users_id'));

        foreach ($arr as $value) {

            $sharedTask = new  SharedTask(
                [
                    'user_id' => $value,
                    'task_id' => $task->id
                ]
            );
            $sharedTask->save();
            try {
            } catch (Exception $e) {
                return redirect(route('tasks'))->with('warning', $e->getCode());
            }
        }

        try {
        } catch (Exception $e) {
            return redirect(route('tasks'))->with('warning', $e->getCode());
        }
        $msg = "وظیفه جدید اضافه شد";
        return redirect(route('tasks'))->with('success', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tasksr  $tasksr
     * @return \Illuminate\Http\Response
     */
    public function show(Tasks $tasksr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tasksr  $tasksr
     * @return \Illuminate\Http\Response
     */
    public function edit(Tasks $task)
    {
        $pageTitle = "ویرایش وضیفه";
        $categories = Category::orderBy('id', 'asc')->get();
        $users_id = SharedTask::where('task_id', $task->id)->pluck('user_id')->toArray();
        return view('editTask', compact('pageTitle', 'task', 'categories', 'users_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tasksr  $tasksr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tasks $task)
    {
        $messages = [
            'description.required' => 'برای وظیفه چیزی وارد نکردید',
            'description.unique' => 'این وظیفه موجود است',
            'deadline.required' => 'برای مهلت چیزی وارد نکردید'
        ];
        $validated = $request->validate([
            'description' => 'required',
            'priority' => 'required',
            'deadline' => 'required'
        ], $messages);

        $task->description = $request->description;
        $task->priority = $request->priority;
        $task->deadline = $request->deadline;
        $task->category_id = $request->category_id;
        $task->save();
        // $category->update($request->all());

        $arr = preg_split('#\s+#', $request->get('users_id'));

        foreach ($arr as $value) {

            SharedTask::where('task_id', $task->id)->update(['user_id' => $value]);

            try {
            } catch (Exception $e) {
                return redirect(route('tasks'))->with('warning', $e->getCode());
            }
        }
        try {
        } catch (Exception $e) {
            return redirect(route('tasks'))->with('warning', $e->getCode());
        }
        $msg = "وظیفه مورد نظر ویرایش شد";
        return redirect(route('tasks'))->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tasksr  $tasksr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tasks $task)
    {
        if (auth()->user()->id == $task->user_id) {
            try {
                $task->delete();
            } catch (Exception $e) {
                return redirect(route('tasks'))->with('warning', $e->getCode());
            }
            $msg = "وظیفه " . $task->description . " حذف شد ";
            return redirect(route('tasks'))->with('success', $msg);
        }
    }
}
