@component('mail::message')



<p>This Warranty Card is valid for 6 month after purchase Date.</p>
<p>Customer has to Claim the warranty using the Warraty ID before the expire date in our online portal.</p>
<p>Website: <a href="https://pirelli.com.bd">pirelli.com.bd</a></p>
Customer Name   : {{$warrantyData['first_name'] }} {{$warrantyData['last_name'] }}<br>
Purchase Date   : {{$warrantyData['date_purchased'] }}<br>
Warranty Number : {{$warrantyData['warranty_number']}}<br>
@component('mail::button', ['url' => 'https://pirelli.com.bd'])
    Visit Website
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent
