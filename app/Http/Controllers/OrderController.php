<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

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
    public function store()
    {
        //
    }

    /**
     * Show a primitive success message
     *
     * @param $order
     * @return Response
     */
    public function success($order): Response
    {
        /**
         * IMMPORTANT:
         * Route model binding should be applied to this route, when the model has been created.
         */

        return Inertia::render('Success', [
            'orderId' => $order, // ... and then this should be replaced with $order->id
        ]);
    }
}
