<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function get_category(){
        $dj = Category::all();
        return response()->json($dj);
    }

    public function post_todo(Request $request){
    $request->validate([
        'user.name' => 'required|string|max:255',
        'user.username' => 'required|string|max:255|unique:users,username,' . $request->user['username'] . ',username',
        'user.email' => 'required|email|max:255|unique:users,email,' . $request->user['email'] . ',email',
        'tasks' => 'required|array|min:1',
        'tasks.*.description' => 'required|string|max:255',
        'tasks.*.category' => 'required|exists:categories,id',
    ]);

    // Cek apakah user sudah ada
    $user = User::firstOrCreate([
        'username' => $request->user['username'],
        'email' => $request->user['email'],
    ], [
        'name' => $request->user['name']
    ]);

    // Menyimpan tasks
    foreach ($request->tasks as $taskData) {
        Task::create([
            'user_id' => $user->id,
            'category_id' => $taskData['category'],
            'description' => $taskData['description'],
        ]);
    }

    return response()->json(['message' => 'Tasks have been saved successfully.'], 200);
    }
}
