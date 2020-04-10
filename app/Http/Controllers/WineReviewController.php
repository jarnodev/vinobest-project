<?php

namespace App\Http\Controllers;

use App\Models\WineReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WineReviewController extends Controller
{
    public function postReview(Request $request, $wineId)
    {
        $review = new WineReview();
        $review->wine_id = $wineId;
        $review->user_id = Auth::user()->id;

        if (WineReview::where('wine_id', $review->wine_id)->where('user_id', Auth::user()->id)->exists()) {
            return redirect()->back()
                ->with('danger', 'Je kan maar één review schrijven voor deze wijn.');
        }

        if (!is_null($request->get('message'))) {
            $review->message = $request->get('message');
        } else {
            $review->message = 'Geen opmerkingen';
        }

        $review->rating = $request->get('rating');
        $review->save();

        return redirect()->back()
            ->with('success', 'Je hebt succesvol een review geplaatst, bedankt!');
    }

    public function deleteReview($id)
    {
        try {
            WineReview::find($id)->delete();
            return redirect()->back()
                ->with('success', 'Review succesvol verwijderd.');
        } catch (\Throwable $th) {
            return redirect()->back()
                ->with('danger', 'Er is iets fout gegaan tijdens het verwijderen van de review.');
        }
    }
}
