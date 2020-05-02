<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Student;
use App\User;
use Carbon\Carbon;
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
        $order = new Order();
        $order->user_id = $request->get('user_id');
        $order->product_id = $request->get('product_id');
        $order->student_id = $request->get('student_id');
        $order->save();

        return response()->json([
            'message' => 'Success'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        Order::destroy($order->id);

        return response()->json([
            'message' => 'Order Deleted'
        ], 200);
    }

    public function getOrders() {
        $orders = Order::all();
        foreach ($orders as $order) {
            $order->user;
            $order->student;
            $order->product;
        }
        return $orders;
    }

    public function activateOrder(Request $request, $id) {
        $order = Order::find($id);
        $activeDate = Carbon::createFromFormat('Y-m-d', $request->get('activeDate'));
        $order->active = true;
        $order->activeDate = $activeDate;
        $order->expireDate = $activeDate->copy()->addMonths($order->product->period);
        $order->save();

        return response()->json([
            'message' => 'Order activated!'
        ], 200);
    }
}
