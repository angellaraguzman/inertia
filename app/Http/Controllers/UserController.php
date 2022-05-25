<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreUserPost;
use App\Http\Requests\UpdateUserPut;

class UserController extends Controller
{ 
    public function index()
    {
       $users = User::all();


       return Inertia::render('User/index',compact('users'));
    }

    
    public function list()
    {
        return response()->json( ['tres' => User::all()]);
         
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('User/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserPost $request )
    {
       $user = User::create($request->validated());
       
       return response()->json([
           'id' => $user->id
       ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $showUser)
    {
        return Inertia::render('User/Show',compact('showUser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $showUser)
    {
       // return Inertia::render('User/Edit',compact('showUser'));
        return Inertia::render('User/Editar',compact('showUser'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserPut $request, User $showUser)
    {
        $showUser->update($request ->validated());
        return Redirect::route('user.index');

        /*


        */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $showUser)
    {
        $showUser->delete();
        return Redirect::route('user.index',$showUser);
    }
}
