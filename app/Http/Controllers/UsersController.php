<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UsersController extends Controller
{

    public function index()
    {
        $users = User::latest()->get();

        return Inertia::render('users/Index', [
            'users' => $users,
        ]);
    }

    public function create()
    {
        return Inertia::render('users/Create', []);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'role' => 'required|in:admin,user',
            'password' => 'required|string|min:8|confirmed',
        ]);
        User::create($data);
        return redirect()->route('users.index')->with('message', 'User added successfully');
    }

    public function edit(User $user)
    {
        return Inertia::render('users/Edit', compact('user'));

    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|in:admin,user',
        ]);

        if ($data['password']) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }


        $user->update($data);
        return redirect()->route('users.index')->with('message', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('message', 'User  successfully.');

    }

}
