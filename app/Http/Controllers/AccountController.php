<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    // Account List
    public function accountList()
    {
        return view('admin.account.account');
    }

    // Change Password Page
    public function changePasswordPage()
    {
        return view('admin.account.changePassword');
    }

    // change password
    public function changePassword(Request $request)
    {
        $this->validationCheck($request);

        $user = User::select('password')->where('id', Auth::user()->id)->first();
        $dbHashValue = $user->password;

        if (Hash::check($request->oldPassword, $dbHashValue)) {
            $data = [
                'password' => Hash::make($request->newPassword),
            ];
            User::where('id', Auth::user()->id)->update($data);
            Auth::logout();
            return redirect()->route('auth#loginPage');
        }
        return back()->with(['notMatch' => 'The Old Password not Match. Try Again!']);

    }

    // Admin and user account delete
    public function adminAccDelete($id)
    {
        User::where('id', $id)->delete();
        return back()->with(['deleteSuccess' => 'Account Delete Success ']);
    }

    // admin list
    public function adminList()
    {
        $data = User::where('role', 'admin')->paginate(5);
        return view('admin.account.list', compact('data'));
    }

    // admin and user role change with ajax
    public function roleChange(Request $request)
    {
        $updateData = ['role' => $request->role];
        User::where('id', $request->userId)->update($updateData);
    }

    public function userList()
    {
        $data = User::where('role', 'user')->paginate(5);
        return view('admin.user.list', compact('data'));
    }

    // private Function
    // validationCheck
    private function validationCheck($request)
    {
        Validator::make($request->all(), [
            'oldPassword' => 'required|min:6',
            'newPassword' => 'required|min:6',
            'confirmPassword' => 'required|same:newPassword',
        ])->validate();
    }
}