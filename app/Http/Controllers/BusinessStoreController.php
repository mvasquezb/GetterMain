<?php

namespace App\Http\Controllers;

use App\Store;
use App\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;

class BusinessStoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Business $business)
    {
        return $business->stores;
    }
 
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
    public function create(Business $business)
    {
        //
    }
 
     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
    public function store(Request $request, Business $business)
    {
        //
    }
 
     /**
      * Display the specified resource.
      *
      * @param  \App\Store  $store
      * @return \Illuminate\Http\Response
      */
    public function show(Business $business, Store $store)
    {
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
        //
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
