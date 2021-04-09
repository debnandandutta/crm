@extends('dashboard.master')
@inject('permission', 'App\Http\Controllers\PermissionController')
@section('title', __('lang.add_new_case'))
@section('style')
    <style>

        @media screen and (min-width: 768px) {
    .modal-dialog {
    width: 700px; /* New width for default modal */
    }
    .modal-sm {
    width: 350px; /* New width for small modal */
    }
    }
    @media screen and (min-width: 992px) {
    .modal-lg {
    width: 950px; /* New width for large modal */
    }
    }
        </style>

        @endsection
@section('main-section')
    <div class="container-fluid">
        @if($permission->manageTicket() == 1)
            <h4 class="page-title">{{ __('lang.add_new_case') }}
                <a href="{{ route('dashboard') }}" class="btn btn-primary pull-right">{{ __('lang.back') }}</a>
            </h4>
            <div class="row">
                <div class="col-md-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <form role="form" autocomplete="off" class="form form-horizontal" method="POST" action="{{route('save-enquiry')}}">
                        {!! csrf_field() !!}
                        <input type="hidden" class="form-control" name="enquiry_id" id="enquiry_id" value="{{$token}}">

                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="card-text">
                                        <h5 class="form-section-block">
                                            Caller's Information</h5>
                                    </div>

                                        <div class="form-body">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="callerinput1" class="required">Name</label>
                                                        <input class="form-control border-primary" autocomplete="off" type="text" placeholder="Enter Name" id="callerName" required name="callerName">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="callerinput2">Shop Name</label>
                                                        <input class="form-control border-primary" autocomplete="off" type="text" name="shopName" id="shopName" placeholder="Enter Shop Name" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="callerinput3" class="required">Mobile 1</label>
                                                        <input class="form-control border-primary" autocomplete="off" type="text" placeholder="Enter Mobile Number" required name="mobileOne" id="mobileOne">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="callerinput4">Mobile 2</label>
                                                        <input class="form-control border-primary" autocomplete="off" type="text"  placeholder="Enter Enter Mobile Number" name="mobileTwo" id="mobileTwo">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="callerinput3" >Address</label>
                                                        <input class="form-control border-primary" autocomplete="off" type="text"  required name="address" id="address">
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                </div>
                            </div>
                        </div>
                    {{--    location info--}}
                        <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="card-text">
                                            <h5 class="form-section-block">
                                                Location Information</h5>
                                        </div>

                                        <div class="form-body">

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="location1" class="">Region</label>
                                                        <select id="region" name="region" required class="form-control">
                                                            <option value=""  disabled="">--Select Region--</option>
                                                            @foreach ($regions as $region)
                                                                <option data-region="{{ $region->title }}" value="{{ $region->id }}" {{  $region->id==6 ? 'selected' : '' }}>{{ $region->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="location2" class="">Area</label>
                                                        <select id="area" name="area"  class="form-control">
                                                            <option value="" selected="" disabled="">Select Area</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="location3">Territory</label>
                                                        <select id="territory" name="territory" class="form-control">
                                                            <option value="" selected="" disabled="">Select Territory</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="location4">Town</label>
                                                        <select id="town" name="town" class="form-control">
                                                            <option value="" selected="" disabled="">Select Town</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                   {{--    TM info--}}
                        <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="card-text">
                                            <h5 class="form-section-block">
                                                TM Information</h5>
                                        </div>

                                        <div class="form-body">

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="position-relative has-icon-left">
                                                        <input type="date" class="form-control" name="expiry" id="expiry">
                                                        <div class="form-control-position">
                                                            <i class="ft-message-square"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" id="tm1">
                                                        <input type="hidden" class="form-control" name="tm" id="tm" value="0">
                                                    </div>
                                                </div>

                                                <div class="col-md-5">
                                                    <div class="form-group">


                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                     {{--    Call info--}}
                        <div class="card">
                         <div class="card-content">
                                    <div class="card-body">
                                        <div class="card-text">
                                            <h5 class="form-section-block">
                                                 Description</h5>
                                        </div>

                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="callerType" class="required">Caller Type</label>
                                                        <select id="callerType" required name="callerType" class="form-control callType">
                                                            <option value="Consumer"  >Consumer</option>
                                                            <option value="Retailer" selected="">Retailer</option>
                                                          </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">

                                                </div>
                                                <div class="col-md-4">

                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="complain1" class="required"> Description</label>
                                                        <textarea  rows="5" class="kb-desc textarea my-editor"  name="description" id="description" placeholder="Enter Description"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="complain2" class="required">Call Type</label>
                                                        <select id="callType" required name="callType" class="form-control callType">
                                                            <option value="" selected="" disabled="">--Select Call Type--</option>
                                                            @foreach ($callType as $call)
                                                                <option data-call="{{ $call->name }}" value="{{ $call->id }}" {{ $call->selected === 1 ? 'selected' : '' }}>{{ $call->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="complain3">Complain Type</label>
                                                        <select  name="complainType" id="complainType" class="form-control">
                                                            <option value="" selected="" disabled="">--Select Complain Type--</option>
                                                            @foreach ($complainType as $call)
                                                                <option data-complain="{{ $call->name }}" value="{{ $call->id }}" {{ old('complainType') === $call->id ? 'selected' : '' }}>{{ $call->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="complain4">Store Type</label>
                                                        <select id="store" name="store" class="form-control">
                                                            <option value="" selected="" disabled="">--Select Store--</option>
                                                            <option value="pollydut">Pollydut</option>
                                                            <option value="retailer">Retailer</option>
                                                            <option value="wholesale">Whole Sale</option>
                                                            <option value="productstore">Product Store</option>

                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="callerinput1">DSR Name</label>
                                                        <input class="form-control border-primary" type="text" placeholder="Enter Name" name="dsrName" id="dsrName">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="complain5" class="required">Brand</label>
                                                        <select id="department_id" required name="department_id" class="form-control">
                                                            <option value="" selected="" disabled="">--Select Brand--</option>
                                                            @foreach ($brands as $brand)
                                                                <option value="{{ $brand->id }}" data-brand="{{ $brand->title }}" {{ old('department_id') === $brand->id ? 'selected' : '' }}>{{ $brand->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="complain7">Status</label>
                                                        <select id="status" name="status" class="form-control">
                                                            <option value="open">Open</option>
                                                            <option value="closed">Closed</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="card-text">
                                            <h5 class="form-section-block">
                                                Preferrence</h5>
                                        </div>

                                        <div class="form-body">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="position-relative has-icon-left">
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" checked id="customRadioInline1" name="preferrence" value="0" class="custom-control-input">
                                                            <label class="custom-control-label" for="customRadioInline1">Submit as a Case</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="customRadioInline2" name="preferrence" value="1" class="custom-control-input">
                                                            <label class="custom-control-label" for="customRadioInline2">Submit As a Ticket</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">


                                                    </div>
                                                </div>


                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="card-text">

                                        </div>




                                        <div class="form-actions right">
                                            <button type="button" class="btn btn-danger mr-1">
                                                <i class="ft-x"></i> Cancel
                                            </button>
                                            <button type="submit" id="submitCase" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> Save As Case
                                            </button>
											
											<button type="button" id="submitTicket" style="display: none;" class="btn btn-warning" onclick="getInputValue();">
                                                <i class="la la-check-square-o"></i> Save As Ticket
                                            </button>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="modal" id="my_modal">
                <div class="modal-dialog modal-dialog-centered">
                    <form role="form" class="form form-horizontal" method="POST" action="{{route('save-enquiry')}}">
                        {!! csrf_field() !!}
                          <div class="modal-content shadow-lg p-3 mb-5 bg-white rounded">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h5 class="modal-title">Dear Agent You have raised a ticket with this following Information</h5>
                            <button type="button" class="close modelClose" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">

                                <input type="hidden" class="form-control" name="enquiry_id" id="enquiry_idM" value="">
                            <input type="hidden"  name="preferrence" value="1" >
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="callerinput1" class="required">Name</label>
                                                <input class="form-control-plaintext border-primary" type="text" readonly value="" id="callerNameM" required name="callerName">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="callerinput2">Shop Name</label>
                                                <input class="form-control-plaintext border-primary" type="text" readonly name="shopName" id="shopNameM"  value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="callerinput3" class="required">Mobile 1</label>
                                                <input class="form-control-plaintext border-primary" type="text" readonly value="" id="mobileOneM" required name="mobileOne">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="callerinput4">Mobile 2</label>
                                                <input class="form-control-plaintext border-primary" type="text" readonly name="mobileTwo" id="mobileTwoM"  value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="callerinput5" class="required">Address</label>
                                                <input class="form-control-plaintext border-primary" type="text" readonly value="" required name="address" id="addressM">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="callerinput3" class="required">Region</label>
                                                <input class="form-control-plaintext border-primary" type="text" readonly value=""  id="regionM" required >
                                                <input class="form-control-plaintext border-primary" type="hidden" readonly value=""  id="regionH" name="region" required >

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="callerinput4" class="required">Area</label>
                                                <input class="form-control-plaintext border-primary" type="text" readonly id="areaM"  value="">
                                                <input class="form-control-plaintext border-primary" type="hidden" readonly value=""  id="areaH" name="area" required >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="callerinput3" >Territory</label>
                                                <input class="form-control-plaintext border-primary" type="text" readonly value=""  id="territoryM" required name="territory">
                                                <input class="form-control-plaintext border-primary" type="hidden" readonly value=""  id="territoryH" name="territory" required >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="callerinput4">Town</label>
                                                <input class="form-control-plaintext border-primary" type="text" readonly  id="townM"  value="">
                                                <input class="form-control-plaintext border-primary" type="hidden" readonly value=""  id="townH" name="town" required >
                                            </div>
                                        </div>
                                    </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                            <input class="form-control-plaintext border-primary" type="hidden" readonly value=""  name="tm" id="tmH">
                            <input class="form-control-plaintext border-primary" type="hidden" readonly value=""  name="expiry" id="expiryH">
                                    </div>
                                </div>
                            </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="callerinput10" class="required">Description</label>

                                                <input class="form-control-plaintext border-primary" type="text" readonly value=""  name="description" id="descriptionMT">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="callerinput3" class="required">Caller Type</label>
                                            <input class="form-control-plaintext border-primary" type="text" readonly value="" name="callerType" id="callerTypeM"  >
                                           
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="callerinput3" class="required">Call Type</label>
                                            <input class="form-control-plaintext border-primary" type="text" readonly value="" id="callTypeM"  >
                                            <input class="form-control-plaintext border-primary" type="hidden" readonly value=""  id="callTypeH" name="callType" required >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="callerinput4" class="required">Complain Type</label>
                                            <input class="form-control-plaintext border-primary" type="text" readonly name="complainType" id="complainTypeM"  value="">
                                            <input class="form-control-plaintext border-primary" type="hidden" readonly value=""  id="complainTypeH" name="complainType" required >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="callerinput3" >Store</label>
                                            <input class="form-control-plaintext border-primary" type="text" readonly value="" id="storeM"  name="store">
                                        </div>
                                    </div>
                                </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="callerinput3" class="required">DSR Name</label>
                                                <input class="form-control-plaintext border-primary" type="text" readonly value="" id="dsrNameM"  name="dsrName">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="callerinput4" class="required">Brand</label>
                                                <input class="form-control-plaintext border-primary" type="text" readonly  id="brandM"  value="">
                                                <input class="form-control-plaintext border-primary" type="hidden" readonly  id="brandH" name="department_id"  value="">

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="callerinput3" >Status</label>
                                                <input class="form-control-plaintext border-primary" type="text" readonly value="" id="statusM"  name="status">
                                            </div>
                                        </div>
                                    </div>

                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" id="SubmitTicketAssignedForm">Update</button>
                            <button type="button" class="btn btn-danger modelClose" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>

            <script type="text/javascript">
                function getInputValue(){
                    // Selecting the input element and get its value
                    var enquiry_id = document.getElementById("enquiry_id").value;
                    var callerName = document.getElementById("callerName").value;
                    var shopName = document.getElementById("shopName").value;
                    var mobileOne = document.getElementById("mobileOne").value;
                    var mobileTwo = document.getElementById("mobileTwo").value;
                    var tm = document.getElementById("tm").value;
                    var expiry = document.getElementById("expiry").value;
                    var address = document.getElementById("address").value;
                    var region = $('select#region').find(':selected').data('region');
                        var regionV = document.getElementById("region").value;
                    var area = $('select#area').find(':selected').data('area');
                         var areaV = document.getElementById("area").value;
                    var territory = $('select#territory').find(':selected').data('territory');
                        var territoryV = document.getElementById("territory").value;
                    var town = $('select#town').find(':selected').data('town');
                         var townV = document.getElementById("town").value;
                    var description = document.getElementById("description").value;

                   var callType=  $('select#callType').find(':selected').data('call');
                       var callTypeV = document.getElementById("callType").value;
                   var complainType=  $('select#complainType').find(':selected').data('complain');
                       var complainTypeV = document.getElementById("complainType").value;
                   var brandT=  $('select#department_id').find(':selected').data('brand');
                         var brandV = document.getElementById("department_id").value;
                    var callerTypeV = document.getElementById("callerType").value;
                    var store = document.getElementById("store").value;
                    var dsr = document.getElementById("dsrName").value;
                    var status = document.getElementById("status").value;
                    console.log(dsr);
                    console.log(brandV);
                    console.log(status);
                    if (callerName !== '' && mobileOne !== '' && address !== '' && region !== '' &&
                        area !== '' && description !== '' && callType !== '' &&  brandT !== '')
                        $('#my_modal').modal('show');
                    else
                        alert("Please fill Mandotory Feilds");


                    $("#my_modal .modal-body #enquiry_idM").val( enquiry_id );
                    $("#my_modal .modal-body #callerNameM").val( callerName );
                    $("#my_modal .modal-body #shopNameM").val( shopName );
                    $("#my_modal .modal-body #mobileOneM").val( mobileOne );
                    $("#my_modal .modal-body #mobileTwoM").val( mobileTwo );
                    $("#my_modal .modal-body #addressM").val( address );
                    $("#my_modal .modal-body #regionM").val( region );
                    $("#my_modal .modal-body #regionH").val( regionV );
                    $("#my_modal .modal-body #areaM").val( area );
                    $("#my_modal .modal-body #areaH").val( areaV );
                    $("#my_modal .modal-body #territoryM").val( territory );
                    $("#my_modal .modal-body #territoryH").val( territoryV );
                    $("#my_modal .modal-body #townM").val( town );
                    $("#my_modal .modal-body #townH").val( townV );
                    $("#my_modal .modal-body #tmH").val( tm );
                    $("#my_modal .modal-body #expiryH").val( expiry );
                    $("#my_modal .modal-body #descriptionMT").val( description );

                    $("#my_modal .modal-body #callerTypeM").val( callerTypeV );
                    $("#my_modal .modal-body #callTypeM").val( callType );
                    $("#my_modal .modal-body #callTypeH").val( callTypeV );

                    $("#my_modal .modal-body #complainTypeM").val( complainType );
                    $("#my_modal .modal-body #complainTypeH").val( complainTypeV );
                    $("#my_modal .modal-body #storeM").val( store );
                    $("#my_modal .modal-body #brandM").val( brandT );
                    $("#my_modal .modal-body #brandH").val( brandV );
                    $("#my_modal .modal-body #statusM").val( status );
                    $("#my_modal .modal-body #dsrNameM").val( dsr );

                }




            </script>
        @else
            <div class="callout callout-warning">
                <h4>{{ __('lang.access_denied') }}</h4>

                <p>{{ __("lang.don't have permission") }}</p>
            </div>
        @endif
    </div>
@endsection
@section('js')
			<script src="{{asset('tinymce/tinymce.min.js')}}"></script>
			<script src="{{asset('tinymce/script.js')}}"></script>
		@stop