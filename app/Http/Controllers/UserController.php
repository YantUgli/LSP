<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //menyimpan data user baru
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'level' => 'required'
            ]);
            $array = $request->only([
           'name', 'email', 'password', 'level', 'aktif'
            ]);
            $array['password'] = bcrypt($array['password']);
            User::create($array);
            return redirect()->route('users.index')
            ->with('success_message', 'Berhasil Menambah User Baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //menampilkan form edit
        $user = User::find($id); 
        if (!$user) return redirect()->route('users.index') ->with('error_message', 'User dengan id'.$id.' tidak ditemukan'); 
        return view('users.edit', [ 
            'user' => $user 
]);
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
        //mengedit data user
        $request->validate([  
            'name' => 'required', 
            'email' => 'required|email|unique:users,email,'.$id, 
            'password' => 'sometimes|nullable|confirmed', 
            'level' => 'required', 
            'aktif' => 'required'
            ]); 
            $user = User::find($id); 
            $user->name = $request->name; 
            $user->email = $request->email; 
            if ($request->password) $user->password = bcrypt($request->password); 
            $user->level = $request->level; 
            $user->aktif = $request->aktif; 
            $user->save(); 
            return redirect()->route('users.index') 
            ->with('success_message', 'Berhasil Mengubah User'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //menghapus user
        $user = User::find($id); 
        if ($id == $request->user()->id) return redirect()->route('users.index')->with('error_message', 'Anda tidak dapat menghapus diri sendiri.'); 
        if ($user) $user->delete(); 
        return redirect()->route('users.index')->with('success_message', 'Berhasil menghapus user');
    }
}