<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditRequest;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('user.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('user.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request)
    {
        try {
            $validated = $request->validated();

            if ($validated['password']) {
                $validated['password'] = bcrypt($validated['password']);
            } else {
                $validated['password'] = auth()->user()->password;
            }

            User::find(auth()->user()->id)->update($validated);
            return redirect(route('profile.show'))->with('flash', [
                'error' => false,
                'msg' => 'Profile has been updated.'
            ]);
        } catch (\Exception $e) {
            return redirect(route('profile.show'))->with('flash', [
                'error' => true,
                'msg' => $e->getMessage()
            ]);
        }
    }
}
