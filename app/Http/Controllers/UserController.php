<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function login(Request $request)
    {
        $login = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($login)) {
            return redirect('userlist');
        } else {
            return redirect()->back()->with('status', 'Email hoặc Password không chính xác');
        }
    }

    /**
     * @return RedirectResponse
     */
    public function logOut()
    {
        Auth::logout();
        return redirect()->route('getLogin');
    }


    public function createUser(Request $request)
    {
        $params = $request->only(['email', 'password']);
        $params['name'] = $request->email;
        $params['password'] = bcrypt($request->password);

        $images = $request->file('images');
        if ($request->hasFile('images')) {
            foreach ($images as $image) {
                $paths[] = ['image_link' => $image->store('public/images')];
            }
        }

        $user = User::create($params);
        $user->images()->createMany($paths);
        return redirect()->back()->with('status', 'Tạo xong rồi');
    }
}
