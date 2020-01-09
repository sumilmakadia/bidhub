<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" />

</head>
<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" style="padding: 0;" style="background-color: #f8f9fa;">
		<div id="wrapper" dir="ltr" style="background-color: #f7f7f7; margin: 0; padding: 70px 0; width: 100%; -webkit-text-size-adjust: none;">
			<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
				<tr>
					<td align="center" valign="top">
						<div id="template_header_image">
													</div>
						<table border="0" cellpadding="0" cellspacing="0" width="600" id="template_container" style="background-color: #ffffff;">
							<tr>
								<td align="center" valign="top">
									<!-- Header -->
									<table border="0" cellpadding="0" cellspacing="0" width="600" id="template_header" style='background-color: #f8f9fa; color: #ffffff; border-bottom: 0; font-weight: bold; line-height: 100%; vertical-align: middle; font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif; border-radius: 3px 3px 0 0;'>
										<tr>
											<td id="header_wrapper" style="padding: 36px 48px; display: block;">
												<h1 style='font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif; font-size: 30px; font-weight: 300; line-height: 150%; margin: 0; text-align: center; text-shadow: 0 1px 0 #ab79a1; color: #ffffff;'><img src="https://bidhub.com/app/public/assets/bidhub/bidhubblack.png"></h1>
											</td>
										</tr>
									</table>
									<!-- End Header -->
								</td>
							</tr>
							<tr>
								<td align="center" valign="top">
									<!-- Body -->
									<table border="0" cellpadding="0" cellspacing="0" width="600" id="template_body">
										<tr>
											<td valign="top" id="body_content" style="background-color: #ffffff;">
												<!-- Content -->
												<table border="0" cellpadding="20" cellspacing="0" width="100%" style="font-family:raleway; font-size:20px;">
													<tr>
														<td style="text-align:center;"><b style="color:black;">New Chat Message</b></td>
                                                    </tr>  
                                                </table>
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%" id="template_body" style="font-family:raleway; font-size:20px; margin:30px 0 -18px 30px;">
                                                    <tr>
														<td style="padding-left: 8px; width:1px;"><img src="{{ asset('') . $chat_message->profile->avatar }}" width="60" height="60" alt="avatar"></td>
														<td style="width:76px;">{{ $chat_message->profile->first_name . '' . $chat_message->profile->last_name }}</td>
                                                        <td style="padding-left: 8px; text-align:left;"><br><b style="color:black; margin-left:60px;"></td>
													</tr>
												</table>
												<table border="0" cellpadding="0" cellspacing="0" width="100%" id="template_body" style="font-family:raleway; font-size:16px; margin-left:30px; margin-bottom:100px; color:lightgray;">
                                                    <tr>
														<td style="padding-left: 8px; width:1px;"></td>
														<td style="padding-left: 8px;">{{ date('m/d/Y h:i A',strtotime($chat_message->created_at)) }}</td>
                                                        <td style="padding-left: 8px; text-align:left;"><b style="color:black;"></b></td>
													</tr>
												</table>
												<table border="0" cellpadding="0" cellspacing="0" width="100%" id="template_body" style="font-family:raleway; font-size:20px; margin-left:30px; margin-bottom:100px;">
                                                    <tr>
														<td style="padding-left: 8px; width:1px;"></td>
														<td style="padding-left: 8px; width:100%;">{{ $chat_message->message }}</td>
                                                        <td style="padding-left: 8px; text-align:left;"><b style="color:black;"></b></td>
													</tr>
												</table>
												<table border="0" cellpadding="0" cellspacing="0" width="100%" id="template_body" style="font-family:raleway; font-size:20px; 50px 0 30px 0px; height:44px; margin-bottom:20px;">
                                                    <tr>
                                                        <td style="width:30%;"></td>
													    <td style="background-color:#4281e2; padding:10px 20px; text-align:center;"><a href="{{ asset('chat-rooms/') . '/' . $chat_message->chatroom_id }}" style="text-decoration: none; background-color: #4281e2; color:white; padding:10px 20px; border:none;">Reply</a></td>
													    <td style="width:30%;"></td>
													</tr>
												<!-- End Content -->
												</table>
											</td>
										</tr>
									</table>
									<!-- End Body -->
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>