@extends('layouts.main')

@section('content')
<section class="cover-layout">
      <div class="container-costum">
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
            <form method="post" action="{{ route('add-moto-warranty') }}" enctype="multipart/form-data">
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
                          @if (old('city') == $city->id)
                          <option value="{{ $city->id }}" selected>{{ $city->name }}</option>
                          @else
                          <option value="{{ $city->id }}">{{ $city->name }}</option>
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
                        <select id="product-names" name="product_id">
                          <option value="">Please select tyre name</option>
                          @foreach ($products as $product)
                            @if (old('product_id') == $product->id)
                            <option value="{{ $product->id }}" selected>{{ $product->name }}</option>
                            @else
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
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
                        <select id="retailer" name="retailer_id" >
                          <option value="">Please select retailer</option>
                          @foreach($retailers as $retailer)
                            @if(old('retailer_id') == $retailer->id)
                            <option value="{{ $retailer->id }}" selected>{{ $retailer->name }}</option>
                            @else
                            <option value="{{ $retailer->id }}">{{ $retailer->name }}</option>
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
                <button class="costum-btn btn-confirm" type="submit">Complete Registration</button>
              </div>

            </form>
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

@section('scripts')
        <script type="text/javascript">

        var baseUrl = "{{ URL::to('/')}}";
        jQuery(function () {
            $('#product-names').on('change', function () {
                let productId = $('#product-names').val();
                console.log(productId);

                let option = '<option value="" hidden>Please select tyre size</option>';
                $('#product-size').html(option);

                $.ajax({
                    url: `/product-sizes/${productId}`,
                    success: function (data) {
                        $.each(data, function(key, obj)
                        {
                           
                           
                             $('#product-size').append('<option value=' + obj.id + '>' + obj.width.width + '/' + obj.ratio.ratio + ' R' + obj.size.size + '</option>');
                        });
                    }
                })
            });
        });
    </script>
    @endsection
