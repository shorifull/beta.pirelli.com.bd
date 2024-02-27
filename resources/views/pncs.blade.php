@extends('layouts.main')

@section('content')
 <section class="runflat-header" id="runflat-header" >
        <div class="container">
            <div class="row">
            <div class="col-sm-12">
                 <h1 class="text-center"><span style="color:#fff;font-weight:800;">PNCS™</span></h1>
            <div class="text-center text-white">The Pirelli Noise Cancelling System™ (PNCS) is a technology that is able to lower the noise inside the vehicle, thanks to a sound absorbing device applied to the inside circumferential wall of the tyre, reducing noise by half.</div>
            </div>
        </div>
    </div>
</section>
 <section style="background: #f1f1f1;padding:50px 0;" class="py-5">
        <div class="container mt-3">
               <h3 class="technology-section-title text-center">BENEFITS</h3>
           <h1 style="text-align:center;font-family:'gotham-black'">IMPROVING DRIVING COMFORT</h1>
            <div class="row">
                   <div class="col-md-5">
                    <img class="img-fluid" src="{{asset('/images/car/pncs-technology.png')}}" >

                </div>
                <div class="col-md-1"></div>
                <div class="col-md-6">
                   
                  <ol class="technology-list">
                      <li>
                          <h3>ABSORB THE VIBRATIONS</h3>
                          <p>The vibrations that are generated in the tyre structure and inside the car are called cavity noise: Pirelli Noise Cancelling System™ can resolve this phenomenon, offering significantly improved driving comfort</p>
                      </li>
                        <li>
                          <h3>SUPERIOR COMFORT</h3>
                          <p>Pirelli’s sound absorbing sponge reduces the frequency filtering through the car, providing superior comfort compared to traditional tyres</p>
                      </li>
                          <li>
                          <h3>REDUCES NOISE</h3>
                          <p>The Pirelli Noise Cancelling System™ reduces noise by between two or three decibels, which on average reduces the perceived noise by half, with a consequent improvement in driving comfort</p>
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
                 <h1 class="text-center"><span style="color:#000;font-weight:800;">THE TECHNOLOGY INSIDE PNCS™ TYRES</span></h1>
                  <img class="img-fluid" src="{{asset('/images/car/pncs-technology-focus.png')}}" >

            </div>
        </div>
    </div>
</section>

 <section style="background: #f1f1f1;padding:50px 0;" class="py-5">
        <div class="container mt-3">
               <h3 class="technology-section-title">BEHAVIOUR</h3>
           <h1 style="text-align:center;font-family:'gotham-black'">HOW PNCS™ TYRES WORK</h1>
            <div class="row">
                   <div class="col-md-5">
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/KMtVuLA08kI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                </div>
                <div class="col-md-1"></div>
                <div class="col-md-6">
                   
                  <ol class="technology-list">
                      <li>
                          <h3>PHASE 1</h3>
                          <p>Tyre cavity noise is caused by resonance of air contained inside the tyre cavity during rotation and is transmitted to the cabin</p>
                           <img class="img-fluid" src="{{asset('/images/car/pncs-technology-phase1.png')}}" >
                      </li>
                        <li>
                          <h3>PHASE 2</h3>
                          <p>Pirelli's innovative polyurethane sponge absorbs these vibrations and reduces noise</p>
                          <img class="img-fluid" src="{{asset('/images/car/pncs-technology-phase2.png')}}" >
                          
                      </li>
                      
                  </ol>

                </div>
             
            </div>
        </div>
    </section>



@endsection



@section('scripts')

@endsection
