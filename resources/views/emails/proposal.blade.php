<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" />
<style type="text/css" media="screen">
         [style*='raleway'] {
         font-family:raleway !important
         }
      </style>
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
									<table border="0" cellpadding="0" cellspacing="0" width="600" id="template_header" style='background-color: #f8f9fa; color: #ffffff; border-bottom: 0; line-height: 100%; vertical-align: middle; font-family:raleway; border-radius: 3px 3px 0 0;'>
										<tr>
											<td id="header_wrapper" style="padding: 36px 48px; display: block;">
												<h1 style='font-family:raleway; font-size: 30px; font-weight: 300; line-height: 150%; margin: 0; text-align: center; text-shadow: 0 1px 0 #ab79a1; color: #ffffff;'><img src="https://bidhub.com/app/public/assets/bidhub/bidhubblack.png"></h1>
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
														<td style="text-align:center;font-weight: regular;color:#000;font-family:raleway;">Review Proposal for: <span style="color:black;font-weight: bold;">"{{ $proposal->project->title }}"</span></td>
                                                    </tr>  
                                                </table>
												<table border="0" cellpadding="0" cellspacing="0" width="100%" id="template_body" style="font-family:raleway; font-size:20px; margin-left:30px;margin-top:35px;">
                                                    <tr>
														<td style="width:85px;color:#000;font-family:raleway;" valign="top">Sent By:</td>
														<td style="padding-left: 8px; width:1px;"><img src="{{ asset('') . $proposal->user->avatar }}" width="60" height="60" alt="No User Picture" style="border: 1px solid #edf1f5;"></td>
                                                        <td style="padding-left: 8px; text-align:left;font-weight: bold;color:#000;font-family:raleway;" valign="top">{{ $proposal->profile->first_name }} {{ $proposal->profile->last_name }}<br><span style="padding-top:10px">{{ $proposal->profile->company }}</span></td>
													</tr>
												</table>
												<table border="0" cellpadding="0" cellspacing="0" width="580" id="template_body" style="font-family:raleway; font-size:20px; margin-top:70px; margin-left:30px;">
                                                    <tr>
														<td style="width:580px;color:#000;font-family:raleway;">Description: {{ $proposal->bid_description }}</td>
													</tr>
												</table>
												<table border="0" cellpadding="0" cellspacing="0" width="100%" id="template_body" style="font-family:raleway; font-size:20px; margin-top:20px; margin-left:30px;">
                                                    <tr>
														<td style="width:100%;color:#000;font-family:raleway;">Trade: {{ $proposal->profile->trade  }}</td>
													</tr>
												</table>
												<table border="0" cellpadding="0" cellspacing="0" width="182" id="template_body" style="font-family:raleway; font-size:20px; margin:50px 0 30px 30px;">
                                                    <tr>
													    
													    <!--[if mso]>
                                                          <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="{{ asset('proposals/show') . '/' . $proposal->project_id }}" style="height:36px;v-text-anchor:middle;width:150px;" arcsize="5%" strokecolor="#EB7035" fillcolor="#EB7035">
                                                            <w:anchorlock/>
                                                            <center style="color:#ffffff;font-family:raleway;font-size:16px;">View Proposal</center>
                                                          </v:roundrect>
                                                        <![endif]-->
                                                        <td><a href="{{ asset('project-room/show') . '/' . $proposal->project_id }}" style="background-color:#EB7035;border:1px solid #EB7035;border-radius:3px;color:#ffffff;display:inline-block;font-family:raleway;font-size:16px;line-height:44px;text-align:center;text-decoration:none;width:150px;-webkit-text-size-adjust:none;mso-hide:all;">View Proposal</a></td>
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