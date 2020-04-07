<?php

namespace App\Http\Controllers;

use App\Models\TourDate;
use App\Models\UserAppointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('appointments', [
            'tourDates' => TourDate::all(),
            'myAppointments' => UserAppointment::where('user_id', Auth::user()->id)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function join(Request $request)
    {
        $appointment = new UserAppointment();
        $appointment->tour_date_id = $request->get('tour_date_id');
        $appointment->user_id = Auth::user()->id;

        if (!is_null($request->get('allergies'))) {
            $appointment->allergies = $request->get('allergies');
        } else {
            $appointment->allergies = 'Geen allergieën';
        }

        $appointmentByTourDateId = UserAppointment::where('tour_date_id', $appointment->tour_date_id);
        $tourDate = TourDate::find($appointment->tour_date_id);

        if (UserAppointment::where('tour_date_id', $appointment->tour_date_id)->where('user_id', Auth::user()->id)->exists()) {
            return redirect()->back()
                ->with('danger', 'Je kan je maar één keer inschrijven voor deze proeverij.');
        }

        if ($tourDate->seats == $appointmentByTourDateId->count()) {
            return redirect()->back()
                ->with('danger', 'Deze proeverij zit momenteel vol.');
        }

        $appointment->save();

        return redirect()->back()
            ->with('success', 'Je hebt je ingeschreven voor de wijn proeverij.');
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
            return redirect()->route('appointments')
                            ->with('success', 'Succesvol uitgeschreven');
        } catch (\Throwable $th) {
            return redirect()->route('appointments')
                            ->with('danger', 'Er is iets fout gegaan tijdens het uitschrijven.');
        }
    }
}
