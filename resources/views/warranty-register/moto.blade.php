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
                          <button class="form-control-file"><input type="file" id="uploadPhoto" name="invoice_attachment"></button>
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
                  <pre><p align="center"><strong><u>Tyre Claim Policy</u></strong></p><p>Pirelli Tyre Suisse SA. warrants that all Pirelli brand products, supplied either directly or through an authorized Pirelli Dealer and which are mounted on passenger cars, vans, and SUVs within Bangladesh have been supplied without manufacturing or materials defects which render the products unsuitable for the use for which products of the same type are normally used and will be accepted for examination by an authorized Pirelli technician for a period mentioned below:</p></pre>
                  <table border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                      <tr>
                          <td>
                          </td>
                          <td>

                                  Tyres sold from tyre manufacturing date

                          </td>
                          <td>

                                  Warranty Period

                          </td>
                      </tr>
                      <tr>
                          <td>

                                  (a)

                          </td>
                          <td>

                                  Within 6 Months

                          </td>
                          <td>

                                  Up to 6 Months from the date of purchase or till the
                                  exposure of the tread

                          </td>
                      </tr>
                      <tr>
                          <td width="37" valign="bottom">
                          </td>
                          <td width="236" valign="bottom">
                          </td>
                          <td width="385" valign="bottom">
                              <p>
                                  wear indicator. Whichever is earlier irrespective of
                                  kilometer covered.
                              </p>
                          </td>
                      </tr>
                      </tbody>
                  </table>
                  <p>
                      At the end of the relevant periods stated above, all warranties, express or
                      implied are terminated.
                  </p>
                  <p>
                      Claim will be attended only when presented with the tyre purchase bill/
                      warranty card in original.
                  </p>
                  <p>
                      The warranty shall apply on condition that; Pirelli Tyre Suisse SA, have
                      received a tyre examination request / claim form, completed in all its
                      parts and has submitted the product for technical examination by authorized
                      Pirelli technicians.
                  </p>
                  <p>
                      <strong><u>Exclusions:</u></strong>
                  </p>
                  <>
                      1) Tyres transferred from the original vehicle on which they were
                      originally installed.
                  </li>
                  <li>
                      2) Tyres which have been re-treaded, re-grooved or repaired by a third
                      party.
                  </li>
                  <li>
                      3) Tyres with Punctures and accidental damage repairs.
                  </li>
                  <li>
                      4) Tyres which have been modified by the addition or removal of material or
                      any tyre intentionally altered to change its appearance.
                  </li>
                  <li>
                      5) Tyres injected with liquid balancer or sealant or in which anything
                      other than air or nitrogen has been used as a support medium.
                  </li>
                  <li>
                      6) Tyres used in racing or other competitive motor sport events.
                  </li>
                  <li>
                      7) Tyre un-serviceability caused by tyre operation in excess of tyre /
                      wheel manufacturer’s specifications and recommendations, including
                      insufficient speed rating, load index, undersized or oversized tyres,
                      application of use.
                  </li>
                  <li>
                      8) Ride or vehicle vibration related anomalies where the vehicle concerned
                      is not also made available for examination.
                  </li>
                  <li>
                      9) Tyres which became unserviceable because of a mechanical irregularity in
                      the vehicle such as misalignment, defective brakes, defective shock
                      absorbers, or improper wheel rims.
                  </li>
                  <li>
                      10) Tyres which have reached the minimum legal tread depth.
                  </li>
                  <li>
                      11) Tyres damaged by fire, climatic factors, chemical corrosion, vandalism,
                      accidents, snow chains, theft, run whilst flat, under-inflated,
                      over-inflated or abused during servicing.
                  </li>
                  <li>
                      12) Flat spotting caused by improper transport or storage.
                  </li>
                  <li>
                      13) Tyres which become unserviceable because of road hazard damage (eg.
                      nails, glass, metal objects) or other penetrations or snags, bruises or
                      impact damage.
                  </li>
                  <li>
                      14) Tyres damaged from improper mounting / demounting practices.
                  </li>
                  <li>
                      15) Tyre Dealer / Retailer services (eg. mounting / dismounting, balancing,
                      tyre rotation or wheel alignment).
                  </li>
                  <li>
                      16) Tyres whose trademark, serial number or DOT are worn off or show signs
                      of having been tampered with.
                  </li>
                  <li>
                      17) A tyre is considered to have delivered it’s original usable tread and
                      it’s warranty ends when at least one Tread Wear Indicator (T.W.I.) becomes
                      visible, regardless of age or mileage. The TWI’s indicate the legal minimum
                      tread depth of 1.6mm for passenger Car, Van &amp; SUV tyres.
                  </li>
                  <p>
                      This is the only express warranty given by Pirelli Tyre Suisse SA, and does
                      not make any other express warranty or any implied warranty of
                      merchantability or fitness for a particular purpose. This warranty cannot
                      be changed by any other person, including authorized Pirelli Dealers or
                      Vehicle Manufacturers or Vehicle Dealers to create any other obligation in
                      connection with Pirelli brand tyres.
                  </p>
                  <p>
                      Pirelli Tyre Suisse SA will not do anything other than what is stated in
                      this warranty if an anomaly is found to exist. All other remedies are
                      excluded, including any obligation or liability on the part of Pirelli Tyre
                      Suisse SA for consequential or incidental damages (such as loss of use of a
                      vehicle, loss of time or inconvenience) arising out of an anomaly, as far
                      as the law permits.
                  </p>
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
                            console.log(obj)
                            $('#product-size').append('<option value=' + obj.size + '>' + obj.size + '</option>');
                        });
                    }
                })
            });
        });
    </script>
    @endsection
