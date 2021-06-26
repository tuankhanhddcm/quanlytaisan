<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User;
        $user->name ='admin1';
        $user->email='admin1@gmail.com';
        $user->password = bcrypt('123');
        $user->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
    

    public function login(){
        return view('Login');
    }

    public function postlogin(Request $request){
        $mang = [
            'name'=>$request->name,
            'password'=>$request->pass
        ];
        if(Auth::attempt($mang)){
            return redirect('/');
        }else{
            return redirect()->route('login');
        }

    }

    public function logout_user(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function checklogin(){
        if(isset($_POST['name']) && isset($_POST['pass'])){
            $user = new User;
            $user = $user->where('name','=',$_POST['name'])->first();
            $kq = 'false';
            $kq2='false';
            if($user){
                $kq='true';
                if(Hash::check($_POST['pass'],$user->password)){
                    $kq2= 'true';
                }
            }
        }
        echo json_encode([$kq,$kq2]);
    }
}
