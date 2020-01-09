<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title></title>

    <!-- page css -->
    <link href="{{$assets_path_public_eli}}dist/css/pages/login-register-lock.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{$assets_path_public_eli}}/dist/css/style.min.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<style>
    .mb-20{
        margin-bottom: 20px;
    }
    .mb-50{
        margin-bottom: 50px;
    }
    .error {
        color:red;
    }
    body {
    font-family: raleway!important;
    }
    button, input, optgroup, select, textarea {
    font-family: raleway!important;
    }
</style>
<body class="skin-default card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label"></p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url(../assets/images/background/login-register.jpg); padding-top:5%;">
            <div class="login-box card">
                <div class="card-body pt-50">
                    <form id="reg-form" class="form-horizontal form-material" role="form" method="post" action="{{route('register')}}">
                        {{csrf_field()}}
                        <div class="col-8 mx-auto mb-50">
                            <img src="/app/public/assets/bidhub/bidhub-logo.png" alt="homepage" class="img-fluid dark-logo">
                        </div>
                        <!--<div class="form-group">-->
                        <!--    <div class="col-xs-12">-->
                        <!--        <input class="form-control" type="text" name="name" required placeholder="Name">-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="email" required="field_email" placeholder="Email">
                            </div>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <p style="margin:0;text-align: center;">{{ $error }}</p>
                                    @endforeach
                            </div>
                        @endif
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input id="password" class="form-control" type="password" name="password" required="field_password" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" name="password_confirmation" required="field_confirm_password" placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="terms" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">I agree to all <a href="/terms-and-conditions" data-toggle="modal" 
   data-target="#favoritesModal">Terms & Conditions</a></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center p-b-20">
                            <div class="col-xs-12">
                                <button id="btn_register" class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="submit">Sign Up</button>
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                Already have an account? <a href="/login" class="text-info m-l-5"><b>Sign In</b></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    <div class="modal fade" id="favoritesModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel">
  <div class="modal-dialog" style="max-width: 800px;!important" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title" 
        id="favoritesModalLabel">Terms & Conditions</h4>
        <button type="button" class="close" 
          data-dismiss="modal" 
          aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
       <div class="col small-12 large-12"><div class="col-inner text-center">
