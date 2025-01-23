<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class UsersController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('users', compact('user'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|unique:users|regex:/^[a-zA-Z0-9]+$/',
            'fullname' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required|in:murid,wali-murid,wali-kelas,petugas,administrator',
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->fullname = $request->fullname;
        $user->birth_date = $request->birth_date;

        $photoPath = $request->file('photo')->store('public/users/');
        $user->photo = $photoPath;

        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;
        $user->save();

        return redirect()->route('users.index')->with('success', 'Data user berhasil ditambahkan.');
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'username' => 'required|unique:users,username,' . $id . '|regex:/^[a-zA-Z0-9]+$/',
            'fullname' => 'required',
            'photo' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:murid,wali-murid,wali-kelas,petugas,administrator',
        ]);

        $user = User::findOrFail($id);
        $user->username = $request->username;
        $user->fullname = $request->fullname;
        $user->birth_date = $request->birth_date;

        if ($request->hasFile('image')) {
            Storage::delete($user->photo);
            $photoPath = $request->file('photo')->store('public/users/');
            $user->photo = $photoPath;
        } else {
            $user->photo = $user->photo;
        }

        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        return redirect()->route('users.index')->with('success', 'Data user berhasil diedit.');
    }
    public function update_password(Request $request, $id)
    {
        $validatedData = $request->validate([
            'previous_password' => 'required|min:8',
            'new_password' => 'required|min:8',
        ]);
        $user = User::findOrFail($id);
        if (Hash::check($request->previous_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();
        } else {
            return redirect()->route('users.index')->with('error', 'Password user gagal diedit.');
        }

        return redirect()->route('users.index')->with('success', 'Password user berhasil diedit.');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        Storage::delete($user->photo);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Data user berhasil dihapus.');
    }
}
