<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Storage;

class UserController extends Controller
{
    // Home Page
    public function homePage()
    {

        $data = Book::
            when(request('key'), function ($query) {
            $query->orWhere('books.name', 'like', '%' . request('key') . '%')
                ->orWhere('books.author', 'like', '%' . request('key') . '%');
        })->orderBy('created_at', 'desc')->get();

        $category = Category::get();

        return view('user.home.homePage', compact('data', 'category'));
    }

    // detail page
    public function detailsBook($id)
    {
        $data = Book::select('books.*', 'categories.name as category_name')
            ->leftJoin('categories', 'books.category_id', 'categories.id')
            ->where('books.id', $id)->first();

        return view('user.home.details', compact('data'));
    }

    // filter category
    public function filter($categoryId)
    {
        $data = Book::where('category_id', $categoryId)->orderBy('created_at', 'desc')->get();
        $category = Category::get();
        return view('user.home.homePage', compact('data', 'category'));

    }

    // increase download count
    public function downloadCount(Request $request)
    {

        $book = Book::where('id', $request->bookId)->first();
        $downloadCount = [
            'download_count' => $book->download_count + 1,
        ];

        Book::where('id', $request->bookId)->update($downloadCount);
    }

    // user profile
    public function userProfile()
    {
        return view('user.account.profile');
    }

    // user profile edit
    public function editProfile($id)
    {
        return view('user.account.edit');
    }

    // update profile
    public function updateProfile($id, Request $request)
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
        return redirect()->route('user#profile')->with(['updateSuccess' => 'Admin Account Updated.']);

    }

    // password change page
    public function changePasswordPage()
    {
        return view('user.account.changePassword');
    }

    // change password
    public function changePassword(Request $request)
    {
        $this->passwordValidationCheck($request);
        $user = User::select('password')->where('id', Auth::user()->id)->first();
        $dbHashValue = $user->password;

        if (Hash::check($request->oldPassword, $dbHashValue)) {
            $data = [
                'password' => Hash::make($request->newPassword),
            ];
            User::where('id', Auth::user()->id)->update($data);
            return back()->with(['successChange' => 'Password Change Successfully...']);

        }
        return back()->with(['notMatch' => 'The Old Password not Match. Try Again!']);

    }

    // private function group
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

    // validationCheck
    private function passwordValidationCheck($request)
    {
        Validator::make($request->all(), [
            'oldPassword' => 'required|min:6',
            'newPassword' => 'required|min:6',
            'confirmPassword' => 'required|same:newPassword',
        ])->validate();
    }

}