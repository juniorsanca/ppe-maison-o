<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('profile', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $user->update($validatedData);
        return redirect()->route('profile', ['id' => $user->id])->with('success', 'User updated successfully');
    }
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $users = User::where('name', 'like', "%$searchTerm%")
        ->orWhere('email', 'like', "%$searchTerm%")
        ->get();

        return view('liste', ['users' => $users, 'searchTerm' => $searchTerm]);
    }
}
