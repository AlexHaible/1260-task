<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    </head>

    <body>
        Customer Name: {{ $order->customerName }}<br/>
        Customer Email: {{ $order->customerEmail }}<br />
        Container: {{ $order->container }}<br />
        Amount: {{ $order->amount }}<br />
        Details: {{ $order->details }}<br />
        Temperature: {{ $order->temperature }}<br />
    </body>
</html>
