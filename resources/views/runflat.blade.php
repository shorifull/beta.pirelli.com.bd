@extends('layouts.main')

@section('content')
 <section class="runflat-header" id="runflat-header" >
        <div class="container">
            <div class="row">
            <div class="col-sm-12">
                 <h1 class="text-center"><span style="color:#fff;font-weight:800;">RUN FLAT™ </span></h1>
            <div class="text-center text-white">They provide greater control of the car in emergency conditions and allow you to continue driving safely even during a rapid loss of inflation pressure</div>
            </div>
        </div>
    </div>
</section>
 <section style="background: #f1f1f1;padding:50px 0;" class="py-5">
        <div class="container mt-3">
               <h3 class="technology-section-title text-center">BENEFITS</h3>
           <h1 style="text-align:center;font-family:'gotham-black'">DRIVE WITHOUT PRESSURE</h1>
            <div class="row">
                   <div class="col-md-5">
                    <img class="img-fluid" src="{{asset('/images/car/run-flat-technology.png')}}" >

                </div>
                <div class="col-md-1"></div>
                <div class="col-md-6">
                   
                  <ol class="technology-list">
                      <li>
                          <h3>DRIVING CONTROL</h3>
                          <p>The Self-Supporting Run Flat™ tyre offers stability and reliable handling to keep control of your vehicle in the event of a puncture. They are designed to keep your car or SUV stable for you to continue your journey.</p>
                      </li>
                        <li>
                          <h3>ENSURING SAFETY</h3>
                          <p>A flat tyre won’t leave you stranded in the middle of the countryside or in a bad neighbourhood. Just drive home.</p>
                      </li>
                          <li>
                          <h3>PEACE OF MIND</h3>
                          <p>No need to change the flat tyre immediately. First drive home safely for 80 km (50 miles) at a maximum speed of 80 km/h (50 mph) and then change your tyre. A flat tyre won’t mean missing a flight or an important meeting.</p>
                      </li>
                  </ol>

                </div>
             
            </div>
        </div>
    </section>
    
    <section class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                  <h3 class="technology-section-title text-center">FEATURES</h3>
                 <h1 class="text-center"><span style="color:#000;font-weight:800;">SELF-SUPPORTING TECHNOLOGY</span></h1>
                  <img class="img-fluid" src="{{asset('/images/car/run-flat-technology-focus.png')}}" >

            </div>
        </div>
    </div>
</section>

 <section style="background: #f1f1f1;padding:50px 0;" class="py-5">
        <div class="container mt-3">
               <h3 class="technology-section-title">BENEFITS</h3>
           <h1 style="text-align:center;font-family:'gotham-black'">DRIVE WITHOUT PRESSURE</h1>
            <div class="row">
                   <div class="col-md-5">
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/PzmTRLEkKcY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                </div>
                <div class="col-md-1"></div>
                <div class="col-md-6">
                   
                  <ol class="technology-list">
                      <li>
                          <h3>PHASE 1 - INFLATED TYRE</h3>
                          <p>The Pirelli Self Supporting™ system presents specific reinforcements inserted into the sidewall structure</p>
                          <img class="img-fluid" src="{{asset('/images/car/run-flat-technology-phase1.png')}}" >
                      </li>
                        <li>
                          <h3>PHASE 2 - DEFLATED TYRE</h3>
                          <p>Pirelli Run Flat™ tyres support lateral and transverse loads of the vehicle even in the absence of pressure</p>
                          <img class="img-fluid" src="{{asset('/images/car/run-flat-technology-phase2.png')}}" >
                      </li>
                      
                  </ol>

                </div>
             
            </div>
        </div>
    </section>



@endsection



@section('scripts')

@endsection
