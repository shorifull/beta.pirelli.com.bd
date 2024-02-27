@extends('layouts.main')

@section('content')
 <section class="car-technology-banner py-3 " id="car-technology-banner" >
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="technology-title">TECHNOLOGY AND<br> KNOWLEDGE</h2>
                    <hr>


                    <p class="text-left">The constant quest to transcend the boundaries of <span class="font-weight-bold">technology</span> <br>
                    and the constant desire to be ahead of the game and <span class="font-weight-bold">innovate</span> <br>
                    have enabled <span class="font-weight-bold">Pirelli</span> to set trends and reach the cutting edge on a global scale.</p>

                




                </div>
                <div class="col-md-4">

                </div>
          
            </div>
             <div class="container">
                      <div style="margin-top: 15%;margin-bottom:20px;" class="row">
                        <div class="col-md-12"><h2 class="technology-title">OUR SOLUTIONS</h2></div>
                    <div class="col-md-4">
                         <a class="btn btn-secondary btn-lg learn-more-btn" href="{{route('runflat')}}">RUN FLAT<sup>TM</sup> <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                    </div>
                    <div class="col-md-4"> 
                        <a class="btn btn-secondary btn-lg learn-more-btn" href="{{route('pncs')}}">PNCS<sup>TM</sup> <i class="fa fa-chevron-right" aria-hidden="true"></i></i></a>
                    </div>
                     <div class="col-md-4">
                          <a class="btn btn-secondary btn-lg learn-more-btn" href="{{route('seal-inside')}}">SEAL INSIDE<sup>TM</sup> <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                    </div>
                </div>
             </div>
              
        </div>
    </section>
    <section>
       <div class="container mt-3">
           <div class="row">
               <div class="col-md-12">
                   <p class="text-left">Discover the technology of Pirelli tyres: guaranteed performance and safety.</p>
                   <p class="text-left">The constant quest to transcend the boundaries of <span class="font-weight-bold">tyre technology</span> and the constant desire to be ahead of the game and <span class="font-weight-bold">innovate</span>innovate have enabled Pirelli to set trends and reach the cutting edge on a global scale.

</p>
<p class="text-left">Pirelli knows all about tyres and has created several innovative technological solutions to increase driving comfort and ensure total mobility. Comfort is covered by the Pirelli Noise Cancelling System™; when it comes to total mobility, Pirelli has studied and developed two technologies: Pirelli Seal Inside™ and Pirelli Run Flat™.</p>
               </div>
           </div>
       </div>
    </section>
    

@endsection



@section('scripts')

@endsection
