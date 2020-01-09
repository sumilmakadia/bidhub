<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body style="background-color: #fff;">
<p style="margin-bottom:15px;font-weight:bold;">Claim Listing Request:</p>
{{$contact_name}}<br>
{{$company_name}}<br>
{{$phone}}<br>
{{$email}}<br>

<p style="margin-bottom:15px;font-weight:bold;">Associated Listing:</p>
{{$uploaded->businessName}}<br>
{{$uploaded->contactName}}<br>
{{$uploaded->phoneNumber}}<br>
{{$uploaded->email}}<br>
<p style="margin-bottom:5px;">https://bidhub.com</p>
</body>
</html>