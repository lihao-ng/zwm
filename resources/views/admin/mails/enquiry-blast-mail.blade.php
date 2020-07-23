@extends('admin.layouts.mail')

@section('content')
	<table border="0" cellspacing="0" width="100%" style="width:100%;border-spacing:0;padding-left:15px;padding-right:15px;">
		<tr>
			<h1 style="font-family:'Arial';color:#388576;font-size:20px;font-weight:bold;text-align:center;margin:0;">
				A new enquiery has been sent by a vistor
			</h1>
		</tr>
	</table>
	<table border="0" cellspacing="0" width="100%" style="width:100%;border-spacing:0;padding-top:20px;">
		<tr>
			<td align="center">
				<p class="body-copy" style="font-family:'Arial';font-size:16px;color:#000000;text-align:center;width:70%;margin:0 auto;">
					Name: {{ $enquiery->name }}
				</p>
			</td>
		</tr>
		<tr>
			<td align="center">
				<p class="body-copy" style="font-family:'Arial';font-size:16px;color:#000000;text-align:center;width:70%;margin:0 auto;">
					Email: {{ $enquiery->email }}
				</p>
			</td>
		</tr>
		<tr>
			<td align="center">
				<p class="body-copy" style="font-family:'Arial';font-size:16px;color:#000000;text-align:center;width:70%;margin:0 auto;">
					Message: {{ $enquiery->message }}
				</p>
			</td>
		</tr>
		<tr>
			<td align="center">
				<p class="body-copy" style="font-family:'Arial';font-size:16px;color:#000000;text-align:center;width:70%;margin:0 auto;">
					Sent At: {{ date_to_human($enquiery->created_at) }}
				</p>
			</td>
		</tr>
	</table>
	<table border="0" cellspacing="0" width="100%" style="width:100%;border-spacing:0;padding-top:20px;padding-bottom:50px;">
		<tr>
			<td align="center">
				<a href="{{ route('admin.enquiries.index') }}"
				style="background-color:#388576;color:#ffffff;display:block;font-family:'Arial';font-size:13px;font-weight:bold;line-height:1;text-align:center;text-decoration:none;width:200px;padding:10px 0px;-webkit-text-size-adjust:none;mso-hide:all;margin-top:10px;" target="_blank" class="verify-email-btn">
				View On Dashboard
				</a>
			</td>
		</tr>
	</table>
@endsection
