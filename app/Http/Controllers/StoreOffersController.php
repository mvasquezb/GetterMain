<?php

namespace App\Http\Controllers;

use App\Store;
use App\Offer;
use Illuminate\Http\Request;
use App\Http\Responses\OfferShowResponse;
use App\Http\Responses\OfferIndexResponse;

class StoreOffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Store $store)
    {
        return new OfferIndexResponse($store->offers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Store $store)
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
    public function show(Request $request, Store $store, Offer $offer)
    {
        return new OfferShowResponse($offer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Store $store, Offer $offer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store, Offer $offer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Offer $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Store $store, Offer $offer)
    {
        //
    }

    public function count(Request $request, Store $store)
    {
        return $store->offers()->count();
    }
}
