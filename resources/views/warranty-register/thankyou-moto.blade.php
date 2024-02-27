@extends('layouts.main')

@section('content')
<section class="cover-layout">
    <div class="cover-wrapper">
        <div class="cover-wrapper__inner cover_wrapper_second-template">
          <div class="logo">
            <img src="{{ asset('img/logo.png') }}" class="img-fluid" />
            <p>WARRANTY REGISTRATION</p>
          </div>
        </div>
      </div>
    </div>
    </section>
    <section class="input-fileds">
      <div class="container container-costum-margin">
        <div class="row">

          <div class="col-xl-7 col-lg-7 col-12">
            <div class="terms-policy-header d-flex justify-content-center">
                <p>Thank you for your submission!</p>
            </div>

          </div>

          <div class="col-xl-5 col-lg-5 col-12">
            <div class="terms-policy">
              <div class="terms-policy-header d-flex justify-content-center">
                <p>Pirelli Tyre Warranty Terms</p>
              </div>
              <div class="description-text">
              
              </div>

              <div class="find-out-more-btn">
                <a href="#">
                  <button class="costum-btn">Find Out More</button>
                </a>
              </div>

              <div class="warranty-certificate">
                <div class="warranty-certificate__inner">
                  <img src="{{ asset('img/warranty.png') }}" class="img-fluid">
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>
    </section>
    @endsection

    @section('script1')
    <script>
        var baseUrl = "{{ URL::to('/')}}";
    </script>
    @endsection
