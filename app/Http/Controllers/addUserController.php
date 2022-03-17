<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class addUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();

        return view('addUser', compact('users'));
    }

    public function addUser(Request $request)
    {
        $data = new user();
        $data->name            = $request->name;
        $data->email           = $request->email;
        $data->password        = bcrypt($request->password);
        $data->role            = $request->role;
        $data->save();

        return back()->withFlashSuccess('The new User have been add successfully!');
    }

    function edit($id)
    {
        $row = DB::table('users')
                ->where('id', $id)
                ->first();

        $data = [
            'Info'=>$row,
        ];

        return view('editUser', $data);
    }

    function update(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'role'=>'required'
        ]);

        $updating = DB::table('users')
                    ->where('id', $request->input('cid'))
                    ->update([
                        'name'=>$request->input('name'),
                        'email'=>$request->input('email'),
                        'role'=>$request->input('role')
                    ]);

        return redirect('addUser')->withFlashSuccess('The new User have been add successfully!');;
    }

    function delete($id)
    {
        $delete = DB::table('users')
                    ->where('id', $id)
                    ->delete();

        return redirect('addUser');
    }

    public function searchUser(Request $request)
    {
        $search = $request->get('search');
        $users = User::where('name','like','%' .$search.'%')
                        ->orWhere ( 'email', 'lIKE', '%' . $search . '%' )
                        ->orWhere ( 'role', 'lIKE', '%' . $search . '%' )
                        ->get();

        return view('addUser', compact('users'));
    }

}
