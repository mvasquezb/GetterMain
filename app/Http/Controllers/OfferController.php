<?php

namespace App\Http\Controllers;

use App\Offer;
use Illuminate\Http\Request;
use App\Http\Responses\OfferShowResponse;
use App\Http\Responses\OfferIndexResponse;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $offers = Offer::all();
        return new OfferIndexResponse($offers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        return new OfferShowResponse($offer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {
        $startDate = $request->input('start_date', $offer->start_date);
        $endDate = $request->input('end_date', $offer->end_date);
        $description = $request->input('description', $offer->description);
        $offerType = $request->input('offer_type_id', $offer->type->id);

        $offer->start_date = $startDate;
        $offer->end_date = $endDate;
        $offer->description = $description;
        $offer->offer_type_id = $offerType;
        $offer->save();

        return response()->json([
            "code" => 0,
            "message" => "Offer updated successfully",
            "data" => $offer,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        //
    }
}
