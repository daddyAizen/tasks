<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Mail\TaskAssignedMail;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('user')->get();
        return inertia::render('tasks/Index', compact('tasks'));
    }

    public function create()
    {
        $users = \App\Models\User::all();
        return Inertia::render('tasks/Create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'required|date',
            'status' => 'Pending',
        ]);

        $task = Task::create([
            'user_id' => $data['user_id'],
            'title' => $data['title'],
            'description' => $data['description'],
            'deadline' => $data['deadline'],
        ]);

        $user = $task->user;
        Mail::to($user->email)->send(new TaskAssignedMail($task));
        return redirect()->route('tasks.index')->with('message', 'Tasks created successfully.');

    }

    public function userDashboard()
    {

        $user = Auth::user();

        $pending = $user->tasks()->where('status', 'Pending')->get();
        $inProgress = $user->tasks()->where('status', 'in_progress')->get();
        $completed = $user->tasks()->where('status', 'completed')->get();

        return Inertia::render('User/Dashboard', [
            'pending' => $pending->toArray(),
            'in_progress' => $inProgress->toArray(),
            'completed' => $completed->toArray(),


        ]);

    }

    public function updateStatus(Request $request, Task $task)
    {
        // Optional: Only allow task owner
        if ($task->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'status' => 'required|in:Pending,in_progress,completed',
        ]);

        $task->update(['status' => $request->status]);

        return back()->with('message', 'Task status updated.');
    }


}
