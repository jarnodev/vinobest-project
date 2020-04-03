<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WineType;
use Illuminate\Http\Request;

class WineTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.winetypes.overview', [
            'wineTypes' => WineType::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.winetypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        WineType::create($request->all());

        return redirect()->route('admin.winetypes.index')
            ->with('success', 'Wijnsoort succesvol toegevoegd.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.winetypes.edit', [
            'wineType' => WineType::find($id)
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
        $request->validate([
            'name' => 'required'
        ]);

        $wineType = WineType::find($id);
        $wineType->update($request->all());

        return redirect()->route('admin.winetypes.index')
            ->with('success', 'Wijnsoort succesvol geüpdate.');
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
            WineType::find($id)->delete();
            redirect()->route('admin.winetypes.index')
                ->with('success', 'Wijnsoort succesvol verwijderd');
        } catch (\Throwable $th) {
            redirect()->route('admin.winetypes.index')
                ->with('danger', 'Er is een fout opgetreden tijdens het verwijderen van de wijnsoort');
        }
    }
}
