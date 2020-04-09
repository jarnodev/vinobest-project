<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TourDate;
use Illuminate\Http\Request;

class TourDateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tourdates.overview', [
            'tourDates' => TourDate::all()->load('seatsTaken')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tourdates.create');
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
            'date' => 'required|date',
            'seats' => 'required',
            'price' => 'required'
        ]);

        TourDate::create($request->all());

        return redirect()->route('admin.tourdates.index')
            ->with('success', 'Wijnproeverij succesvol gepland.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.tourdates.edit', [
            'tourDate' => TourDate::find($id)
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
            'date' => 'required|date',
            'seats' => 'required',
            'price' => 'required'
        ]);

        TourDate::find($id)->update($request->all());

        return redirect()->route('admin.tourdates.index')
            ->with('success', 'Wijnproeverij succesvol geüpdate.');
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
            TourDate::find($id)->delete();
            return redirect()->route('admin.tourdates.index')
                            ->with('success', 'Wijnproeverij succesvol verwijderd');
        } catch (\Throwable $th) {
            return redirect()->route('admin.tourdates.index')
                            ->with('danger', 'Er is iets fout gegaan met het verwijderen van de wijnproeverij.');
        }
    }
}
