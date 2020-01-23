@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Payment</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if($pdata->community->id == 1)
                        Fee Amount : <b>₹300</b><br>
                        Category : <b>{{ $pdata->community->type }}</b> 
                    @elseif($pdata->community->id == 2)
                        Fee Amount : <b>₹300</b><Br>
                        Category : <b>{{ $pdata->community->type }}</b>
                    @elseif($pdata->community->id == 3)
                        Fee Amount : <b>₹200</b><br>
                        Category : <b>{{ $pdata->community->type }}</b>
                    @else
                        Fee Amount : <b>₹150</b><br>
                        Category : <b>{{ $pdata->community->type }}</b>
                    @endif
                    <hr>
                    @if(is_null($payment))
                    <b>Payment Mode :</b>
                    <form method="POST" id="payment" action="{{ url('/register/5') }}">
                        @csrf
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="payment_mode" id="payment_mode1" value="1" disabled>
                      <label class="form-check-label" for="payment_mode1">
                        Debit/Credit Card
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="payment_mode" id="payment_mode2" value="2">
                      <label class="form-check-label" for="payment_mode2">
                        UPI VPA
                      </label>
                    </div>

                    <div class="form-group row" id="vpa_field" style="display: none;">
                        <label for="vpa" class="col-md-4 col-form-label text-md-right">Your VPA/UPI ID : </label>
                        <div class="col-md-6">
                            <input id="vpa" type="text" class="form-control @error('vpa') is-invalid @enderror" name="vpa" autofocus>
                        </div>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="payment_mode" id="payment_mode4" value="4">
                      <label class="form-check-label" for="payment_mode4">
                        Paytm UPI
                      </label>
                    </div>

                    <div class="form-group row box" id="paytm_field" style="display: none;">
                        <label for="paytm" class="col-md-4 col-form-label text-md-right">Your Paytm Number : </label>
                        <div class="col-md-6">
                            <input id="paytm" type="text" class="form-control @error('paytm') is-invalid @enderror" name="paytm" autofocus>
                        </div>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="payment_mode" id="payment_mode5" value="5">
                      <label class="form-check-label" for="payment_mode5">
                        PhonePe UPI
                      </label>
                    </div>

                    <div class="form-group row box" id="phonepe_field" style="display: none;">
                        <label for="phonepe" class="col-md-4 col-form-label text-md-right">Your PhonePe Number : </label>
                        <div class="col-md-6">
                            <input id="phonepe" type="text" class="form-control @error('phonepe') is-invalid @enderror" name="phonepe" autofocus>
                        </div>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="payment_mode" id="payment_mode3" value="3" checked>
                      <label class="form-check-label" for="payment_mode3">
                        Challan
                      </label>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-outline-primary btn-sm pull-right">
                        Proceed to Pay
                    </button>
                    </form>
                    @else
                        @if($payment->status == 0)
                            @if($payment->mode == 'UPI')
                                UPI Details<br>
                                Organization Name : <b>Navya Foundation</b><br>
                                Organization UPI ID : <b>NavyaF@ICICI</b><br>
                                Your UPI ID : <b>{{ $payment->vpa }}</b><br>
                                @if($pdata->community->id == 1)
                                    Fee Amount : <b>₹300</b><br>
                                    Registration Number : {{ $user->registration->registration_number }}<br>
                                @elseif($pdata->community->id == 2)
                                    Fee Amount : <b>₹300</b><Br>
                                    Registration Number : {{ $user->registration->registration_number }}<Br>
                                @elseif($pdata->community->id == 3)
                                    Fee Amount : <b>₹200</b><br>
                                    Registration Number : {{ $user->registration->registration_number }}<Br>
                                @else
                                    Fee Amount : <b>₹150</b><br>
                                    Registration Number : <b>{{ $user->registration->registration_number }}</b><br>
                                @endif
                                <br>
                                <b>Note 1 : A UPI transaction request is being initiated from NavyaF@ICICI, please complete the transaction to continue.</b><br>
                                <b>Note 2 : Payment Confirmation might take 1-2 days to reflect.</b><br>
                                <br><Br>
                                <div class="row">
                                    <div class="col-12" style="text-align:centre;">
                                        <img class="mx-auto d-block" src="{{ asset('images/720.gif') }}" height="30%">
                                        <div align="center"><b>Awaiting payment confirmation.</b></div>  
                                    </div>
                                </div>
                                
                            @elseif($payment->mode == 'Paytm UPI')
                            Paytm UPI Details<br>
                            Organization Name : <b>Navya Foundation</b><br>
                                Organization UPI ID : <b>NavyaF@ICICI</b><br>
                                Your Paytm UPI ID : <b>{{ $payment->vpa }}@paytm</b><br>
                                @if($pdata->community->id == 1)
                                    Fee Amount : <b>₹300</b><br>
                                    Registration Number : {{ $user->registration->registration_number }}<br>
                                @elseif($pdata->community->id == 2)
                                    Fee Amount : <b>₹300</b><Br>
                                    Registration Number : {{ $user->registration->registration_number }}<Br>
                                @elseif($pdata->community->id == 3)
                                    Fee Amount : <b>₹200</b><br>
                                    Registration Number : {{ $user->registration->registration_number }}<Br>
                                @else
                                    Fee Amount : <b>₹150</b><br>
                                    Registration Number : <b>{{ $user->registration->registration_number }}</b><br>
                                @endif
                                <br>
                                <b>Note 1 : A UPI transaction request is being initiated from NavyaF@ICICI, please complete the transaction to continue.</b><br>
                                <b>Note 2 : Payment Confirmation might take 1-2 days to reflect.</b><br>
                                <br><Br>
                                <div class="row">
                                    <div class="col-12" style="text-align:centre;">
                                        <img class="mx-auto d-block" src="{{ asset('images/720.gif') }}" height="30%">
                                        <div align="center"><b>Awaiting payment confirmation.</b></div>  
                                    </div>
                                </div>

                            @elseif($payment->mode == 'PhonePe UPI')
                                PhonePe UPI Details<br>
                                Organization Name : <b>Navya Foundation</b><br>
                                Organization UPI ID : <b>NavyaF@ICICI</b><br>
                                Your PhonePe UPI ID : <b>{{ $payment->vpa }}@ybl</b><br>
                                @if($pdata->community->id == 1)
                                    Fee Amount : <b>₹300</b><br>
                                    Registration Number : {{ $user->registration->registration_number }}<br>
                                @elseif($pdata->community->id == 2)
                                    Fee Amount : <b>₹300</b><Br>
                                    Registration Number : {{ $user->registration->registration_number }}<Br>
                                @elseif($pdata->community->id == 3)
                                    Fee Amount : <b>₹200</b><br>
                                    Registration Number : {{ $user->registration->registration_number }}<Br>
                                @else
                                    Fee Amount : <b>₹150</b><br>
                                    Registration Number : <b>{{ $user->registration->registration_number }}</b><br>
                                @endif
                                <br>
                                <b>Note 1 : A UPI transaction request is being initiated from NavyaF@ICICI, please complete the transaction to continue.</b><br>
                                <b>Note 2 : Payment Confirmation might take 1-2 days to reflect.</b><br>
                                <br><Br>
                                <div class="row">
                                    <div class="col-12" style="text-align:centre;">
                                        <img class="mx-auto d-block" src="{{ asset('images/720.gif') }}" height="30%">
                                        <div align="center"><b>Awaiting payment confirmation.</b></div>  
                                    </div>
                                </div>
                            @else
                                Challan Details<br>
                                Name : <b>Navya Foundation</b><br>
                                Account Number : <b>230405000478</b><br>
                                IFSC Code : <b>ICIC0001023</b><br>
                                    @if($pdata->community->id == 1)
                                        Fee Amount : <b>₹300</b><br>
                                        Registration Number : <b>{{ $user->registration->registration_number }}</b><br>
                                    @elseif($pdata->community->id == 2)
                                        Fee Amount : <b>₹300</b><Br>
                                        Registration Number : <b>{{ $user->registration->registration_number }}</b><Br>
                                    @elseif($pdata->community->id == 3)
                                        Fee Amount : <b>₹200</b><br>
                                        Registration Number : <b>{{ $user->registration->registration_number }}</b><Br>
                                    @else
                                        Fee Amount : <b>₹150</b><br>
                                        Registration Number : <b>{{ $user->registration->registration_number }}</b><br>
                                    @endif
                                    <br>
                                <a href="{{ url('/register/5/payment/challan/download') }}" target="_blank" class="btn btn-outline-primary btn-sm">Download Challan Receipt</a>
                                <br><br>
                                <b>Note 1 : Please mention your registration number in the Challan receipt</b><br>
                                <b>Note 2 : Payment Confirmation might take 4-5 days to reflect.</b><br>
                            @endif
                        
                        @else
                            <b>Payment Complete.</b><br>
                            <br><b>Transaction Details</b><Br>
                            Payment Mode : <b>{{ $payment->mode }}</b><Br>
                            Amount : <b>{{ $payment->amount }}</b><Br>
                            @if(is_null($payment->vpa))
                                Paid via : <b>Challan</b><br>
                            @else
                                Paid via : <b>{{ $payment->vpa }}</b><br>
                            @endif
                        @endif
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="side-card">
                    <div class="side-card-header">
                        Registration Number : <b>{{ $registration_number }}</b>
                    </div>
                    <hr>
                    @if(is_null($payment))
                    <button type="submit" form="payment" class="btn btn-outline-primary btn-sm pull-right">
                        Proceed to Pay
                    </button>
                    @else
                        <form method="POST" id="change_payment" action="{{ url('/register/5/change-payment') }}">
                            @csrf

                        </form>
                        <button type="submit" form="change_payment" class="btn btn-outline-primary btn-sm">Change Payment Mode</button>
                    @endif
                   <a href="{{ url('/home') }}" class="btn btn-outline-danger btn-sm">Cancel & Exit</a>
                   <hr>
                    Progress
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" style="width: {{($status/6)*100}}%" aria-valuenow="{{ $status }}" aria-valuemin="0" aria-valuemax="6"></div>
                    </div>
                    @if($errors)
                @if(count($errors))
                    <hr>
                    <ul style="font-size: 12px; color: red; display: inline-block;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>                                               
                        @endforeach
                    </ul>
                @endif
            @endif
                </div>
                
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {

   $('input[type="radio"]').click(function() {
       if($(this).attr('id') == 'payment_mode2') {
            $('#vpa_field').show();
            $('#paytm_field').hide();
            $('#phonepe_field').hide();           
       }
       else if($(this).attr('id') == 'payment_mode4'){
            $('#paytm_field').show();
            $('#vpa_field').hide();   
            $('#phonepe_field').hide();
       }
       else if($(this).attr('id') == 'payment_mode5'){
            $('#phonepe_field').show();
             $('#vpa_field').hide();   
            $('#paytm_field').hide();
       }
       else {
            $('#vpa_field').hide();   
            $('#paytm_field').hide();
            $('#phonepe_field').hide();
       }
   });
});
setInterval(function() {
                  window.location.reload();
                }, 300000); 
</script>
@endsection
