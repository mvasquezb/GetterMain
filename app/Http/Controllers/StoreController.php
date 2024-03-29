<?php

namespace App\Http\Controllers;

use App\Store;
use App\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $stores = $this->filterStores($request);
        $stores = $stores->get();
        
        $withBusinessInfo = $request->input('business_info', false) ?: false;
        if ($withBusinessInfo) {
            foreach ($stores as $store) {
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
	
	
	/*Se llama en la busqueda generica de la aplicacion*/
	public function googling(Request $request){
	
		$array = array();
		$array['status']=0;
		$array['data']=array();
	
		$string='%'.strtolower($request->value).'%';
		
		/*tiendas*/
		$array['data']['stores']=null;		
		
		$stores = Store::select('stores.id as store_id','longitude','latitude','business_id','name','logo')->whereHas('business',function($query) use ($string){
			$query->whereRaw('LOWER(name) LIKE ?',[$string]);
		})->join('businesses','businesses.id','stores.business_id')->get();
		
		$array['data']['stores']=$stores;
		
		/*ofertas*/
		$array['data']['offers']=null;
		
		$offers = Offer::select('offers.id as offer_id','offers.description','offers.price','image_url as photo')->whereRaw('LOWER(offers.description) LIKE ?',[$string])->join('products','products.id','offers.product_id')->get();
		
		$array['data']['offers']=$offers;
		
		return $array;
		
	}	

    private function filterStores($request)
    {
        $filterCategories = $request->category;
        $filterPrices = $request->price;

        $query = Store::query();
        if ($filterCategories || $filterPrices) {
            $query = $query->join('offers', 'offers.store_id', '=', 'stores.id')
                    ->join('products', 'products.id', '=', 'offers.product_id');
        }

        if ($filterCategories) {
            $query = $query->join('product_categories', 'product_categories.id', '=', 'products.category_id')
                    ->whereIn('product_categories.slug', $filterCategories);
        }
        
        if ($filterPrices) {
            $prices = $this->cleanPriceFilters($filterPrices);
            foreach ($prices as $price) {
                $query = $query->where('offers.price', $price['restriction'], $price['amount']);
            }
        }
        return $query;
    }

    private function cleanPriceFilters($priceFilters)
    {
        $prices = [];
        foreach ($priceFilters as $filter) {
            $restriction = substr($filter, 0, 1);
            $amount = substr($filter, 1);
            if (!in_array($restriction, ['<', '=', '>'])) {
                continue;
            }
            if (!is_numeric($amount)) {
                continue;
            }
            $amount = floatval($amount);
            if ($amount <= 0) {
                continue;
            }
            $prices[] = [
                'restriction' => $restriction,
                'amount' => $amount,
            ];
        }
        return $prices;
    }
}
