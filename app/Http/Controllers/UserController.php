<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    
    public function index(Request $request) 
    {
        // $users=User::orderby('name','asc')->where('level', '=', 'staff')->paginate(2);
        $users=User::orderby('name','asc')->paginate(9);
        $search = $request->get('keyword');
        if($search)
        {
            $users = User::where('name','LIKE',"%$search%")->paginate(1);
        }


        return view('backend.users.index',compact('users'));
    }

    
    public function create()
    {
        return view('backend.users.create');
    }

    
    public function store(Request $request)
    {
        $simpan = $request->all();
        $validasi = Validator::make($simpan,[
            'name' => 'required|max:150',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|min:8',
        ]);

        if($validasi->fails()){
            return  redirect()->route('user.create')->withInput()->withErrors($validasi);
        }

        $simpan['password'] = bcrypt($simpan['password']);
        User::create($simpan);
        return redirect()->route('user.index')->with('success','user berhasil ditambahkan');
    }

    public function show($id)
    {
        $user = User::FindOrFail($id);
        return view('backend.users.show',compact('user'));
    }

   
    public function edit($id)
    {
        $user = User::FindOrFail($id);
        return view('backend.users.edit',compact('user'));
    }
    

   
    public function update(Request $request, $id)
    {
       
        $user = User::find($id);

if ($user) {
    $request->validate([
        'name' => 'required|max:150',
        'email' => 'required|email|max:100|unique:users,email,' . $id,
        'password' => 'required|min:8',
    ]);

    // Update the user's data
    $user->update([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')), // Hash the password
    ]);

    // Optionally, you can return a response or redirect to a success page
    return redirect()->route('user.index')->with('success', 'User updated successfully');
} else {
    // Handle the case where the user with the provided ID does not exist
    return redirect()->route('user.index')->with('error', 'User not found');
}
    }

    
    public function destroy($id)
    {
        
        $data = User::FindOrFail($id);
        $data->delete();
        return redirect()->route('user.index')->with('status','User berhasil dihapus');

    }
}
