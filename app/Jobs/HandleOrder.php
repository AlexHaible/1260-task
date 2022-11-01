<?php

namespace App\Jobs;

use App\Mail\OrderCreated;
use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class HandleOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Order $order;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $lat = "55.6602328";
        $lon = "12.5895169";
        $apiKey = config('external.weather_key');
        $response = Http::get("https://api.openweathermap.org/data/2.5/weather?lat={$lat}&lon={$lon}&appid={$apiKey}&units=metric");

        //Updates order with temperature from API above
        $this->order->update(['temperature' => $response->object()->main->temp]);

        //Send email
        Mail::to('info@isbutikken.test')->send(
            new OrderCreated($this->order)
        );
    }
}
