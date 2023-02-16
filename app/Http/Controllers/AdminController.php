<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Storage;

class AdminController extends Controller
{
    public function profile()
    {
        return view('admin.account.profile');
    }

    // Profile Edit page
    public function profileEditPage()
    {
        return view('admin.account.edit');
    }

    // Direct Edit Profile
    public function editProfile($id, Request $request)
    {
        $this->profileValidationCheck($request);
        $data = $this->getUserData($request);

        if ($request->hasFile('image')) {
            $dbImage = User::where('id', $id)->first();
            $dbImage = $dbImage->image;

            if ($dbImage != null) {
                Storage::delete('public/' . $dbImage);
            }

            $fileName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $fileName);
            $data['image'] = $fileName;
        }

        User::where('id', $id)->update($data);
        return redirect()->route('admin#profile')->with(['updateSuccess' => 'Admin Account Updated.']);
    }

    // profile Validation Check
    private function profileValidationCheck($request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'image' => 'mimes:png,jpg,jpeg,svg,webp,jfif,pjpeg,pjp|file',
            'gender' => 'required',
            'address' => 'required',
        ], [
            'name' => 'Need to fill Your Name',
            'email' => 'Need to fill Your Email ',
            'phone' => 'Need to fill Your Phone Number',
            'image.mimes' => 'This file is only can update photo type',
            'gender' => 'Please Choose Gender ',
            'address' => 'Need to fill Your Address',

        ])->validate();
    }

    //getUserData
    private function getUserData($request)
    {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'updated_at' => Carbon::now(),
        ];
    }
}