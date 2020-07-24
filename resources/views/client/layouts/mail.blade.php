<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Template</title>
    <style type="text/css">
			body{
				padding:0;
				margin:0;
			}
      @media only screen and (max-width:480px) {
        h1 {
          font-size: 16px !important;
        }
        .logo {
          width: 150px !important;
        }
        .verify-email-btn {
          width: 160px !important;
          font-size: 11px !important;
        }
        .product-img {
          width: 100% !important;
        }
        .see-more-btn {
          width: 100% !important;
          font-size: 11px !important;
        }
        .view-online-copy {
          font-size: 10px !important;
        }
        .body-copy {
          font-size: 13px !important;
        }
        .product-name {
          font-size: 14px !important;
        }
        .product-desc {
          font-size: 10px !important;
        }
				.pre-header{
					display:none;
					font-size:1px;
					color:#000;
					line-height:1px;
					width:0;
					height:0;
					max-height:0px;
					max-width:0px;
					opacity:0;
					overflow:hidden;
				}
      }
    </style>
  </head>
  <body>
    <table style="width:100%;max-width:600px;margin:0 auto;" border="0" cellspacing="0" width="100%" align="center">
      <tr>
        <td style="padding:0;">
          <table border="0" cellspacing="0" width="100%" style="width:100%;border-spacing:0;">
            <tr>
              <td style="padding-top:40px;padding-bottom:40px;" align="center">
                <img class="logo" style="display:block;margin:0 auto;" width="auto" height="auto"
								src="" alt="Logo" />
              </td>
            </tr>
          </table>

          @yield('content')

          <table border="0" cellspacing="0" width="100%" style="width:100%;border-spacing:0;background:#1CAEA6;">
            <tr>
              <td style="padding-top:15px;padding-bottom:15px;">
                <table border="0" cellspacing="0" width="120" style="width:120px;border-spacing:0;" align="center">
                  <tr>
                    <td style="padding:0;" align="center">
                      <a href="#" target="_blank" style="text-decoration:none;">
                        <img width="25" height="25" src="" alt="" style="display:block;margin:0 auto;"></a>
                    </td>
                  </tr>
                </table>
                <table border="0" cellspacing="0" width="100%" style="width:100%;border-spacing:0;" align="center">
                  <tr>
                    <td style="padding-top:5px;" align="center">
                      <a href=""
                      style="color:#fff;font-family:'Arial';font-size:9px;text-decoration:underline;-webkit-text-size-adjust:none;" target="_blank">Privacy Policy</a>
											<span style="color:#fff;font-family:'Arial';font-size:9px;">|</span>
											<a href=""
                      style="color:#fff;font-family:'Arial';font-size:9px;text-decoration:underline;-webkit-text-size-adjust:none;" target="_blank">Terms & Conditions</a>
                    </td>
                  </tr>
                </table>
                <table border="0" cellspacing="0" width="100%" style="width:100%;border-spacing:0;" align="center">
                  <tr>
                    <td style="padding:0;" align="center">
                      <p style="font-family:'Arial';margin-bottom:0;font-size:9px;color:#fff;">Copyright &copy; The Techy Hub Sdn Bhd {{ date('Y') }}</p>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
</html>
