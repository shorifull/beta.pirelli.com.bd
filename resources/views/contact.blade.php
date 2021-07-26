@extends('layouts.main')

@section('content')
    <section class="contact" id="contact">
        <div class="container">
            <div class="heading text-center wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <h2>
                    <span>Keep In</span>
                    Touch</h2>
                <p>Send us an enquiry and our customer services will get back to you by email within 1 working day</p>

            </div>
            <div class="main wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <div class="row">
                    <div class="col-lg-8 left">
                        <h3>Send Message</h3>
                        <!-- Success message -->
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @endif

                        <form action="" method="post" action="{{ route('contact.submit') }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text"  name="name" id="name" class="form-control {{ $errors->has('name') ? 'error' : '' }}" placeholder="Name">
                                    <!-- Error -->
                                    @if ($errors->has('name'))
                                        <div class="error">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-6">
                                    <input type="email" name="email" id="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}" placeholder="Email">
                                    @if ($errors->has('email'))
                                        <div class="error">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text"  name="phone" id="phone" class="form-control {{ $errors->has('phone') ? 'error' : '' }}" placeholder="Phone">
                                    @if ($errors->has('phone'))
                                        <div class="error">
                                            {{ $errors->first('phone') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="subject" id="subject" class="form-control {{ $errors->has('subject') ? 'error' : '' }}" placeholder="Subject">
                                    @if ($errors->has('subject'))
                                        <div class="error">
                                            {{ $errors->first('subject') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <textarea class="form-control {{ $errors->has('message') ? 'error' : '' }}" rows="5" name="message" id="message" placeholder="Message"></textarea>
                                @if ($errors->has('message'))
                                    <div class="error">
                                        {{ $errors->first('message') }}
                                    </div>
                                @endif
                            </div>
                            <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
                        </form>
                    </div>
                    <!-- Left -->
                    <div class="col-lg-4">
                        <div class="right">
                            <h4>Contact Information</h4>
                            <div class="info d-flex align-items-center">
                                <i class="fa fa-map" aria-hidden="true"></i>
                                <span>277, Tejgaon Industrial Area, <br>Dhaka-1208</span>
                            </div>
                            <div class="info d-flex align-items-center">
                                <i class="fa fa-chrome" aria-hidden="true"></i>
                                <span><a style="color:white;" href="tel:01400-440440">01400-440440</a>
                                       </span>
                            </div>
                            <div class="info d-flex align-items-center">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span>info@pirelli.com.bd
                                      </span>
                            </div>
                            <div class="social">

                                <a href=" https://www.facebook.com/bdpirellimoto">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                                <a href="#0">
                                    <i class="fa fa-dribbble" aria-hidden="true"></i>
                                </a>
                                <a href="#0">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                                <a href="#0">
                                    <i class="fa fa-github" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection



@section('scripts')

@endsection
