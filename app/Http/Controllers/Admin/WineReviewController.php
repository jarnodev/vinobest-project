<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wine;
use App\Models\WineReview;
use Illuminate\Http\Request;

class WineReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.winereviews.overview', [
            'wineReviews' => WineReview::all()->load('user', 'wine')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.winereviews.create', [
            'wines' => Wine::all()
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
            'wine_id' => 'required',
            'user_id' => 'required',
            'message' => 'required',
            'rating' => 'required'
        ]);

        WineReview::create($request->all());

        return redirect()->route('admin.winereviews.index')
            ->with('success', 'Review succesvol geplaatst.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.winereviews.edit', [
            'wineReview' => WineReview::find($id)->load('user', 'wine')
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
            'message' => 'required',
            'rating' => 'required'
        ]);

        WineReview::find($id)->update($request->all());

        return redirect()->route('admin.winereviews.index')
            ->with('success', 'Review succesvol geüpdate.');
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
            WineReview::find($id)->delete();
            return redirect()->route('admin.winereviews.index')
                            ->with('success', 'Review succesvol verwijderd');
        } catch (\Throwable $th) {
            return redirect()->route('admin.winereviews.index')
                            ->with('danger', 'Er is iets fout gegaan met het verwijderen van de review.');
        }
    }
}
