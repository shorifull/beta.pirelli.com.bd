@extends('layouts.main')

@section('content')
<section class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                 <h1 class="text-center">MOTORCYCLE TYRES <span style="color:#000;font-weight:800;">KNOWLEDGE</span></h1>
            <div class="text-center">While motorcycle tires have existed for more than 100 years, their appearance has changed dramatically.<br>
            Modern motorcycles have little in common with early motorcycles that were modeled after bicycles.<br>
            One consistent part is the tyre, which has been an integral piece of the motorcycle since its inception.<br>
            Modern radial tyres made by PIRELLI are high-tech and have progressed since their introducion on motorcycles of 100 years ago.<br>
            Below you will find the various constructions that PIRELLI uses today.</div>
            </div>
        </div>
    </div>
</section>
 <section style="background: #000;padding:50px 0;" class="about-us py-5 mt-5 " id="about-us" >
        <div class="container mt-5">
           
            <div class="row">
                <div class="col-md-8">
                    <h2 style="font-size:60px; line-height:1;color:#fff;">SIDEWALL<br>
                       <span style="font-weight:800;">MARKINGS</span></h2>
                    <p style="color:#fff;">
						The tyre is the only part of the motorcycle that makes contact with the road. <br>
						That is why correct use and maintenance of your motorcycle’s tyres, as well as knowledge of the tyre’s characteristics,<br>
						increases the lifespan of the tyre, saves money and promotes safety. Always remember to ride drive safely and respect the environment.
					</p>

                </div>
                <div class="col-md-4">
                    <img class="img-fluid" src="{{asset('/images/car/car-tyre-hotspot.png')}}" >

                </div>
            </div>
        </div>
    </section>
    
    <section class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                 <h1 class="text-center">ABOUT <span style="color:#000;font-weight:800;">TYRES</span></h1>
                 <img class="img-fluid" src="{{asset('/images/car/run-flat-technology-focus.png')}}" >

            </div>
        </div>
    </div>
</section>

 <section style="background: #f2f2f2;padding:50px 0;" class="about-us py-5 mt-5 " id="about-us" >
        <div class="container mt-5">
           
            <div class="row">
                <div class="col-md-6">
                    <h2 style="font-size:60px; line-height:1;color:##333333;font-weight:300;"><span style="font-weight:800;">RADIAL CARCASS</span><br>
                       CONSTRUCTION</h2>
                    <p style="color:#333333;">
						The tyre is the only part of the motorcycle that makes contact with the road. <br>
						That is why correct use and maintenance of your motorcycle’s tyres, as well as knowledge of the tyre’s characteristics,<br>
						increases the lifespan of the tyre, saves money and promotes safety. Always remember to ride drive safely and respect the environment.
					</p>

                </div>
                <div class="col-md-6">
                    <img class="img-fluid" src="{{asset('/images/car/radial-carcass.png')}}" >

                </div>
            </div>
        </div>
    </section>
    
     <section style="background: #ffffff;padding:50px 0;" class="about-us py-5 mt-5 " id="about-us" >
        <div class="container mt-5">
           
            <div class="row">
                 <div class="col-md-6">
                    <img class="img-fluid" src="{{asset('/images/car/radial-cross-belted.png')}}" >

                </div>
                <div class="col-md-6">
                    <h2 style="font-size:60px; line-height:1;color:##333333;font-weight:300;"><span style="font-weight:800;">RADIAL CROSS BELTED</span><br>
                       CONSTRUCTION</h2>
                    <p style="color:#333333;">
						The main difference from the bias-belted construction is the structure of the carcass in this case is radial.<br>
                        This means that its cords are wrapped radially around the tyre, from one bead to the other, <br>
                        giving big advantages in terms of cornering stability, reduced weight and high-speed performance.
					</p>

                </div>
               
            </div>
        </div>
    </section>
    
    
    
     <section style="background: #f2f2f2;padding:50px 0;" class="about-us py-5 mt-5 " id="about-us" >
        <div class="container mt-5">
           
            <div class="row">
                <div class="col-md-6">
                    <h2 style="font-size:60px; line-height:1;color:##333333;font-weight:300;"><span style="font-weight:800;">BIAS BELTED</span><br>
                       CONSTRUCTION</h2>
                    <p style="color:#333333;">
						The structure consists of a conventional carcass and a belt made of two or more crossed layers.<br>
						The difference between the carcass and the belt is determined by the different goals they are designed <br>
						to fulfill and consequently different materials are used in the construction. The belt is made mainly <br>
						from Aramide and its function is to reduce the dynamic deformation caused by centrifugal forces, <br>
						while the carcass provides the tyre with its stiffness and load carrying capacity.
					</p>

                </div>
                <div class="col-md-6">
                    <img class="img-fluid" src="{{asset('/images/car/bias-belted.png')}}" >

                </div>
            </div>
        </div>
    </section>
    
    
    
    
     <section style="background: #ffffff;padding:50px 0;" class="about-us py-5 mt-5 " id="about-us" >
        <div class="container mt-5">
           
            <div class="row">
                 <div class="col-md-6">
                    <img class="img-fluid" src="{{asset('/images/car/cross-ply.png')}}" >

                </div>
                <div class="col-md-6">
                    <h2 style="font-size:60px; line-height:1;color:##333333;font-weight:300;"><span style="font-weight:800;">CROSS PLY</span><br>
                       CONSTRUCTION</h2>
                    <p style="color:#333333;">
						Also indicated as conventional or x-ply tyre. Depending on the different speed and load specifications,<br>
						the tyre carcass is structured using two or more overlapping layers.<br>
						Each layer is made of rubber coated textile cords and the overlap angle<br>
						is designed in order for the tyre to conform with the required dynamic characteristics.
					</p>

                </div>
               
            </div>
        </div>
    </section>


@endsection



@section('scripts')

@endsection