<h1 class="uppercase" style="text-align: left;">Terms OF SERVICE</h1>
<p style="text-align: left;"><strong>Terms of Service</strong></p>
<p style="text-align: left;">These Terms of Service (“Terms of Service”) govern your use of this Website. This website,<br><a class="vglnk" href="https://www.bidhub.com" rel="nofollow"><span>https</span><span>://</span><span>www</span><span>.</span><span>bidhub</span><span>.</span><span>com</span></a> (this “Website” or “Site”), is owned by Simple Bidding Solutions LLC of<br>Annapolis, MD.</p>
<p style="text-align: left;"><strong>Effective Date</strong></p>
<p style="text-align: left;">This policy went into effect on 03/01/2018.</p>
<p style="text-align: left;"><strong>Your Acceptance of These Terms of Service</strong></p>
<p style="text-align: left;">You acknowledge and agree that the following Terms of Service, including the Privacy Statement posted on this Website, shall govern your use of each and every page of this Website and the provision of both free and subscription-only information to you by or through this Website. Your user agreement with BidHub will consist of these Terms of Service (including the Privacy Statement); any applicable click-through agreement; and, if you are a subscriber, the pricing, subscription features, and other terms contained on the <a class="vglnk" href="http://bidhub.com" rel="nofollow"><span>bidhub</span><span>.</span><span>com</span></a> pages of this Website applicable to the subscription you have chosen but are subject to change at any time.</p>
<p style="text-align: left;">By accessing and using this Website you are agreeing to comply with and be bound by these Terms of Service. If you do not agree to these Terms of Service, you may not access or use this Website.</p>
<p style="text-align: left;"><strong>Questions Concerning These Terms of Service</strong></p>
<p style="text-align: left;">If you have any questions about this Website or these Terms of Service, please contact us by e-mail at support@bidhub.com.</p>
<p style="text-align: left;">These Terms of Service May Change</p>
<p style="text-align: left;">For your convenience, if these Terms of Service are changed, we will alert you by posting a notice on our home page. We will also update the “effective date” at the top of this page.</p>
<p style="text-align: left;">You may access the current version of these Terms of Service at any time by clicking on the link marked<br>“Terms of Service” at the bottom of each page of this Website.</p>
<p style="text-align: left;"><strong>Your Acceptance of Our Privacy Statement</strong></p>
<p style="text-align: left;">By agreeing to these Terms of Service, you agree to the terms of our Privacy Statement, which is<br>expressly incorporated herein. Before using this Website, please carefully review our Privacy Statement.</p>
<p style="text-align: left;">All personal data provided to us as a result of your use of this Website will be handled in accordance<br>with our Privacy Statement.</p>
<p style="text-align: left;"><strong>Your Consent to Other BidHub Agreements</strong></p>
<p style="text-align: left;">We may also require you to follow additional rules, guidelines or other conditions to sign up to use<br>various special features or password-protected areas of this Website, to participate in certain promotions or activities available through this Website, or for other reasons. In such cases, you may be asked to expressly consent to these additional terms, for example, by checking a box or clicking on a button marked “I agree.” This type of agreement is known as a “click-through” agreement. If any of the terms of a click-through agreement are different than the terms of these Terms of Service, the terms of the click-through agreement will supplement or amend these Terms of Service, but only with respect to<br>the matters governed by the “click-through agreement.”</p>
<p style="text-align: left;"><strong>Subscription Term, Fees and Charges</strong></p>
<p style="text-align: left;">BidHub offers subscriptions services and payment options, all of which are set forth on the Site or in the subscription sales contract between you and BidHub (the “Sales Contract”). When you sign up for a subscription service, you agree to the fees associated with the subscription of your choice, and your subscription service will auto-renew unless you cancel the subscription in accordance with the<br>Termination and Non-Renewal section of these Terms of Service.</p>
<p style="text-align: left;">BidHub accepts payment for subscription fees and the applicable sales taxes by credit card, checks, and other forms of electronic payment, at BidHub’s sole discretion. Due to the recurring nature of our<br>subscriptions and the risks associated with pre-paid credit cards, we reserve the right to refuse them at<br>any time. You must provide BidHub with current, valid credit card account information at the time that<br>you first subscribe to this Website. BidHub will then bill your credit card the total due for your initial<br>payment and then bill your credit card thereafter for your payments/installments on an auto-renewal<br>basis. Unless your subscription is terminated by you or BidHub as provided elsewhere in these Terms of<br>Service, you agree to pay and authorize BidHub to charge the credit card you provided in the amount of the then-current subscription fee (or an installment portion thereof, as applicable) for the subscription term you have chosen in accordance with the schedule provided, along with all applicable sales tax charges associated therewith. The current subscription fees for the various subscription plans may be found on the Site or in your Sales Contract. In the event of a conflict between these Terms of Service, and the terms of your Sales Contract, the terms of the Sales Contract shall control.<br>If any payment instrument you tender is dishonored or returned unpaid for any reason (including a<br>credit card chargeback) by a financial institution, we will be entitled to collect from you a fee of $35 or<br>such larger amount as may be permitted by applicable law.</p>
<p style="text-align: left;">If your account with BidHub is past due, your subscription and use of this Website is subject to<br>interruption or termination as provided below, and BidHub may avail itself of all available collection<br>remedies. You agree to reimburse us the for fees of any collection agency we utilize, which may be<br>based on a percentage of the debt, and for all costs and expenses, including reasonable attorneys’ fees,<br>we incur in such collection efforts.&nbsp; If you are a current subscriber, you will maintain your current features, benefits, and pricing. Any changes made to the account or current subscription will forfeit your right to the previous pricing model and will activate the current pricing structure.</p>
<p style="text-align: left;"><strong>Refund Policy</strong></p>
<p style="text-align: left;"><strong>There are no refunds on purchases.&nbsp; All purchases are final.&nbsp;</strong></p>
<p style="text-align: left;"><strong>Subscribing to this Website</strong></p>
<p style="text-align: left;">You may subscribe to this Website either online or by submitting an application in paper form. If you<br>submit an application in paper form, it must be signed and it will be deemed to incorporate any<br>supporting documents and disclaimers on this Website that apply to online applications. If there is any conflict or inconsistency in terms between any online document and a subsequently submitted signed document, the conflict shall be resolved by relying on the document that is actually signed. Subscription applications submitted online are considered “pending acceptance and approval” and are not complete until a confirmation of approval and acceptance has been sent by BidHub. In the event an application cannot be accepted, any payment made shall be refunded or credited to the credit card account within a reasonable period.</p>
<p style="text-align: left;"><strong>Termination and Non-Renewal</strong></p>
<p style="text-align: left;">If you wish to terminate or not renew your subscription to this Website, you may do so at any time by calling BidHub at&nbsp;<strong>443-775-5190</strong>. BidHub does not accept notices of termination or non-renewal by e-mail or any other means, regardless of whether such notice is actually received by BidHub. BidHub will provide an e-mail confirmation of your termination or non-renewal to the address you designated when subscribing.</p>
<p style="text-align: left;">Any notice of non-renewal will be effective at the end of your then-current subscription term. Any<br>notice of termination will also be effective at the end of your then-current subscription term unless, in<br>connection with one- or two-year subscription plans involving monthly installment payments, you<br>indicate that you wish to make the cancellation effective immediately. In that case, immediate<br>cancellation will be conditioned upon payment of an early termination fee equal to one-half of the<br>unpaid portion of the total subscription fee for the then-current subscription term. For example, if you<br>have a one-year subscription the fee for which is payable in monthly installments and you notify us that you wish to cancel during month six of your one-year subscription, your subscription will remain active until the end of the one-year term unless you indicate you wish the cancellation to be effective<br>immediately and pay an early termination fee equal to three monthly installments. BidHub will not issue<br>prorated refunds of subscription fees already paid.<br>If you undertake any action or fail to take any action in breach or contravention of these Terms of<br>Service, including failure to make any required payment when due, BidHub may immediately and<br>without notice terminate your subscription and/or block or prevent your access to and use of this<br>Website.</p>
<p style="text-align: left;"><strong>Text Message</strong></p>
<p style="text-align: left;">Disclosures. By agreeing to the Terms of Service and providing your cell phone number upon sign up,<br>you agree to receive text offers and alerts from BidHub. Text message charges or other charges may be applied by your wireless carrier for these offers and alerts. If, at any time, you wish to opt out of future mobile (text) messages from BidHub, you may do so by replying “STOP” to any text message you receive from BidHub. You agree to opt out before changing your wireless service.</p>
<p style="text-align: left;"><strong>BidHub Screening Process</strong></p>
<p style="text-align: left;"><b>Licensing</b></p>
<p style="text-align: left;"><span style="font-weight: 400;">We make sure that our service professional businesses carry any applicable state-level trade licensing for the services for which we match them to consumers.</span></p>
<p style="text-align: left;"><b>Sex Offender Search</b></p>
<p style="text-align: left;"><span style="font-weight: 400;">We check the websites that consolidate state sex offender information in the state in which the owner/principal of the company is located to confirm that there is not a match based solely on the name of the owner/principal of the company.</span></p>
<p style="text-align: left;"><b>Legal Search for Civil Judgements</b></p>
<p style="text-align: left;"><span style="font-weight: 400;">We use third-party data sources to check the owner/principal of each business for bankruptcy filings, liens, and significant state-level civil legal judgments, in the state in which the owner/principal of the company is located.</span></p>
<p style="text-align: left;"><b>State Business Filings</b></p>
<p style="text-align: left;"><span style="font-weight: 400;">For service professionals that are corporations or limited liability companies, we confirm that the business is registered in the state in which it is located, and follows all laws required by the governing state and county it is working in.</span></p>
<p style="text-align: left;"><b>Criminal Records Search</b></p>
<p style="text-align: left;"><span style="font-weight: 400;">We use third party data sources to conduct a criminal search, in the state in which the owner/principal of the company is located, for any relevant criminal activity associated with the owner/principal of the business. The comprehensiveness of the NCD varies by state. Please be aware that the reporting in the NCD is particularly limited in the following states: AL, CO, DE, GA, ID, KS, KY, LA, ME, MA, MI, MS, MT, NE, NV, NH, NM, SD, UT, VA, VT, and WY.</span></p>
<p style="text-align: left;"><b>Referrals</b></p>
<p style="text-align: left;"><span style="font-weight: 400;">We ask the subscribing subcontractor for 3 positive references of jobs they have completed before. If the company is a new company, and does not have 3 references yet, we still allow them onto our platform we just track them closely and ask for references as they come so we can make sure they are trusted and qualified.</span></p>
<p style="text-align: left;"><b>Recommendations for the Homeowners and General Contractors using</b><a href="https://www.bidhub.com/"> <b>www.BidHub.com</b></a></p>
<ul style="text-align: left;">
<li><span style="font-weight: 400;">Ask to see a copy of the professional’s license to verify that it is current and in compliance with not only the state-level requirements, but also any local level requirements (township, city, county, etc.).</span></li>
<li><span style="font-weight: 400;">Ask whether the professional is insured and bonded.</span></li>
<li><span style="font-weight: 400;">Ask for additional customer references. You can also check</span><span style="font-weight: 400;"> ratings and reviews</span><span style="font-weight: 400;"> on Google, Yelp, and many other platforms, to see what other customers have had to say about a pro’s work.</span></li>
<li><span style="font-weight: 400;">Make sure the professional will pull any permits required for your job.</span></li>
<li><span style="font-weight: 400;">Be wary of bids that are substantially higher or lower than the competition. The lowest bid is not always the best!</span></li>
<li><span style="font-weight: 400;">Put it in writing. Get a</span><span style="font-weight: 400;"> contract</span><span style="font-weight: 400;"> stating exactly what is included in the scope of work for your project and make sure you review the contract very carefully before ever signing or <a class="vglnk" title="Link added by VigLink" href="http://i.viglink.com/?key=e1e3a39047f4a2bf3ffa8caa4e6f47ed&amp;insertId=4b94003978afc81d&amp;type=L&amp;exp=-100%3ACILITE%3A112&amp;libId=jwv25su30102quil000DA1eh9htvnegdco&amp;loc=https%3A%2F%2Fbidhub.com%2Fterms-of-service-and-refund-policy%2F&amp;v=1&amp;iid=4b94003978afc81d&amp;opt=true&amp;out=https%3A%2F%2Fwww.uship.com%2F&amp;title=Terms%20of%20Service%20and%20Refund%20Policy%20-%20Bid%20Hub&amp;txt=%3Cspan%3Emoving%3C%2Fspan%3E" rel="nofollow"><span>moving</span></a> forward with the project until you are %100 happy.</span></li>
<li><span style="font-weight: 400;">Never pay for an entire project upfront.</span></li>
<li><span style="font-weight: 400;">Keep records of everything — including proof of licensing, bonding and insurance, contracts, invoices, proof of payment, progress photos, and all project-related correspondence.</span></li>
</ul>
<p style="text-align: left;"><strong>Ownership of this Website and its Content</strong></p>
<p style="text-align: left;">This Website, including all of the software and code comprising or used to operate this Website, and all<br>of the text, photographs, images, illustrations, graphics, sound recordings, video and audio-video clips, and other materials available on this Website, including without limitation content submitted by users of this Website (collectively “Content”) are protected under applicable intellectual property and other laws, including without limitation the laws of the United States and other countries. All Content and intellectual property rights therein are the property of BidHub or the material is included with the permission of the rights owner and is protected pursuant to applicable copyright, trademark, and trade secret laws. All rights not expressly granted by this Agreement are reserved solely to BidHub, its vendors and/or licensors.</p>
<p style="text-align: left;">The presence of any Content on this Website does not constitute a waiver of any right in such Content.<br>You do not acquire ownership rights to any such Content viewed through this Website. Except as<br>otherwise provided herein, none of this Content may be used, copied, reproduced, distributed,<br>republished, downloaded, modified, displayed, posted or transmitted in any form or by any means,<br>including, but not limited to, electronic, mechanical, photocopying, recording, or otherwise, without our<br>express prior written permission. Any unauthorized use by you may subject you to penalties or damages. BidHub will enforce its intellectual property rights to the full extent of the law.</p>
<p style="text-align: left;">You may not use this Website for any purpose that is prohibited by any law or regulation, or to facilitate<br>the violation of any law or regulation. You may not use this Website or any of its Content to compete in<br>any manner with BidHub, nor may you resell or redistribute this Website’s content without prior express written consent of management of BidHub. You may not attempt to use any “deep-link,” “scraper,” “robot,” “bot,” “spider,” “data mining,” “computer code” or any other automated device, program, tool, algorithm, process or methodology or manual process having similar processes or functionality, to access, acquire, copy, or monitor any portion of this Website or any data or Content found on or accessed through this Website without prior express written consent of management of BidHub. You may not use this Website to obtain or attempt to obtain through any means any materials or information on this Website that has not been intentionally made publicly available either by public<br>display on this Website or through accessibility by a visible link on this Website. You may not use this<br>Website in a manner that would violate the security of this Website or attempt to gain unauthorized<br>access to this Website, data, materials, information, computer systems, or networks connected to any<br>server associated with this Website through hacking, password mining or any other means.</p>
<p style="text-align: left;">In consideration of your use of this Website, you agree to provide true, accurate, current, and complete information about yourself and to update that information as necessary. You may not impersonate any person or entity, or falsely state or otherwise represent an affiliation with a person or entity.</p>
<p style="text-align: left;">You agree not to upload or transmit through this Website any computer viruses, trojan horses, worms or anything else designed to interfere with, interrupt or disrupt the normal operating procedures of a computer. You may not interfere with, attempt to interfere with or otherwise disrupt the proper<br>working of this Website, any activities conducted on or through this Website or any servers or networks<br>connected to this Website, including accessing any data, content, or other information prior to the time<br>that it is intended to be available to the public on this Website. BidHub reserves the right to limit the<br>number of projects, contacts, and companies that can be viewed during any given time period. BidHub reserves the right to validate business authenticity as needed or required to support proper use of the<br>Website.</p>
<p style="text-align: left;">Permission is hereby granted to the extent necessary to lawfully access and use this Website and to display, download, or print portions of this Website on a temporary basis and for your personal and educational use only, provided that you: (i) do not modify the Content; (ii) you retain any and all<br>copyright and other proprietary notices contained in the Content; (iii) you do not copy or post the<br>Content on any network computer or broadcast the Content in any media; and (iv) you do not use the<br>Content to compete with BidHub.</p>
<p style="text-align: left;"><strong>Responsibility for User Generated Content Posted on or Through this Website</strong></p>
<p style="text-align: left;">In these Terms of Service, “User Generated Content” refers to all of the text, photographs, images, illustrations, graphics, sounds, video, audio-video clips, and other content you post on or through this Website using the social networking tools we make available to Website members. Examples of User Generated Content include user-submitted project descriptions and information in subscribers’ profiles.</p>
<p style="text-align: left;">You are responsible for User Generated Content you post on or through this Website. You are solely<br>responsible for the User Generated Content that you post on or through this Website. Under no<br>circumstances will we be liable in any way for any User Generated Content posted on or through this<br>Website. Such User Generated Content may be posted on or accessed through this Website in our sole discretion.</p>
<p style="text-align: left;">This means that you, not BidHub, are entirely responsible for all User Generated Content that you<br>upload, post, transmit, or otherwise make available to others on or through this Website and that you<br>can be held personally liable for comments that are defamatory, obscene, or libelous, or that violate<br>these Terms of Service, an obligation of confidentiality, or the rights of others. If any part of the User Generated Content you submit is not your original work, it is your responsibility to obtain any necessary permissions before you post that User Generated Content on or through this Website.</p>
<p style="text-align: left;">Because we do not control the User Generated Content posted on or through this Website, we cannot and do not warrant or guarantee the truthfulness, integrity, suitability, or quality of that User Generated Content. You also agree and understand that by accessing this Website, you may encounter User Generated Content that you may consider to be objectionable. We have no responsibility for any User Generated Content, including without limitation any errors or omissions therein. We are not liable for any loss or damage of any kind you claim was incurred as a result of the use of any User Generated Content posted, e-mailed, transmitted or otherwise made available on or through this Website. The User Generated Content posted on or through this Website expresses the personal opinions of the individuals who posted it and does not necessarily reflect the views of BidHub or any person or entity associated with BidHub.</p>
<p style="text-align: left;">You own User Generated Content you submit, but we may use it. You own the copyright in any original<br>User Generated Content you post on or through this Website. We do not claim any copyrights in User<br>Generated Content created and posted by individual visitors on or through this Website. However, by uploading, posting, transmitting, or otherwise making any User Generated Content available on or through this Website, you are granting us and our subsidiaries, affiliates, successors and assigns, a nonexclusive, fully paid, worldwide, perpetual, irrevocable, royalty-free, transferable license (with the right to sublicense through unlimited levels of sublicensees) to use, copy, modify, distribute, publicly display and perform, publish, transmit, remove, retain, repurpose, and commercialize that User Generated Content in any and all media or form of communication whether now existing or hereafter developed, without obtaining additional consent, without restriction, notification, or attribution, and without compensating you in any way, and to authorize others to do the same. For this reason, we ask that you not submit any User Generated Content that you do not wish to license to us, including any confidential information or product ideas. Please see our Privacy Statement for a description of how we may use certain types of User Generated Content that you post on or through this Website.</p>
<p style="text-align: left;">We may disclose and/or remove User Generated Content. BidHub reserves certain rights. We reserve the right (but do not have the obligation) to monitor all User Generated Content. We reserve the right to require that you avoid certain subjects, if we believe that doing so will help ensure compliance with applicable laws. We reserve the right (but do not assume the obligation) to remove or block any User Generated Content at any time without notice at our sole and absolute discretion. We reserve the right to disclose any User Generated Content and the identity of the user who posted or transmitted that User Generated Content in response to a subpoena or whenever we believe that disclosure is appropriate to comply with the law or a court order, to prevent or investigate a possible crime or other violation of law, to protect the rights of BidHub or others, or to enforce these Terms of Service. In addition, we reserve the right (but do not assume the obligation) to terminate your access to and use of this Website, or to censor, edit, or block your transmissions thereto in our sole discretion. You agree that our exercise of such discretion shall not render us the owners of the User Generated Content, and the user who made such User Generated Content available on or through this Website will retain ownership thereof as described above.</p>
<p style="text-align: left;"><strong>Restrictions on User Generated Content.</strong></p>
<p style="text-align: left;">It is a condition of these Terms of Service that you do not: upload, post, transmit or otherwise make available;</p>
<p style="text-align: left;">any User Generated Content that is unlawful, harmful, hateful, threatening, abusive, harassing, libelous, defamatory, obscene, vulgar, pornographic, profane, racially disparaging, indecent, or invasive of another’s privacy;</p>
<p style="text-align: left;">any User Generated Content that constitutes or promotes any illegal activity, including, without<br>limitation, any User Generated Content constituting or encouraging conduct that would be a criminal<br>offense, give rise to civil liability or otherwise violate</p>
<p style="text-align: left;">any local, state, national or foreign law;</p>
<p style="text-align: left;">any User Generated Content that is false, misleading, or fraudulent;</p>
<p style="text-align: left;">any User Generated Content that you do not have a right to make available under any law or under<br>contractual or fiduciary relationships (such as inside information or proprietary and confidential information learned or disclosed as part of employment relationships or under nondisclosure<br>agreements);</p>
<p style="text-align: left;">any User Generated Content that violates or infringes upon the rights of others, including User<br>Generated Content which violates the patent rights, copyrights, trademark rights, privacy rights,<br>publicity rights, trade secret rights, confidentiality rights, contract rights, or any other rights of any<br>individual, living or deceased, or any legal entity;</p>
<p style="text-align: left;">any User Generated Content that contains the image, name or likeness of anyone other than yourself,<br>unless: (i) that person is at least eighteen years old and you have first obtained his/her express<br>permission; or (ii) that person is under eighteen years old but you are his/her parent or legal guardian;</p>
<p style="text-align: left;">any request for or solicitation of any personal or private information from any individual;</p>
<p style="text-align: left;">any request for or solicitation of money, goods, or services for private gain;</p>
<p style="text-align: left;">any material that contains software viruses or any other computer code, files, or programs designed to<br>interrupt, destroy, or limit the functionality of any computer software or hardware or<br>telecommunications equipment; or</p>
<p style="text-align: left;">any User Generated Content that contains advertising, promotions, or marketing, or which otherwise has a commercial purpose inconsistent with the purposes of this Website;</p>
<p style="text-align: left;">impersonate any person or entity or falsely state or otherwise misrepresent your affiliation with a person or entity; or</p>
<p style="text-align: left;">violate any local, state, national, or international law, rule or regulation.</p>
<p style="text-align: left;">By posting User Generated Content on or through this Website, you represent and warrant that: (i) you<br>own or otherwise control all of the rights to the User Generated Content you post and have the right to<br>grant the license set forth in these Terms of Service; (ii) the User Generated Content you post is<br>accurate; and (iii) you are at least eighteen years old and you have read and understood – and your User<br>Generated Content fully complies with – these Terms of Service and applicable laws and will not cause<br>injury to any person or entity.</p>
<p style="text-align: left;">Remember, you are legally responsible for your User Generated Content. You can be held personally<br>liable if your User Generated Content is defamatory, obscene, or libelous, violates an obligation of<br>confidentiality, or violates the rights of others. You are also legally responsible for any User Generated<br>Content submitted by anyone logging onto this Website using your username and password, including those doing so without your authorization.</p>
<p style="text-align: left;"><strong>Your Feedback</strong></p>
<p style="text-align: left;">In these Terms of Service, “Feedback” refers to the content you post on or through this Website, other<br>than User Generated Content, that is specifically about how we can improve this Website and the<br>products and services we make available through this Website. Although we do not claim ownership of User Generated Content you post on or through this Website, the Feedback you provide to us through this Website will be and remain our exclusive property. Your submission of Feedback will constitute an assignment to us of all worldwide rights, title, and interests in your Feedback, including all copyrights and other intellectual property rights in your Feedback. We will be entitled to reduce to practice, exploit, make, use, copy, disclose, display or perform publicly, distribute, improve, and modify any Feedback you submit for any purpose whatsoever, without restriction and without compensating you in any way. For this reason, we ask that you not send us any Feedback that you do not wish to assign to us.</p>
<p style="text-align: left;"><strong>Removal of Content</strong></p>
<p style="text-align: left;">In general, you can report objectionable content on this Website by e-mailing us at support@BidHub.com or by calling us at (877)737-6482. While we do not have any obligation to remove content from this Website merely because of a removal request, we will review all such requests and will remove content that we determine should be removed, in our sole discretion and in accordance with our Terms of Service and applicable law. Please be aware, however, that if the content has already been distributed to other Websites or published in other media, we will not be able to recapture and delete it. Also, a back-up or residual copy of the content we remove from this Website may remain on back-up servers.</p>
<p style="text-align: left;">Violation of copyrights. BidHub does not knowingly violate or permit others to violate the copyrights of<br>others. We will promptly remove or disable access to material that we know is infringing or if we<br>become aware of circumstances from which infringing activity is apparent.</p>
<p style="text-align: left;">If you are requesting removal of Content because of a violation of your copyrights, please note that the<br>Digital Millennium Copyright Act of 1998 (the “DMCA”) provides recourse for copyright owners who believe that material appearing on the Internet infringes their rights under U.S. copyright law. If you<br>believe that your own work, or the work of a third party for whom you are authorized to act, is featured on this Website or has been otherwise copied and made available on this Website in a manner that constitute copyright infringement, please notify our Copyright Agent immediately. Your notice must be in writing and must include:</p>
<p style="text-align: left;">an electronic or physical signature of the copyright owner or of the person authorized to act on behalf of the owner of the copyright interest;</p>
<p style="text-align: left;">a description of the copyrighted work that you claim has been infringed;</p>
<p style="text-align: left;">a description of where the material that you claim is infringing is located on this Website (including the<br>URL, title and/or item number if applicable, or other identifying characteristics);</p>
<p style="text-align: left;">your name, address, telephone number, and e-mail address, and, if you are not the owner of the<br>copyright, the name of the owner; and</p>
<p style="text-align: left;">a written statement by you that you have a good-faith belief that the disputed use is not authorized by the copyright owner, its agent, or the law; and</p>
<p style="text-align: left;">a statement by you, made under penalty of perjury, that the above information in your notice is<br>accurate and that you are the copyright owner or authorized to act on the copyright owner’s behalf.</p>
<p style="text-align: left;"><strong>Your statement must be addressed as follows:</strong></p>
<p style="text-align: left;">Mr. Brent Burgess<br>Simple Bidding Solutions LLC<br>41 Old Solomons Island Road<br>Suite 201<br>Annapolis, MD 21401<br><strong>443-775-5190</strong></p>
<p style="text-align: left;">Any notification by a copyright owner or a person authorized to act on its behalf that fails to comply<br>with requirements of the DMCA shall not be considered sufficient notice and shall not be deemed to confer upon us actual knowledge of facts or circumstances from which infringing material or acts are evident.</p>
<p style="text-align: left;"><strong>Trademarks</strong></p>
<p style="text-align: left;">The BidHub names and logos, all product and service names, all page headers, all custom graphics, all<br>button icons, and all trademarks, service marks and logos appearing on this Website, unless otherwise<br>noted, are trademarks (whether registered or not), service marks and/or trade dress of BidHub (the<br>“BidHub Marks”). All other trademarks, product names, company names, logos, service marks and/or trade dress mentioned, displayed, cited or otherwise indicated on this Website are the property of their respective owners. You are not authorized to display or use the BidHub Marks in any manner without our prior written permission. You are not authorized to display or use trademarks, product names, company names, logos, service marks and/or trade dress of other owners featured on this Website without the prior written permission of such owners. The use or misuse of the BidHub Marks or other trademarks, product names, company names, logos, service marks and/or trade dress or any other materials contained herein, except as permitted herein, is expressly prohibited. In particular, you may not use any trademark displayed on this Website as a “hot” link without the prior written approval of the trademark owner.</p>
<p style="text-align: left;"><strong>No-Sharing Policy</strong></p>
<p style="text-align: left;">Your subscription, including your username and password, are personal to you and may not be used by anyone else. Any sharing of your account information, login, passwords, or the information, content and data provided by this Website, with any other person, firm or entity is strictly prohibited. You are responsible for maintaining the confidentiality of your password and username. You are also responsible for every instance in which your account information, login, passwords, or the information, content and data provided by this Website is used by someone other than you, whether or not authorized by you.</p>
<p style="text-align: left;">BidHub reserves the right, and you hereby authorize BidHub, to charge your credit card an additional monthly fee for such use in violation of this no-sharing policy. Access to this Website through the use of a specific user name and password will be terminated if there is an attempt to establish concurrent access to this Website using the same user name and password.</p>
<p style="text-align: left;">You agree to change your password immediately if you believe your password may have been<br>compromised or used without authorization. You also agree to immediately inform us of any apparent<br>breaches of security such as loss, theft, or unauthorized disclosure or use of your username or password by e-mailing us at support@BidHub.com. Until we are so notified you will remain liable for any<br>unauthorized use of your account.</p>
<p style="text-align: left;"><strong>DISCLAIMERS</strong></p>
<p style="text-align: left;">WE MAKE NO REPRESENTATIONS OR WARRANTIES WITH RESPECT TO THIS WEBSITE OR ITS CONTENT, OR ANY PRODUCT OR SERVICE AVAILABLE ON OR PROMOTED THROUGH THIS WEBSITE. THIS WEBSITE<br>AND ALL OF ITS CONTENT (INCLUDING USER GENERATED CONTENT) ARE PROVIDED ON AN “AS IS,” “AS AVAILABLE” BASIS, WITHOUT REPRESENTATIONS OR WARRANTIES OF ANY KIND. TO THE FULLEST EXTENT PERMITTED BY LAW, BIDHUB, ITS AFFILIATES, AND THEIR SERVICE PROVIDERS AND LICENSORS<br>DISCLAIM ANY AND ALL REPRESENTATIONS AND WARRANTIES, WHETHER EXPRESS, IMPLIED, ARISING BY STATUTE, CUSTOM, COURSE OF DEALING, COURSE OF PERFORMANCE OR IN ANY OTHER WAY, WITH RESPECT TO THIS WEBSITE, ITS CONTENT, AND ANY PRODUCTS OR SERVICES MADE AVAILABLE THROUGH THIS WEBSITE. WITHOUT LIMITING THE GENERALITY OF THE FOREGOING, BIDHUB, ITS AFFILIATES, AND THEIR SERVICE PROVIDERS AND LICENSORS DISCLAIM ALL REPRESENTATIONS AND WARRANTIES: (A) OF TITLE, NON-INFRINGEMENT, MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE; (B) RELATING TO THE SECURITY OF THIS WEBSITE; (C) THAT THE CONTENT OR OTHER INFORMATION ON THIS WEBSITE, OR TO ANY WEBSITES WITH WHICH IT IS LINKED, IS ACCURATE, COMPLETE OR CURRENT; OR (D) THAT THIS WEBSITE WILL OPERATE SECURELY OR WITHOUT INTERRUPTION OR ERROR.</p>
<p style="text-align: left;">WE DO NOT REPRESENT OR WARRANT THAT THIS WEBSITE, ITS SERVERS, OR ANY TRANSMISSIONS SENT FROM US OR THROUGH THIS WEBSITE WILL BE FREE OF ANY HARMFUL COMPONENTS (INCLUDING VIRUSES).</p>
<p style="text-align: left;">WHILE BIDHUB STRIVES FOR ACCURACY, IT DOES NOT WARRANT OR GUARANTEE THE ACCURACY OR COMPLETENESS OF ANY INFORMATION OR DATABASE ON THIS WEBSITE. BIDHUB DOES NOT ENDORSE AND IS NOT RESPONSIBLE FOR STATEMENTS, ADVICE AND OPINIONS MADE BY ANYONE OTHER THAN AUTHORIZED BIDHUB SPOKESPERSONS. WE DO NOT ENDORSE AND ARE NOT RESPONSIBLE FOR ANY STATEMENTS, ADVICE OR OPINIONS CONTAINED IN USER GENERATED CONTENT AND SUCH STATEMENTS, ADVICE AND OPINIONS DO NOT IN ANY WAY REFLECT THE STATEMENTS, ADVICE AND OPINIONS OF BIDHUB. WE DO NOT MAKE ANY REPRESENTATIONS OR WARRANTIES AGAINST THE POSSIBILITY OF DELETION, MIS-DELIVERY OR FAILURE TO STORE COMMUNICATIONS, PERSONALIZED SETTINGS, OR OTHER DATA. YOU ACCEPT THAT OUR SHAREHOLDERS, OWNERS, OFFICERS, DIRECTORS, EMPLOYEES AND OTHER REPRESENTATIVES SHALL HAVE THE BENEFIT OF THIS CLAUSE.</p>
<p style="text-align: left;">APPLICABLE LAW MAY NOT ALLOW THE LIMITATION OF CERTAIN WARRANTIES, SO ALL OR PART OF THIS DISCLAIMER OF WARRANTIES MAY NOT APPLY TO YOU.</p>
<p style="text-align: left;"><strong>LIMITATION OF LIABILITY</strong></p>
<p style="text-align: left;">WE ARE NOT RESPONSIBLE OR LIABLE IN ANY MANNER FOR ANY USER GENERATED CONTENT. ALTHOUGH WE INCLUDE STRICT PROVISIONS REGARDING USER GENERATED CONTENT IN THESE TERMS OF SERVICE, WE DO NOT CONTROL AND ARE NOT RESPONSIBLE FOR WHAT USERS POST ON OR THROUGH THIS WEBSITE AND ARE NOT RESPONSIBLE FOR ANY OFFENSIVE, INAPPROPRIATE, OBSCENE, UNLAWFUL, INFRINGING OR OTHERWISE OBJECTIONABLE OR ILLEGAL USER GENERATED CONTENT YOU MAY ENCOUNTER ON THIS WEBSITE OR IN CONNECTION WITH YOUR USE OF THIS WEBSITE.</p>
<p style="text-align: left;">TO THE FULLEST EXTENT PERMITTED BY APPLICABLE LAWS WE, ON BEHALF OF OUR DIRECTORS, OFFICERS, EMPLOYEES, AGENTS, SUPPLIERS, LICENSORS AND SERVICE PROVIDERS, EXCLUDE AND DISCLAIM LIABILITY FOR ANY LOSSES AND EXPENSES OF WHATEVER NATURE AND HOWSOEVER ARISING INCLUDING, WITHOUT LIMITATION, ANY DIRECT, INDIRECT, GENERAL, SPECIAL, PUNITIVE, INCIDENTAL OR CONSEQUENTIAL DAMAGES; LOSS OF USE; LOSS OF DATA; LOSS CAUSED BY A VIRUS; LOSS OF INCOME OR PROFIT; LOSS OF OR DAMAGE TO PROPERTY; CLAIMS OF THIRD PARTIES; OR OTHER LOSSES OF ANY KIND OR CHARACTER, EVEN IF WE HAVE BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES OR LOSSES, ARISING OUT OF OR IN CONNECTION WITH THE USE OF THIS WEBSITE OR ANY WEBSITE WITH WHICH IT IS LINKED, OR ANY MERCHANDISE AVAILABLE ON THIS WEBSITE. YOU ASSUME TOTAL RESPONSIBILITY FOR ESTABLISHING SUCH PROCEDURES FOR DATA BACK UP AND VIRUS CHECKING AS YOU CONSIDER NECESSARY. THIS LIMITATION OF LIABILITY APPLIES WHETHER THE ALLEGED LIABILITY IS BASED ON CONTRACT, TORT (INCLUDING NEGLIGENCE), STRICT LIABILITY OR ANY OTHER BASIS.</p>
<p style="text-align: left;">IF ANY PART OF THIS LIMITATION ON LIABILITY IS FOUND TO BE INVALID OR UNENFORCEABLE FOR ANY REASON, THEN THE AGGREGATE LIABILITY OF THE RELEASED PARTIES FOR LIABILITIES THAT OTHERWISE WOULD HAVE BEEN LIMITED SHALL NOT EXCEED TEN DOLLARS ($10.00).</p>
<p style="text-align: left;">These Terms of Service give you specific legal rights and you may also have other rights, which vary from country to country. Some jurisdictions do not allow certain kinds of limitations or exclusions of liability, so the limitations and exclusions set out in these Terms of Service may not apply to you. Other<br>jurisdictions allow limitations and exclusions subject to certain conditions. In such a case the limitations<br>and exclusions set out in these Terms of Service shall apply to the fullest extent permitted by the laws of such applicable jurisdictions. Your statutory rights as a consumer, if any, are not affected by these provisions, and we do not seek to exclude or limit liability for fraudulent misrepresentation.</p>
<p style="text-align: left;"><strong>Links to Other Websites</strong></p>
<p style="text-align: left;">This Website may provide links to other Websites operated by third parties. Because we have no control over third-party Websites, we are not responsible for the availability of those Websites and do not endorse and are not responsible or liable for any content, advertising, services, products, or other materials on or available from such Websites. BidHub shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with the use of or reliance on any content, advertising, services, products, or other materials on or available from such Websites. These Terms of Service do not apply to your use of third-party Websites; your use of such Websites is subject to the terms and policies of the owner of such Websites.</p>
<p style="text-align: left;"><strong>Modification and Discontinuation</strong></p>
<p style="text-align: left;">We reserve the right at any time and from time-to-time to modify, edit, delete, suspend or discontinue,<br>temporarily or permanently this Website (or any portion thereof) and/or the information, materials,<br>products and/or services available through this Website (or any part thereof) with or without notice.<br>You agree that we shall not be liable to you or to any third party for any such modification, editing,<br>deletion, suspension or discontinuance of this Website.</p>
<p style="text-align: left;"><strong>Interpretation</strong></p>
<p style="text-align: left;">As used in these Terms of Service, the term “including” means “including, but not limited to.”</p>
<p style="text-align: left;"><strong>Waiver</strong></p>
<p style="text-align: left;">Our failure at any time to require performance of any provision of these Terms of Service or to exercise any right provided for herein will not be deemed a waiver of such provision or such right. All waivers must be in writing. Unless the written waiver contains an express statement to the contrary, no waiver by BidHub of any breach of any provision of these Terms of Service or of any right provided for herein will be construed as a waiver of any continuing or succeeding breach of such provision, a waiver of the provision itself, or a waiver of any right under these Terms of Service.</p>
<p style="text-align: left;"><strong>Severability</strong></p>
<p style="text-align: left;">If any provision of these Terms of Service is held by a court of competent jurisdiction to be contrary to<br>law, such provision will be changed and interpreted so as to best accomplish the objectives of the<br>original provision to the fullest extent allowed by law and the remaining provisions of these Terms of<br>Service will remain in full force and effect.</p>
<p style="text-align: left;"><strong>Governing Law, Jurisdiction and Venue</strong></p>
<p style="text-align: left;">You acknowledge and agree that although the information and materials on this Website may be read throughout the world, this Website is designed and intended for use in the United States, and that your use of this Website and these Terms of Service will be governed by the laws of the State of Maryland applicable to contracts made and performed there, without regard to conflicts of law principles. If you access this Website from another country, you are responsible for compliance with any and all applicable local laws. If the information and materials on this Website do not conform to the laws of the country where you access this Website, the information is not meant for you. BidHub makes no representation that the information and materials contained on this Website are appropriate outside<br>the United States. You agree that in the event that any dispute arises under these Terms of Service or in connection with your use of this Website, the laws of the State of Maryland shall apply without regard to its choice of law provisions or rules. You agree that any dispute arising from these Terms of Service or related documents or matters, other than a suit by SIMPLE BIDDING SOLUTIONS LLC to collect subscription fees, shall be submitted to commercial arbitration under the rules and procedures of the American Arbitration Association. Such arbitration shall be held in Anne Arundel County, Maryland or such other place as the parties may agree. Furthermore, you waive to the fullest extent permitted by law, trial by jury in any action, proceeding or counterclaim brought by either of such parties against the other with respect to any matter whatsoever arising out of or in any way connected with these Terms of Service. Any provision of these Terms of Service which is held by a court of competent jurisdiction or arbitrator to be prohibited or unenforceable shall be ineffective to the extent of such prohibition or unenforceability, without invalidating or rendering unenforceable the remaining provisions of these Terms of Service. The Parties agree that (i) no arbitration proceeding hereunder whether a CONSUMER DISPUTE or a BUSINESS DISPUTE shall be certified as a class action or proceed as a class action, or on a basis involving claims brought in a purported representative capacity on behalf of the general public, other customers or potential customers or Persons similarly situated, and (ii) no arbitration proceeding hereunder shall be consolidated with, or joined in any way with, any other arbitration proceeding. THE PARTIES AGREE TO ARBITRATE A CONSUMER DISPUTE OR BUSINESS DISPUTE ON AN INDIVIDUAL BASIS<br>AND EACH WAIVES THE RIGHT TO PARTICIPATE IN A CLASS ACTION.</p>
<p style="text-align: left;"><strong>Indemnity</strong></p>
<p style="text-align: left;">You agree to indemnify and hold BidHub, its subsidiaries, and affiliates, and their respective officers, agents, partners and employees, harmless from any loss, liability, claim, or demand, including<br>reasonable attorneys’ fees, made by any third party due to or arising out of your use of this Website in<br>violation of these Terms of Service and/or arising from a breach of these Terms of Service and/or any<br>breach of your representations and warranties set forth above and/or if any content that you post on or<br>through this Website causes us to be liable to another. We reserve the right to defend any such claim, and you agree to provide us with such reasonable cooperation and information as we may request.</p>
<p style="text-align: left;"><strong>Miscellaneous</strong></p>
<p style="text-align: left;">These Terms of Service do not create a partnership or joint venture between you and BidHub and<br>neither party is authorized to act as agent or bind the other party except as expressly stated in these<br>Terms of Service.</p>
<p style="text-align: left;">You represent and certify that you have any and all requisite licenses, bonds, certifications and<br>credentials that are necessary to perform any and all work on jobs that you bid for.</p>
<p style="text-align: left;">You will not assign or delegate any work that you agree to perform.</p>
<p style="text-align: left;">You acknowledge that BidHub make no warranties, guarantees, and/or representations as to: (1) the<br>number of contractors that will be soliciting work; (2) the number requests for work that will be<br>available to bid on; and/or (3) the income, revenue and profits you will generate from your subscription.</p>
<p style="text-align: left;">You understand and agree that in the event you are not paid for work you have performed or materials<br>you furnished, you are to look solely to the contractor you have contracted with, and you indemnify and<br>hold BidHub harmless from any and all liability.</p>
<p style="text-align: left;"><strong>Entire Agreement</strong></p>
<p style="text-align: left;">These Terms of Service together with our Privacy Statement, any click-through agreements on this<br>Website, and, if you are a subscriber, the terms contained on the BidHub Subscription Signup pages, contain the entire understanding and agreement between you and BidHub with respect to this Website and supersede all previous communications, negotiations and agreements, whether oral, written, or electronic, between you and BidHub with respect to this Website and your use of this Website.</p>
</div></div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
    
    
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{$assets_path_public_eli}}/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{$assets_path_public_eli}}/node_modules/popper/popper.min.js"></script>
    <script src="{{$assets_path_public_eli}}/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        // ==============================================================
        // Login and Recover Password
        // ==============================================================
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
        
        $('#reg-form').validate({
						rules: {
							email: {
							   required: true,
							   email: true
							   },
							password: {
							   required: true,
							   minlength: 8
							   },
							password_confirmation: {
							   required: true,
							   equalTo : "#password"
							   },
							terms: {
							   required: true
							   }	
						},
						  messages: {
							field_email: "Please enter a valid email.",
							password_confirmation: "Password does not match",
							terms: "Please check to accept terms and conditions."
						},
						
        });
    </script>
</body>

</html>
