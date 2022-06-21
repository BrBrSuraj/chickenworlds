<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreAdminUserRequest;
use App\Http\Requests\updateAdminUserRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $this->authorize('is_Admin');
        $users =  User::with('roles')->paginate(5);
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('is_Admin');
        $roles = Role::whereNot('name', 'SupperAdmin')->get();
        return view('admin.user.create', \compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminUserRequest $request)
    {
        $this->authorize('is_Admin');
        $role = $request->input('role');
        User::create($request->validated() + ['password' => bcrypt('nepal@321')])->roles()->attach($role);
        return redirect()->route('admin.users.index')->with('message', 'User created successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('is_Admin');
        $allRole = Role::where('name', '!=', 'SupperAdmin')->get();
        return view('admin.user.edit', compact('user', 'allRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('is_Admin');
        $request->validate([
            'name' => 'required|max:35',
            'role' => 'required',
            'password' => 'nullable|alpha_num|min:8'
        ]);

        if ($request->password) {
            $user->update(['password' => Hash::make($request->password)]);
        }
        $roles = $request->input('role');
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        $user->roles()->sync($roles);
        return redirect()->back()->with('success', 'Profile updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('is_Admin');
        try {
            //  $user->roles()->detach();
            $user->delete();
            return redirect()->route('admin.users.index');
        } catch (\Exception $ex) {
            return redirect()->back()->with('messages', 'Something went wrong.');
        }
    }
}
