@extends('admin.layouts.mail')

@section('content')
	<table border="0" cellspacing="0" width="100%" style="width:100%;border-spacing:0;padding-left:15px;padding-right:15px;">
		<tr>
			<h1 style="font-family:'Arial';color:#388576;font-size:20px;font-weight:bold;text-align:center;margin:0;">
				EMCQ Daily Sales Report For {{ $date }} has been generated
			</h1>
		</tr>
	</table>
	<table border="0" cellspacing="0" width="100%" style="width:100%;border-spacing:0;padding-top:20px;">
		<tr>
			<td align="center">
				<p class="body-copy" style="font-family:'Arial';font-size:16px;color:#000000;text-align:center;width:70%;margin:0 auto;">
					The Transaction has already been recorded to Quickbooks. This email contain a detailed copy of the transactions seperated into multiple sheets based on the used currency.
				</p>
			</td>
		</tr>
	</table>
@endsection
