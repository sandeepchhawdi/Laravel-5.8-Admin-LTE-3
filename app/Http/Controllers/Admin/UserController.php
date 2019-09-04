<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Requests\Admin\UserCreateRequest;
use Datatables;

class UserController extends AdminController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->authorize('view', User::class);
        return view('admin.user.list');
    }

    public function data()
    {
        $this->authorize('view', User::class);
        $users = User::select(['name', 'email', 'created_at', 'id']);
        return Datatables::of($users)
            ->editColumn('id', function ($user) {
                return view('admin.common._icons', ['model' => $user, 'route' => 'users'])->render();
            })
            ->rawColumns(['id'])
            ->make(true);
    }
    
    public function create()
    {
        $this->authorize('create', User::class);
        return view('admin.user.create');
    }
    
    public function show($id)
    {
        $this->authorize('view', User::class);
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }
    
    public function edit($id)
    {
        $this->authorize('update', User::class);
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }
    
    public function store(UserCreateRequest $request)
    {
        $this->authorize('create', User::class);
        try {
            $data = $request->all();
            unset($data['_token']);
            User::create($data);
            toast('User created successfully!', 'success');
        } catch (\Exception $ex) {
            toast('Some error occurred!', 'error');
            return redirect()->back()->withInput();
        }
        return redirect()->route('admin.users.index');
    }
    
    public function update($id, UserCreateRequest $request)
    {
        $this->authorize('update', User::class);
        try {
            $data = $request->all();
            unset($data['_method']);
            unset($data['_token']);
            $user = User::where('id', $id)->first();
            foreach ($data as $key => $value) {
                $user->$key = $value;
            }
            $user->update();
            toast('User updated successfully!', 'success');
        } catch (\Exception $ex) {
            toast('Some error occurred!', 'error');
            return redirect()->back()->withInput();
        }
        return redirect()->route('admin.users.index');
    }

    public function destroy($id)
    {
        $this->authorize('delete', User::class);
        try {
            $user = User::find($id);
            if ($user) {
                $user->delete();
            }
            return response()->json('User deleted successfully!');
        } catch (\Exception $ex) {
            return response()->json('Some error occurred!');
        }
    }
}
