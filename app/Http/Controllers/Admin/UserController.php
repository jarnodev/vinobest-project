<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.overview', [
            'data' => User::orderBy('id', 'ASC')->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.users.edit', [
            'user' => User::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'permission_level' => 'required'
        ]);

        User::find($id)->update($request->all());

        return redirect()->route('admin.users.index')
                        ->with('success', 'Gebruiker succesvol geüpdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            User::find($id)->delete();
            return redirect()->route('admin.users.index')
                            ->with('success', 'Gebruiker succesvol verwijderd');
        } catch (\Throwable $th) {
            return redirect()->route('admin.users.index')
                            ->with('danger', 'Er is iets fout gegaan met het verwijderen van de gebruiker.');
        }
    }
}
