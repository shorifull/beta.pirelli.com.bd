<html>
    <head>
        <style>
    body{
        background-color:#26282c;
        margin:0;
        padding:0;
    }
    table {
        width:100%;
        
    }
    
    p {
        font-family: 'Roboto', sans-serif;
    }
    
    h1, h2, h3, h4, h5, h6 {
        font-family: 'Open Sans Condensed', sans-serif;
        
    }

   
    table#warranty-info th, table#warranty-info td {
            border: 0.5px solid #fff;
            padding: 10px;
    }
        
        
        
        
</style>
    </head>
    <body>
        


<table style="background-color:#000;padding:15px 0px;">
    <tr>
         <td>
            
        </td>
        <td style="text-align: rigth;">
            <img src="{{asset('/images/pdf/logo.png')}}" width="125px;">
        </td>
         <td>
            
        </td>
       
    </tr>
</table>
<table style="padding:10px 20px;background:#000;">
    <tr>
        <td>
            
            <h2 style="color:#fff;font-size:20px;">Dear Customer,</h2>
            
            <h3 style="color:#fff;font-size:16px;">Welcome to PIRELLI Family.</h3> 
            
            <p style="color:#fff;font-size:14px;text-align:justify;">Pirelli is the pioneer in designing and manufacturing premium tires that ensures driving safety and comfort.
            Our “PIRELLI ASSURANCE PLAN’’ will ensure your trust and confidence you have given on us. 
            We have provided below your “Pirelli Warranty Card” which is unique and will help you to get hassle free warranty claim service.</p>
        </td>
    </tr>
</table>

<table>
    <tr>
        <td>
            <img src="{{asset('/images/pdf/car-background.jpg')}}" width="100%" height="400px">
        </td>
    </tr>
</table>
<table style="padding:20px 10px;background:#000;">
    <tr>
        <td style=" text-align: center;">
            <h3 style="text-align:center;color:#ffc600;">DON'T MISS OUT ON THE LATEST OFFERS & PROMOTIONS</h3>
            <a style="text-align:center;background:#ffc600;color:#000;padding:10px 20px;text-decoration:none;margin-top:10px;" href="#">SUBSCRIBE NOW</a>
        </td>
    </tr>
</table>

<table style="color:#fff; padding:10px 20px;">
       <tr>
        <td><p style="color:#fff;">
        Here is your warranty information.Please download and keep the attachment for the further uses.</p></td>
    </tr>
</table>
<table id="warranty-info" style="color: #fff;padding: 25px 20%;">

    <tr>
        <td>Customer Name </td>
        <td>{{$warranty_data['name'] }}</td>
    </tr>
     <tr>
        <td>Purchase Date </td>
        <td>{{$warranty_data['date_purchased'] }}</td>
    </tr>
        <tr>
        <td>Warranty Number </td>
        <td>{{$warranty_data['warranty_number']}}</td>
    </tr>
</table>
<table style="color:#fff;text-align:center;padding:30px 10px;">
    <tr>
        
        <td><a href="https://www.facebook.com/bdpirelli"><img src="{{asset('/images/social/facebook.png')}}" width="30px"></a>
        <a href="https://www.instagram.com/pirellibd/"><img src="{{asset('/images/social/instagram.png')}}" width="30px"></a>
        <a href="https://www.linkedin.com/company/pirellibd"><img src="{{asset('/images/social/linkedin.png')}}" width="30px"></a></td>
    </tr>
    <tr>
        <td>
            <p> © 2021 Pirelli Bangladesh | All rights reserved.</p>
            <p></p>277, Tejgaon I/A. Dhaka-1208</p>


        </td>
    </tr>
</table>
        
    </body>
</html>









