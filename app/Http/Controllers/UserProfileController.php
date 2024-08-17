<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('pages.profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'address' => ['nullable', 'max:1000'],
            'birth' => ['nullable', 'date']
        ]);

        try {
            $user    = auth()->user();
            $profile = $user->profile;

            DB::beginTransaction();

            $user->name = $request->input('name');
            $user->save();

            $profile->birth_date   = $request->input('birth');
            $profile->phone_number = $request->input('phone');
            $profile->address      = $request->input('address');
            $profile->save();

            DB::commit();

            return back()->with('success', 'berhasil mengubah profile');
        } catch (\Throwable $th) {
            DB::rollBack();

            dd($th);
            return back()->with('error', 'gagal dalam mengubah profile. coba lagi nanti!');
        }
    }
}
