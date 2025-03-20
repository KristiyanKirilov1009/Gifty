<?php

namespace App\Http\Controllers\Admin;

use App\Filters\RoleFilter;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Role;
use Illuminate\Support\Str;

class RoleController extends AdminController
{
    public function __construct()
    {
        $this->datatable = ['name', 'slug', 'created_at'];
        $this->module = 'roles';
        $this->filters = true;

        $this->authorizeResource(Role::class, 'role');

        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(RoleFilter $filter)
    {
        $records = Role::latest()->filter($filter)->paginate();

        return view('admin.roles.list', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['name']);

        Role::create($validated);

        return redirect('/admin/roles')->with('success', __('messages.success.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->fill($request->only('name'));
        $role->slug = Str::slug($request->name);
        $role->save();

        return back()->with('success', __('messages.success.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        if (! $role->delete()) {
            return back()->with('errors', __('messages.errors.delete'));
        }

        return redirect('/admin/roles')->with('success', __('messages.success.deleted'));
    }
}
