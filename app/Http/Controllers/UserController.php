<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Exception;

class UserController extends Controller
{

    public function index()
    {
        $pageTitle = "کاربران";
        $users = User::orderBy('id', 'asc')->get();
        return view('users', compact('pageTitle', 'users'));
    }

    public function edit(User $user)
    {
        $pageTitle = "ویرایش کاربر";
        return view('editUser', compact('pageTitle', 'user'));
    }

    public function update(Request $request, User $user)
    {
        // dd($request);
        $messages = [
            'name.required' => 'برای نام چیزی وارد نکردید',
            // 'title.unique' => 'این عنوان موجود است',
            'name.max' => 'حداکثر کاراکتر برای نام باید 50 باشد',
            'email.required' => 'برای ایمیل چیزی وارد نکردید'
        ];
        $validated = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required',
        ], $messages);

        $user->name = $request->name;
        $user->email = $request->email;

        // $user->update($request->all());

        try {

            $user->save();
        } catch (Exception $e) {
            return redirect(route('users'))->with('warning', $e->getCode());
        }
        $msg = "کاربر مورد نظر ویرایش شد";
        return redirect(route('users'))->with('success', $msg);
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
        } catch (Exception $e) {
            return redirect(route('users'))->with('warning', $e->getCode());
        }
        $msg = " کاربر " . $user->name . " حذف شد ";
        return redirect(route('users'))->with('success', $msg);
    }
}
