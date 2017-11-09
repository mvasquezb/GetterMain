<?php

namespace App\Http\Controllers;

use App\Store;
use App\Offer;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Store::all();
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
    public function show(Store $store)
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
	
	
	/*Se llama en la busqueda generica de la aplicacion*/
	public function googling(Request $request){
	
		$array = array();
		$array['status']=0;
		$array['data']=array();
	
		$string='%'.strtolower($request->value).'%';
		
		/*se retorna tiendas*/
		$array['data']['stores']=null;		
		
		$stores = Store::select('stores.id as store_id','longitude','latitude','business_id','name','logo')->whereHas('business',function($query) use ($string){
			$query->whereRaw('LOWER(name) LIKE ?',[$string]);
		})->join('businesses','businesses.id','stores.business_id')->get();
		
		$array['data']['stores']=$stores;
		
		/*se retorna ofertas*/
		$array['data']['offers']=null;
		
		$offers = Offer::select('offers.id as offer_id','offers.description','offers.price','image_url as photo')->whereRaw('LOWER(offers.description) LIKE ?',[$string])->join('products','products.id','offers.product_id')->get();
		
		$array['data']['offers']=$offers;
		
		return $array;
		
	}	
	
}
