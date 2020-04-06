<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TourDate;
use App\Models\User;
use App\Models\UserAppointment;
use Illuminate\Http\Request;

class UserAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.appointments.overview', [
            'appointments' => UserAppointment::all()->load('user', 'tourDate')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.appointments.create', [
            'tourDates' => TourDate::all(),
            'users' => User::all()
        ]);
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
            'tour_date_id' => 'required',
            'allergies' => 'required',
            'user_id' => 'required'
        ]);

        UserAppointment::create($request->all());

        return redirect()->route('admin.appointments.index')
            ->with('success', 'Succesvol ingeschreven.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.appointments.edit', [
            'appointment' => UserAppointment::find($id),
            'tourDates' => TourDate::all(),
            'users' => User::all()
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
            'tour_date_id' => 'required',
            'allergies' => 'required',
            'user_id' => 'required'
        ]);

        UserAppointment::find($id)->update($request->all());

        return redirect()->route('admin.appointments.index')
            ->with('success', 'Inschrijving succesvol geüpdate.');
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
            UserAppointment::find($id)->delete();
            return redirect()->route('admin.appointments.index')
                            ->with('success', 'Inschrijving succesvol verwijderd');
        } catch (\Throwable $th) {
            return redirect()->route('admin.appointments.index')
                            ->with('danger', 'Er is iets fout gegaan met het verwijderen van de inschrijving.');
        }
    }
}
