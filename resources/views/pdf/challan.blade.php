<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->

    <title>Challan</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- <link href="http://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	<div class="container">
		<br><br>
		<table class="table table-bordered" >
		  <thead>
		    
		  </thead>
		  <tbody>
		    <tr>
		      <td colspan="3"><b>Bank Copy</b></td>
		      
		    </tr>
		    <tr>
		      <td rowspan="4">Bank use only</td>
		      <td>Branch Name</td>
		      <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		    </tr>
		    <tr>
		      
		      <td>Branch Code</td>
		      <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		    </tr>
		    <tr>
		    	<td>Journal No.</td>
		    	<td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		    </tr>
		    <tr>
		    	
		    	<td>Journal Date</td>
		    	<td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		    </tr>
		    <tr>
		    	<td>Name of Candidate</td>
		    	<td colspan="2"><b>{{ $pdata->name }}</b></td>
		    </tr>
		    <tr>
		    	<td>Post Applied for :</td>
		    	<td colspan="2"><b>{{ $pdata->occupation->name }}</b></td>
		    </tr>
		    <tr>
		    	<td>Registration Number :</td>
		    	<td colspan="2"><b>{{ $registration_number }}</b></td>
		    </tr>
		    <tr>
		    	<td>Date of Birth</td>
		    	<td colspan="2"><b>{{$pdata->dob}}</b></td>
		    </tr>
		  </tbody>
		</table>
		<br>
		<div class="text-center">
			Paid into the Credit of<br>
			<b>Navya Foundation A/C No. 230405000478</b><br>
			<b>IFSC Code. ICIC0001023</b><Br>
			ICICI Bank<br>
			<br>
		</div>
		<table class="table table-bordered">
			<thead>
		    	<tr>
		      	<th scope="col">SL. No.</th>
		      	<th scope="col">Particulars</th>
		      	<th scope="col">Amount (Rs.)</th>
		    	</tr>
		  	</thead>
			<tbody>
				<tr>
					<td>1.</td>
					<td>Application Fee</td>
					<td><b>{{ $amount }}</b></td>
				</tr>
				<tr>
					<td>2.</td>
					<td>Bank's Commission</td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td>Total</td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
</body>
</html>