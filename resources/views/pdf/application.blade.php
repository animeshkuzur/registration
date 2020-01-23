<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->

    <title>Application</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- <link href="http://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	<div class="container">
		
		<div class="text-center">
			<b>Navya Foundation 2019</b><br>
			<b>Registration Receipt</b><br>
			<br>
		</div>
		<table class="table table-bordered table-sm" >
			<thead>
				
			</thead>
			<tbody>
				<tr style="background-color: #6c757d;color:#fff;">
					<td><b>Registration Number : {{ $registration_number }}</b></td>
					<td>Applying for : <b>{{ $pdata->occupation->name }}</b></td>
				</tr>
			</tbody>
		</table>
		<div class="text-center">
			This document is a substitue for your Admit Card. Take a print out of the document.<br>
		</div>
		<table class="table table-bordered table-sm" >
			<thead>
				
			</thead>
			<tbody>
				<tr>
					<td colspan="4" style="background-color: #6c757d;color:#fff;"><b>Candidate Details</b></td>
				</tr>
				<tr>
					<td><b>Name </b></td>
					<td>{{ $pdata->name }}</td>
					<td><b>Gender</b></td>
					<td>{{ $pdata->gender->type }}</td>
				</tr>
				<tr>
					<td><b>Date of Birth</b></td>
					<td>{{ $pdata->dob }}</td>
					<td><b>Nationality</b></td>
					<td>{{ $pdata->nationality->type }}</td>
				</tr>
				<tr>
					<td><b>Marital Status</b></td>
					<td>{{ $pdata->marital_status->type }}</td>
					<td><b>Community</b></td>
					<td>{{ $pdata->community->type }}</td>
				</tr>
				<tr>
					<td><b>Phone</b></td>
					<td>{{ $pdata->phone }}</td>
					<td><b>Religion</b></td>
					<td>{{ $pdata->religion->type }}</td>
				</tr>
				<tr>
					<td><b>Father's Name</b></td>
					<td>{{ $pdata->father_name }}</td>
					<td><b>Mother's Name</b></td>
					<td>{{ $pdata->mother_name }}</td>
				</tr>
				<tr>
					<td colspan="2"><b>Alternate Email</b></td>
					<td colspan="2">{{ $pdata->alternate_email }}</td>
				</tr>
				<tr>
					<td colspan="2"><b>Latest Education Qualification</b></td>
					<td colspan="2">{{ $pdata->education_qualification }}</td>
				</tr>
				<tr>
					<td colspan="4" style="background-color: #6c757d;color:#fff;"><b>Address</b></td>
				</tr>
				<tr>
					<td><b>Line 1</b></td>
					<td>{{ $address->line1 }}</td>
					<td><b>City</b></td>
					<td>{{ $address->city }}</td>
				</tr>
				<tr>
					<td><b>Line 2</b></td>
					<td>{{ $address->line2 }}</td>
					<td><b>State</b></td>
					<td>{{ $address->state->name }}</td>
				</tr>
				<tr>
					<td><b>Line 3</b></td>
					<td>{{ $address->line3 }}</td>
					<td><b>Pincode</b></td>
					<td>{{ $address->pincode }}</td>
				</tr>
				<tr>
					<td colspan="4" style="background-color: #6c757d;color:#fff;"><b>Exam Centre Choices</b></td>
				</tr>
				<tr>
					@foreach($user->exam_centres as $centre)
                        <td>{{ $centre->preference }}. {{ \DB::table('exam_centres')->where('id',$centre->id)->get(['name'])->first()->name }}</td>
                    @endforeach
				</tr>
				<tr>
					<td colspan="4" style="background-color: #6c757d;color:#fff;"><b>Payment Details</b></td>
				</tr>
				<tr>
					<td><b>Amount</b></td>
					<td>{{ $payment->amount }}</td>
					<td><b>Payment Mode</b></td>
					<td>{{ $payment->mode }}</td>
				</tr>
				<tr>
					<td colspan="4" style="background-color: #6c757d;color:#fff;"><b>Documents Uploaded</b></td>
				</tr>
					@foreach($user->documents as $document)
                        <tr><td colspan="4">{{ $document->document_type->type }} : YES</td></tr>
                    @endforeach
				<tr>
					<td colspan="2" style="background-color: #6c757d;color:#fff;"><b>Photo</b></td>
					<td colspan="2" style="background-color: #6c757d;color:#fff;"><b>Signature</b></td>
				</tr>
				<tr>
					@foreach($user->documents as $document)
                        @if($document->document_type_id == 1)
							<td colspan="2" style="text-align:centre;"><img class="mx-auto d-block" src="{{ asset($document->path) }}"></td>
						@elseif($document->document_type_id == 2)
							<td colspan="2" style="text-align:centre;"><img class="mx-auto d-block" src="{{ asset($document->path) }}"></td>
                        @else
                        @endif
                    @endforeach
				</tr>
				<tr>
					<td colspan="4" style="background-color: #6c757d;color:#fff;">
						<b>Declaration</b>
					</td>
				</tr>
				<tr>
					<td colspan="4">
						I hereby declare that all the particulars stated in this registration receipt are ture to the best of my knowledge and belief. I have read and understood the Navya Foundation procedures. I shall abide by terms and conditions therein. I understand that, if any of the information provided by me is found to be false/incorrect at any time, my candidature shall be cancelled and I shall be debarred from appearing for the exam.
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</body>
</html>