<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    function profile(){
        $id=Auth::user()->id;
        $adminData=User::find($id);
        return view('admin.profile_admin')->with([
            'profile' =>  $adminData
        ]);
    }

    function update(Request $request){
        $this->validate($request,[
            'name' => 'required|min:4|max:255',
            'email' => 'required|min:5|max:255',
        ]);
        $id=Auth::user()->id;
        $adminData=User::find($id);
        if($request->has('image')){
            $file=$request->image;
            $image_name=time().'-'.$file->getClientOriginalName();
            $file->move(public_path('profile'),$image_name);
            $adminData->image= $image_name;
        }

        $adminData->update([
            "name"=> $request->name,
            "email"=> $request->email,

        ]);
        return redirect()->route('admin.profile')->with([
            'message' =>  'profile has been uptaded successfuly',
            'alert-type'=>'success'
        ]);
    }
    function showPasswod(){
      
        return view('admin.showPassword');
    }
    function updatePasswod(Request $request){
      
        $this->validate($request,[
            'oldPassword' => 'required|min:4|max:255',
            'newPassword' => 'required|min:4|max:255',
            'confirmPassword' => 'required|min:4|max:255',

        ]);

        if ($request->newPassword != $request->confirmPassword) {
           return back()->with([
            'error'=> 'please inter the same password'
           ]);
        }
        $hashedPassord=Auth::user()->password;
        if (Hash::check($request->oldPassword,$hashedPassord)) {
           $user=User::find(Auth::id());
           $user->password=bcrypt($request->newPassword);
           $user->save();
        }else{
            return back()->with([
                'error'=> 'please inter the correct old password'
               ]);  
        }
        return back()->with([
            'success'=> 'password has been uptaded successfuly'
           ]);  ;
    }
    
}
