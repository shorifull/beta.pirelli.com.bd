<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 Generate PDF From View</title>
    
    
    <style>
@page { margin: 0px; }

body{
    background:url('{{asset('/images/pdf/card-holder.jpg')}}');
    background-size:cover;
    margin: 0px;
    font-family: 'Roboto', sans-serif;
}
table {
  margin-left:150px;
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th,ul {
  /*border: 1px solid #dddddd;*/
  color:#fff;
  text-align: left;
  padding: 8px;
}

ul {
    font-family: 'Roboto', sans-serif;
    text-transform:uppercase;
    font-weight:800;
    font-size:18px;
    color:#f1f2f2;
    list-style:none;
    width:200px;
    height:200px;
    position:fixed;
    right:10px;
    bottom:85px;
}
ul li {
    margin:30pxpx 0px;
}
tr:nth-child(even) {
  /*background-color: #dddddd;*/
}
</style>
</head>
<body>

    
<ul>
    <li>Car</li>
    <li>{{$warranty_data['name'] }}</li>
    <li>{{$warranty_data['date_purchased'] }}</li>
    <li>{{$warranty_data['warranty_number']}}</li>
</ul>
</body>
</html>