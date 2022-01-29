<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
        return view('users.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $rules = [
            'firstname'=>'required|max:50',
            'lastname' => 'required|max:50',
            'email'=>'required|email|unique:users',
            'password'=>'required',
        ];
        $customMessages = [
            'firstname.required' => 'กรุณากรอกชื่อ',
            'firstname.max' => 'ชื่อต้องมีตัวอักษรไม่เกิน 50 ตัวอักษร',
            'lastname.required' => 'กรุณากรอกนามสกุล',
            'lastname.max' => 'นามสกุลต้องมีตัวอักษรไม่เกิน 50 ตัวอักษร',
            'email.required' => 'กรุณากรอกอีเมล',
            'email.unique' => 'มีอีเมลนี้อยู่ในระบบ กรุณาเปลี่ยนอีเมล',
            'email.email' => 'กรุณากรอกรูปแบบอีเมลที่ถูกต้อง',
            'password.required'  => 'กรุณากรอกรหัสผ่าน',
        ];
        $request->validate($rules,$customMessages);
        $user = new User;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('user.index');
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
        return view('users.edit',['id'=>$id,'user'=>$user]);
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
        $rules = [
            'firstname'=>'required|max:50',
            'lastname' => 'required|max:50',
            'email'=>'required|email|unique:users',
            'password'=>'required',
        ];
        $customMessages = [
            'firstname.required' => 'กรุณากรอกชื่อ',
            'firstname.max' => 'ชื่อต้องมีตัวอักษรไม่เกิน 50 ตัวอักษร',
            'lastname.required' => 'กรุณากรอกนามสกุล',
            'lastname.max' => 'นามสกุลต้องมีตัวอักษรไม่เกิน 50 ตัวอักษร',
            'email.required' => 'กรุณากรอกอีเมล',
            'email.unique' => 'มีอีเมลนี้อยู่ในระบบ กรุณาเปลี่ยนอีเมล',
            'email.email' => 'กรุณากรอกรูปแบบอีเมลที่ถูกต้อง',
            'password.required'  => 'กรุณากรอกรหัสผ่าน',
        ];
        $request->validate($rules,$customMessages);
        $user = User::find($id);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index');
    }
    public function Login()
    {
        return view('login');
    }
    public function Authen(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $credentials = $request->only('email', 'password');
        $user = User::where('email',$credentials['email'])->first();
        if($user){
            if(Hash::check($credentials['password'],$user->password )){
                Auth::attempt($credentials);
                return redirect()->route('home');
            }
        }
        return back()->with('fail','Incorrect Username or Password');
    }
    public function Logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
