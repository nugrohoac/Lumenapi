<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use \Illuminate\Http\Response;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //method yang pasti dan pertama kali akan di eksekusi
        //$this->middleware('age', ['except' => ['getUser']]); //except
    }

    //
    public function generateKey (){
        return str_random(32);
    }

    public function fooExample(){
        return 'Example Controller from POST Request';
    }

    public function getUser($id){
        return 'User id = ' . $id;
    }

    public function getPost($cat1 = null , $cat2 = null){
        return 'Category 1 = ' . $cat1 . ' Category 2 = ' . $cat2;
    }

    public function getProfile(){
        return 'Route Profile Action : ' . route('profile.action');
    }

    public function getProfileAction(){
        return 'Router Profile : ' . route('profile');
    }

    public function fooBar(Request $request){
        // if($request->is('foo/bar')){
        //     return 'Success';
        // }else {
        //     return 'Fail';
        // }
        //return $request->path();

        return $request->method();
    }

    public function userProfile(Request $request){
        // $user['name'] = $request->name;
        // $user['username'] = $request->username;
        // $user['umur'] = $request->umur;
        // $user['email'] = $request->email;
        // $user['password'] = $request->password;

        //$user['simple'] = $request->all();

        // return $request->all();

        //return $request->input('name', 'John Doe');

        //$request->filled(['name', 'username']);

        //lawannya adalah except
        return $request->except(['username', 'password']);

        // if($request->has('name', 'email')){
        //     return 'Success';
        // }else{
        //     return 'Fail';
        // }
    }

    public function response(){
        $data['status'] = 'Success';
        // return (new Response($data, 201))
        //         ->header('Content-Type', 'application/json');

        //return response($data, 201)->header()->header()->header();

        return response()->json([
            'message' => 'Fail, Not Found!',
            'status' => false
        ], 404);
    }
}
