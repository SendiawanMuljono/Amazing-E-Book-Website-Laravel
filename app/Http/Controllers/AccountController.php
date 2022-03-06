<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Ebook;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Symfony\Component\HttpKernel\Profiler\Profile;

class AccountController extends Controller
{
    public function view(){
        if(Auth::guard('account')->check()){
            return redirect('/home');
        }
        return redirect('/index');
    }

    public function viewIndex(){
        return view('index', [
            'title' => 'Index'
        ]);
    }

    public function viewSignUp(){
        $roles = Role::all();
        return view('signup', [
            'title' => 'Sign Up',
            'roles' => $roles
        ]);
    }

    public function signUp(Request $request){
        //pada soal disebutkan first_name, middle_name, dan last_name
        ///tidak boleh ada simbol, artinya bisa saja ada nomor
        //sehingga validasi ketiganya dibawah ini memakai alpha_num bukan alpha
        $request->validate([
            'first_name' => 'filled|alpha_num|max:25',
            'middle_name' => 'alpha_num|max:25|nullable',
            'last_name' => 'filled|alpha_num|max:25',
            'email' => 'filled|email',
            'gender' => 'required',
            'role' => 'required',
            'password' => ['filled', Password::min(8)->numbers()],
            'image' => 'required|mimes:jpg,png,jpeg,bmp'
        ]);

        $file = $request->file('image');
        $imageName = time().' '.$file->getClientOriginalName();
        $request->image->move(public_path('/assets'), $imageName);


        $account = new Account();
        $account->role_id = $request->role;
        $account->gender_id = $request->gender;
        $account->first_name = $request->first_name;
        $account->middle_name = $request->middle_name;
        $account->last_name = $request->last_name;
        $account->email = $request->email;
        $account->password = Hash::make($request->password);
        $account->display_picture_link = 'assets/'.$imageName;
        $account->save();

        return redirect()->back()->with('message', 'Sign Up Successful');
    }

    public function viewLogin(){
        return view('login', [
            'title' => 'Login'
        ]);
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'filled|email',
            'password' => ['filled', Password::min(8)->numbers()],
        ]);

        $credentials = ['email' => $request->email, 'password' => $request->password, 'delete_flag' => null];

        if(Auth::guard('account')->attempt($credentials)){
            return redirect('/home');
        }
        return redirect('/login')->withErrors('User not found');
    }

    public function viewProfile(){
        $roles = Role::where('role_id', '!=', Auth::guard('account')->user()->role_id)->get();
        return view('profile', [
            'title' => 'Profile',
            'roles' => $roles
        ]);
    }

    public function updateProfile(Request $request){
        $request->validate([
            'first_name' => 'filled|alpha_num|max:25',
            'middle_name' => 'alpha_num|max:25|nullable',
            'last_name' => 'filled|alpha_num|max:25',
            'email' => 'filled|email',
            'gender' => 'required',
            'password' => ['filled', Password::min(8)->numbers()],
            'image' => 'required|mimes:jpg,png,jpeg,bmp'
        ]);

        $account = Account::where('account_id', Auth::guard('account')->user()->account_id)->first();
        $account->gender_id = $request->gender;
        $account->first_name = $request->first_name;
        $account->middle_name = $request->middle_name;
        $account->last_name = $request->last_name;
        $account->email = $request->email;
        $account->password = Hash::make($request->password);
        $account->modified_at = Carbon::now();
        $account->modified_by = Auth::guard('account')->user()->first_name." ".Auth::guard('account')->user()->last_name;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $imageName = time().' '.$file->getClientOriginalName();
            $request->image->move(public_path('/assets'), $imageName);
            $account->display_picture_link = 'assets/'.$imageName;
        }
        $account->save();

        return redirect('/profile/update/success');
    }

    public function viewUpdateProfileSuccess(){
        return view('updateprofilesuccess', [
            'title' => 'Success'
        ]);
    }

    public function viewAccountMaintenance(){
        $accounts = Account::where('delete_flag', '=', null)->get();
        return view('accountmaintenance', [
            'title' => 'Account Maintenance',
            'accounts' => $accounts
        ]);
    }

    public function viewUpdateRole($accountId){
        $account = Account::where('account_id', $accountId)->first();
        $roles = Role::where('role_id', '!=', $account->role_id)->get();
        return view('updaterole', [
            'title' => 'Update Role',
            'account' => $account,
            'roles' => $roles
        ]);
    }

    public function updateRole($accountId, Request $request){
        $account = Account::where('account_id', $accountId)->first();
        $role_id = $request->role;

        $account->role_id = $role_id;
        $account->modified_at = Carbon::now();
        $account->modified_by = Auth::guard('account')->user()->first_name." ".Auth::guard('account')->user()->last_name;
        $account->save();

        return redirect()->back()->with('message', 'Successfully update role');
    }

    public function deleteAccount($accountId){
        $account = Account::where('account_id', $accountId)->first();

        $account->delete_flag = 1;
        $account->modified_at = Carbon::now();
        $account->modified_by = Auth::guard('account')->user()->first_name." ".Auth::guard('account')->user()->last_name;
        $account->save();

        return redirect()->back()->with('message', 'Successfully delete account');
    }

    public function logout(Request $request){
        Auth::guard('account')->logout();
        $request->session()->flush();
        return view('logout', [
            'title' => 'Logout'
        ]);
    }
}
