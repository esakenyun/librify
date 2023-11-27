<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsertypeController extends Controller
{
    public function index()
    {
        $usertypes = UserType::all();
        return view('admin.adminuser', compact('usertypes'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(UserFormRequest $request)
    {
        $data = $request->validated();

        $data['password'] = Hash::make($data['password']);

        $usertype = UserType::create($data);

        notify()->success('Create User Successfully');
        return redirect('/usertype');
    }

    public function edit($usertype_id)
    {
        $usertype = UserType::find($usertype_id);

        return view('admin.user.edit', compact('usertype'));
    }

    public function update(UserFormRequest $request, $usertype_id)
    {
        $data = $request->validated();

        $data['password'] = Hash::make($data['password']);

        $usertype = UserType::where('id', $usertype_id)->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'usertype' => $data['usertype'],
            'password' => $data['password'],
        ]);

        notify()->success('User Updated Successfully');
        return redirect('/usertype');
    }

    public function destroy($usertype_id)
    {
        $usertype = UserType::find($usertype_id)->delete();

        notify()->success('User Deleted Successfully');
        return redirect('/usertype');
    }
}
