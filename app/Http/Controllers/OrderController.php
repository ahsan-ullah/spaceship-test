<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_detail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get Stored Order Data 
        $orders = Order::with('orderDetails')->get();
        return view('orders', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Store 2 Data get from source
        $orderInfo = '{"seller_id":"9999","message_type":0,"data":{"order_status":"Initiated","trade_order_id":"123456","trade_order_line_id":"12345","status_update_time":1656915866},"timestamp":1656915866,"site":"lazada_sg"}';
        $content = json_decode($orderInfo);
        try {
            $orderData = [
                "seller_id"=> $content->seller_id,
                "message_type"=> $content->message_type,
                "site"=> $content->site,
                "created_at"=> date('Y-m-d H:i:s', $content->timestamp)
            ];
            
            $order = Order::create($orderData);
            if ($order) {
                $detailData = [
                    "order_id"=> $order->id,
                    "status"=> $content->data->order_status,
                    "trade_order_id"=> $content->data->trade_order_id,
                    "trade_order_line_id"=> $content->data->trade_order_line_id
                ];
                Order_detail::create($detailData);
            }
            return redirect('orders');
        } catch (\Throwable $th) {
            //throw $th;
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
