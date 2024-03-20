@extends('layouts.main')

@section('content')
<section class="cover-layout">
    <div class="container-costum">
        <div class="cover-wrapper">
            <div class="cover-wrapper__inner cover_wrapper_second-template">
                <div class="logo">
                    <img src="{{ asset('img/logo.png') }}" class="img-fluid" />
                    <p>WARRANTY REGISTRATION FORM</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="input-fileds">
    <div class="container container-costum-margin">
        <div class="row">

            <div class="col-xl-7 col-lg-7 col-12">
                <form method="post" action="{{ route('claim-car-warranty') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="input-fields-header-wrapper">
                        <div class="input-fields__inner">
                            @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                            @endif
                            <h2>Warranty Registration Application Form</h2>
                            <p>Please fill out the form to Register Pirelli warranty</p>
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
                                        <input type="text" placeholder="First Name" name="first_name" value="{{ old('first_name') }}" />
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
                                        <input type="email" placeholder="Email" id="email" name="email" value="{{ old('email') }}" />
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-12">
                                    <div class="costum-input input-number">
                                        <p>Phone Number</p>
                                        <!-- allow only numbers -->
                                        <input type="tel" placeholder="+880" name="phone" value="{{ old('phone') }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
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
                    <!-- first input groups -->
                    <div class="input-fields-header">
                        <div class="input-fields-header__inner">
                            <p>Customer Purchase Detail</p>
                        </div>
                        <div class="input-fields-group">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <div class="costum-input-dif input-zip">
                                        <p>Date Purchased</p>
                                        <input class="costum-icon" name="date_purchased" type="date" max="{{ date('Y-m-d') }}" value="{{ old('date_purchased') }}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <div class="costum-input input-email">
                                        <p>Invoice Number</p>
                                        <input type="text" placeholder="Invoice Number" type="text" id="invoice-number" name="invoice_number" value="{{ old('invoice_number') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-xl-6 col-lg-6 col-12 ">
                                    <div class="choose-file_btn">
                                        <p>Upload Your Invoice Here</p>
                                        <div class="invoice-upload d-flex align-items-center">
                                            <input class="btn btn-file costum-style" type="file" id="uploadInvoice" name="invoice_attachment">
                                            {{-- <button class="btn btn-file costum-style"></button>--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 ">
                                    <div class="choose-file_btn">
                                        <p>Upload Photos</p>
                                        <div class="invoice-upload d-flex align-items-center">
                                            <input class="btn btn-file costum-style" type="file" id="uploadPhoto" name="photos[]" accept="image/*" multiple>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-12">
                                    <div class="costum-input input-product-tyre">
                                        <p>Product Name</p>
                                        <select id="product-names" name="product_name_id">
                                            <option value="">Please select tyre name</option>
                                            @foreach ($products as $product)
                                            @if (old('product_name_id') == $product->id)
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
                                        <select id="product-size" name="product_size_id" class="form-control select2">
                                            <option value="">Please select tyre size</option>
                                            @foreach ($tyreSizes as $tyreSize)
                                            @if (old('product_size_id') == $tyreSize->id)
                                            <option value="{{ $tyreSize->id }}" selected>{{ $tyreSize->size }}</option>
                                            @else
                                            <option value="{{ $tyreSize->id }}">{{ $tyreSize->size }}</option>
                                            @endif
                                            @endforeach
                                        </select>
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
                                        <select id="retailer" name="retailer_id">
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
                                    <input class="form-check-input" name="terms" type="checkbox" id="inlineCheckbox1" checked="<?php old('terms') == 1 ? 'checked' : '' ?>">
                                    <label class="form-check-label label-costum" for="inlineCheckbox1">I have read and agree to the terms
                                        and conditions and privacy policy of Pirelli Bangladesh.</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check form-check-inline form-costum-styles">
                                    <input class="form-check-input costum-checkbox" name="subscribe" type="checkbox" id="inlineCheckbox2" checked="<?php old('subscribe') == 1 ? 'checked' : '' ?>">
                                    <label class="form-check-label label-costum" for="inlineCheckbox2"><b>Sign up for timely promotions,
                                            reminders and tyre guide</b> <br> We value our customers and will not spam or share your details with
                                        third parties</label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="final-step-btn">
                        <button class="costum-btn btn-confirm" type="submit">REGISTER NOW</button>
                    </div>

                </form>
            </div>


            <div class="col-xl-5 col-lg-5 col-12">

                {{-- Accordion --}}
                <div class="container">
                    <h1 class="warranty-info-title">PIRELLI® TYRE WARRANTY POLICY </h1>
                    <div id="accordion" class="py-5">
                        <div class="card border-0">
                            <div class="card-header p-0 border-0" id="heading-239">
                                <button class="btn btn-link accordion-title border-0 collapse" data-toggle="collapse" data-target="#collapse-239" aria-expanded="false" aria-controls="#collapse-239"><i class="fas fa-plus text-center d-flex align-items-center justify-content-center h-100"></i>FOR REPLACEMENT PASSENGER TIRES </button>
                            </div>
                            <div id="collapse-239" class="collapse" aria-labelledby="heading-239" data-parent="#accordion">
                                <div class="card-body accordion-body">
                                    <p>Pirelli Tyre Suisse SA. warrants that all Pirelli brand products, supplied either directly or through an authorized Pirelli Dealer and which are mounted on passenger cars, vans, and SUVs within Bangladesh have been supplied without manufacturing or materials defects which render the products unsuitable for the use for which products of the same type are normally used and will be accepted for examination by an authorized Pirelli technician.</p>

                                    <p>This limited warranty policy provides for tire replacement under specified conditions. This policy applies to tires used in normal road service displaying warrantable conditions. Tires that become unserviceable or wear out because of neglect or mistreatment are excluded from Pirelli warranty coverage.</p>

                                </div>
                            </div>
                        </div>
                        <div class="card border-0 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                            <div class="card-header p-0 border-0" id="heading-240">
                                <button class="btn btn-link accordion-title border-0 collapsed" data-toggle="collapse" data-target="#collapse-240" aria-expanded="false" aria-controls="#collapse-240"><i class="fas fa-plus text-center d-flex align-items-center justify-content-center h-100"></i>WHAT IS NOT WARRANTED </button>
                            </div>
                            <div id="collapse-240" class="collapse " aria-labelledby="heading-240" data-parent="#accordion">
                                <div class="card-body accordion-body">
                                    <h3>Tires under the below condition are excluded from the warranty claim:</h3>

                                    <ul>
                                        <li>Tyres transferred from the original vehicle on which they were originally installed.</li>
                                        <li>Tyres which have been re-treaded, re-grooved or repaired by a third party.</li>
                                        <li>Tyres with punctures and accidental damage repairs.</li>
                                        <li>Tyres which have been modified by the addition or removal of material or any tyre intentionally altered to change its appearance.</li>
                                        <li>Tyres injected with liquid balancer or sealant or in which anything other than air or nitrogen has been used as a support medium.</li>
                                        <li>Tyres used in racing or other competitive motor sport events.</li>
                                        <li>Tyre un-serviceability caused by tyre operation in excess of tyre / wheel manufacturer’s specifications and recommendations, including insufficient speed rating, load index, undersized or oversized tyres, application of use.</li>
                                        <li>Ride or vehicle vibration related anomalies where the vehicle concerned is not also made available for examination.</li>
                                        <li>Tyres which became unserviceable because of a mechanical irregularity in the vehicle such as misalignment, defective brakes, defective shock absorbers, or improper wheel rims.</li>
                                        <li>Tyres which have reached the minimum legal tread depth.</li>
                                        <li>Tyres damaged by fire, climatic factors, chemical corrosion, vandalism, accidents, snow chains, theft, run whilst flat, under-inflated, over-inflated or abused during servicing.</li>
                                        <li>Flat spotting caused by improper transport or storage.</li>
                                        <li>Tyres which become unserviceable because of road hazard damage (e.g. nails, glass, metal objects) or other penetrations or snags, bruises or impact damage.</li>
                                        <li>Tyres damaged from improper mounting / demounting practices.</li>
                                        <li>Tyre Dealer / Retailer services (e.g. mounting / dismounting, balancing, tyre rotation or wheel alignment).</li>
                                        <li>Tyres whose trademark, serial number or DOT are worn off or show signs of having been tampered with.</li>
                                        <li>A tyre is considered to have delivered its original usable tread and its warranty ends when at least one Tread Wear Indicator (T.W.I.) becomes visible, regardless of age or mileage. The TWI’s indicate the legal minimum tread depth of 1.6mm for passenger Car, Van & SUV tyres.</li>
                                        <li>Tires used on a vehicle towing a trailer.</li>
                                        <li>Labor to install a replacement tire.</li>
                                        <li>Claims for irregular wear or fast wear.</li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                {{-- End Accordion --}}






                <div class="terms-policy">
                    <div class="terms-policy-header d-flex justify-content-center">
                        <p style="font-size:20px;"> Find out More <br>Warranty Claim Guidelines</p>
                    </div>
                    <div class="description-text">

                    </div>

                    <div class="find-out-more-btn">

                        <a style="text-align:center;" href="{{asset('Pirelli Tyre Warranty Policy PDF - Download 1111.pdf')}}">
                            <button class="costum-btn">Download Manuals</button>
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

@section('styles')
<style>
    .warranty-info-title {
        color: #fff;
        font-size: 30px;
    }

    #accordion .card-header {
        margin-bottom: 8px;
    }

    #accordion .accordion-title {
        position: relative;
        display: block;
        padding: 15px 0 15px 50px;
        background: #4d4d4d;
        /* border-radius: 8px; */
        overflow: hidden;
        text-decoration: none;
        color: #fff;
        font-size: 12px;
        font-weight: 500;
        width: 100%;
        text-align: left;
        transition: all 0.4s ease-in-out;
    }

    #accordion .accordion-title i {
        position: absolute;
        width: 40px;
        height: 100%;
        left: 0;
        top: 0;
        color: #fff;
        background: radial-gradient(rgba(33, 55, 68, 0.8), #213744);
        text-align: center;
        border-right: 1px solid transparent;
    }

    #accordion .accordion-title:hover {
        padding-left: 60px;
        background: #ffdc04;
        color: #fff;
    }

    #accordion .accordion-title:hover i {
        border-right: 1px solid #fff;
    }

    #accordion [aria-expanded="true"] {
        background: #ffdc04;
        color: #000;
    }

    #accordion [aria-expanded="true"] i {
        color: #000;
        background: #ffdc04;
    }

    #accordion [aria-expanded="true"] i:before {
        content: "\f068";
    }

    #accordion .accordion-body {
        padding: 40px 55px;
    }
