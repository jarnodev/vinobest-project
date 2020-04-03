<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wine;
use Illuminate\Http\Request;

class WineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.wines.overview', [
            'data' => Wine::orderBy('id', 'ASC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.wines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'origin' => 'required',
            'year' => 'required',
            'type' => 'required'
        ]);

        $wine = Wine::create($request->all());

        if($image = $request->file('image')) {
            $imageName = $image->getClientOriginalName();
            if ($image->move(public_path('/images/wines/'), $imageName)) {
                $wine->image = $imageName;
                $wine->save();
            }
        }

        return redirect()->route('admin.wines.index')
            ->with('success', 'Wijn succesvol toegevoegd!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.wines.edit', [
            'wine' => Wine::find($id)
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
            'password' => 'confirmed',
        ]);

        $input = $request->all();

        $user = User::find($id);
        $user->update($input);

        return redirect()->back()
                        ->with('success', 'Wijn succesvol geüpdate');
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
            Wine::find($id)->delete();
            return redirect()->route('admin.wines.index')
                            ->with('success', 'Wijn succesvol verwijderd');
        } catch (\Throwable $th) {
            return redirect()->route('admin.wines.index')
                            ->with('success', 'Er is iets fout gegaan met het verwijderen van de wijn.');
        }
    }
}
