<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Profile;
use Illuminate\Hashing\BcryptHasher;
use Hash;
use  Illuminate\Validation\Validator  ;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function _construct(){
        // $this->middleware('auth')->only(['login']); 
    }
     public function index()
    {
        //
    }

    public function logout(Request $request){
        //    dd("Hello");
                Auth::logout();
                $request->session()->invalidate();
            
            return redirect("/home");
        }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'user-name' => ['required', 'min:3' , 'max:255'] ,
            'email' => ['required', 'min:3' , 'max:255'] ,
            'password' => ['required', 'min:3' , 'max:255'] 
        ]);

        $attributes['password'] = bcrypt( request('password'));  


        User::create($attributes);
            return redirect('/user/login');
    }

    public function login(){
        return view('user.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // $remember = request('filled'); used for login permanent 
        //use with auth  $remember = Auth::attempt(['email' => $email, 'password' => $password];
        if (Auth::attempt($credentials)) {
            $user = auth()->user();
            // request()->filled('remember');
            if($user->email==('vipinkumar@gmail.com'))
            return redirect()->intended('/create');
            // dd("Admin");
            
            else
            // dd("Show blog post");
            
            return redirect()->intended('/home');
        }
        dd("Credentials Incorrect");
    }
    public function show($id)
    {   $profile = Profile::find($id);
        //  return $profile;
        return view('user.show' , compact('profile'));
        // dd('hello');
               
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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

    public function profile(){
        return view('user.profile');
    }

    public function user_create_profile(){
        $attributes = request()->validate([
            'Designation' => ['required', 'min:3' , 'max:255'] ,
            'Address' => ['required', 'min:3' , 'max:255'] ,
             

        ]);
        $attributes['user_id'] = auth()->id();
        $profile = Profile::create($attributes);
        return redirect("/home");
    }

    public function change_password(){
        return view('user.change_password');
    }

    public function update_password( Request $request ){
        $user = User::where('id' , auth()->id())->first();
        // $oldPassword = User::get('password');
        // return $oldPassword;
        // return $user;
        $pass =  request()->validate([
            'password' => ['required', 'min:3' , 'max:255'] ,
            'new_password' => ['required', 'min:3' , 'max:255'] ,           
        ]);
        // $new_pass =  $pass->new_password;
        // return $new_pass;

        // return $pass;
        // if (Hash::check('passwordToCheck', $user->getAuthPassword())) 
       
        if(Hash::check($request->password, $user->password)) {
            $user->update(['password' => bcrypt($request->new_password)]);
            Auth::logout();
        }                          
        else{
            dd("Incorrect Password");
        }


        // $validator->after(function ($validator) {
        //     if ( !Hash::check($this->current_password, $this->user()->password) ) {
        //         $validator->errors()->add('current_password', 'Your current password is incorrect.');
        //     }
        // });
        return redirect('/user/login');
    }

   
}