</style>
@endsection
@section('scripts')
<script type="text/javascript">
    var baseUrl = "{{ URL::to('/')}}";
    jQuery(function() {


        $('#product-names-stop').on('change', function() {
            let productId = $('#product-names').val();
            console.log(productId);

            let option = '<option value="" hidden>Please select tyre size</option>';
            $('#product-size').html(option);

            $.ajax({
                url: `/product-sizes/${productId}`,
                success: function(data) {
                    $.each(data, function(key, obj) {
                        console.log(obj)
                        $('#product-size').append('<option value=' + obj.id + '>' + obj.size + '</option>');
                    });
                }
            })
        });


        $('#invoice-number').focusout(function() {
            $(this).css("background-color", "#FFFFFF");
            let invoiceNo = $('#invoice-number').val();

            $.ajax({
                url: `/car-invoice/${invoiceNo}`,
                success: function(data) {



                    $('#product-names').html('<option value=' + data.product_name.id + '>' + data.product_name.name + '</option>');
                    $('#product-size').html('<option value=' + data.product_size.id + '>' + data.product_size.size + '</option>');
                    $('#retailer').html('<option value=' + data.retailer.id + '>' + data.retailer.name + '</option>');
                    // $.each(data, function(key, obj)
                    // {
                    //
                    //     $('#product-names').html('<option value=' + obj.product_name.id + '>' + obj.product_name.name + '</option>');
                    // });
                }
            })

        });




    });
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endsection
