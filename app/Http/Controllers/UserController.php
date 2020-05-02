<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Image;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getUser() {
        $user = Auth::user();
        return $user;
    }


    public function getStudents(User $user){
        $students = $user->students;
        $sendStudents = array();
        $studentsOrders = array();

        foreach ($students as $student) {
            $sendStudents[$student->id] = $student->name;
            $studentsOrders[$student->id] = array();
            foreach ($student->orders as $order) {
                array_push($studentsOrders[$student->id], $order->product->id);
            }
        }


        return [$sendStudents, $studentsOrders];
    }

    public function getStudentsOrders(User $user) {
        $students = $user->students;
        $studentsOrders = array();
        foreach ($students as $student) {
            $studentsOrders[$student->name] = array();
            foreach ($student->orders as $order) {
                array_push($studentsOrders[$student->name], $order->product);
            }
        }

        return $studentsOrders;
    }

    public function getStudentsProducts() {
        $students = Auth::user()->students;
        foreach ($students as $student) {
            $student->products;
            foreach ($student->orders as $order) {
                $order->product;
            }
        }
        return $students;
    }

    public function profile() {
        $user = Auth::user();
        return view('layouts.profile', compact('user'));
    }

    public function updateAvatar(Request $request) {
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $fileName = time() . '.' . $avatar->getClientOriginalExtension();

            $user = Auth::user();
            if ($user->avatar != 'default.jpg') {
                File::delete(public_path('/img/avatars/' . $user->avatar));
            }
            Image::make($avatar)->resize(300, 300)->save(public_path('/img/avatars/') . $fileName);
            $user->avatar = $fileName;
            $user->save();
        }
        return view('layouts.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->name = ucwords($request->get('name'));
        $user->phone = $request->get('phone');

        if ($request->get('password') != null){
            $hash = Hash::make($request->get('password'));
            $user->password = $hash;
        }

        $user->save();

        return redirect()->back();
    }

    public function updateId(Request $request, $id)
    {
        User::where('id', $id)->update($request->all());

        return response()->json([
            'message' => 'Success'
        ], 200);
    }

    public function destroy(User $user)
    {
        foreach ($user->students as $student) {
            $student->delete();
        }

        User::destroy($user->id);

        return response()->json([
            'message' => 'User Deleted'
        ], 200);
    }

}
