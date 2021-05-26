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
            <form method="post" action="{{ route('add-car-warranty') }}" enctype="multipart/form-data">
                @csrf
              <div class="input-fields-header-wrapper">
                <div class="input-fields__inner">
                  <h2>Registration Warranty</h2>
                  <p>Please fill out the form to register for Pirelli warranty</p>
                </div>
              </div>
              <div class="errors">
                 @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
              </div>
              <!-- first input groups -->
              <div class="input-fields-header">
                <div class="input-fields-header__inner">
                  <p>Customer Detail</p>
                </div>
                <div class="input-fields-group">
                  <div class="row">

                    <div class="col-xl-6 col-lg-6 col-12">
                      <div class="costum-input input-firstname">
                        <p>First Name</p>
                        <input type="text"  placeholder="First Name" name="first_name" value="{{ old('first_name') }}" />
                      </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-12">
                      <div class="costum-input input-lastname">
                        <p>Last Name</p>
                        <input type="text" placeholder="Last Name" name="last_name" value="{{ old('last_name') }}" />
                      </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-12">
                      <div class="costum-input input-email">
                        <p>Email</p>
                        <input type="email" placeholder="Email" id="email" name="email" value="{{ old('email') }}"/>
                      </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-12">
                      <div class="costum-input input-number">
                        <p>Phone Number</p>
                        <!-- allow only numbers -->
                        <input type="tel" placeholder="+880" name="phone" value="{{ old('phone') }}"
                          oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  />
                      </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-12">
                      <div class="costum-input input-email">
                        <p>City</p>
                        <select id="cars" name="city">
                          <option value="">Select</option>
                          @foreach ($cities as $city)
                          @if (old('city') == $city->name)
                          <option value="{{ $city->name }}" selected>{{ $city->name }}</option>
                          @else
                          <option value="{{ $city->name }}">{{ $city->name }}</option>
                          @endif
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-12">
                      <div class="costum-input input-zip">
                        <p>Zip Code</p>
                        <input type="text" name="zip" placeholder="Zip Code" type="text" id="zipCode" value="{{ old('zip') }}" />
                      </div>
                    </div>


                    <div class="col-xl-12 col-lg-12 col-12">
                      <div class="costum-input input-zip">
                        <p>Address</p>
                        <input type="text" name="address" placeholder="Address" value="{{ old('address') }}" />
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <!-- second input groups -->
              <div class="input-fields-header">
                <div class="input-fields-header__inner">
                  <p>Customer Purchase Detail</p>
                </div>
                <div class="input-fields-group">
                  <div class="row">
                    <div class="col-xl-6 col-lg-6 col-12">
                      <div class="costum-input-dif input-zip">
                        <p>Date Purchased</p>
                        <input class="costum-icon" name="date_purchased" type="date" max="{{ date('Y-m-d') }}" value="{{ old('date_purchased') }}" >
                      </div>
                    </div>
                  </div>
                  <div class="row ">
                    <div class="col-xl-6 col-lg-6 col-12">
                      <div class="costum-input input-email">
                        <p>Invoice Number</p>
                        <input type="text" placeholder="Invoice Number" type="text" id="invoice-number" name="invoice_number" value="{{ old('invoice_number') }}" />
                      </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-12 ">
                      <div class="choose-file_btn">
                        <p>Upload Your Invoice Here</p>
                        <div class="invoice-upload d-flex align-items-center">
                          <button class="btn btn-file costum-style"><input type="file" id="uploadPhoto" name="invoice_attachment"></button>
                        </div>
                      </div>
                    </div>



                    <div class="col-xl-6 col-lg-6 col-12">
                      <div class="costum-input input-product-tyre">
                        <p>Product Name</p>
                        <select id="product-names" name="product_name">
                          <option value="">Please select tyre name</option>
                          @foreach ($products as $product)
                            @if (old('product_name') == $product->name)
                            <option value="{{ $product->name }}" selected>{{ $product->name }}</option>
                            @else
                            <option value="{{ $product->name }}">{{ $product->name }}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>
                    </div>


                    <div class="col-xl-6 col-lg-6 col-12">
                      <div class="costum-input input-product-size">
                        <p>Product Size</p>
                        <select id="product-size" name="product_size">
                          <option value="">Please select tyre size</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-12">
                      <div class="costum-input input-email">
                        <p>Product DOT</p>
                        <input type="text" placeholder="Product DOT" id="ProductDOT" name="product_dot" value="{{ old('product_dot') }}" />
                      </div>
                    </div>


                    <div class="col-xl-6 col-lg-6 col-12">
                      <div class="costum-input input-email">
                        <p>Quantity Purchase</p>
                        <input type="text" placeholder="Quantity Purchase" id="QuantityPurchase" name="quantity_purchased" value="{{ old('quantity_purchased') }}"
                           />
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <!-- third input group -->
              <div class="input-fields-header">
                <div class="input-fields-header__inner">
                  <p>Retailer Detail</p>
                </div>
                <div class="input-fields-group">
                  <div class="row">
                    <div class="col-12">
                      <div class="costum-input input-product-size">
                        <p>Retailer Name</p>
                        <select id="product-size" name="retailer_name" >
                          <option value="">Please select retailer</option>
                          @foreach($retailers as $retailer)
                            @if(old('retailer_name') == $retailer->name)
                            <option value="{{ $retailer->name }}" selected>{{ $retailer->name }}</option>
                            @else
                            <option value="{{ $retailer->name }}">{{ $retailer->name }}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- final input group -->
              <div class="final-input-groups">
                <div class="row">
                  <div class="col-12">
                    <div class="form-check form-check-inline form-costum-styles">
                      <input class="form-check-input" name="terms" type="checkbox" id="inlineCheckbox1" checked="<?php old('terms') == 1 ? 'checked': '' ?>">
                      <label class="form-check-label label-costum" for="inlineCheckbox1">I have read and agree to the terms
                        and conditions and privacy policy of Pirelli Bangladesh.</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-check form-check-inline form-costum-styles">
                      <input class="form-check-input costum-checkbox" name="subscribe" type="checkbox" id="inlineCheckbox2"
                      checked="<?php old('subscribe') == 1 ? 'checked': '' ?>">
                      <label class="form-check-label label-costum" for="inlineCheckbox2"><b>Sign up for timely promotions,
                        reminders and tyre guide</b> <br> We value our customers and will not spam or share your details with
                        third parties</label>
                    </div>
                  </div>
                </div>
              </div>


              <div class="final-step-btn">
                <button class="costum-btn btn-confirm" type="submit">Complete Warranty Registration</button>
              </div>

            </form>
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
