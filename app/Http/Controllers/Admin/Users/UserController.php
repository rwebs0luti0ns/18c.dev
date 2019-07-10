<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function create($id)
	{

		$active = 'franchisee-page';
		return view('modules.admin.users.create',compact('active','id'));

	}

	public function store(Request $request, $id)
	{

		$request->validate([
			'name'		=>	'required',
			'username'	=>	'required|unique:users,username',
			'password'	=>	'required|min:10'
		]);

		$input = $request->all();
		$input['franchisee_id']	=	$id;
		User::create($input);
		return redirect('admin/franchisees/'.$id)->with('message','Successfully added new user');

	}

	public function edit($id)
	{

		$user =	User::findOrFail($id);
		$active = 'franchisee-page';
		return view('modules.admin.users.edit',compact('active','user'));

	}

	public function update(Request $request, $id)
	{

		$request->validate([
			'name'		=>	'required',
			'username'	=>	'required|unique:users,username,'.$id,
		]);		

		$user = User::findOrFail($id);
		$user->update($request->all());
		return redirect('admin/franchisees/'.$user->franchisee_id)->with('message','Succesfully updated');

	}
	public function changePassword(Request $request)
	{

		$request->validate([
			'password'	=>	'required|min:8'
		]);

		$user = User::findOrFail($request->userId);
		$user->update($request->all());
		return back()->with('message','Succesfully updated password!');
	}
}
