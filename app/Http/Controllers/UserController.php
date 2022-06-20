<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('access:admin_settings');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin-settings.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'first_name'=>'required|min:3',
            'password'=>'required|min:5',
            'email' => 'required|email|unique:users',
            'role_id' => 'required'
        ]);
        $data = array();
        if($request->file('user_profile')){
            $file = $request->file('user_profile');
            $destinationPath = 'storage/profiles';
            $file_name = time().Str::uuid().$file->getClientOriginalName();
            $data['profile_photo'] = $destinationPath.'/'.$file_name;
            $file->move($destinationPath,$file_name);
        }
        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['email'] = $request->email;
        $data['password'] = bcrypt($request->password);
        $data['role_id'] = $request->role_id;
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();
        $user = User::insert($data);
        return redirect('/admin-settings')->with('success', 'User Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin-settings.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'first_name'=>'required|min:3',
            'email' => 'required|email|unique:users,email,'.$id,
            'role_id' => 'required'
        ]);
        $data = array();
        if($request->file('user_profile')){
            $file = $request->file('user_profile');
            $destinationPath = 'storage/profiles';
            $file_name = time().Str::uuid().$file->getClientOriginalName();
            $data['profile_photo'] = $destinationPath.'/'.$file_name;
            $file->move($destinationPath,$file_name);
        }
        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['email'] = $request->email;
        $data['role_id'] = $request->role_id;
        $data['updated_at'] = Carbon::now();
        $user = User::where('id',$id)->update($data);
        return redirect('/admin-settings')->with('success', 'User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('/admin-settings')->with('success', 'User with id='.$id.' is deleted');
    }
}
