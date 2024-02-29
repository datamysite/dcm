<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Verify Redeem Coupon | DCM</title>

	<!-- Favicon icon-->
	<link rel="shortcut icon" type="image/x-icon" href="{{URL::to('/public')}}/web_assets/images/logo/dcm-logo-r.png" />

	<!-- Libs CSS -->
	<link href="{{URL::to('/public')}}/web_assets/libs/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet" />
	<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	 <style>

	 	body {
		    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
		    font-size: 14px;
		    line-height: 1.42857143;
		    color: #333;
		    background-color: #ededed;
		}
		.card {
		    width: 340px;
		    margin: 100px auto;
		}
		.card-body {
		    box-shadow: inset 0 -3em 3em rgb(255 255 255 / 30%), 0 0 0 2px white, 0.3em 0.3em 1em rgb(191 191 191 / 60%);
		    background-color: #fff;
		}
		.verification {
		    display: flex;
		    flex-direction: column;
		    align-items: center;
		}
		.verification img {
		    width: 150px;
		    margin-top: -55px;
    		margin-bottom: -50px;
		}
		.verification hr {
		    width: 100%;
		    border: 1px dotted #e6e6e6;
		}
		.badge {
		    display: inline-block;
		    min-width: 10px;
		    padding: 6px 20px;
		    font-size: 12px;
		    font-weight: 700;
		    line-height: 1;
		    color: #fff;
		    text-align: center;
		    white-space: nowrap;
		    vertical-align: middle;
		    background-color: #777;
		    border-radius: 13px;
		}
		.badge-success {
		    background-color: #07af07;
		}
		.verification h1 {
		    margin-bottom: -12px;
		    font-weight: 600;
		    text-transform: uppercase;
		    margin-top: 10px;
		    font-size: 16px;
		    text-align: center;
		}
		.verification h3 {
		    margin-bottom: -15px;
		    font-size: 14px;
		}
		.btn {
		    border: none;
		    padding: 8px 75px;
		}
		.verification p {
		    margin-bottom: -10px;
		}
	</style>
</head>
<body>

	<div class="container">
		<div class="card">
			<div class="card-body">
				<div class="verification">
					<h1>{{$retailer->name}}</h1>
					<h3>Redeem Code Status</h3>
					<hr>
					@switch($qrcode->status)
						@case('0')
							<span class="badge badge-success">Valid</span>
							<br>
							<button class="btn btn-sm btn-primary markasUsed">Mark as Used</button>
							<br>
							<p>Note! Please you are consumer, Don`t mark as used.</p>
							@break;
						@case('1')
							<span class="badge badge-danger">Used</span>
							@break;
					@endswitch
					<hr>
					<img src="{{URL::to('/public/qr-logo.png')}}">
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			'use strict'

			$('.markasUsed').click(function(){

				Swal.fire({
				  title: "Are you sure?",
				  text: "You won't be able to revert this!",
				  icon: "warning",
				  showCancelButton: true,
				  confirmButtonColor: "#3085d6",
				  cancelButtonColor: "#d33",
				  confirmButtonText: "Yes, mark as used!"
				}).then((result) => {
				  if (result.isConfirmed) {
				    $.get("{{URL::to('/offers/qrcode/'.base64_encode($qrcode->id))}}", function(data){
				    	if(data == 'success'){
				    		Swal.fire({
							  title: "Success!",
							  text: "You marked this coupon as used.",
							  icon: "success"
							});
							setTimeout(function(){
								window.location.href = window.location.href;
							}, 700);
				    	}
				    });
				  }
				});
			});
		});
	</script>
</body>
</html>