<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Store_detail;
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
        // Get Shop Shored Data 
        $stores = Store::with('storeDetails')->get();        
        return view('store', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Store 1 Source Data 
        $shopInfo = '{"shop_id": 123, "code": 1, "success": 1, "extra": "shop_id 123 is authorized successfully", "data": {"address": "Banani, Dhaka", "conatact_person": "Mr. Shaiful Islam", "conatact_number": "+8801876776677", "conatact_email": "saiful@spaceship.com.sg"}, "timestamp": 1470198856}';
        $content = json_decode($shopInfo);
        try {  
            $storeData = [
                "shop_id"=> $content->shop_id,
                "name"=> NULL,
                "code"=> $content->code,
                "status"=> $content->success,
                "message"=> $content->extra,
                "created_at"=> date('Y-m-d H:i:s', $content->timestamp),
            ];

            $store = Store::create($storeData);
            if ($store) {
                $detailData = [
                    "store_id"=> $store->id,
                    "address"=> $content->data->address,
                    "conatact_person"=> $content->data->conatact_person,
                    "conatact_number"=> $content->data->conatact_number,
                    "conatact_email"=> $content->data->conatact_email
                ];
                $soreDetails = Store_detail::create($detailData);
            }
            return redirect('stores');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
