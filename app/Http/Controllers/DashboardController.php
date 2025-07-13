<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;


class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role !== 'admin') {
            return app(\App\Http\Controllers\TaskController::class)->userDashboard();
        }

        return Inertia::render('Dashboard', [
            'totals' => [
                'users' => User::count(),
                'pending' => Task::where('status', 'Pending')->count(),
                'in_progress' => Task::where('status', 'in_progress')->count(),
                'completed' => Task::where('status', 'completed')->count(),
            ],
            'tasks' => [
                'pending' => Task::where('status', 'Pending')->get(),
                'in_progress' => Task::where('status', 'in_progress')->get(),
                'completed' => Task::where('status', 'completed')->get(),
            ],
        ]);
    }
}
