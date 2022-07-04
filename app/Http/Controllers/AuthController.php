<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("dashboard.pages.auth.admin");
    }
    public function siswa()
    {
        //
        return view("dashboard.pages.auth.index");
    }

    public function postLogin(Request $req){
        if(Auth::attempt($req->only('name','password'))) {
            return redirect("/presensi/siswa/page");
    	}
    	return redirect('/login');
    }

    public function adminPostLogin(Request $req){
        if(Auth::attempt($req->only('email','password'))) {
            return redirect("/siswa");
    	}
    	return redirect('/login');
    }
   

    public function logout(){
        $user = Auth::user();
        $role = $user->role;
        Auth::logout();
        if ($user->role != "Admin"){
    	    return redirect('/login');
        }
    	return redirect('/login/siswa');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

   

    
}
