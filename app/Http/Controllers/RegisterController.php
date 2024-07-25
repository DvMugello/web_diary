<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

// $role = Role::create(['name' => 'admin']);
// $permission = Permission::create(['name' => 'showing user']);

// $role = Role::create(['name' => 'writer']);
// $permission = Permission::create(['name' => 'write diary']);

// $role->givePermissionTo($permission);
// $permission->assignRole($role);

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('Register.index',[
            'title'=>'My Profil',

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Register.create',[
            'title'=>'Register',


        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        $validateData=$request->validate([
            'name'=>'required|max:255',
            'username'=>'required|min:3|max:255|unique:users',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:255',
            'image'=>'image|file'
        ]);
        // if ($request->file('image')) {
        //     $validateData ['image'] = $request->file('image')->store('profil-images');
        //  }

        $user=User::create([
            'name'=> $request->name,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>$request->password,
        ]);

        if ($request->hasFile('image')) {
            // upload image baru
            $user->addMedia($request->image)
                ->toMediaCollection('image');
        }

        $validateData['password']= Hash::make($validateData['password']);

        $user->assignRole('writer');

        User::create($validateData);

        return redirect('/Login')->with('success','Registaration successfull! Login Please');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('Register.edit',[
            'title'=>'Edit Profil',
            'user'=> $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user , $id)
    {
        // return request()->all();
        // $rules =[
        //     'name'=>'required|max:255',
        //     'username'=>'required|min:3|max:255|unique:users',
        //     // 'email'=>'required|email|unique:users',
        //     // 'password'=>'required|min:5|max:255',
        //     'image'=>'image|file'
        // ];

        // if($request->username !=$user->username){
        //     $rules['username']='required|min:3|max:255|unique:users';
        // }
        // if ($request->file('image')) {
        //     $validateData ['image'] = $request->file('image')->store('profil-images');
        //  }
        // $rules['password']= Hash::make($rules['password']);

        $rules = [
            'name' => 'required',
            'username'=>'required|min:3|max:255|unique:users',
            'email'=>'required|email|unique:users' . $id,
            'password'=>'required|min:5|max:255',
            // 'image'=>'image|file'
        ];

        // cek apakah ada request image
        if ($request->hasFile('image')) {
            // jika ada, tambahkan rules image
            $rules['image'] = 'image|file';
        }

        $user = User::findOrFail($id);

        $updateData = [
            'name'=> $request->name,
            'username'=>$request->username,
            'email'=>$request->email,
            // 'password'=>$request->password,
        ];

        if ($request->password) {
            $updateData['password'] = Hash::make($request->password); // enkripsi password
        }

        $user->update($updateData);

        if ($request->password) {
            $user->update([
                'password' => Hash::make($request->password), // enkripsi password
            ]);
        }

        if ($request->hasFile('image')) {
            // hapus image lama
            $user->clearMediaCollection('image');

            // upload image baru
            $user->addMedia($request->image)
                ->toMediaCollection('image');
        }

        $validateData=$request->validate($rules);
        User::where('id',$user->id)->update($validateData);


        return redirect('/Main')->with('success','User has been updated!');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
