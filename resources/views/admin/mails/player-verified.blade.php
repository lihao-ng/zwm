<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <style>

    body{
      color: #0D123B;
    }

    .blue{
      color: #0D123B;
    }

    .white{
      color: #FFFFFF;
    }

    .milky-background{
      background-color: #F8F9FA;
    }

    .blue-background{
      background-color: #0D123B;
    }
    
  </style>

</head>

<body style="-webkit-text-size-adjust:none;">
  <table style="width:100%; max-width: 600px;" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td style="width:100%;">
        <table class="milky-background" style="width: 600px; text-align:center;" border="0" height="70">
          <tr>
            <td class="blue" style="padding-bottom:5px; padding-top:5px; padding-left:20px;padding-right:20px;" align="center" valign="middle">
              <!-- <a href="http://local.trp.com/home" target="_blank">
                <img src="https://trp-privatetour.s3-ap-southeast-1.amazonaws.com/trp_logo_white.png" style="display: block; outline: none;">
              </a> -->
              <img src="{{asset('img/generic/logo-new.png')}}" alt="Asare-Sports" style="display: block; outline: none;width:100%; max-width: 165px;">
            </td>
          </tr>
        </table>
        
        <table style="width:100%;" border="0" width="100%" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td style="width:100%;">

              <table style="border:0; width:600px; text-align:center;" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="center" style="padding-left:20px; padding-right:20px;">
                    <p style="font-family:'Arsenal',Arial,Helvetica,sans-serif; font-size:36px; font-weight:400; margin-top:30px; margin-bottom:20px; display: block;">Account Verified</p>
                  </td>
                </tr>
                <!-- <tr>
                  <td align="center" style="padding-left:20px; padding-right:20px; padding-top:10px; padding-bottom:30px;">
                    <img src="https://trp-privatetour.s3-ap-southeast-1.amazonaws.com/blue_1.png" style="height:25px; padding-right:15px; outline:none;">
                    <img src="https://trp-privatetour.s3-ap-southeast-1.amazonaws.com/blue_2.png" style="height:25px; padding-right:15px; outline:none;">
                    <img src="https://trp-privatetour.s3-ap-southeast-1.amazonaws.com/blue_3.png" style="height:25px; outline:none;">
                  </td>
                </tr> -->
                <tr>
                  <td style="padding:45px; text-align: left;">
                    <p style="font-family:'Raleway',Arial,Helvetica,sans-serif; font-size:18px; font-weight:500; margin-top:0; margin-bottom:15px;">
                      Hi, {{$player->first_name}} {{$player->last_name}}!
                    </p>
                    <p style="font-family:'Raleway',Arial,Helvetica,sans-serif; font-size:16px; font-weight:500; line-height:1.5; margin-top:0; margin-bottom:15px;">
                      Your account has been verified by the Admin. You can now login to you account at <a href="{{$baseUrl}}" target="_blank">{{$baseUrl}}</a>.
                    </p>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
        

        <table class="milky-background" style="width:100%;" border="0" width="100%" height="50">
          <tr>
            <td width="50%" style="padding-top:5px; padding-bottom:5px; padding-left:20px;">
              <p class="blue" style="font-family:'Raleway',Arial,Helvetica,sans-serif; font-size:12px; font-weight:400">&copy; Asare 2020</p>
            </td>
            {{-- <td width="50%" style="padding-top:5px; padding-bottom:5px; padding-right:20px;" align="right" >
              <a href="https://www.instagram.com/theroyalpress/" target="_blank" style="text-decoration:none; display: inline-block; padding-right:15px;">
                <img src="https://trp-privatetour.s3-ap-southeast-1.amazonaws.com/Path+3.png" style="text-decoration:none; display:block; outline:none;">
              </a>
              <a href="https://www.facebook.com/theroyalpress/" target="_blank" style="text-decoration:none; display:inline-block;">  
                <img src="https://trp-privatetour.s3-ap-southeast-1.amazonaws.com/Path+1.png" style="text-decoration:none;display:block; outline:none;"> 
              </a>
            </td> --}}
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>

</html>