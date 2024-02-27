@extends('layouts.main')

@section('content')
 <section class="runflat-header" id="runflat-header" >
        <div class="container">
            <div class="row">
            <div class="col-sm-12">
                 <h1 class="text-center"><span style="color:#fff;font-weight:800;">SEAL INSIDE™</span></h1>
            <div class="text-center text-white">Pirelli’s self-sealing technology allows you to continue driving safely after a puncture, maintaining complete control of the vehicle and taking road safety and driving pleasure to the next level</div>
            </div>
        </div>
    </div>
</section>
 <section style="background: #f1f1f1;padding:50px 0;" class="py-5">
        <div class="container mt-3">
               <h3 class="technology-section-title text-center">BENEFITS</h3>
           <h1 style="text-align:center;font-family:'gotham-black'">PUNCTURE CONTROL</h1>
            <div class="row">
                   <div class="col-md-5">
                    <img class="img-fluid" src="{{asset('/images/car/seal-inside-technology.png')}}" >

                </div>
                <div class="col-md-1"></div>
                <div class="col-md-6">
                   
                  <ol class="technology-list">
                      <li>
                          <h3>CONTINUED MOBILITY</h3>
                          <p>Seal Inside™ technology allows the vehicle to keep running without losing air pressure even after the tyre has been punctured by an external object, covering almost 85% of the possible accidental causes of pressure loss</p>
                      </li>
                        <li>
                          <h3>ENSURING SAFETY</h3>
                          <p>A Seal Inside™ tyre won’t leave you stranded in the middle of the countryside or in a bad neighbourhood. Just drive home.</p>
                      </li>
                          <li>
                          <h3>PEACE OF MIND</h3>
                          <p>The Seal Inside™ technology does not need dedicated rims and TPMS (Tyre Pressure Monitoring System) to be used safely on a vehicle. It can be used on any kind of vehicle depending on the tyre size.</p>
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
                 <h1 class="text-center"><span style="color:#000;font-weight:800;">SELF-SEALING TECHNOLOGY</span></h1>
                  <img class="img-fluid" src="{{asset('/images/car/seal-inside-technology-focus.png')}}" >

            </div>
        </div>
    </div>
</section>

 <section style="background: #f1f1f1;padding:50px 0;" class="py-5">
        <div class="container mt-3">
               <h3 class="technology-section-title">BEHAVIOUR</h3>
           <h1 style="text-align:center;font-family:'gotham-black'">HOW SEAL INSIDE™ TYRES WORK</h1>
            <div class="row">
                   <div class="col-md-5">
<iframe width="100%" height="315" src="https://www.youtube.com/embed/_WlcUry5IYY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                </div>
                <div class="col-md-1"></div>
                <div class="col-md-6">
                   
                  <ol class="technology-list">
                      <li>
                          <h3>PHASE 1</h3>
                          <p>The sealing mastic sticks to the object causing the puncture, creating a seal around the object if it remains in the tyre</p>
                           <img class="img-fluid" src="{{asset('/images/car/seal-inside-technology-phase1.png')}}" >
                      </li>
                        <li>
                          <h3>PHASE 2</h3>
                          <p>When the object is removed from the tyre, the sealing mastic is “drawn” by the object into the hole, sealing the edges of the hole</p>
                          <img class="img-fluid" src="{{asset('/images/car/seal-inside-technology-phase2.png')}}" >
                          
                      </li>
                      
                  </ol>

                </div>
             
            </div>
        </div>
    </section>



@endsection



@section('scripts')

@endsection
