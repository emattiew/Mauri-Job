<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    public function registration(){
        return view('front.account.registration');

    }
    public function processRegistration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|same:confirm_password',
            'confirm_password' => 'required',
        ]);

        if ($validator->passes()) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password); // Utilisation correcte de Hash::make
            $user->save(); // Sauvegarde de l'utilisateur

            session()->flash('success', 'You have registered successfully');
            return redirect()->route('account.login')->with('success', 'Registration successful');
        } else {
            return redirect()->route('account.registration')->withErrors($validator)->withInput();

        }
    }

    public function login(){
        return view('front.account.login');
    }
   
    public function authenticate(Request $request){
        $validator = Validator::make($request->all(), [
            
            'email' => 'required|email',
            'password' => 'required',
            
        ]);
        if ($validator->passes()){
            if(Auth::attempt(['email' => $request ->email,'password'=> $request->password])){
                return redirect()->route('account.profile');
            }else{
                return redirect()->route('account.login')->with('error','email ou password incorrecte');
            }

        }else{
            return redirect()->route('account.login')
            ->withErrors($validator)
            ->withInput($request->only('email'));
        }
    }

    public function profile(){

        $id=Auth::user()->id;
      $user=User::where('id',$id)->first();
      
        
        return view('front.account.profile',[
            'user'=>$user
        ]);
    }
    public function updateProfile(Request $request){
        $id=Auth::user()->id;
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:5|max:20',
            'email' => 'required|email|unique:users,email,'.$id.',id'
            
            
        ]);
        if ($validator->passes()){
            $user=User::find($id);
            $user->name=$request->name;
            $user->email=$request->email;
            $user->mobile=$request->mobile;
            $user->designation=$request->designation;
            $user->save();
            session()->flash('success','profile update successfully.');
            return redirect()->route('account.profile');
        }else{
            return redirect()->route('account.profile')
            ->withErrors($validator)
            ->withInput($request->only('email'));
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('account.login');
        
    }
}
