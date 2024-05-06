@extends('web.includes.master')

@section('content')

<div class="mt-110">
    <div class="container np-container">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-12">
                <!-- breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">

                        @if ( app()->getLocale() == 'en' )
                        <li class="breadcrumb-item"><a href="{{route('home', [$region])}}" style="color: #000;"><strong>Home</strong></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)" style="color:#1DACE3;"><strong>Privacy-Policy</a></strong></li>
                        @endif
                        @if ( app()->getLocale() == 'ar' )
                        <li class="breadcrumb-item"><a href="{{route('home', [$region])}}" style="color: #000;"><strong> الرئيسية </strong></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)" style="color:#1DACE3;"><strong>سياسية الخصوصية </a></strong></li>
                        @endif

                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Slider Section Start-->
<section class="mt-2">
    <div class="container np-container">



        <div class="dcm_banner" style="background: url('{{URL::to('/public/web_assets/images/banner/dcm_banner.png')}}') no-repeat; background-size: cover; border-radius: 0.5rem; background-position: center">
            <h1 class="text-center" style="padding-top: 200px;color:#fff ;font-size:35px">{{ __('translation.Privacy_Policy') }}</h1>
        </div>

        <div class="dcm_banner_mobile">
            <h1 class="text-center" style="padding-top:40px;color:#fff">{{ __('translation.Privacy_Policy') }}</h1>
        </div>

    </div>
    </div>
</section>
<!-- Slider Section End-->



<section class="mt-4">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-6 text-center">
            </div>
        </div>
    </div>
</section>


