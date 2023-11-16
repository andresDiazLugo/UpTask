<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\sendUserRegister;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
class UserRegister extends Controller
{
    //

    public function sign_in()
    {
      $title = 'sign in';
      return view('registerUser.sign_in', ['title' => $title]);  
    }
    public function sign_up()
    {
      $title = 'sign up';
      return view('registerUser.sign_up',['title' => $title]);  
    }
    public function forget_password()
    {
      $title = 'forget password';
      return view('registerUser.forget_password',['title' => $title]);
    }
    public function reset($token)
    {
      $title = 'Resete you password';
      return view('registerUser.reset',['title' => $title,'token'=>$token]);
    }
    public function messageCofirm()
    {
      $title = 'Activate you account';
      return view('registerUser.messageActivate',['title' => $title]);
    }
    public function confirm($token)
    {
      $title = 'confirm account';
      $comparate_token= User::where('remember_token', $token)->first();
      if($comparate_token)
      {
        $comparate_token->email_verified = true;
        $comparate_token->remember_token = null;
        $comparate_token->save(); 
        return view('registerUser.confirm',['title' => $title,'success'=>['confirmed account']]);
      } 
      else
      {
        return view('registerUser.confirm',['title' => $title,'errors'=>["Invalid Token"]]);
      }
    }

    public function store(Request $request)
    {
      try {
        $validateData = $request->validate(User::$rules);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->remember_token = uniqid();
        $user->save();
        Mail::to($user->email)->send(new sendUserRegister($user,'Activate you account',"Welcome $user->name a Uptask ativate you account",'CONFIRM'));
        return redirect()->route('registerUser.message');
    } catch (\Illuminate\Validation\ValidationException $e) {
      return view('registerUser.sign_up',['errors' => $e->validator->errors()->toArray()]);  
    }

    }

    public function store_sign_in(Request $request)
    {
        
      try{
          $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
          ]);
          $findEmailUser = User::where('email',$request->email)->first();
          if($findEmailUser)
          {
            $comparatePassword = Hash::check($request->password, $findEmailUser->password);
            $comparatePassword 
            ? dd('inicio de sesion exitoso')
            :  throw ValidationException::withMessages(['Password is incorrect']);
          }
          else
          {
            throw ValidationException::withMessages(['This email is not registered, Sign up']);
          }
      }catch(ValidationException $e){
        return view('registerUser.sign_in',['errors' => $e->validator->errors()->toArray()]);  
      }
    }

    public function storeForget(Request $request)
    {
      $title = 'forget password';
      $email = $request->email;
      $findEmail= User::where('email', $email )->first();
      if($findEmail)
      {
        $findEmail->remember_token = uniqid();
        $findEmail->save();
        Mail::to($findEmail->email)->send(new sendUserRegister($findEmail,'Reset you password',"Welcome $findEmail->name a Uptask reset you password",'RESET'));
        return redirect()->route('registerUser.message');
      }
      else
      {
        return view('registerUser.forget_password',['title' => $title,'errors'=>["the email $email is not registered"]]);
      }
    }
    public function resetStore(Request $request,$token)
    {

      try{
        $userFindToken = User::where('remember_token', $token)->first();
        if($userFindToken)
        {
          $request->validate([
            'password' => 'required|min:6',
          ]);
          $new_password = $request->password;
          $userFindToken->password = $new_password;
          $userFindToken->remember_token = null;
          $userFindToken->save();
          return redirect()->route('registerUser.sign_in');
        }else{
          throw ValidationException::withMessages(['Invalid Token']);
        }
      }catch(ValidationException $e){
        return view('registerUser.reset',['errors' => $e->validator->errors()->toArray(),'token' => $token]);  
      }

    }
}
