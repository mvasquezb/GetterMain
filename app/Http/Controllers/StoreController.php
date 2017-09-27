<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $stores = Store::all();
        $withBusinessInfo = $request->input('business_info', false) ?: false;
        if ($withBusinessInfo) {
            foreach($stores as $store) {
                $store->append(['business_name', 'business_logo_url']);
            }
        }
        return $stores;
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
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Store $store)
    {
        $withBusinessInfo = $request->input('business_info', false) ?: false;
        if ($withBusinessInfo) {
            $store->append(['business_name', 'business_logo_url']);
        }
        return $store;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        $latitude = $request->input('latitude', $store->latitude);
        $longitude = $request->input('longitude', $store->longitude);
        
        $store->latitude = $latitude;
        $store->longitude = $longitude;
        $store->save();

        return response()->json([
            'code' => 0,
            'message' => 'Store updated successfully',
            'data' => $store,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        //
    }
}