<!-- Privacy-Policy section Start-->
<section class="my-lg-5 my-8">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-lg-12 col-12">


                @if ( app()->getLocale() == 'en' )
                <div class="text-center text-md-start">

                    <p class="mb-0">

                        The website and mobile application <a href="https://dealsandcouponsmena.com" style="color: #1DACE3;">dealsandcouponsmena.com</a>("Website," "Our Website," "Site") is operated in UAE (collectively, "We", "Our," "Dealsandcouponsmena," or "Us," wherein such expression, unless revolting to the context thereof, shall be deemed to include its respective legal heirs, representatives, administrators, permitted successors and assigns
                        <a href="https://dealsandcouponsmena.com" style="color: #1DACE3;">dealsandcouponsmena.com</a> must capture, store, and transmit specific information from website visitors (referred to as "Users") in order to provide the Services (as defined in clause 1 below), which is necessary for providing the Services. This privacy statement ("Privacy Statement"/"Policy") describes how We may collect, use, disclose, and/or otherwise handle personal information about Users of the Services (also referred to herein as "You," "Your," "Yourself," or "User" or "Users" collectively or singly).To demonstrate our ongoing commitment to protecting the privacy of the User information that interacts with our Services, we have developed this Privacy Policy. Our Terms & Conditions and this Privacy Policy govern how you may use and access the Services. The definition given to any capitalized term used in this privacy policy but not otherwise specified is found in our terms and conditions.

                        The headers used here are solely for the purpose of organizing the Privacy Policy's numerous elements. The titles are only included for the convenience of reference and should not be read as limiting or extending the requirements of the clauses therein.

                        Unless the context clearly demands otherwise, the terms defined in this privacy statement shall have the meanings assigned to them below, and their cognate phrases shall be interpreted in accordance with those definitions.

                        Personal information is defined as any information relating to a natural person that, directly or indirectly, when combined with other information available to or likely to be available to a body corporate, is capable of identifying that person. This definition is consistent with Rule 2(1)(i) of the Information Technology (Reasonable Security Practices and Procedures and Sensitive Personal Data or Information) Rules, 2011.

                    </p>
                    <p class="mb-5">
                        The headers used here are solely for the purpose of organizing the Privacy Policy's numerous elements. The titles are only included for the convenience of reference and should not be read as limiting or extending the requirements of the clauses therein.
                    </p>
                    <p class="mb-5">
                        Unless the context clearly demands otherwise, the terms defined in this privacy statement shall have the meanings assigned to them below, and their cognate phrases shall be interpreted in accordance with those definitions.
                    </p>

                    <p class="mb-5">
                        Personal information is defined as any information relating to a natural person that, directly or indirectly, when combined with other information available to or likely to be available to a body corporate, is capable of identifying that person. This definition is consistent with Rule 2(1)(i) of the Information Technology (Reasonable Security Practices and Procedures and Sensitive Personal Data or Information) Rules, 2011.
                    </p>

                    <p class="mb-5">
                    <p style="font-weight: bold;">According to the SPI Rules, "Sensitive Personal Data or Information" of a person is defined as Personal Data concerning that person that relates to :</p>

                    <li>● Passwords</li>
                    <li>● financial details, such as bank accounts, credit, and debit card information, or information on other payment instruments;</li>
                    <li>● sexual orientation;</li>
                    <li>● sexual orientation;</li>
                    <li>● physical, physiological, and mental wellness;</li>
                    <li>● medical history and records;</li>
                    <li>● biometric details;</li>
                    <li>● information obtained by a corporation through a valid contract or another means;</li>
                    <li>● visitor information as supplied at registration or later; and;</li>
                    <li>● call history logs;</li>

                    </p>

                    <p class="mb-5">
                        When someone visits and/or uses the Services, they are referred to as "You," "Your," "Yourself," and "User." This term also includes those who use the Services after having someone else submit their information on their behalf.
                    </p>

                    <p class="mb-5">
                        Any website/application/web portal, business, or person other than the User and Us are referred to as "Third Parties."
                    </p>

                    <p class="mb-5">
                        The term "Services" refers to the website <a href="https://dealsandcouponsmena.com" style="color: #1DACE3;">dealsandcouponsmena.com</a> and mobile application (dealsandcouponsmena), as well as any contextual data sent to or received from Users through various channels of communication, such as but not restricted to email, SMS, WhatsApp, Notification, phone calls, website chat, and IVR. Our main line of work is offering cash-back services that are compatible with web and mobile applications.
                        We presently conduct business under the brand name Dealsandcouponsmena, which largely drives sales to the affiliated e-commerce websites.
                    </p>

                    <p class="mb-5">
                        Personal information and sensitive personal data or information are both considered to be "User Information."
                    </p>

                    <p class="mb-5">
                        The terms "Website" and "Dealsandcouponsmena" refer to the website at <a href="https://dealsandcouponsmena.com" style="color: #1DACE3;">dealsandcouponsmena.com</a> , respectively. The terms "Application" and/or "App" refer to the Dealsandcouponsmena mobile app, which is accessible on the iOS App Store or Android Play Store. These will be referred to as the "Platform" together.
                    </p>


                    <p class="mb-5">
                    <p style="font-weight: bold;">WHAT'S THE WHOLE POINT OF THIS PRIVACY POLICY? </p>

                    <p class="mb-5" style="font-size: 16px;">
                        This privacy statement was created in accordance with, among other things,
                    </p>
                    </p>


                    <p class="mb-5">
                        "Intermediaries Guidelines" refers to Section 43A of the Information Technology Act of 2000, Regulation 4 of the SPI Rules, and Regulation 3(1) of the Information Technology (Intermediaries Guidelines) Rules of 2011.
                        This privacy statement includes, among other things, the following:
                    </p>

                    <p class="mb-5">
                        The type of information obtained from Users, including sensitive personal data or information; the reason(s) for collecting it; the methods by which it will be used; and the recipients of the information that We will disclose.
                    </p>

                    <p style="font-weight: bold;">GENERAL </p>
                    <p class="mb-5">
                        The User hereby expressly acknowledges and agrees that this Policy and the foregoing Terms and Conditions constitute a legally binding agreement between the User and Dealsandcouponsmena, and that the User shall be subject to the rules, policies, guidelines, terms, and conditions applicable to any service provided by Dealsandcouponsmena,
                        including the Services, and that such rules, policies, guidelines, terms, and conditions shall be deemed to be incorporated into and treated as part of the Terms and Conditions.
                    </p>

                    <p class="mb-5">
                        According to the Information Technology Act of 2000 and any applicable rules, as well as the provisions of different statutes that have been updated to reflect the Information Technology Act's amendments, this document is an electronic record. There are neither physical nor digital signatures necessary for this electronic record because it is produced by a computer system. The SPI Rules and Intermediaries Guidelines are also followed in the publication of this material.
                    </p>
                    <p class="mb-5">
                        Depending on what the circumstances call for, the terms "Party" and "Parties" will be used to refer to Dealsandcouponsmena individually and collectively as well as to the User.
                    </p>



                    <p class="mb-5">
                    <p style="font-weight: bold;">12. Additional services: </p>
                    </p>

                    <p class="mb-5">
                        Occasionally, we or our partners may offer new or improved services through the Platform. Additional terms and conditions may apply while using those services,
                        and you must abide by them. Any violation by you of a substantial term of the conditions governing such services shall constitute a breach of this Agreement,
                        provided that those terms are properly disclosed to you on the Platform when you agree to use those services (as determined by us in our reasonable discretion).

                    </p>

                    <p class="mb-5">
                        The headers of each section in this Policy serve solely to organize the different provisions under it in a logical order;
                        neither Party shall use them to interpret this Policy's provisions in any way. The Parties expressly agree that the headings shall not have any legal or contractual significance.
                    </p>

                    <p class="mb-5">
                        Subject to clause 13 of this Policy, the Parties expressly agree that Dealsandcouponsmena shall have the sole and exclusive right to amend or modify this Policy and the foregoing Terms and Conditions without the User's consent or notification and in accordance with generally accepted business practices and applicable laws. The User expressly agrees that any such amendments or modifications shall be effective immediately.
                        The User is responsible for reviewing the Policy and Terms and Conditions on a regular basis to be informed of their provisions and demands. The User shall be deemed to have agreed to any and all changes/modifications made to the Policy and Terms and Conditions if the User uses the Services after such a change. The right to enter, access, and use the Services is given to the User on a personal, non-exclusive, non-transferable, revocable basis as long as the User complies with the Policy and Terms and Conditions.
                    </p>


                    <p class="mb-5">
                    <p style="font-weight: bold;">THE GATHERING AND HANDLING OF PERSONAL DATA </p>
                    </p>

                    <p class="mb-5">
                        We place a high priority on protecting the parties' privacy, and all of our services completely adhere to the legal guidelines established by the UAE government.
                        contact information (such as your phone number and email address);
                        passwords and user names;
                        demographic information (including your name, gender, age, birth date, and pin code);

                        Information relating to how you use the services and other transactions you have with third parties while using the services;
                        Information on your web browser, web and mobile surfing habits, and preferred retailers as well as clicks made on and from your Dealsandcouponsmena mobile device
                        Your bank account details, such as the name of the account, account number,bank branch, or any other information pertaining to payments
                        According to the SPI Rules, the data We acquire from You qualifies as "Personal Information" or
                        "Sensitive Personal Data Information."
                    </p>

                    <p class="mb-5">
                    <p style="font-weight: bold;">Privacy Statement </p>
                    </p>

                    <p class="mb-5">
                        You hereby expressly consent to receive communications from Dealsandcouponsmena by SMS, emails, notifications from mobile apps and browsers, and any other messages from time to time regarding Services offered through the Website.
                    </p>

                    <p class="mb-5">
                        ● The User hereby fully accepts and agrees that: <br>
                        ● For the purposes of this Policy, "Personal Information" or "Sensitive Personal Data or Information" does not include information that is readily accessible in the public domain or accessible under the Right to Information Act, 2005, or any other law. <br>
                        ● The User expressly agrees that Dealsandcouponsmena may monitor information about the User automatically based on the User's IP address and the User's activity on the Platform. The User is aware that Dealsandcouponsmena may use this information for internal purposes such as researching user demographics, interests, and behavior in order to better understand and serve the needs of the Users. Furthermore, the User is explicitly informed that this information may contain facts about the User's computer and web browser, IP address, mobile device, etc. In order to make it easier to provide the Services to You, the connection between a User's IP address and their personally identifiable information may be shared with or disclosed to third parties. The User hereby gives permission for Dealsandcouponsmena to share their information with any third parties that they may choose in the future. For market research and the creation of new features, we may also share and/or disclose some of the overall findings (but not the specific data) in anonymized form with third parties. <br>
                        ● That Dealsandcouponsmena may gather and compile any and all information about the User, whether or not the User directly provides it to Dealsandcouponsmena, including but not limited to personal correspondence like emails, letters, SMS, WhatsApp Notifications, or calls, feedback from other users or third parties regarding the User's activities or postings on the Platform, etc., into a file or folder specifically created for or assigned to the User, and <br>
                        ● Additionally, we occasionally send you emails, SMS, WhatsApp notification(s), app notifications, and other marketing communication to keep you updated on your actions on the website. These include the transaction messages that show your Cashback earnings, the referral messages that show your referrals' earnings, the payment confirmations that show payments made to you, the crucial administrative messages, and the messages that show Your activity on the website. These emails are only shared with you; nobody else will receive them. <br>
                        ● We also send out newsletters, SMS, app alerts, browser notifications, WhatsApp notifications, newsletters, and other marketing campaigns that highlight some of our greatest suggestions for ways to help you save more. By notifying Us at any time, you can decide not to receive this commercial communication from Dealsandcouponsmena. <br>

                        Spamming by our members is not acceptable, and our Terms and Conditions expressly forbid it. Please get in touch with us if you want to report a spamming occurrence so we can look into it and take appropriate action.

                        That Dealsandcouponsmena may send the User offers and promotions, whether or not based on the User's prior interests, using the contact information the User has provided, and the User hereby expressly consents to receive the same. The User can opt-out of receiving promotional communications by clicking the "unsubscribe" link at the bottom of each such communication or by sending an email sometimes, Dealsandcouponsmena might ask the user to participate in a free online survey. The User might be asked to submit contact and demographic data for these surveys (like zip code, age, income bracket, sex, etc.). The user is aware that this data is used to enhance and/or customize the services for new and existing users, consequently offering all users the pertinent services that Dealsandcouponsmena thinks they might be interested in using.
                        that on rare occasions, Dealsandcouponsmena might ask the user to give feedback on products or services they've used.

                        The User expressly grants Dealsandcouponsmena permission to publish any and all reviews that the User posts on the Platform, along with the User's name and specific contact information, for the use and benefit of other Users. The User is aware that such reviews will assist potential Users of the Platform in using the Services.

                        The User hereby expressly authorizes Dealsandcouponsmena to remove from the Platform any such content, review, survey, or feedback submitted by the User, without cause or being required to notify the User of the same. Nothing in this agreement shall be deemed to require Dealsandcouponsmena to store, upload, publish, or display in any manner content/reviews/surveys/feedback submitted by the User.

                        The User's express consent is required for the generation and collection of "Sensitive Personal Data or Information" in line with the Information Technology Act, 2000, as modified from time to time and related rules. The User gives approval to the generation and collection of the data as needed by applicable legislation by indicating assent to this Policy and by clicking the "I agree with Terms and Policy" button during registration.

                        The accuracy of the information provided to Dealsandcouponsmena must be verified by the User. The User may contact Dealsandcouponsmena through email to rectify, erase errors, or update information. Dealsandcouponsmena will use all reasonable efforts to implement requested changes as soon as it is practical to do so in the databases.

                        Dealsandcouponsmena may, in its sole discretion, stop providing the Services to the said User in accordance with the terms and conditions stated in the Terms and Conditions if the User provides any information that is false, inaccurate, out of date, or incomplete (or becomes false, inaccurate, out of date, or incomplete), or if Dealsandcouponsmena has reasonable grounds to suspect that the information provided by the User is false, inaccurate, out of date, or incomplete. In some cases, such as (a) when the Personal Data is opinion data that is kept solely for evaluative purposes and (b) when the Personal Data is in documents related to a prosecution if all proceedings related to the prosecution have not yet been concluded, We may not correct, delete, or update your Personal Data.
                        The laws of GCC govern this Agreement and our interactions with you and each Member. To the non-exclusive jurisdiction of the GCC courts with respect to any issues arising out of or relating to this Agreement, you and we both thus submit.

                        The disclosure of any information by a User to Us, including Sensitive Personal Data or Information, is entirely optional. In accordance with the terms of this Privacy Policy and the Terms and Conditions that apply to such User, the User has the right to withdraw his/her/their consent at any time. It should be made clear, however, that this right to withdraw consent is not retroactive. The User may email Dealsandcouponsmena at Dealsandcouponsmena@gmail.com if the User wants to remove his or her account or ask that Dealsandcouponsmena stop using the User's information to deliver Services. We won't keep such information any longer than is necessary to fulfill the legitimate uses for which it may be used or as otherwise required by other laws currently in effect. Your data may be anonymized and aggregated after some time and kept by us for as long as is necessary for us to deliver our Services successfully; however, we will only use the anonymized data for analytical reasons. Please be aware that if you withdraw your consent or close your account, we may not be able to continue to offer you our services or maintain our relationship with you.

                        Send us an email at Dealsandcouponsmena@gmail.com.com if you'd prefer not to receive non-essential messages like marketing- and promotional-related information about the Services.

                    </p>


                    <p class="mb-5">
                    <p style="font-weight: bold;">USAGE OF YOUR INFORMATION BY US</p>
                    </p>

                    <p class="mb-5">
                        User submission of any data, including Personal Information and other Sensitive Personal Data or Information, to Dealsandcouponsmena, is entirely voluntary. According to the terms of this agreement, such information may be shared with any Third Party in its original form with the user's consent. You acknowledge that Dealsandcouponsmena may use certain of Your details that, in accordance with the SPI Rules, have been categorized as Personal Information or "Sensitive Personal Data or Information" for the following purposes:

                    </p>

                    <p class="mb-5">
                        ● offering the Services to you; <br>
                        ● taking feedback on products and services;<br>
                        ● for promoting the Services and introducing new goods or services;<br>
                        ● for improving product design and utility by analyzing software usage patterns;<br>
                        ● to provide services for sending SMS, notifications, and reminders for offers, as well as for internal records.<br>
                        ● for the purpose of selling or otherwise transferring to affiliates and third parties such research, statistical, or intelligence data that is not individually identifiable;<br>
                        ● troubleshooting problems with customer service; and We may make use of your tracking data, including IP addresses and/or Device IDs, to help us identify you and compile general demographic data.<br>
                    </p>

                    <p class="mb-5">
                        In the event that we are bought out by or merged with another company, we will give that company the right to continue using the User's Personal Information and/or other information that the User provides to Us. We will also transfer any information disclosed by You and information about You to that company. Before Your Personal Information is transferred and is subject to a different privacy policy in the event of a merger or acquisition, We will tell You by email and/or by posting a notice on the Website and/or Application.

                        Users hereby expressly accept and recognize that Dealsandcouponsmena may periodically collect and retain Personal Information and/or Sensitive Personal Information from Users on the Platform or when using other Services in a secure cloud-based platform.

                        The User is aware that Dealsandcouponsmena will use this information to deliver its services and help Modify/improve the Platform experience so that it is safer and easier, but under no circumstances will personally identifiable information be shared with any Third Party without the User's express consent, unless required by law.

                        For the objectives outlined in this privacy statement and the Terms and Conditions as they apply to such User, Dealsandcouponsmena may be required to disclose or transfer the User's Personal Information to the following third parties:

                        To the degree necessary, to government authorities and institutions
                    </p>

                    <p class="mb-5">
                        ● under the terms of any applicable court or quasi-judicial authority's orders, statutes, rules, and regulations; <br>
                        ● to safeguard and defend Dealsandcouponsmena’s rights or property;<br>
                        ● to reduce credit risk and fraud;<br>
                        ● to enforce the Users' Terms and Conditions for Dealsandcouponsmena; or<br>
                        ● when Dealsandcouponsmena determines that it is essential to protect its rights or the rights of others. This decision is made solely at its discretion.<br>
                    </p>

                    <p class="mb-5">
                        if another requirement is imposed by an order made pursuant to a law now in force, including in response to requests from governmental entities for identification verification or for the purpose of preventing, detecting, investigating, including cyber incidents, prosecuting, and punishing offenders.

                        To serve ads on our behalf across the Internet and occasionally on this website, we do, nevertheless, enter into contracts with third parties. When you visit our website and interact with our products and services, they might compile information about your visits. In order to focus adverts for goods and services, they might also use information about Your visits to this and other websites. Most significant websites employ the industry-standard technique known as a "pixel tag" to capture this data. As part of this procedure, such third parties are not allowed to sell or distribute Your personally identifiable information.

                        The following third-party vendors use cookies to show ads based on a user's prior visits to Your website: Google, Facebook, advertising platforms, remarketing platforms like CleverTap, customer query management solutions like Freshworks, and Exotel.

                        By using the DoubleClick cookie, Google and its partners can target advertisements to your users depending on where they've been online, whether that's on your sites or other websites.

                        By going to Ads Settings, users can choose not to have the DoubleClick cookie used for interest-based advertising.
                    </p>



                    <p class="mb-5" style="font-weight: bold;">SECURITY AND CONFIDENTIALITY</p>

                    <p class="mb-5">
                        Your information is considered confidential and will not be disclosed to any Third Parties unless specifically provided for in this agreement, unless doing so is legally required to be given to the proper authorities, or if it's required to provide the Services through the Platform.
                        We keep electronic copies of your personal information and sensitive personal data on our equipment and the equipment used by our personnel. On occasion, such data might also be transformed into physical form.
                        Individuals with access to your Personal Information
                        Depending on the precise purposes for which the User Information has been obtained by Us, User Information will be processed by our employees, authorized staff, marketing agencies, or agents, on a need-to-know basis. Therefore, Dealsandcouponsmena may save and provide all such records to the pertinent stakeholders.

                        Security measures We view data as a valuable asset that needs to be secured from theft and unauthorized access. To prevent members inside and outside of Dealsandcouponsmena from having unauthorized access to such data, we use a variety of security mechanisms. We implement managerial, technical, operational, and physical security control measures to protect the User Information submitted to Us and the information that We have obtained.
                        However, We shall not be held responsible for any loss whatsoever suffered by the User for any data loss or theft caused by unauthorized access to the User's electronic equipment via which the User avails of the Services.

                        Measures We Expect You to Take: It's critical that You Participate in Maintaining the Security and Privacy of Your User Information. Please be careful when creating an online account to select a password that would be challenging for others to guess, and never share your password information with anyone else. Choose to set a password that contains letters, numbers, or special characters to make your account more secure.

                        You are in charge of protecting the confidentiality of this password and of any account usage. Never allow your login ID, email address, or password to be remembered if you use a shared or public computer, and always log out of your account before leaving the device. Use any privacy options or controls that We offer You on Our Platform.

                        Account misuse by an unauthorized user. We disclaim all responsibility for any unauthorized use of Your password or account. You must alert Us right away if you believe there has been any unauthorized use of your account by sending an email to Dealsandcouponsmena@gmail.com with your complaint or the ongoing problem.
                    </p>

                    <p class="mb-5">
                        Despite the aforementioned, Dealsandcouponsmena is not liable for the privacy, security, or disclosure of your personal information by third parties who are not covered by Our agreement with them. Additionally, Dealsandcouponsmena disclaims any liability for security lapses, activities of third parties, and situations that are outside of its reasonable control, including but not limited to acts of terrorism, computer hacking, unauthorized access to computer systems, data breaches, and encryption.
                    </p>

                    <p class="mb-5" style="font-weight: bold;"> USAGE OF YOUR PERSONAL DATA</p>

                    <p class="mb-5">
                        We will use & store the User Information for as long as necessary to fulfill the purposes for which such User Information was obtained (as mentioned in Section 4 above) or to meet applicable legal requirements, in compliance with applicable laws.
                    </p>

                    <p class="mb-5" style="font-weight: bold;"> HERE ARE YOUR RIGHTS</p>

                    <p class="mb-5">
                        1. Personal data access.
                        ● You are entitled to view, review, and request a hard copy or electronic copy of any information we may have on file about you. Additionally, you have the right to inquire about the origin of your sensitive personal information.

                        The following rights (e.g. modification, deletion of Personal Data).
                        As permitted by law, you may
                        make a request for your user information's deletion, portability, correction, or revision; regulate the way in which your personal data is used and disclosed, and revoke consent to any of Our data processing activities. Given that, We might need to keep any of Your User Information after you've asked for its deletion in order to meet our contractual or legal responsibilities.
                    </p>

                    <p class="mb-5" style="font-weight: bold;">PRIVACY OF CHILDREN AND MINORS</p>

                    <p class="mb-5">
                        We strongly advise parents and guardians to keep an eye on their young children's online activities and to think about using parental control tools offered by online services and software developers to assist create a child-friendly online environment. Additionally, these measures can stop children from sharing their name, address, and other personally identifying information online without their parent's consent. Although minors should not use the Services,
                        we respect the privacy of every person who might unintentionally use the internet or a mobile application to access our services.
                    </p>


                    <p class="mb-5" style="font-weight: bold;">CONSENT TO THIS POLICY</p>
                    <p class="mb-5">
                        You recognize that the Terms and Conditions of the Website and the other Services include this Privacy Policy, and you acknowledge that by using the Platform and the Services, you have unconditionally consented to be bound by this Privacy Policy. This Privacy Policy and the Terms and Conditions apply to your use of the Website, the App, and the Services.
                    </p>

                    <p class="mb-5" style="font-weight: bold;">COOKIES</p>
                    <p class="mb-5">
                        On Your computer, a persistent cookie is set when you use our Services on the Platform.

                        By tracking your purchases from our partner merchants using these cookies, we are able to offer you Cashbacks or Rewards. You won't be able to receive any Cashbacks or Rewards for any online purchases made through Our Platform if such persistent cookies are not enabled on your computer.

                        Cookie blocking/enabling: By changing the settings in your browser, you can choose to accept or reject cookies. However, if cookies are disabled, You might not be able to access all the interactive elements of Our Platform.
                    </p>

                    <p class="mb-5" style="color: red; font-size:large">
                        Please be aware that you won't be able to receive Cashbacks or Rewards when you make purchases from our website if you disable the cookies that are used to track your transactions through Our Platform in your browser.
                    </p>

                    <p class="mb-5">
                        Cookie management can be done in a variety of ways. You must make sure that each browser is configured to match your cookie choices if you use different computers at various locations.
                    </p>


                    <p class="mb-5">
                        ● Open "Windows Explorer" <br>
                        ● The 'Search' button will appear on the toolbar. <br>
                        ● In the search field under "Folders and Files," enter "cookie." <br>
                        ● In the "Look In" box, choose "My Computer." <br>
                        ● Choose "Search Now" <br>
                        ● Double-click on any discovered folders <br>
                        ● Choose any cookie file. <br>
                        ● Your keyboard's 'Delete' key should be pressed. <br>
                        ● If you're using another browser, use the "Help" function and choose "cookies" to learn where to find your cookie folder. <br>
                    </p>


                    <p class="mb-5" style="font-weight: bold;">CHANGES OR AMENDMENTS TO THE PRIVACY POLICY</p>

                    <p class="mb-5">

                        Dealsandcouponsmena reserves the right to modify this privacy statement at any moment, with or without prior warning. Dealsandcouponsmena will notify users through email or notice on the website, as described above if there are material changes to how the company handles user information or to the Privacy Policy. This will allow users to evaluate the new terms before using the Services again.

                        As always, users may notify Dealsandcouponsmena@gmail.com to have their accounts deactivated if they oppose any modifications to our terms and decide they no longer want to use our services. Unless otherwise specified, all information that Dealsandcouponsmena has about You and Your account is subject to the current Privacy Policy.

                        A User automatically gives his/her/its assent to the modified terms by using the Services after receiving notice of the change or after it has been posted on the platform.

                    </p>

                </div>
                @endif


                @if ( app()->getLocale() == 'ar' )
                <div class="text" style="text-align: right;">

                    <p class="mb-0">

                        الموقع الإلكتروني وتطبيق الهاتف المحمول
                        ("موقع الويب"، "موقعنا الإلكتروني"، "الموقع") يتم تشغيله في دولة الإمارات العربية المتحدة بشكل جماعي، "نحن" أو "خاصتنا" أو "الصفقات والكوبونات" أو "نحن"، حيث يجب أن يكون هذا التعبير، ما لم يكن مخالفًا لسياقه، يعتبر أنه يشمل ورثته القانونيين وممثليه والإداريين والخلفاء المسموح لهم والمتنازل لهم

                        يجب التقاط وتخزين ونقل معلومات محددة من زوار موقع الويب (المشار إليهم باسم "المستخدمين") من أجل تقديم الخدمات (كما هو محدد في البند 1 أدناه)، وهو أمر ضروري لتقديم الخدمات. يصف بيان الخصوصية هذا ("بيان الخصوصية"/"السياسة") كيف يمكننا جمع واستخدام و/أو الكشف و/أو التعامل بطريقة أخرى مع المعلومات الشخصية حول مستخدمي الخدمات (المشار إليها أيضًا هنا باسم
                        "أنت" أو "خاصتك" أو "نفسك" أو "المستخدم"
                        أو "المستخدمون" بشكل جماعي أو فردي). ولإظهار التزامنا المستمر بحماية خصوصية معلومات المستخدم التي تتفاعل مع خدماتنا، قمنا بتطوير سياسة الخصوصية هذه. تحكم الشروط والأحكام وسياسة الخصوصية هذه كيفية استخدامك للخدمات والوصول إليها. التعريف المعطى لأي مصطلح مكتوب بأحرف كبيرة مستخدم في سياسة الخصوصية هذه ولكن لم يتم تحديده بخلاف ذلك موجود في الشروط والأحكام الخاصة بنا.

                        الرؤوس المستخدمة هنا هي فقط لغرض تنظيم العناصر العديدة لسياسة الخصوصية. يتم تضمين العناوين فقط لتسهيل الرجوع إليها ولا ينبغي قراءتها على أنها تقييد أو توسيع لمتطلبات البنود الواردة فيها.

                        ما لم يتطلب السياق خلاف ذلك بوضوح، فإن المصطلحات المحددة في بيان الخصوصية هذا سيكون لها المعاني المخصصة لها أدناه، ويجب تفسير العبارات المشابهة لها وفقًا لتلك التعريفات.

                        يتم تعريف المعلومات الشخصية على أنها أي معلومات تتعلق بشخص طبيعي تكون قادرة، بشكل مباشر أو غير مباشر، عند دمجها مع معلومات أخرى متاحة أو من المحتمل أن تكون متاحة لهيئة اعتبارية، على تحديد هوية ذلك الشخص. يتوافق هذا التعريف مع القاعدة 2(1)(i)
                        لقواعد تكنولوجيا المعلومات (الممارسات والإجراءات الأمنية المعقولة والبيانات أو المعلومات الشخصية الحساسة)، لعام 2011.

                    </p>
                    <p class="mb-5">
                        الرؤوس المستخدمة هنا هي فقط لغرض تنظيم العناصر العديدة لسياسة الخصوصية. يتم تضمين العناوين فقط لتسهيل الرجوع إليها ولا ينبغي قراءتها على أنها تقييد أو توسيع لمتطلبات البنود الواردة فيها.
                    </p>
                    <p class="mb-5">
                        ما لم يتطلب السياق خلاف ذلك بوضوح، فإن المصطلحات المحددة في بيان الخصوصية هذا سيكون لها المعاني المخصصة لها أدناه، ويجب تفسير العبارات المشابهة لها وفقًا لتلك التعريفات.
                    </p>

                    <p class="mb-5">
                        يتم تعريف المعلومات الشخصية على أنها أي معلومات تتعلق بشخص طبيعي تكون قادرة، بشكل مباشر أو غير مباشر، عند دمجها مع معلومات أخرى متاحة أو من المحتمل أن تكون متاحة لهيئة اعتبارية، على تحديد هوية ذلك الشخص. يتوافق هذا التعريف مع القاعدة 2(1)(1) من قواعد تكنولوجيا المعلومات (الممارسات والإجراءات الأمنية المعقولة والبيانات أو المعلومات الشخصية الحساسة) لعام 2011.
                    </p>

                    <p class="mb-5">
                    <p style="font-weight: bold;">
                        وفقًا لقواعد SPI، يتم تعريف "البيانات أو المعلومات الشخصية الحساسة" للشخص على أنها بيانات شخصية تتعلق بهذا الشخص وتتعلق بما يلي :</p>

                    <li> كلمات المرور </li>
                    <li> التفاصيل المالية، مثل الحسابات المصرفية، ومعلومات بطاقة الائتمان والخصم، أو معلومات عن وسائل الدفع الأخرى؛;</li>
                    <li> التوجه الجنسي;</li>
                    <li> العافية الجسدية والفسيولوجية والعقلي؛;</li>
                    <li> التاريخ والسجلات الطبية</li>
                    <li> التفاصيل البيومترية؛</li>
                    <li> المعلومات التي حصلت عليها الشركة من خلال عقد صالح أو وسيلة أخرى؛</li>
                    <li> معلومات الزائر كما تم توفيرها عند التسجيل أو في وقت لاحق؛ و؛</li>
                    <li> سجلات سجل المكالمات؛</li>

                    </p>

                    <p class="mb-5">
                        عندما يقوم شخص ما بزيارة و/أو استخدام الخدمات، تتم الإشارة إليه باسم "أنت" و"الخاص بك" و"نفسك" و"المستخدم". يشمل هذا المصطلح أيضًا أولئك الذين يستخدمون الخدمات بعد قيام شخص آخر بإرسال معلوماتهم نيابةً عنهم.
                    </p>

                    <p class="mb-5">
                        يُشار إلى أي موقع ويب/تطبيق/بوابة ويب أو شركة أو شخص آخر غير المستخدم ونحن باسم "الأطراف الثالثة".
                    </p>

                    <p class="mb-5">
                        يشير مصطلح "الخدمات" إلى الموقع الإلكتروني وتطبيق الهاتف المحمول (dealsandcouponsmena)، بالإضافة إلى أي بيانات سياقية يتم إرسالها أو تلقيها من
                        المستخدمون من خلال قنوات اتصال مختلفة، على سبيل المثال لا الحصر، البريد الإلكتروني والرسائل النصية القصيرة وWhatsApp والإشعارات والمكالمات الهاتفية والدردشة على موقع الويب ونظام الرد الصوتي التفاعلي (IVR). يتمثل مجال عملنا الرئيسي في تقديم خدمات استرداد النقود المتوافقة مع تطبيقات الويب والهاتف المحمول.
                        نقوم حاليًا بممارسة الأعمال التجارية تحت اسم العلامة التجارية Dealsandcouponsmena، مما يؤدي إلى زيادة المبيعات إلى مواقع التجارة الإلكترونية التابعة لنا.
                    </p>

                    <p class="mb-5">
                        تعتبر المعلومات الشخصية والبيانات أو المعلومات الشخصية الحساسة بمثابة "معلومات المستخدم".

                    </p>

                    <p class="mb-5">
                        يشير المصطلحان "موقع الويب" و"Dealsandcouponsmena" إلى موقع الويب على
                        على التوالى. يشير المصطلحان "التطبيق" و/أو "التطبيق" إلى تطبيق الهاتف المحمول Dealsandcouponsmena، والذي يمكن الوصول إليه عبر
                        متجر تطبيقات iOS أو متجر Android Play. وسيشار إلى هذه باسم "المنصة" معًا.
                    </p>


                    <p class="mb-5">
                    <p style="font-weight: bold;">ما المغزى من سياسة الخصوصية هذه؟</p>

                    <p class="mb-5" style="font-size: 16px;">
                        تم إنشاء بيان الخصوصية هذا وفقًا، من بين أمور أخرى،
                    </p>
                    </p>


                    <p class="mb-5">
                        تشير "إرشادات الوسطاء" إلى المادة 43A من قانون تكنولوجيا المعلومات لعام 2000، واللائحة 4 من قواعد SPI، واللائحة 3(1) من قواعد تكنولوجيا المعلومات (إرشادات الوسطاء) لعام 2011.
                        يتضمن بيان الخصوصية هذا، من بين أمور أخرى، ما يلي:
                    </p>

                    <p class="mb-5">
                        نوع المعلومات التي يتم الحصول عليها من المستخدمين، بما في ذلك البيانات أو المعلومات الشخصية الحساسة؛
                        سبب (أسباب) جمعها؛ الطرق التي سيتم استخدامها؛ والمستلمين للمعلومات التي سنكشف عنها.
                    </p>

                    <p style="font-weight: bold;">عام </p>
                    <p class="mb-5">
                        يقر المستخدم ويوافق صراحةً على أن هذه السياسة والشروط والأحكام السابقة تشكل اتفاقية ملزمة قانونًا بين المستخدم وDealsandcouponsmena،
                        وأن المستخدم يجب أن يخضع للقواعد والسياسات والمبادئ التوجيهية والشروط والأحكام المطبقة على أي خدمة تقدمها Dealsandcouponsmena،
                        بما في ذلك الخدمات، وأن هذه القواعد والسياسات والمبادئ التوجيهية والشروط والأحكام تعتبر مدمجة في الشروط والأحكام ويتم التعامل معها كجزء من الشروط والأحكام.
                    </p>

                    <p class="mb-5">
                        وفقًا لقانون تكنولوجيا المعلومات لعام 2000 وأي قواعد معمول بها، بالإضافة إلى أحكام القوانين المختلفة التي تم تحديثها لتعكس تعديلات قانون تكنولوجيا المعلومات، فإن هذه الوثيقة عبارة عن سجل إلكتروني. لا توجد توقيعات مادية أو رقمية ضرورية لهذا السجل الإلكتروني لأنه يتم إنتاجه بواسطة نظام كمبيوتر. يتم أيضًا اتباع قواعد SPI وإرشادات الوسطاء في نشر هذه المادة.

                    </p>
                    <p class="mb-5">
                        اعتمادًا على ما تتطلبه الظروف، سيتم استخدام المصطلحين "طرف" و"أطراف" للإشارة إلى Dealsandcouponsmena بشكل فردي وجماعي وكذلك إلى المستخدم.

                    </p>



                    <p class="mb-5">
                    <p style="font-weight: bold;">12. الخدمات الإضافية: </p>
                    </p>

                    <p class="mb-5">
                        في بعض الأحيان، قد نقدم نحن أو شركاؤنا خدمات جديدة أو محسنة من خلال المنصة. قد يتم تطبيق شروط وأحكام إضافية أثناء استخدام تلك الخدمات،
                        ويجب عليك الالتزام بها. أي انتهاك من جانبك لشرط جوهري من الشروط التي تحكم هذه الخدمات يشكل خرقًا لهذه الاتفاقية،
                        بشرط أن يتم الكشف عن هذه الشروط لك بشكل صحيح على المنصة عندما توافق على استخدام هذه الخدمات (على النحو الذي نحدده وفقًا لتقديرنا المعقول).

                    </p>

                    <p class="mb-5">
                        تعمل عناوين كل قسم في هذه السياسة فقط على تنظيم الأحكام المختلفة بموجبها بترتيب منطقي؛
                        ولا يجوز لأي من الطرفين استخدامها لتفسير أحكام هذه السياسة بأي شكل من الأشكال. يتفق الطرفان صراحة على أن العناوين لن يكون لها أي أهمية قانونية أو تعاقدية.
                    </p>

                    <p class="mb-5">
                        مع مراعاة البند 13 من هذه السياسة، يتفق الطرفان صراحةً على أن Dealsandcouponsmena سيكون لها الحق الوحيد والحصري في تعديل أو تعديل هذه السياسة والشروط والأحكام السابقة دون موافقة المستخدم أو إخطاره ووفقًا للممارسات التجارية المقبولة عمومًا والقوانين المعمول بها. .
                        يوافق المستخدم صراحةً على أن أي تعديلات أو تعديلات من هذا القبيل ستكون سارية على الفور.
                        يتحمل المستخدم مسؤولية مراجعة السياسة والشروط والأحكام بشكل منتظم ليكون على علم بأحكامها ومطالبها.
                        يعتبر المستخدم قد وافق على أي وجميع التغييرات/التعديلات التي تم إجراؤها على السياسة والشروط والأحكام إذا كان المستخدم يستخدم الخدمات بعد هذا التغيير.
                        يُمنح الحق في الدخول إلى الخدمات والوصول إليها واستخدامها للمستخدم على أساس شخصي وغير حصري وغير قابل للتحويل وقابل للإلغاء طالما أن المستخدم يلتزم بالسياسة والشروط والأحكام.
                    </p>


                    <p class="mb-5">
                    <p style="font-weight: bold;">جمع ومعالجة البيانات الشخصية</p>
                    </p>

                    <p class="mb-5">
                        نحن نولي أولوية قصوى لحماية خصوصية الأطراف، وتلتزم جميع خدماتنا تمامًا بالمبادئ التوجيهية القانونية التي وضعتها حكومة الإمارات العربية المتحدة.
                        معلومات الاتصال (مثل رقم هاتفك وعنوان بريدك الإلكتروني)؛
                        كلمات المرور وأسماء المستخدمين؛
                        المعلومات الديموغرافية (بما في ذلك اسمك وجنسك وعمرك وتاريخ ميلادك ورمزك السري)؛

                        المعلومات المتعلقة بكيفية استخدامك للخدمات والمعاملات الأخرى التي تجريها مع أطراف ثالثة أثناء استخدام الخدمات؛
                        معلومات عن متصفح الويب الخاص بك، وعادات تصفح الويب والهاتف المحمول، وتجار التجزئة المفضلين، بالإضافة إلى النقرات التي تتم على جهازك المحمول Dealsandcouponsmena ومنه
                        تفاصيل حسابك البنكي، مثل اسم الحساب أو رقم الحساب أو فرع البنك أو أي معلومات أخرى تتعلق بالمدفوعات
                        وفقًا لقواعد SPI، فإن البيانات التي نحصل عليها منك تعتبر "معلومات شخصية" أو
                        "معلومات البيانات الشخصية الحساسة."
                    </p>

                    <p class="mb-5">
                    <p style="font-weight: bold;">بيان الخصوصية</p>
                    </p>

                    <p class="mb-5">
                        أنت بموجب هذا توافق صراحةً على تلقي الاتصالات من Dealsandcouponsmena عبر الرسائل النصية القصيرة ورسائل البريد الإلكتروني والإشعارات من تطبيقات الهاتف المحمول والمتصفحات وأي رسائل أخرى من وقت لآخر فيما يتعلق بالخدمات المقدمة من خلال الموقع.

                    </p>

                    <p class="mb-5">
                        ● يقبل المستخدم ويوافق تمامًا على ما يلي:<br>

                        ● لأغراض هذه السياسة، لا تتضمن "المعلومات الشخصية" أو "البيانات أو المعلومات الشخصية الحساسة" المعلومات التي يمكن الوصول إليها بسهولة في المجال العام أو يمكن الوصول إليها بموجب قانون الحق في الحصول على المعلومات لعام 2005، أو أي قانون آخر.
                        <br>
                        ● يوافق المستخدم صراحةً على أنه يجوز لـ Dealsandcouponsmena مراقبة المعلومات الخاصة بالمستخدم تلقائيًا بناءً على عنوان IP الخاص بالمستخدم ونشاط المستخدم على المنصة. يدرك المستخدم أن Dealsandcouponsmena قد تستخدم هذه المعلومات لأغراض داخلية مثل البحث عن التركيبة السكانية للمستخدم واهتماماته وسلوكه من أجل فهم احتياجات المستخدمين وتلبيتها بشكل أفضل. علاوة على ذلك، يتم إبلاغ المستخدم صراحةً أن هذه المعلومات قد تحتوي على حقائق حول جهاز الكمبيوتر الخاص بالمستخدم ومتصفح الويب وعنوان IP والجهاز المحمول وما إلى ذلك. ولتسهيل تقديم الخدمات لك، يجب الاتصال بين عنوان IP الخاص بالمستخدم و قد تتم مشاركة معلومات التعريف الشخصية الخاصة بهم مع أطراف ثالثة أو الكشف عنها. يمنح المستخدم بموجب هذا الإذن لـ Dealsandcouponsmena بمشاركة معلوماته مع أي أطراف ثالثة قد يختارها في المستقبل. بالنسبة لأبحاث السوق وإنشاء ميزات جديدة، يجوز لنا أيضًا مشاركة و/أو الكشف عن بعض النتائج الإجمالية (ولكن ليس البيانات المحددة) في شكل مجهول مع أطراف ثالثة.
                        <br>
                        ● That Dealsandcouponsmena may gather and compile any and all information about the User, whether or not the User directly provides it to Dealsandcouponsmena, including but not limited to personal correspondence like emails, letters, SMS, WhatsApp Notifications, or calls, feedback from other users or third parties regarding the User's activities or postings on the Platform, etc., into a file or folder specifically created for or assigned to the User, and
                        <br>
                        ● يجوز لـ Dealsandcouponsmena جمع وتجميع أي وجميع المعلومات حول المستخدم، سواء قدمها المستخدم مباشرة إلى Dealsandcouponsmena أم لا، بما في ذلك على سبيل المثال لا الحصر المراسلات الشخصية مثل رسائل البريد الإلكتروني أو الرسائل أو الرسائل النصية القصيرة أو إشعارات WhatsApp أو المكالمات أو التعليقات من المستخدمين الآخرين أو أطراف ثالثة فيما يتعلق بأنشطة المستخدم أو منشوراته على المنصة، وما إلى ذلك، في ملف أو مجلد تم إنشاؤه خصيصًا للمستخدم أو تعيينه له، و
                        <br>
                        ● نرسل أيضًا رسائل إخبارية ورسائل نصية قصيرة وتنبيهات التطبيقات وإشعارات المتصفح وإشعارات WhatsApp والرسائل الإخبارية وحملات تسويقية أخرى تسلط الضوء على بعض من أعظم اقتراحاتنا حول طرق تساعدك على توفير المزيد. من خلال إخطارنا في أي وقت، يمكنك أن تقرر عدم تلقي هذه الرسالة التجارية من Dealsandcouponsmena.
                        <br>

                        يجوز لـ Dealsandcouponsmena إرسال العروض والعروض الترويجية للمستخدم، سواء كانت بناءً على اهتمامات المستخدم السابقة أم لا، باستخدام معلومات الاتصال التي قدمها المستخدم، ويوافق المستخدم بموجب هذا صراحةً على تلقيها. يمكن للمستخدم إلغاء الاشتراك في تلقي الاتصالات الترويجية عن طريق النقر على رابط "إلغاء الاشتراك" الموجود أسفل كل اتصال من هذا القبيل أو عن طريق إرسال بريد إلكتروني في بعض الأحيان، وقد تطلب Dealsandcouponsmena من المستخدم المشاركة في استطلاع مجاني عبر الإنترنت. قد يُطلب من المستخدم تقديم بيانات الاتصال والبيانات الديموغرافية لهذه الاستطلاعات (مثل الرمز البريدي والعمر وشريحة الدخل والجنس وما إلى ذلك). يدرك المستخدم أن هذه البيانات تُستخدم لتعزيز و/أو تخصيص الخدمات للمستخدمين الجدد والحاليين، وبالتالي تقديم الخدمات ذات الصلة لجميع المستخدمين التي تعتقد Dealsandcouponsmena أنهم قد يرغبون في استخدامها.
                        أنه في حالات نادرة، قد تطلب Dealsandcouponsmena من المستخدم تقديم تعليقات حول المنتجات أو الخدمات التي استخدمها.

                        يمنح المستخدم صراحةً الإذن لـ Dealsandcouponsmena بنشر أي وجميع التقييمات التي ينشرها المستخدم على المنصة، إلى جانب اسم المستخدم ومعلومات الاتصال المحددة، لاستخدام المستخدمين الآخرين ومصلحتهم. يدرك المستخدم أن مثل هذه المراجعات ستساعد المستخدمين المحتملين للمنصة في استخدام الخدمات.

                        بموجب هذا يأذن المستخدم صراحةً لـ Dealsandcouponsmena بإزالة أي محتوى أو مراجعة أو استبيان أو تعليقات مقدمة من النظام الأساسي، دون سبب أو مطالبة بإخطار المستخدم بذلك. لا يوجد في هذه الاتفاقية ما يلزم Dealsandcouponsmena بتخزين أو تحميل أو نشر أو عرض المحتوى/المراجعات/الاستطلاعات/التعليقات المقدمة من قبل المستخدم بأي شكل من الأشكال.

                        موافقة المستخدم الصريحة مطلوبة لإنشاء وجمع "البيانات أو المعلومات الشخصية الحساسة" بما يتماشى مع قانون تكنولوجيا المعلومات لعام 2000، بصيغته المعدلة من وقت لآخر والقواعد ذات الصلة. يمنح المستخدم الموافقة على إنشاء وجمع البيانات حسب الحاجة بموجب التشريعات المعمول بها من خلال الإشارة إلى الموافقة على هذه السياسة والنقر على زر "أوافق على الشروط والسياسة" أثناء التسجيل.

                        يجب على المستخدم التحقق من دقة المعلومات المقدمة إلى Dealsandcouponsmena. يجوز للمستخدم الاتصال بـ Dealsandcouponsmena عبر البريد الإلكتروني لتصحيح الأخطاء أو مسحها أو تحديث المعلومات. ستستخدم Dealsandcouponsmena كل الجهود المعقولة لتنفيذ التغييرات المطلوبة بمجرد أن يكون ذلك عمليًا في قواعد البيانات.

                        يجوز لـ Dealsandcouponsmena، وفقًا لتقديرها الخاص، التوقف عن تقديم الخدمات للمستخدم المذكور وفقًا للشروط والأحكام المنصوص عليها في الشروط والأحكام إذا قدم المستخدم أي معلومات خاطئة أو غير دقيقة أو قديمة أو غير كاملة (أو أصبحت كاذبة أو غير دقيقة أو قديمة أو غير كاملة)، أو إذا كان لدى Dealsandcouponsmena أسباب معقولة للاشتباه في أن المعلومات المقدمة من قبل المستخدم خاطئة أو غير دقيقة أو قديمة أو غير كاملة. في بعض الحالات، مثل (أ) عندما تكون البيانات الشخصية عبارة عن بيانات رأي يتم الاحتفاظ بها لأغراض تقييمية فقط و(ب) عندما تكون البيانات الشخصية موجودة في مستندات تتعلق بالادعاء إذا لم يتم الانتهاء من جميع الإجراءات المتعلقة بالادعاء بعد ، لا يجوز لنا تصحيح بياناتك الشخصية أو حذفها أو تحديثها.
                        تحكم قوانين دول مجلس التعاون الخليجي هذه الاتفاقية وتفاعلاتنا معك ومع كل عضو. إلى الاختصاص غير الحصري لمحاكم دول مجلس التعاون الخليجي فيما يتعلق بأي قضايا تنشأ عن هذه الاتفاقية أو تتعلق بها، فإننا نخضع لذلك.

                        يعد الكشف عن أي معلومات من قبل المستخدم لنا، بما في ذلك البيانات الشخصية أو المعلومات الحساسة، أمرًا اختياريًا تمامًا. وفقًا لشروط سياسة الخصوصية هذه والشروط والأحكام التي تنطبق على هذا المستخدم، يحق للمستخدم سحب موافقته في أي وقت. ومع ذلك، ينبغي التوضيح أن هذا الحق في سحب الموافقة ليس له أثر رجعي. يجوز للمستخدم إرسال بريد إلكتروني إلى Dealsandcouponsmena على Dealsandcouponsmena@gmail.com إذا أراد المستخدم إزالة حسابه أو مطالبة Dealsandcouponsmena بالتوقف عن استخدام معلومات المستخدم لتقديم الخدمات. لن نحتفظ بهذه المعلومات لفترة أطول مما هو ضروري لتحقيق الاستخدامات المشروعة التي يمكن استخدامها من أجلها أو كما هو مطلوب بموجب القوانين الأخرى المعمول بها حاليًا. قد يتم إخفاء هوية بياناتك وتجميعها بعد مرور بعض الوقت ونحتفظ بها طالما كان ذلك ضروريًا لنا لتقديم خدماتنا بنجاح؛ ومع ذلك، سنستخدم البيانات مجهولة المصدر فقط لأسباب تحليلية. يرجى العلم أنه إذا قمت بسحب موافقتك أو إغلاق حسابك، فقد لا نتمكن من الاستمرار في تقديم خدماتنا لك أو الحفاظ على علاقتنا معك.

                        أرسل لنا بريدًا إلكترونيًا على Dealsandcouponsmena@gmail.com.com إذا كنت تفضل عدم تلقي رسائل غير أساسية مثل المعلومات المتعلقة بالتسويق والترويج حول الخدمات.

                    </p>


                    <p class="mb-5">
                    <p style="font-weight: bold;">إستخدم معلوماتك من قبلنا</p>
                    </p>

                    <p class="mb-5">
                        إن تقديم المستخدم لأي بيانات، بما في ذلك المعلومات الشخصية وغيرها من البيانات أو المعلومات الشخصية الحساسة، إلى Dealsandcouponsmena، هو أمر طوعي تمامًا. ووفقاً لشروط هذه الاتفاقية، يجوز مشاركة هذه المعلومات مع أي طرف ثالث في شكلها الأصلي بموافقة المستخدم. أنت تقر بأنه يجوز لـ Dealsandcouponsmena استخدام بعض التفاصيل الخاصة بك والتي تم تصنيفها، وفقًا لقواعد SPI، على أنها معلومات شخصية أو "بيانات أو معلومات شخصية حساسة" للأغراض التالية:


                    </p>

                    <p class="mb-5">
                        ● تقديم الخدمات لك؛
                        <br>
                        ● أخذ ردود الفعل على المنتجات والخدمات؛
                        <br>
                        ● للترويج للخدمات وتقديم سلع أو خدمات جديدة؛
                        <br>
                        ● لتحسين تصميم المنتج وفائدته من خلال تحليل أنماط استخدام البرامج؛
                        <br>
                        ● لتقديم خدمات إرسال الرسائل القصيرة والإشعارات والتذكيرات الخاصة بالعروض، وكذلك السجلات الداخلية.
                        <br>
                        ● لغرض البيع أو النقل بطريقة أخرى إلى الشركات التابعة وأطراف ثالثة مثل هذه البيانات البحثية أو الإحصائية أو الاستخباراتية التي لا يمكن تحديد هويتها بشكل فردي؛
                        <br>
                        ● استكشاف مشاكل خدمة العملاء وإصلاحها؛ وقد نستفيد من بيانات التتبع الخاصة بك، بما في ذلك عناوين IP و/أو معرفات الأجهزة،
                        لمساعدتنا في التعرف عليك وتجميع البيانات الديموغرافية العامة.
                        <br>
                    </p>

                    <p class="mb-5">
                        في حالة قيام شركة أخرى بشرائنا أو دمجنا معها، فسنمنح تلك الشركة الحق في الاستمرار في استخدام المعلومات الشخصية للمستخدم و/أو المعلومات الأخرى التي يقدمها المستخدم لنا. سنقوم أيضًا بنقل أي معلومات قمت بالكشف عنها ومعلومات عنك إلى تلك الشركة. قبل أن يتم نقل معلوماتك الشخصية
                        مع مراعاة سياسة خصوصية مختلفة في حالة الاندماج أو الاستحواذ، سنخبرك عبر البريد الإلكتروني و/أو عن طريق نشر إشعار على الموقع الإلكتروني و/أو التطبيق.

                        يقبل المستخدمون بموجب هذا ويدركون صراحةً أنه يجوز لـ Dealsandcouponsmena جمع المعلومات الشخصية و/أو المعلومات الشخصية الحساسة والاحتفاظ بها بشكل دوري من المستخدمين على المنصة أو عند استخدام خدمات أخرى في نظام أساسي قائم على السحابة.

                        يدرك المستخدم أن Dealsandcouponsmena ستستخدم هذه المعلومات لتقديم خدماتها والمساعدة في تعديل/تحسين تجربة النظام الأساسي.
                        أنه أكثر أمانًا وأسهل، ولكن لن تتم تحت أي ظرف من الظروف مشاركة معلومات التعريف الشخصية مع أي طرف ثالث دون موافقة صريحة من المستخدم،
                        ما لم يقتضي القانون ذلك.
                        بالنسبة للأهداف الموضحة في بيان الخصوصية هذا والشروط والأحكام التي تنطبق على هذا المستخدم،
                        قد يُطلب من Dealsandcouponsmena الكشف عن المعلومات الشخصية للمستخدم أو نقلها إلى الأطراف الثالثة التالية:

                        بالقدر اللازم للسلطات والمؤسسات الحكومية

                    </p>

                    <p class="mb-5">
                        ● بموجب شروط أي محكمة معمول بها أو أوامر وقوانين وقواعد ولوائح صادرة عن أي محكمة أو سلطة شبه قضائية؛
                        <br>
                        ● لحماية حقوق أو ملكية Dealsandcouponsmena والدفاع عنها؛
                        <br>
                        ● للحد من مخاطر الائتمان والاحتيال.
                        <br>
                        ● لتطبيق شروط وأحكام المستخدمين الخاصة بالصفقات والكوبونات؛ أو
                        <br>
                        ● عندما تقرر Dealsandcouponsmena أنه من الضروري حماية حقوقها أو حقوق الآخرين. يتم اتخاذ هذا القرار فقط وفقا لتقديرها.
                        <br>
                    </p>

                    <p class="mb-5">
                        إذا تم فرض شرط آخر بموجب أمر صادر بموجب قانون ساري المفعول، بما في ذلك الاستجابة لطلبات الجهات الحكومية للتحقق من الهوية أو لغرض منع واكتشاف والتحقيق، بما في ذلك الحوادث السيبرانية ومحاكمة ومعاقبة المجرمين. لعرض الإعلانات نيابة عنا عبر الإنترنت وأحيانًا على هذا الموقع، فإننا، مع ذلك، نبرم عقودًا مع أطراف ثالثة. عندما تزور موقعنا وتتفاعل مع منتجاتنا وخدماتنا، فقد يقومون بتجميع معلومات حول زياراتك. من أجل تركيز الإعلانات على السلع والخدمات، قد يستخدمون أيضًا معلومات حول زياراتك لهذا الموقع ومواقع الويب الأخرى. تستخدم معظم مواقع الويب الهامة تقنية متوافقة مع معايير الصناعة تُعرف باسم "علامة البكسل" لالتقاط هذه البيانات. وكجزء من هذا الإجراء، لا يُسمح لهذه الأطراف الثالثة ببيع أو توزيع معلومات التعريف الشخصية الخاصة بك. يستخدم موردو الطرف الثالث التاليون ملفات تعريف الارتباط لعرض الإعلانات بناءً على زيارات المستخدم السابقة إلى موقع الويب الخاص بك: Google، وFacebook، ومنصات الإعلان، ومنصات تجديد النشاط التسويقي مثل CleverTap، وحلول إدارة استعلامات العملاء مثل Freshworks، وExotel. باستخدام ملف تعريف الارتباط DoubleClick، تستطيع Google وشركاؤها توجيه الإعلانات إلى المستخدمين لديك اعتمادًا على مكان تواجدهم عبر
                        الإنترنت، سواء كان ذلك على مواقعك أو مواقع الويب الأخرى. بالانتقال إلى إعدادات الإعلانات، يمكن للمستخدمين اختيار عدم استخدام ملف تعريف الارتباط DoubleClick للإعلانات التي تستهدف الاهتمامات.
                    </p>



                    <p class="mb-5" style="font-weight: bold;">الأمن والسرية</p>

                    <p class="mb-5">

                        تعتبر معلوماتك سرية ولن يتم الكشف عنها لأي طرف ثالث ما لم ينص على ذلك على وجه التحديد في هذه الاتفاقية، ما لم يكن القيام بذلك مطلوبًا قانونًا لتقديمه إلى السلطات المختصة، أو إذا كان مطلوبًا تقديم الخدمات من خلال النظام الأساسي.
                        نحتفظ بنسخ إلكترونية من معلوماتك الشخصية والبيانات الشخصية الحساسة الموجودة على أجهزتنا والمعدات التي يستخدمها موظفونا. وفي بعض الأحيان، قد يتم أيضًا تحويل هذه البيانات إلى شكل مادي.
                        الأفراد الذين لديهم حق الوصول إلى معلوماتك الشخصية
                        اعتمادًا على الأغراض المحددة التي حصلنا من أجلها على معلومات المستخدم، ستتم معالجة معلومات المستخدم من قبل موظفينا أو الموظفين المعتمدين أو وكالات التسويق أو الوكلاء، على أساس الحاجة إلى المعرفة. ولذلك، يجوز لـ Dealsandcouponsmena حفظ جميع هذه السجلات وتقديمها إلى أصحاب المصلحة المعنيين.

                        لإجراءات الأمنية نحن نعتبر البيانات بمثابة أصول قيمة يجب تأمينها من السرقة والوصول غير المصرح به. ولمنع الأعضاء داخل وخارج Dealsandcouponsmena من الوصول غير المصرح به إلى هذه البيانات، فإننا نستخدم مجموعة متنوعة من آليات الأمان. نحن ننفذ تدابير مراقبة أمنية إدارية وفنية وتشغيلية ومادية لحماية معلومات المستخدم المقدمة إلينا والمعلومات التي حصلنا عليها.
                        ومع ذلك، لن نكون مسؤولين عن أي خسارة من أي نوع يتكبدها المستخدم نتيجة فقدان البيانات أو سرقتها بسبب الوصول غير المصرح به إلى المعدات الإلكترونية الخاصة بالمستخدم والتي يستفيد المستخدم من الخدمات من خلالها.

                        لإجراءات التي نتوقع منك اتخاذها: من الضروري أن تشارك في الحفاظ على أمان وخصوصية معلومات المستخدم الخاصة بك. يرجى توخي الحذر عند إنشاء حساب عبر الإنترنت لتحديد كلمة مرور يصعب على الآخرين تخمينها، ولا تشارك معلومات كلمة المرور الخاصة بك مع أي شخص آخر أبدًا. اختر تعيين كلمة مرور تحتوي على أحرف أو أرقام أو أحرف خاصة لجعل حسابك أكثر أمانًا.

                        أنت مسؤول عن حماية سرية كلمة المرور هذه وأي استخدام للحساب. لا تسمح أبدًا بتذكر معرف تسجيل الدخول أو عنوان البريد الإلكتروني أو كلمة المرور الخاصة بك إذا كنت تستخدم جهاز كمبيوتر مشتركًا أو عامًا، وقم دائمًا بتسجيل الخروج من حسابك قبل مغادرة الجهاز. استخدم أي خيارات أو ضوابط خصوصية نقدمها لك على منصتنا.

                        إساءة استخدام الحساب من قبل مستخدم غير مصرح به. نحن نخلي مسؤوليتنا الكاملة عن أي استخدام غير مصرح به لكلمة المرور أو الحساب الخاص بك. يجب عليك تنبيهنا على الفور إذا كنت تعتقد أن هناك أي استخدام غير مصرح به لحسابك عن طريق إرسال بريد إلكتروني إلى Dealsandcouponsmena@gmail.com يتضمن شكواك أو المشكلة المستمرة.

                    </p>

                    <p class="mb-5">
                        وعلى الرغم مما سبق، فإن Dealsandcouponsmena ليست مسؤولة عن الخصوصية أو الأمان أو الكشف عن معلوماتك الشخصية من قبل أطراف ثالثة لا تشملها اتفاقيتنا معهم. بالإضافة إلى ذلك، تتنصل Dealsandcouponsmena من أي مسؤولية عن الثغرات الأمنية، وأنشطة الأطراف الثالثة، والمواقف التي تكون خارجة عن سيطرتها المعقولة، بما في ذلك على سبيل المثال لا الحصر، أعمال الإرهاب، وقرصنة الكمبيوتر، والوصول غير المصرح به إلى أنظمة الكمبيوتر، وخرق البيانات، والتشفير.
                    </p>

                    <p class="mb-5" style="font-weight: bold;"> استخدام بياناتك الشخصية</p>

                    <p class="mb-5">
                        سنستخدم معلومات المستخدم ونخزنها طالما كان ذلك ضروريًا لتحقيق الأغراض التي تم الحصول على معلومات المستخدم من أجلها (كما هو مذكور في القسم 4 أعلاه) أو لتلبية المتطلبات القانونية المعمول بها، بما يتوافق مع القوانين المعمول بها.
                    </p>

                    <p class="mb-5" style="font-weight: bold;"> هذه هي حقوقك</p>

                    <p class="mb-5">
                        1. الوصول إلى البيانات الشخصية.
                        ● يحق لك عرض ومراجعة وطلب نسخة مطبوعة أو نسخة إلكترونية من أي معلومات قد تكون لدينا عنك. بالإضافة إلى ذلك، لديك الحق في الاستفسار عن مصدر معلوماتك الشخصية الحساسة.

                        الحقوق التالية (مثل تعديل وحذف البيانات الشخصية).
                        يجوز لك ذلك وفقًا لما يسمح به القانون
                        تقديم طلب لحذف معلومات المستخدم الخاصة بك، أو نقلها، أو تصحيحها، أو مراجعتها؛ تنظيم الطريقة التي يتم بها استخدام بياناتك الشخصية والكشف عنها، وإلغاء الموافقة على أي من أنشطة معالجة البيانات لدينا. نظرًا لذلك، قد نحتاج إلى الاحتفاظ بأي من معلومات المستخدم الخاصة بك بعد أن طلبت حذفها من أجل الوفاء بمسؤولياتنا التعاقدية أو القانونية.
                    </p>

                    <p class="mb-5" style="font-weight: bold;">خصوصية الأطفال والقاصرين</p>

                    <p class="mb-5">
                        ننصح الآباء والأوصياء بشدة بمراقبة أنشطة أطفالهم الصغار عبر الإنترنت والتفكير في استخدام أدوات الرقابة الأبوية التي تقدمها الخدمات عبر الإنترنت ومطوري البرامج للمساعدة في إنشاء بيئة صديقة للأطفال عبر الإنترنت. بالإضافة إلى ذلك، يمكن لهذه الإجراءات منع الأطفال من مشاركة أسمائهم وعناوينهم ومعلومات التعريف الشخصية الأخرى عبر الإنترنت دون موافقة والديهم. على الرغم من أنه لا يجوز للقاصرين استخدام الخدمات،
                        نحن نحترم خصوصية كل شخص قد يستخدم الإنترنت أو تطبيق الهاتف المحمول عن غير قصد للوصول إلى خدماتنا.
                    </p>


                    <p class="mb-5" style="font-weight: bold;">الموافقة على هذه السياسة</p>
                    <p class="mb-5">
                        أنت تدرك أن شروط وأحكام الموقع والخدمات الأخرى تتضمن سياسة الخصوصية هذه، وتقر أنه باستخدام النظام الأساسي والخدمات، فإنك توافق دون قيد أو شرط على الالتزام بسياسة الخصوصية هذه. تنطبق سياسة الخصوصية هذه والشروط والأحكام على استخدامك للموقع الإلكتروني والتطبيق والخدمات.
                    </p>

                    <p class="mb-5" style="font-weight: bold;">ملفات الإرتباط</p>
                    <p class="mb-5">
                        على جهاز الكمبيوتر الخاص بك، يتم تعيين ملف تعريف الارتباط الدائم عند استخدام خدماتنا على النظام الأساسي.

                        من خلال تتبع مشترياتك من التجار الشريكين لنا باستخدام ملفات تعريف الارتباط هذه، يمكننا أن نقدم لك استردادًا نقديًا أو مكافآت. لن تتمكن من تلقي أي استرداد نقدي أو مكافآت مقابل أي عمليات شراء عبر الإنترنت تتم من خلال منصتنا إذا لم يتم تمكين ملفات تعريف الارتباط الدائمة هذه على جهاز الكمبيوتر الخاص بك.

                        حظر/تمكين ملفات تعريف الارتباط: من خلال تغيير الإعدادات في متصفحك، يمكنك اختيار قبول ملفات تعريف الارتباط أو رفضها. ومع ذلك، إذا تم تعطيل ملفات تعريف الارتباط، فقد لا تتمكن من الوصول إلى جميع العناصر التفاعلية لمنصتنا.

                    </p>

                    <p class="mb-5" style="color: red; font-size:large">
                        يرجى العلم أنك لن تتمكن من تلقي المبالغ المستردة أو المكافآت عند إجراء عمليات شراء من موقعنا الإلكتروني إذا قمت بتعطيل ملفات تعريف الارتباط المستخدمة لتتبع معاملاتك من خلال منصتنا في متصفحك.
                    </p>

                    <p class="mb-5">
                        يمكن إدارة ملفات تعريف الارتباط بعدة طرق. يجب عليك التأكد من تكوين كل متصفح ليتوافق مع اختيارات ملفات تعريف الارتباط الخاصة بك إذا كنت تستخدم أجهزة كمبيوتر مختلفة في مواقع مختلفة.
                    </p>


                    <p class="mb-5">
                        ● افتح "مستكشف Windows"
                        <br>
                        ● سيظهر زر "بحث" على شريط الأدوات.
                        <br>
                        ● في حقل البحث ضمن "المجلدات والملفات"، أدخل "ملف تعريف الارتباط".
                        <br>
                        ● في مربع "البحث في"، اختر "جهاز الكمبيوتر".
                        <br>
                        ● اختر "البحث الآن"
                        <br>
                        ● انقر نقرًا مزدوجًا فوق أي مجلدات تم اكتشافها
                        <br>
                        ● اختر أي ملف تعريف الارتباط.
                        <br>
                        ● ينبغي الضغط على مفتاح "Delete" بلوحة المفاتيح.
                        <br>
                        ● إذا كنت تستخدم متصفحًا آخر، فاستخدم وظيفة "المساعدة" واختر "ملفات تعريف الارتباط" لمعرفة مكان العثور على مجلد ملفات تعريف الارتباط الخاص بك.
                        <br>
                    </p>


                    <p class="mb-5" style="font-weight: bold;">التغييرات أو التعديلات على سياسة الخصوصية</p>

                    <p class="mb-5">

                        تحتفظ Dealsandcouponsmena بالحق في تعديل بيان الخصوصية هذا في أي وقت، مع أو بدون تحذير مسبق. ستقوم Dealsandcouponsmena بإخطار المستخدمين عبر البريد الإلكتروني أو إشعار على الموقع، كما هو موضح أعلاه إذا كانت هناك تغييرات جوهرية في كيفية تعامل الشركة مع معلومات المستخدم أو في سياسة الخصوصية.
                        سيسمح هذا للمستخدمين بتقييم الشروط الجديدة قبل استخدام الخدمات مرة أخرى.

                        كما هو الحال دائمًا، يمكن للمستخدمين إخطار Dealsandcouponsmena@gmail.com بإلغاء تنشيط حساباتهم إذا عارضوا أي تعديلات على شروطنا وقرروا أنهم لم يعودوا يرغبون في استخدام خدماتنا. ما لم ينص على خلاف ذلك، فإن جميع المعلومات التي تمتلكها Dealsandcouponsmena عنك وعن حسابك تخضع لسياسة الخصوصية الحالية.

                        يمنح المستخدم موافقته تلقائيًا على الشروط المعدلة باستخدام الخدمات بعد تلقي إشعار التغيير أو بعد نشره على المنصة.

                    </p>

                </div>

                @endif

            </div>
        </div>
    </div>
</section>
@endsection