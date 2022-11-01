<?php

namespace App\Http\Controllers;

use App\Order;
use Inertia\Inertia;
use Inertia\Response;
use App\Jobs\HandleOrder;
use App\Mail\OrderCreated;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\StoreOrderRequest;

class OrderController extends Controller
{
    /**
     * Show the form for creating an order.
     *
     * @return Response
     */
    public function create(): Response
    {
        return Inertia::render('Order');
    }

    /**
     * Handle form submission of an order.
     *
     * @return void
     */
    public function store(StoreOrderRequest $request)
    {
        if (!$request->validated()) {
            return response()->json(['message' => 'Data not valid']);
        }

        //Stuff our validated data into a variable
        $validData = (object) $request->validated();

        // Lets create our order
        $order = Order::create([
            'customerName' => $validData->name,
            'customerEmail' => $validData->email,
            'container' => $validData->container,
            'amount' => (int)$validData->amount,
            'details' => $validData->details,
        ]);

        //Execute job, send order with.
        HandleOrder::dispatch($order);

        // Redirect to success route, with the newly created order id as our parameter
        return response()->redirectToRoute('orders.success', ['order' => $order->id]);
    }

    /**
     * Show a primitive success message
     *
     * @param $order
     * @return Response
     */
    public function success($order): Response
    {
        // Grab all the order data
        $data = Order::find($order);

        return Inertia::render('Success', [
            'orderId' => $data->id, //Show the proper ID on the page
        ]);
    }
}
