@extends('admin.layouts.mail')

@section('content')
	<table border="0" cellspacing="0" width="100%" style="width:100%;border-spacing:0;padding-left:15px;padding-right:15px;">
		<tr>
			<h1 style="font-family:'Arial';color:#388576;font-size:20px;font-weight:bold;text-align:center;margin:0;">
				Hello {{ $user->full_name }}, <br/>

				You have been invited to the EMCQ platform
			</h1>
		</tr>
	</table>
	<table border="0" cellspacing="0" width="100%" style="width:100%;border-spacing:0;padding-top:20px;">
		<tr>
			<td align="center">
				<p class="body-copy" style="font-family:'Arial';font-size:16px;color:#000000;text-align:center;width:70%;margin:0 auto;">
					Follow the link below to create your password
				</p>
			</td>
		</tr>
	</table>
	<table border="0" cellspacing="0" width="100%" style="width:100%;border-spacing:0;padding-top:20px;padding-bottom:50px;">
		<tr>
			<td align="center">
				<a href="{{ $url }}"
				style="background-color:#388576;color:#ffffff;display:block;font-family:'Arial';font-size:13px;font-weight:bold;line-height:1;text-align:center;text-decoration:none;width:200px;padding:10px 0px;-webkit-text-size-adjust:none;mso-hide:all;margin-top:10px;" target="_blank" class="verify-email-btn">
					Create Password
				</a>
			</td>
		</tr>
	</table>
@endsection
