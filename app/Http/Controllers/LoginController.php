<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LoginFormRequest $request)
    {
        $data = $request->validated();
        return redirect()->back()->with('message','Login Success');
//        if(auth()->attempt($data)){
//           return redirect()->back()->with('message','Login Success');
//          //  return redirect()->to('/')->with('success', 'Login successfully');
//        }else{
//            return redirect()->back()->withErrors(['message'=>'Phone or password are wrong']);
//        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
