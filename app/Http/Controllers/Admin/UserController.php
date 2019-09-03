<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UpdateUserDetailRequest;

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

        $this->middleware(['auth', 'role:admin|brand']);
    }

    /**
     * Show the user details page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addDetails()
    {
        $user = auth()->user();
        return view('admin.user.add-details', compact('user'));
    }
    
    /**
     * Save the user details
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function saveDetails(UpdateUserDetailRequest $request)
    {
        try {
            $name = $request->input('name');
            $image_url = $request->input('image_url');
            $user = auth()->user();
            if (!empty($name)) {
                $user->name = $name;
                $user->image_url = $image_url;
                if ($user->save()) {
                    toastr()->success('Details saved successfully');
                    return redirect()->route('admin.user.add-details');
                } else {
                    toastr()->error('Error occurred while saving details!');
                    return redirect()->back()->withInput();
                }
            } else {
                toastr()->error('Name cannot be blank!');
                return redirect()->back()->withInput();
            }
        } catch (\Exception $ex) {
            toastr()->error('Some error occurred!');
            return redirect()->back()->withInput();
        }
    }
}
