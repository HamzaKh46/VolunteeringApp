<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Hash;
class MainUserController extends Controller
{
    public function store_event(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users|max:100|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:user,admin',
            'dob' => 'nullable|date',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'about_me' => 'nullable|string',
        ]);

    //     if (!$request->hasFile('picture')) {
    //     $validatedData['picture'] = 'profile_photos/default.jpg';
    // } else {
    //     $path = $request->file('picture')->store('profile_photos', 'public');
    //     $validatedData['picture'] = $path;
    // }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->back()->with('success','User Added Successfully');

    }

    public function showUser($id)
    {
        $user_info = User::find($id);
        return view('admin.user.edit',compact('user_info'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required|max:100|min:3',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
            'role' => 'required|in:user,admin',
            'dob' => 'nullable|date',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'about_me' => 'nullable|string',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'role' => $request->role,
        ]);
        return redirect()->back()->with('success', 'User Updated Successfully');
    }

    public function deleteUser($id){
        User::findOrFail($id)->delete();
        return redirect()->back()->with('success','User Deleted Successfully');
    }

  
}
