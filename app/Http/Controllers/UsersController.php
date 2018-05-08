<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function avatar()
    {
        return view('users.avatar');
    }

    public function changeAvatar(Request $request)
    {
        $file = $request->file('img');
        $fileName = 'avatars/' . md5(time() . user()->id) . '.' . $file->getClientOriginalExtension();
        // $file->move(public_path('avatars'), $fileName);

        \Storage::disk('qiniu')->writeStream($fileName, fopen($file->getRealPath(), 'r'));

        // user()->avatar = '/avatars/' . $fileName;
        user()->avatar = 'http://' . config('filesystems.disks.qiniu.domain') . '/' . $fileName;

        user()->save();

        return ['url' => user()->avatar];
    }
}
