<?php

namespace App\Http\Controllers\Admin;

use App\Filters\UserFilter;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends AdminController
{
    public function __construct()
    {
        $this->datatable = ['name', 'email', 'phone', 'email_verified_at', 'created_at'];
        $this->module = 'users';
        $this->filters = true;

        $this->authorizeResource(User::class, 'user');

        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(UserFilter $filters)
    {
        $records = User::latest()->filter($filters)->paginate(10);

        return view('admin.users.list', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();

        $validated['password'] = Hash::make($request->password);

        $user = User::create($validated);

        if ($request->filled('active')) {
            $user->email_verified_at = Carbon::now();
            $user->save();
        }

        return redirect('/admin/users')->with('success', __('messages.success.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        }

        $user->fill($validated);

        if ($user->email_verified_at === null && $request->filled('active')) {
            $user->email_verified_at = Carbon::now();
        }

        if ($user->email_verified_at !== null && $request->missing('active')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return redirect()->back()->with('success', __('messages.success.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('success', __('messages.success.deleted'));
    }

    public function toggleRoles(Request $request, User $user) : RedirectResponse {

        $validated = $request->validate([
            'roles.*' => ['exists:roles,id']
        ]);

        $user->roles()->sync($validated['roles']);

        return back()->with([
            'success' => __('messages.success.updated'),
            'tab' => 'roles'
        ]);
    }
}
