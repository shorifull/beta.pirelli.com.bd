<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 Generate PDF From View</title>
</head>
<body>
   
 <p>This Warranty Card is valid for 6 month after purchase Date.</p>
<p>Customer has to Claim the warranty using the Warraty ID before the expire date in our online portal.</p>
<p>Website: <a href="https://pirelli.com.bd">pirelli.com.bd</a></p>
Customer Name   : {{$carRegistration['first_name'] }} {{$carRegistration['last_name'] }}<br>
Purchase Date   : {{$carRegistration['date_purchased'] }}<br>
Warranty Number : {{$carRegistration['warranty_number']}}<br>
</body>
</html>