@extends('layouts.main')

@section('content')
<section class="cover-layout">
      <div class="container-costum">
        <div class="cover-wrapper">
          <div class="cover-wrapper__inner">
            <div class="logo-right">
              <img src="{{ asset('img/logo.png') }}" class="img-fluid" />
              <p>WARRANTY REGISTRATION</p>
            </div>
            <div class="main-text-wallpeper">
              <img src="{{ asset('img/maintext.png') }}">
            </div>
            <div class="additional-text">
              <img src="{{ asset('img/additionaltext.png') }}" class="img-fluid">
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
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                  laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                  ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in
                  hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero
                  eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te
                  feugait nulla facilisi.
                  Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                  laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                  ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                  Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet
                  dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci </p>
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