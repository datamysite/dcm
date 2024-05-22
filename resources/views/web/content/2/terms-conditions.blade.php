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
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)" style="color:#1DACE3;"><strong>Terms & Conditions</a></strong></li>
                        @endif
                        @if ( app()->getLocale() == 'ar' )
                        <li class="breadcrumb-item"><a href="{{route('home', [$region])}}" style="color: #000;"><strong> الرئيسية </strong></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)" style="color:#1DACE3;"><strong>الأحكام والشروط </a></strong></li>
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
            <h1 class="text-center" style="padding-top: 200px;color:#fff ;font-size:35px">{{ __('translation.terms_conditions') }}</h1>
        </div>

        <div class="dcm_banner_mobile">
            <h1 class="text-center" style="padding-top:40px;color:#fff">{{ __('translation.terms_conditions') }}</h1>
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

<!-- Terms & Conditions section Start -->
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
                    <p class="mb-5" style="font-weight: bold;">1. Inauguration :</p>
                    Greetings from www.dealsandcouponsmena.com. where such expression shall, unless repugnant to the context thereof, be deemed to include its respective legal heirs, representatives, administrators, allowed successors and assigns") operate the Cashback Service. We ask that you carefully read these terms and conditions ("Terms and Conditions" or "Agreement") since they comprise the legal terms and conditions that apply to your use of the service, we make available through the website and the app ("Platform," "Website").
                    </p>
                    <p class="mb-5">
                    <p class="mb-5" style="font-weight: bold;">2. Membership :</p>
                    Following the submission of the necessary information to Dealsandcouponsmena, our membership is accessible through the registration process. We make our most recent Terms and Conditions available to you during registration.
                    The running of sponsored advertisements referring to Dealsandcouponsmena on Google, Facebook, or any other platform is not permitted for members of Dealsandcouponsmena, so please be aware of this. The member's account will be immediately terminated if they don't follow these rules.
                    </p>
                    <p class="mb-5">
                    <p style="font-weight: bold;">3. Our Service :</p>
                    <li style="font-weight: bold;">Cashback Service :</li>

                    <p class="mb-5">Users who register on the Platform ("Members") and then open an account with us ("Account") are able to use our Cashback Service to get cashback on tracked purchases made from Platform sellers ("Retailers"). A "Qualifying Transaction"—a purchase that has been tracked, authenticated, and successfully completed—must be made by the Member to be eligible for cashback, and the cashback that results must be received by us before it can be considered "Cashback."
                        If the Retailers fail to use their affiliate monitoring system to log a transaction, then such sales may not be paid to Dealsandcouponsmena, and as a result, any owed or anticipated cashback from these sales will also not be paid to the Member.
                    </p>

                    <li style="font-weight: bold;">Unique Referral Fee :</li>
                    <p class="mb-5">
                        As long as they continue to be members, the Dealsandcouponsmena Service offers its users a special referral bonus in which they receive 2% cashback on any new members they bring on board using the platform's instructions (a "Qualifying Referral"). Please refer to Clause 5 for more information.
                    </p>

                    <p class="mb-5" style="font-weight: bold;">4. Joining the Group :</p>

                    <p class="mb-5">
                        If you are a natural person, you must be 18 (eighteen) years of age or older in order to use the platform. Additionally, by using the platform or accepting these terms and conditions, you represent and warrant to Dealsandcouponsmena that you are at least 18 (eighteen) years old, that you have the right, authority, and capacity to use the platform, and that you agree to and abide by these terms and conditions. You must provide accurate and up-to-date information about yourself when signing up for the Cashback Service, including your legal name, address, and any other information that may be required. When asked for information about a bank account, check payment information, or another payment method (your "Cashback Receipt Method") into which you wish to receive payments, you must (a) ensure that you are, and will continue to be, fully authorized to use that Cashback Receipt Method and (b) confirm that you wish to receive cashback through that Cashback Receipt Method. Through your Account, you should keep this information current. Please be aware that there are an additional Rs 30 administration fee for Cashback payments made by cheque.
                        If the Retailers fail to use their affiliate monitoring system to log a transaction, then such sales may not be paid to Dealsandcouponsmena, and as a result, any owed or anticipated cashback from these sales will also not be paid to the Member.
                        The User's affirmative consent is required for the generation and collection of "Sensitive Personal Data or Information" in line with the Information Technology Act, 2000, as modified from time to time and allied rules. The User grants consent to the generation and collection of information as necessary to comply with applicable laws by indicating assent to this Policy by clicking the "I Agree with Terms and Policy" button at the time of registration.
                        Be aware that the maximum or minimum payment you can get through your chosen Cashback Receipt Method (such as Net banking, Cheque, Gift Cards, or other payment methods We may provide) may be governed by certain limitations.
                        We will send you crucial messages there, so please make sure that the email address and mobile number we have on file for you are accurate and that you have access to them. You must update the information we have on file for you on your Account if your email address or mobile number changes.
                    </p>

                    <p class="mb-5" style="font-weight: bold;">5. Cashback and Referral Fees :</p>

                    <p class="mb-5">
                        We transfer the Cashback to the Member through his or her Cashback Receipt Method after a Member completes a Qualifying Transaction successfully and after we have acquired the Cashback for that Qualifying Transaction.
                        Please be aware that under certain conditions, a transaction with a retailer may not qualify as a qualifying transaction or may not result in Cashback. Similarly, a Qualifying Referral qualifies as such. The Member is aware that all of his/her transactions are with the specific Retailer, not with us. We have further details regarding these situations on our support sites. The commission paid by Retailers may also change from time to time, in which case the cashback offer depicted on our Platform may not be accurate. By default, your related transactions will be credited in accordance with the commission that the Retailer reports to us; this commission may be greater or lower than the rate that was advertised. Any discrepancy between the member's anticipated cashback and the cashback the member actually receives is not our responsibility.
                        A "waiting payment" will be credited to your account after we have linked a paying, qualifying transaction to it. The payment will be marked as "verified" once the Retailer approves the transaction; this could take 90 days or longer from the date of the purchase. The cashback payment will not be given if the items are returned, the sale is reversed, or the transaction is altered in any way. Members must inform Dealsandcouponsmena of any returns or exchanges for which they may have improperly earned rewards in addition to the Retailer.
                        The Member acknowledges and accepts that the Retailer or us may determine whether a transaction qualifies as a Qualifying for cashback Transaction (including cashback through a Qualifying Referral) at their sole discretion. If the Retailer does not notify us of a sale or does not classify a transaction as a qualifying transaction, we will not be held liable. Furthermore, we shall not be liable if, for any reason, it is impossible for us to attribute a sale to a Member and the transaction is not eligible to be considered a qualifying transaction or a qualifying referral. While we will make every effort to get the Retailer to pay up, the final say in any matter belongs to us, the Retailer, or the tracking agent for the Retailer. Even while we will make every effort to recover any lost commissions, we reserve the right to not pursue such claims if no transaction has been made.
                        Additionally, the Member will not earn any Cashback if the Retailer believes that the purchase is not legitimate for any reason at all and we do not receive any Cashback for the transaction.
                        When a member contacts us with a question about missing cashback, our system looks to see if the user left our platform on the day the Member specifies. The Member will see a notification stating that they did not navigate via our website to earn cashback prior to the sale if no exit clicks can be tracked. The database retains all store exit clicks for cross-referencing and adding cashback values. You might receive less money than you anticipated when a commission inquiry has been paid successfully by a retailer since the money, we received may have been less than what was originally claimed. You are welcome to ask us questions about this. We reserve the right to close the inquiry claim if a Retailer hasn't paid a manual commission claim after six months. Only when the Retailer pays Dealsandcouponsmena is any payout for Missing Cashback relevant.
                        When it is clear that credit was applied improperly, we reserve the right to reclaim it or amend the balance accordingly. This covers, but is not limited to, transactions where the credit is not actually due, where payment for any credited transaction has not been received from a Retailer or its agencies, as well as instances of fraud or misuse. This can apply to transactions that have already been paid to you by Net banking, Cheque, Gift Cards, or any other payment method that We may occasionally implement. These transactions may already be shown as payable or validated in your Account. In all such cases, Dealsandcouponsmena has the right to recoup all cashback that was improperly paid but to which the member was not entitled to earn, through legal proceedings.
                    </p>

                    <p class="mb-5">
                        There are a number of situations in which Cashback will not be paid to the Member and will instead be forfeited to us, including but not limited to:
                    </p>

                    <p class="mb-5">
                        <b>A.</b> In the event that the cashback payment we receive cannot be linked to a Qualifying Transaction or an Account (such as where the Member is not logged-in to our Platform when making the relevant purchase). <br>

                        <b>B.</b> The transaction that the Cashback pertains to is canceled after it has been entered into (either through the right of cancellation that some sales conducted at a distance are subject to, or otherwise), and the Cashback is allocated to a member or Account that has been: <br>
                    </p>

                    <p class="mb-5">
                        <b>i.</b> suspended by us in accordance with this Agreement's Clause 9 or for any other cause; <br>
                        <b>ii.</b> connected to any fraud or other violation of this Agreement;
                        We have further details regarding these situations on our support sites.
                    </p>


                    <p style="font-weight: bold; color:red">6. Your Account :</p>
                    <p class="mb-5" style="color: red;">
                        When you have at least 10 AED in your account, you can withdraw your validated cashback. The entire sum would be lost if the Member chooses to close their account with us and the verified cashback in their account at the time of closure is less than 10 AED. You can request payment of the verified cashback by any of the cashback receipt methods if the amount is 10 AED or more in your account. The cost of cashback payments made via check is an additional 2 AED. Our Bank levies this fee to support administrative and postal expenses. Any such verified balance that appears on your Account may be forfeited at our discretion for the reasons detailed herein in this Agreement.
                    </p>

                    <p class="mb-5" style="font-weight: bold;">7. Intellectual Property :</p>
                    <p class="mb-5">
                        You agree that we own or have a license to use all copyrights, trademarks, and other intellectual property rights in and related to the Platform (including any content submitted by Members or Retailers). Although it is simple to copy content from websites, this does not make it legal. Therefore, unless we have expressly granted permission to do so, no one may reproduce, distribute, publicly display, or otherwise adapt the Platform or any of the content found there.
                    </p>

                    <p class="mb-5">
                        A Member expressly transfers the following rights by posting or putting any item on the Platform:
                    </p>

                    <p class="mb-5">
                        <b>A.</b> a non-exclusive license to use, reproduce, and distribute such content through our Cashback Service and any other interactive services where we or our sub-licensee make the Cashback Service (or a service based on our service) available to users; <br>
                        <b>B.</b> the non-exclusive, personal, non-transferable right to view the pertinent material to other Members (through us, pursuant to the license referred to in clause a. above).
                    </p>

                    <p class="mb-5" style="font-weight: bold;">8. Privacy Policy :</p>
                    <p class="mb-5">
                        By agreeing to this Agreement, you also agree to the manner in which we will handle your personal information in accordance with our privacy policy. Please be aware that a posting on the Platform could be viewable by internet users all over the world due to the global nature of the World Wide Web.
                    </p>

                    <p class="mb-5" style="font-weight: bold;">9. Our Role :</p>
                    <p class="mb-5">
                        We do not engage in business with Retailers, and we do not sell or supply any of the products or services that they offer. As a result, we are exempt from all the obligations imposed by law on providers of those goods and services.
                        As a result, we are not in charge of or accountable for: <br>

                        <b>A.</b> the standard, security, or legality of the products or services offered by retailers; or <br>
                        <b>B.</b> Whether the retailer can or will deliver any products or services and transmit good title to them.<br>

                        Members should use the same level of caution online as they would in an offline transaction while engaging in transactions with Retailers. You release us, our agents, and employees from any liability arising from or connected with any transactions with Retailers, to the extent that the Applicable Law permits, including (without limitation) all claims and demands relating to incomplete or completed transactions with Retailers, or goods or services offered for sale or supply, or actually sold or supplied, through or in connection with any transactions with Retailers.
                    </p>

                    <p class="mb-5" style="font-weight: bold;">10. Misuse :</p>
                    <p class="mb-5">
                        If in our reasonable opinion, the relevant Member or Account appears to be in violation of any provision of this Agreement, we reserve the right to suspend or terminate that Member's access to all or part of our service.
                        Members must not engage in, or attempt to engage in, any transaction with a Retailer or to obtain Cashback (a) by providing personal information of another person or a payment method that they are not authorized to use, (b) by unfairly or deceptively utilizing a Retailer's offering, including but not limited to creating fake or unauthorized referral links, or (c) in violation of any terms and conditions applied by us or the Retailer to that transaction. If a member abuses our service in this way, we reserve the right to cancel any pending or validated payments in the Member's Account.
                        Each Member is responsible for making sure that any content they upload or that is connected to their account:<br>

                        <b>A.</b> is not threatening, vulgar, lewd, or otherwise abusive, defamatory, or offensive;<br>
                        <b>B.</b> is not meant to, or is not likely to, needlessly bother, inconvenience, or distress anyone;<br>
                        <b>C.</b> does not contain any malware, Trojan horses, worms, macro viruses, or other programs intended to obstruct, disrupt, or interfere with a computer's regular operations or to covertly intercept, gain unauthorized access to, or steal, any systems, data, or private information;<br>
                        <b>D.</b> does not violate any applicable laws or regulations, such as those that cover consumer protection, distance selling, unfair competition, anti-discrimination, false advertising, copyright, trademark, and privacy;<br>
                        <b>E.</b> doesn't violate the rights of any person or organization, including any privacy rights or expectations;<br>
                        <b>F.</b> is truthful and impartial in cases when it serves as feedback on a retailer; and<br>
                        <b>G.</b> No products or services are advertised by.<br>

                        Regardless of other provisions in this Agreement and the Privacy Policy, we reserve the right to look into complaints or reported violations of this Agreement and to take any action we deem necessary, including but not limited to reporting any suspected illegal activity to law enforcement officials, regulators, or other third parties and disclosing any information necessary or appropriate to such persons or entities regarding your Account, email address, or other personal information. Any Member who, in the sole judgment of the Retailer or us, misused the Platform or our Cashback Service or engaged in fraudulent activity while using it will have their Account closed,
                        their email and IP address will be blacklisted to prevent future use, and they will not be permitted to register from the same PC. <br>
                        Please use our contact form to let us know if you notice anything on our Platform that looks to violate any of the aforementioned guidelines. <br>
                        Each Member agrees that we are free to remove any content that appears to be in violation of this Agreement based on information we obtain from third parties or other Members, but we are not required to do so. <br>

                    </p>

                    <p class="mb-5" style="font-weight: bold;">11. Contact from third parties :</p>
                    <p class="mb-5">
                        You agree: If anybody contacts us regarding information or transactions related to you or your Account:<br>

                        <b>A.</b> to offer any logical details and help that we may need in order to reply to that communication; and<br>
                        <b>B.</b> Should we send the message to you for a response, to reply to it as soon as possible and accurately?<br>

                    </p>

                    <p class="mb-5" style="font-weight: bold;">12. Additional Services :</p>
                    <p class="mb-5">
                        Occasionally, we or our partners may offer new or improved services through the Platform. Additional terms and conditions may apply while using those services, and you must abide by them. Any violation by you of a substantial term of the conditions governing such services shall constitute a breach of this Agreement,
                        provided that those terms are properly disclosed to you on the Platform when you agree to use those services (as determined by us in our reasonable discretion).<br>
                    </p>

                    <p class="mb-5" style="font-weight: bold;">13. How our Cashback Service is run :</p>
                    <p class="mb-5">
                        When there are legal, security, technological, or business reasons to do so, we reserve the right to discontinue, alter, or suspend all or a portion of the Cashback Service. Except in cases where it is necessary to act sooner for security reasons or because of technical issues that might otherwise negatively impair our service, we will try to give you 30 days' notice before taking such action. The Cashback Service might occasionally become unavailable due to technical issues we encounter or issues with the Internet, but we'll take reasonable steps to solve these issues when they're within our control.
                        Though we try our best, we can't promise that the Cashback Service or any of the content on it will always be available.
                        However, we will make every effort to limit any scheduled outage periods; these will be disclosed to you when you visit the Cashback Service at the appropriate time.
                        We may ask you to alter your password or other details that enable access to the Cashback Service for security or other reasons, but we'll never ask you for your password over the phone, via email, or through any other channel than the Platform. The confidentiality of your password and any other identifying information is your exclusive responsibility.<br>
                    </p>

                    <p style="font-weight: bold;">14. Limitation of Liability and Disclaimer :</p>
                    <li style="font-weight: bold;">Disclaimer :</li>

                    <p class="mb-5">
                        The Platform's content and materials are supplied "as-is," "as available," with "all faults," and without any explicit or implied warranties of any kind (including but not limited to the disclaimer of any implied warranties of merchantability, non-infringement, freedom from error, and fitness for a particular purpose). It's possible that the data and services include faults, flaws, limits, or other issues. With the exception of what is stated in subsection 13, neither we nor any of our associated parties are responsible for how you utilize any information or service (d). Even if we have been informed of the possibility of such damages,
                        we and our affiliated parties are not responsible for any indirect, special, incidental, or consequential damages (including damages for loss of business, loss of profits, savings, litigation, or the like), whether based on breach of contract, breach of warranty, tort (including negligence), product liability, or otherwise. The agreement between us and you is fundamentally based on the negation and limitation of damages that are stated above. Without these restrictions, this Platform and the goods, services, information, and materials it contains could not be offered. There are no warranties, representations, or guarantees implied by any advice or information, whether expressed or implied, that you may acquire from us through the Platform or elsewhere. The electronic file that contains a form or document is released from all responsibility and liability for any harm brought on by viruses.
                    </p>

                    <li style="font-weight: bold;">Liability :</li>

                    <p class="mb-5">
                        <b>A.</b> We promise to deliver the Cashback Service with reasonable care and skill with the goal of fulfilling our standards, but we cannot and do not promise that the Cashback Service will satisfy your needs.<br>
                        <b>B.</b> We shall be liable only to the extent expressly set forth in this Agreement and shall not be subject to any further obligation, duty, or responsibility in contract, tort (including negligence, violation of statutory duty, and other torts), or under any other circumstances.<br>
                        <b>C.</b> Limitation of Liability: Subject to the provisions of clause d. below, we are only responsible for direct loss or damage resulting from our negligence, willful misconduct, or other tortious behavior, regardless of whether those actions were the result of our own conduct or the conduct of our employees, agents, or subcontractors. In lieu of any other remedies you may have against Dealsandcouponsmena and any affiliated party, the total amount of liability of Dealsandcouponsmena and the affiliated parties in connection with any claim arising out of or relating to the Platform and/or the goods, data, documents, and services provided herein or hereby shall not exceed 100 AED.
                        Whether in a contract, tort (such as carelessness, violating a statutory duty, or another tort), or other circumstance, we won't be liable to you or anyone else.<br>

                    <p>
                        i. (A) for any loss of income, business, anticipated savings, or profits; (B) for any inaccuracies or omissions in the Platform or any services or products obtained therefrom; (C) for the Platform's unavailability or interruption of service or any features thereof; (D) for your use of the Platform; (E) for the information and materials found on the Platform; and (F) for any delay or failure in performance beyond the control of us or any of our affiliated parties. <br>
                        ii. for any delayed or incomplete delivery of the Cashback Service, any other breach of this Agreement, or any other indirect, special, consequential loss damage, costs, or other claims, howsoever caused or arisen.<br>
                        iii. All representations, guarantees, conditions, and other terms, whether express or implied (by common law, statute, collaterally, or otherwise), are hereby disclaimed, with the exception of fraud and instances in which such disclaimer is prohibited by applicable law.<br>
                        iv. To be clear, we have no responsibility to you or anyone else for any content submitted by Members, any transactions (or non-transactions) with Retailers, or any activity or communication associated with such content or transactions.<br>
                        The provisions of this Clause 14 will remain in effect after this Agreement expires or is terminated.<br>
                    </p>

                    </p>

                    <p class="mb-5" style="font-weight: bold;">15. External Content :</p>
                    <p class="mb-5">
                        On the Platform or through hyperlinks from the Platform, third-party content and resources may be present. We disclaim all liability for any errors, misstatements of law, defamation, omissions, falsehood, obscenity, pornography, or other inappropriate language contained in the statements, opinions, representations, or other content and materials made available on the Platform or through hyperlinks from the Platform.<br>
                    </p>

                    <p class="mb-5" style="font-weight: bold;">16. Communications :</p>
                    <p class="mb-5">
                        You hereby expressly consent to receive communications from Dealsandcouponsmena by SMS, emails, notifications from mobile apps and browsers, and any other messages from time to time regarding Services offered through the Website.
                    </p>

                    <p class="mb-5" style="font-weight: bold;">17. Liability :</p>
                    <p class="mb-5">
                        You undertake to hold us harmless from any and all liabilities, claims, and costs that may result from or be related to (a) any violation of this Agreement on your part or through your Account, or (b) any dealings with Retailers.
                    </p>

                    <p class="mb-5" style="font-weight: bold;">18. Assignment :</p>
                    <p class="mb-5">
                        We reserve the right to assign this Agreement and any or all of our rights and duties hereunder, but we will not do so in a way that lessens the guarantees we have made to you herein. You are not permitted to subcontract any of your rights or responsibilities under this Agreement or to assign or otherwise dispose of it without our prior written authorization.
                    </p>


                    <p class="mb-5" style="font-weight: bold;">19. Complete Agreement :</p>
                    <p class="mb-5">
                        Your whole understanding with us regarding the Cashback Service is meant to be contained in this Agreement, which we deem to be fair and reasonable. Except for any fraud or false representation by one of us, it supersedes all prior agreements and understandings with respect to the Cashback Service that we may have had with you.
                    </p>

                    <p class="mb-5" style="font-weight: bold;">20. Modifications to this Agreement :</p>
                    <p class="mb-5">
                        This Agreement may be modified from time to time, and the updated version will be posted on the Cashback Service. When we do, we will update these terms and conditions and post a new version of the Agreement on the Cashback Service. This new version will govern the Cashback Service and our relationship with you:
                        A. If any changes are made to an operative provision of this Agreement that could have an adverse effect on you, they will take effect no later than three days after the date of posting (or the later date we specify in the relevant posting); if you do not wish to be governed by the new version of the Agreement, you may notify us on or before the date when the new version of the Agreement is to take effect, and from that date, you must stop using our service. Or
                        B. If the changes do not affect any operative provisions or are not likely to have an adverse effect on you, they will take effect immediately after posting (or at the later time we specify in the relevant posting), for instance, if the contact information for the referenced party’s changes or existing provisions are refined.
                    </p>

                    <p class="mb-5" style="font-weight: bold;">21. General :</p>
                    <p class="mb-5">
                        The remainder of this Agreement shall remain legal and enforceable even if any term is found to be invalid or unenforceable. No agency, partnership, joint venture, or employee-employer relationship is intended or created by this Agreement; you and we are independent contractors. We may nonetheless take legal action in response to later or similar breaches even if we choose not to respond to a breach by you or someone else.
                    </p>

                    <p class="mb-5" style="font-weight: bold;">22. Governing Law :</p>
                    <p class="mb-5">
                        The laws of GCC govern this Agreement and our interactions with you and each Member. To the non-exclusive jurisdiction of the GCC courts with respect to any issues arising out of or relating to this Agreement, you and we both thus submit.
                    </p>

                    <p class="mb-5" style="font-weight: bold;">23. Keeping this Agreement :</p>
                    <p class="mb-5">
                        The specific Agreements that Members sign when they sign up for the Cashback Service are not filed separately by us. It is available at www.dealsandcouponsmena.com. Please print and/or save a downloadable copy of this Agreement to your computer to create a durable copy. It is only available in English.
                    </p>

                    <p class="mb-5" style="font-weight: bold;">24. Message :</p>
                    <p class="mb-5">
                        Our email address is <a href="mailto:dealsandcouponsmena@gmail.com" style="font-size: large; color:#1DACE3">dealsandcouponsmena@gmail.com</a>

                    </p>




                </div>
                @endif


                @if ( app()->getLocale() == 'ar' )
                <div class="text" style="text-align: right;">
                    <p class="mb-0">
                    <p class="mb-5" style="font-weight: bold;">1. الإفتتاح :</p>
                    تحياتي من www.dealsandcouponsmena.com. حيث يعتبر هذا التعبير، ما لم يتعارض مع سياقه، يشمل الورثة القانونيين والممثلين والإداريين والخلفاء المسموح لهم والمتنازل لهم") تشغيل خدمة استرداد النقود. نطلب منك قراءة هذه الشروط والأحكام بعناية ("الشروط والأحكام" "الشروط" أو "الاتفاقية") نظرًا لأنها تشتمل على الشروط والأحكام القانونية التي تنطبق على استخدامك للخدمة، فإننا نوفرها من خلال الموقع الإلكتروني والتطبيق ("المنصة"، "الموقع الإلكتروني").
                    </p>
                    <p class="mb-5">
                    <p class="mb-5" style="font-weight: bold;">2. العضوية :</p>

                    بعد تقديم المعلومات اللازمة إلى Dealsandcouponsmena، يمكن الوصول إلى عضويتنا من خلال عملية التسجيل. نحن نوفر لك أحدث الشروط والأحكام أثناء التسجيل.
                    لا يُسمح لأعضاء Dealsandcouponsmena بتشغيل الإعلانات المدعومة التي تشير إلى Dealsandcouponsmena على Google أو Facebook أو أي منصة أخرى، لذا يرجى العلم بذلك. سيتم إنهاء حساب العضو على الفور إذا لم يتبع هذه القواعد.
                    </p>

                    <p class="mb-5">
                    <p style="font-weight: bold;">3. خدمتنا:</p>
                    <li style="font-weight: bold;">خدمة الاسترداد النقدي :</li>

                    <p class="mb-5">
                        يمكن للمستخدمين الذين يسجلون على المنصة ("الأعضاء") ثم يفتحون حسابًا معنا ("الحساب") استخدام خدمة الاسترداد النقدي الخاصة بنا للحصول على استرداد نقدي على المشتريات المتعقبة التي تتم من بائعي المنصة ("تجار التجزئة"). "المعاملة المؤهلة" - وهي عملية شراء تم تتبعها وتصديقها وإكمالها بنجاح - يجب أن يتم إجراؤها بواسطة العضو ليكون مؤهلاً للحصول على استرداد نقدي، ويجب أن نتلقى استرداد النقود الناتج عن ذلك قبل أن يتم اعتباره "استرداد نقدي".
                        إذا فشل تجار التجزئة في استخدام نظام المراقبة التابع لهم لتسجيل المعاملة، فقد لا يتم دفع هذه المبيعات إلى Dealsandcouponsmena، ونتيجة لذلك، لن يتم أيضًا دفع أي استرداد نقدي مستحق أو متوقع من هذه المبيعات إلى العضو.
                    </p>

                    <li style="font-weight: bold;">رسوم الاحالة</li>
                    <p class="mb-5">
                        طالما استمروا في كونهم أعضاء، تقدم خدمة Dealsandcouponsmena لمستخدميها مكافأة إحالة خاصة يحصلون من خلالها على استرداد نقدي بنسبة 2٪ على أي أعضاء جدد يقومون بإحضارهم باستخدام تعليمات النظام الأساسي ("الإحالة المؤهلة"). يرجى الرجوع إلى البند 5 لمزيد من المعلومات.
                    </p>

                    <p class="mb-5" style="font-weight: bold;">4. الانضمام إلى المجموعة :</p>

                    <p class="mb-5">
                        إذا كنت شخصًا طبيعيًا، فيجب أن يكون عمرك 18 (ثمانية عشر) عامًا أو أكثر حتى تتمكن من استخدام المنصة. بالإضافة إلى ذلك، باستخدام المنصة أو قبول هذه الشروط والأحكام، فإنك تقر وتضمن لـ Dealsandcouponsmena أن عمرك لا يقل عن 18 (ثمانية عشر) عامًا، وأن لديك الحق والسلطة والقدرة على استخدام المنصة، وأنك توافق على ذلك. والالتزام بهذه الشروط والأحكام. يجب عليك تقديم معلومات دقيقة وحديثة عن نفسك عند الاشتراك في خدمة الاسترداد النقدي، بما في ذلك اسمك القانوني وعنوانك وأي معلومات أخرى قد تكون مطلوبة. عندما يُطلب منك معلومات حول حساب مصرفي، أو التحقق من معلومات الدفع، أو طريقة دفع أخرى ("طريقة استلام الاسترداد النقدي") التي ترغب في تلقي المدفوعات من خلالها، يجب عليك (أ) التأكد من أنك وستظل كذلك بشكل كامل مخول باستخدام طريقة استلام الاسترداد النقدي و(ب) تأكيد رغبتك في تلقي الاسترداد النقدي من خلال طريقة استلام الاسترداد النقدي تلك. ومن خلال حسابك، يجب عليك إبقاء هذه المعلومات محدثة. يرجى العلم أن هناك رسوم إدارية إضافية بقيمة 30 روبية هندية لمدفوعات الاسترداد النقدي التي تتم عن طريق الشيكات.
                        إذا فشل تجار التجزئة في استخدام نظام المراقبة التابع لهم لتسجيل المعاملة، فقد لا يتم دفع هذه المبيعات إلى Dealsandcouponsmena، ونتيجة لذلك، لن يتم أيضًا دفع أي استرداد نقدي مستحق أو متوقع من هذه المبيعات إلى العضو.
                        موافقة المستخدم الإيجابية مطلوبة لإنشاء وجمع "البيانات أو المعلومات الشخصية الحساسة" بما يتماشى مع قانون تكنولوجيا المعلومات لعام 2000، بصيغته المعدلة من وقت لآخر والقواعد المرتبطة به. يمنح المستخدم الموافقة على إنشاء وجمع المعلومات حسب الضرورة للامتثال للقوانين المعمول بها من خلال الإشارة إلى الموافقة على هذه السياسة من خلال النقر على زر "أوافق على الشروط والسياسة" في وقت التسجيل.
                        كن على علم بأن الحد الأقصى أو الأدنى للدفعة التي يمكنك الحصول عليها من خلال طريقة استلام الاسترداد النقدي التي اخترتها (مثل شبكة الخدمات المصرفية أو الشيكات أو بطاقات الهدايا أو طرق الدفع الأخرى التي قد نقدمها) قد تخضع لقيود معينة.
                        سنرسل إليك رسائل مهمة هناك، لذا يرجى التأكد من دقة عنوان البريد الإلكتروني ورقم الهاتف المحمول المسجلين لديك ومن إمكانية الوصول إليهما. يجب عليك تحديث المعلومات الموجودة لدينا في الملف الخاص بك في حسابك إذا تغير عنوان بريدك الإلكتروني أو رقم هاتفك المحمول.
                    </p>

                    <p class="mb-5" style="font-weight: bold;">5. رسوم الاسترداد النقدي والإحالة:</p>

                    <p class="mb-5">
                        نقوم بتحويل الاسترداد النقدي إلى العضو من خلال طريقة استلام الاسترداد النقدي الخاصة به بعد أن يكمل العضو معاملة مؤهلة بنجاح وبعد حصولنا على الاسترداد النقدي لتلك المعاملة المؤهلة.
                        يرجى العلم أنه في ظل ظروف معينة، قد لا تكون المعاملة مع بائع التجزئة مؤهلة كمعاملة مؤهلة أو قد لا تؤدي إلى استرداد نقدي. وبالمثل، فإن الإحالة المؤهلة مؤهلة على هذا النحو. يدرك العضو أن جميع معاملاته تتم مع بائع التجزئة المحدد، وليس معنا. لدينا المزيد من التفاصيل بشأن هذه المواقف على مواقع الدعم الخاصة بنا. قد تتغير أيضًا العمولة التي يدفعها تجار التجزئة من وقت لآخر، وفي هذه الحالة قد لا يكون عرض الاسترداد النقدي الموضح على منصتنا دقيقًا. افتراضيًا، سيتم إضافة معاملاتك ذات الصلة وفقًا للعمولة التي يبلغنا بها بائع التجزئة؛ قد تكون هذه العمولة أكبر أو أقل من السعر الذي تم الإعلان عنه. أي تناقض بين الاسترداد النقدي المتوقع للعضو والاسترداد النقدي الذي يتلقاه العضو فعليًا ليس من مسؤوليتنا.
                        سيتم إضافة "الدفعة المنتظرة" إلى حسابك بعد أن نقوم بربط معاملة الدفع المؤهلة بها. سيتم وضع علامة "تم التحقق" على الدفعة بمجرد موافقة بائع التجزئة على المعاملة؛ قد يستغرق ذلك 90 يومًا أو أكثر من تاريخ الشراء. لن يتم دفع مبلغ الاسترداد النقدي في حالة إرجاع العناصر، أو إلغاء عملية البيع، أو تغيير المعاملة بأي شكل من الأشكال. يجب على الأعضاء إبلاغ Dealsandcouponsmena بأي عوائد أو عمليات استبدال قد يكونون قد حصلوا على مكافآت بشكل غير صحيح بالإضافة إلى بائع التجزئة.
                        يقر العضو ويوافق على أنه يجوز لبائع التجزئة أو لنا تحديد ما إذا كانت المعاملة مؤهلة لمعاملة استرداد نقدي (بما في ذلك استرداد النقود من خلال إحالة مؤهلة) وفقًا لتقديره الخاص. إذا لم يخطرنا بائع التجزئة بالبيع أو لم يصنف المعاملة على أنها معاملة مؤهلة، فلن نتحمل المسؤولية. علاوة على ذلك، لن نكون مسؤولين إذا كان من المستحيل بالنسبة لنا، لأي سبب من الأسباب، أن ننسب عملية بيع إلى أحد الأعضاء وكانت المعاملة غير مؤهلة لاعتبارها معاملة مؤهلة أو إحالة مؤهلة. في حين أننا سنبذل قصارى جهدنا لحمل بائع التجزئة على الدفع، فإن الكلمة الأخيرة في أي مسألة تعود إلينا، أو بائع التجزئة، أو وكيل التتبع الخاص ببائع التجزئة. وعلى الرغم من أننا سنبذل قصارى جهدنا لاسترداد أي عمولات مفقودة، إلا أننا نحتفظ بالحق في عدم متابعة مثل هذه المطالبات إذا لم يتم إجراء أي معاملة.
                        بالإضافة إلى ذلك، لن يحصل العضو على أي استرداد نقدي إذا كان بائع التجزئة يعتقد أن عملية الشراء غير مشروعة لأي سبب على الإطلاق، ولم نتلقى أي استرداد نقدي مقابل المعاملة.
                        عندما يتصل بنا أحد الأعضاء لطرح سؤال حول فقدان استرداد النقود، يتطلع نظامنا لمعرفة ما إذا كان المستخدم قد غادر منصتنا في اليوم الذي يحدده العضو. سيرى العضو إشعارًا يفيد بأنه لم يتنقل عبر موقعنا الإلكتروني لكسب استرداد نقدي قبل البيع إذا لم يكن من الممكن تتبع نقرات الخروج. تحتفظ قاعدة البيانات بجميع نقرات الخروج من المتجر من أجل الإسناد الترافقي وإضافة قيم الاسترداد النقدي. قد تتلقى أموالًا أقل مما كنت تتوقعه عندما يتم دفع استفسار العمولة بنجاح من قبل بائع تجزئة نظرًا لأن الأموال التي تلقيناها ربما كانت أقل مما تمت المطالبة به في الأصل. انكم مدعوون لطرح الأسئلة علينا حول هذا الموضوع. نحن نحتفظ بالحق في إغلاق مطالبة الاستفسار إذا لم يدفع بائع التجزئة مطالبة العمولة اليدوية بعد ستة أشهر. فقط عندما يقوم بائع التجزئة بدفع Dealsandcouponsmena، يكون أي تعويض عن استرداد النقود المفقود ذا صلة.
                        عندما يكون من الواضح أن الائتمان تم تطبيقه بشكل غير صحيح، فإننا نحتفظ بالحق في استعادته أو تعديل الرصيد وفقًا لذلك. يغطي هذا، على سبيل المثال لا الحصر، المعاملات التي لا يكون فيها الائتمان مستحقًا فعليًا، حيث لم يتم استلام الدفع مقابل أي معاملة معتمدة من بائع التجزئة أو وكالاته، بالإضافة إلى حالات الاحتيال أو سوء الاستخدام. يمكن أن ينطبق هذا على المعاملات التي تم دفعها لك بالفعل عن طريق Net Banking أو الشيكات أو بطاقات الهدايا أو أي طريقة دفع أخرى قد ننفذها من حين لآخر. قد تظهر هذه المعاملات بالفعل على أنها مستحقة الدفع أو تم التحقق من صحتها في حسابك. في جميع هذه الحالات، يحق لـ Dealsandcouponsmena استرداد جميع المبالغ المستردة التي تم دفعها بشكل غير صحيح ولكن لم يكن للعضو الحق في كسبها، من خلال الإجراءات القانونية.
                    </p>

                    <p class="mb-5">
                        هناك عدد من الحالات التي لن يتم فيها دفع الاسترداد النقدي للعضو، بل سيتم مصادرته لنا بدلاً من ذلك، بما في ذلك على سبيل المثال لا الحصر:
                    </p>

                    <p class="mb-5">
                        <b>أ.</b> في حالة عدم إمكانية ربط دفعة الاسترداد النقدي التي نتلقاها بمعاملة مؤهلة أو حساب (مثل عدم قيام العضو بتسجيل الدخول إلى منصتنا عند إجراء عملية الشراء ذات الصلة). <br>

                        <b>ب.</b> يتم إلغاء المعاملة التي تتعلق بالاسترداد النقدي بعد الدخول فيها (إما من خلال حق الإلغاء الذي تخضع له بعض عمليات البيع التي تتم عن بعد، أو غير ذلك)، ويتم تخصيص الاسترداد النقدي لعضو أو حساب تم :<br>
                    </p>

                    <p class="mb-5">
                        <b>i.</b> تم تعليقها من جانبنا وفقًا للبند 9 من هذه الاتفاقية أو لأي سبب آخر؛<br>
                        <b>ii.</b> مرتبطة بأي احتيال أو انتهاك آخر لهذه الاتفاقية؛
                        لدينا المزيد من التفاصيل بشأن هذه المواقف على مواقع الدعم الخاصة بنا.
                    </p>


                    <p style="font-weight: bold; color:red">6. حسابك :</p>
                    <p class="mb-5" style="color: red;">
                        عندما يكون لديك ما لا يقل عن 10 دراهم في حسابك، يمكنك سحب الاسترداد النقدي الذي تم التحقق منه.
                        سيتم فقدان المبلغ بالكامل إذا اختار العضو إغلاق حسابه معنا وكان الاسترداد النقدي الذي تم التحقق منه في حسابه في وقت الإغلاق أقل من 10 دراهم.
                        يمكنك طلب سداد الاسترداد النقدي الذي تم التحقق منه عن طريق أي من طرق استلام الاسترداد النقدي إذا كان المبلغ 10 دراهم أو أكثر في حسابك. تكلفة دفعات الاسترداد النقدي التي تتم عن طريق الشيكات هي 2 درهم إضافية. يفرض مصرفنا هذه الرسوم لدعم النفقات الإدارية والبريدية.
                        يجوز مصادرة أي رصيد تم التحقق منه يظهر في حسابك وفقًا لتقديرنا للأسباب المفصلة هنا في هذه الاتفاقية.

                    </p>

                    <p class="mb-5" style="font-weight: bold;">7. الملكية الفكرية :</p>
                    <p class="mb-5">
                        أنت توافق على أننا نمتلك أو لدينا ترخيصًا لاستخدام جميع حقوق الطبع والنشر والعلامات التجارية وحقوق الملكية الفكرية الأخرى في النظام الأساسي والمتعلق به (بما في ذلك أي محتوى مقدم من الأعضاء أو تجار التجزئة). على الرغم من سهولة نسخ المحتوى من مواقع الويب، إلا أن هذا لا يجعله قانونيًا. لذلك، ما لم نمنح الإذن صراحةً للقيام بذلك، لا يجوز لأي شخص إعادة إنتاج أو توزيع أو عرض علنيًا أو تعديل المنصة أو أي محتوى موجود هناك.
                    </p>

                    <p class="mb-5">
                        ينقل العضو صراحة الحقوق التالية عن طريق نشر أو وضع أي عنصر على المنصة:
                    </p>

                    <p class="mb-5">
                        <b>أ.</b> ترخيص غير حصري لاستخدام هذا المحتوى وإعادة إنتاجه وتوزيعه من خلال خدمة الاسترداد النقدي الخاصة بنا وأي خدمات تفاعلية أخرى حيث نقوم نحن أو المرخص له من الباطن بإتاحة خدمة الاسترداد النقدي (أو خدمة تعتمد على خدمتنا) للمستخدمين؛<br>
                        <b>ب.</b> الحق الشخصي غير الحصري وغير القابل للتحويل في عرض المواد ذات الصلة للأعضاء الآخرين (من خلالنا، وفقًا للترخيص المشار إليه في البند أ أعلاه).
                    </p>

                    <p class="mb-5" style="font-weight: bold;">8. سياسة الخصوصية :</p>
                    <p class="mb-5">
                        من خلال موافقتك على هذه الاتفاقية، فإنك توافق أيضًا على الطريقة التي سنتعامل بها مع معلوماتك الشخصية وفقًا لسياسة الخصوصية الخاصة بنا. يرجى العلم أن المنشور على المنصة يمكن أن يكون قابلاً للعرض بواسطة مستخدمي الإنترنت في جميع أنحاء العالم نظرًا للطبيعة العالمية لشبكة الويب العالمية.
                    </p>

                    <p class="mb-5" style="font-weight: bold;">9. دورنا :</p>
                    <p class="mb-5">
                        نحن لا نتعامل مع تجار التجزئة، ولا نبيع أو نوفر أيًا من المنتجات أو الخدمات التي يقدمونها. ونتيجة لذلك، فإننا معفيون من جميع الالتزامات التي يفرضها القانون على مقدمي تلك السلع والخدمات.
                        ونتيجة لذلك، نحن لسنا مسؤولين أو مسؤولين عن:
                        <br>

                        <b>أ.</b> معيار أو أمان أو شرعية المنتجات أو الخدمات التي يقدمها تجار التجزئة؛ أو<br>
                        <b>ب.</b> ما إذا كان بائع التجزئة يستطيع أو سيقدم أي منتجات أو خدمات وينقل الملكية الجيدة إليها.<br>

                        يجب على الأعضاء توخي نفس المستوى من الحذر عبر الإنترنت كما يفعلون في المعاملات دون الاتصال بالإنترنت أثناء المشاركة في المعاملات مع تجار التجزئة. أنت تعفينا نحن ووكلائنا وموظفينا من أي مسؤولية ناشئة عن أو مرتبطة بأي معاملات مع تجار التجزئة، إلى الحد الذي يسمح به القانون المعمول به، بما في ذلك (على سبيل المثال لا الحصر) جميع المطالبات والطلبات المتعلقة بالمعاملات غير الكاملة أو المكتملة مع تجار التجزئة، أو البضائع أو الخدمات المعروضة للبيع أو العرض، أو التي تم بيعها أو توفيرها فعليًا، من خلال أو فيما يتعلق بأي معاملات مع تجار التجزئة.
                    </p>

                    <p class="mb-5" style="font-weight: bold;">10. سوء الاستخدام :</p>
                    <p class="mb-5">
                        إذا بدا في رأينا المعقول أن العضو أو الحساب المعني ينتهك أي حكم من أحكام هذه الاتفاقية، فإننا نحتفظ بالحق في تعليق أو إنهاء وصول هذا العضو إلى كل أو جزء من خدمتنا.
                        يجب على الأعضاء عدم الانخراط في أو محاولة الانخراط في أي معاملة مع بائع تجزئة أو الحصول على استرداد نقدي (أ) من خلال تقديم معلومات شخصية لشخص آخر أو طريقة دفع غير مصرح لهم باستخدامها، (ب) بشكل غير عادل أو خادع استخدام عروض بائع التجزئة، بما في ذلك على سبيل المثال لا الحصر، إنشاء روابط إحالة مزيفة أو غير مصرح بها، أو (ج) انتهاك أي شروط وأحكام نطبقها نحن أو بائع التجزئة على تلك المعاملة. إذا أساء أحد الأعضاء استخدام خدمتنا بهذه الطريقة، فإننا نحتفظ بالحق في إلغاء أي مدفوعات معلقة أو تم التحقق منها في حساب العضو.
                        يتحمل كل عضو مسؤولية التأكد من أن أي محتوى يقوم بتحميله أو مرتبط بحسابه:
                        <br>

                        <b>A.</b> لا يشكل تهديدًا أو مبتذلاً أو بذيءًا أو مسيئًا أو تشهيريًا أو مهينًا؛<br>
                        <b>B.</b> ليس المقصود منه، أو من غير المحتمل أن يزعج أو يزعج أو يزعج أي شخص دون داع؛<br>
                        <b>C.</b> لا يحتوي على أي برامج ضارة أو أحصنة طروادة أو الفيروسات المتنقلة أو فيروسات الماكرو أو برامج أخرى تهدف إلى عرقلة أو تعطيل أو
                        التدخل في العمليات العادية لجهاز الكمبيوتر أو الاعتراض سرًا أو الوصول غير المصرح به إلى أي أنظمة أو بيانات أو معلومات خاصة أو سرقتها؛<br>
                        <b>D.</b> لا ينتهك أي قوانين أو لوائح معمول بها، مثل تلك التي تغطي حماية المستهلك، والبيع عن بعد، والمنافسة غير العادلة، ومكافحة التمييز،
                        الإعلانات الكاذبة وحقوق النشر والعلامات التجارية والخصوصية<br>
                        <b>E.</b> لا ينتهك حقوق أي شخص أو منظمة، بما في ذلك أي حقوق أو توقعات تتعلق بالخصوصية؛<br>
                        <b>F.</b> صادق ومحايد في الحالات التي يكون فيها بمثابة تعليقات على بائع التجزئة؛ و<br>
                        <b>G.</b> لا يتم الإعلان عن أي منتجات أو خدمات.<br>

                        بغض النظر عن الأحكام الأخرى في هذه الاتفاقية وسياسة الخصوصية، فإننا نحتفظ بالحق في النظر في الشكاوى أو الانتهاكات المبلغ عنها لهذه الاتفاقية واتخاذ أي إجراء نراه ضروريًا، بما في ذلك على سبيل المثال لا الحصر، الإبلاغ عن أي نشاط غير قانوني مشتبه به إلى مسؤولي إنفاذ القانون، المنظمين، أو أطراف ثالثة أخرى والكشف عن أي
                        المعلومات الضرورية أو المناسبة لهؤلاء الأشخاص أو الكيانات فيما يتعلق بحسابك أو عنوان بريدك الإلكتروني أو معلومات شخصية أخرى.
                        أي عضو، وفقًا لتقدير بائع التجزئة أو نحن، أساء استخدام المنصة أو خدمة استرداد النقود الخاصة بنا أو شارك في نشاط احتيالي أثناء استخدامه، سيتم إغلاق حسابه،
                        سيتم إدراج بريدهم الإلكتروني وعنوان IP الخاص بهم في القائمة السوداء لمنع الاستخدام المستقبلي، ولن يُسمح لهم بالتسجيل من نفس جهاز الكمبيوتر.

                        <br>
                        يرجى استخدام نموذج الاتصال الخاص بنا لإعلامنا إذا لاحظت أي شيء على منصتنا يبدو أنه ينتهك أيًا من الإرشادات المذكورة أعلاه.
                        <br>
                        يوافق كل عضو على أننا أحرار في إزالة أي محتوى يبدو أنه ينتهك هذه الاتفاقية بناءً على المعلومات التي نقدمها
                        الحصول عليها من أطراف ثالثة أو أعضاء آخرين، ولكن ليس مطلوبًا منا القيام بذلك.
                        <br>

                    </p>

                    <p class="mb-5" style="font-weight: bold;">11. الاتصال من أطراف ثالثة :</p>
                    <p class="mb-5">
                        أنت توافق على ما يلي: إذا اتصل بنا أي شخص بخصوص معلومات أو معاملات تتعلق بك أو بحسابك:
                        <br>

                        <b>أ.</b> لتقديم أي تفاصيل منطقية ومساعدة قد نحتاجها للرد على تلك الرسالة؛ و
                        <br>
                        <b>ب.</b> هل يجب أن نرسل لك الرسالة للرد، للرد عليها في أسرع وقت وبدقة؟
                        <br>

                    </p>

                    <p class="mb-5" style="font-weight: bold;">12. الخدمات الإضافية :</p>
                    <p class="mb-5">
                        في بعض الأحيان، قد نقدم نحن أو شركاؤنا خدمات جديدة أو محسنة من خلال المنصة. قد يتم تطبيق شروط وأحكام إضافية أثناء استخدام تلك الخدمات، ويجب عليك الالتزام بها. أي انتهاك من جانبك لشرط جوهري من الشروط التي تحكم هذه الخدمات يشكل خرقًا لهذه الاتفاقية،
                        بشرط أن يتم الكشف عن هذه الشروط لك بشكل صحيح على المنصة عندما توافق على استخدام هذه الخدمات (على النحو الذي نحدده وفقًا لتقديرنا المعقول).
                        <br>
                    </p>

                    <p class="mb-5" style="font-weight: bold;">13. كيف يتم تشغيل خدمة الاسترداد النقدي لدينا:</p>
                    <p class="mb-5">
                        عندما تكون هناك أسباب قانونية أو أمنية أو تكنولوجية أو تجارية للقيام بذلك، فإننا نحتفظ بالحق في إيقاف أو تغيير أو تعليق كل أو جزء من خدمة استرداد النقود. باستثناء الحالات التي يكون فيها من الضروري التصرف عاجلاً لأسباب أمنية أو بسبب مشكلات فنية قد تؤدي إلى إضعاف خدماتنا سلبًا، سنحاول تقديم إشعار لك قبل 30 يومًا من اتخاذ هذا الإجراء.
                        قد تصبح خدمة استرداد النقود في بعض الأحيان غير متاحة بسبب مشكلات فنية نواجهها أو مشكلات في الإنترنت، ولكننا سنتخذ خطوات معقولة لحل هذه المشكلات عندما تكون تحت سيطرتنا.
                        على الرغم من أننا نبذل قصارى جهدنا، لا يمكننا أن نعد بأن خدمة الاسترداد النقدي أو أي من محتوياتها ستكون متاحة دائمًا.
                        ومع ذلك، سنبذل قصارى جهدنا للحد من أي فترات انقطاع مجدولة؛ سيتم الكشف عن هذه الأمور لك عند زيارتك لخدمة الاسترداد النقدي في الوقت المناسب.
                        قد نطلب منك تغيير كلمة المرور الخاصة بك أو التفاصيل الأخرى التي تتيح الوصول إلى خدمة استرداد النقود لأسباب أمنية أو لأسباب أخرى، لكننا لن نطلب منك أبدًا كلمة المرور الخاصة بك عبر الهاتف أو عبر البريد الإلكتروني أو من خلال أي قناة أخرى غير المنصة. إن سرية كلمة المرور الخاصة بك وأي معلومات تعريفية أخرى هي مسؤوليتك الحصرية.
                        <br>
                    </p>

                    <p style="font-weight: bold;">14. حدود المسؤولية وإخلاء المسؤولية :</p>
                    <li style="font-weight: bold;">تنصل :</li>

                    <p class="mb-5">
                        يتم توفير محتوى ومواد المنصة "كما هي" و"كما هي متاحة" مع "جميع العيوب" ودون أي ضمانات صريحة أو ضمنية من أي نوع (بما في ذلك على سبيل المثال لا الحصر إخلاء المسؤولية عن أي ضمانات ضمنية تتعلق بالتسويق وعدم - التعدي، والخلو من الخطأ، والملاءمة لغرض معين). من الممكن أن تتضمن البيانات والخدمات عيوبًا أو عيوبًا أو حدودًا أو مشكلات أخرى. باستثناء ما هو مذكور في القسم الفرعي 13، لا نتحمل نحن ولا أي من الأطراف المرتبطة بنا المسؤولية عن كيفية استخدامك لأي معلومات أو خدمة (د). حتى لو تم إبلاغنا بإمكانية حدوث مثل هذه الأضرار،
                        نحن والأطراف التابعة لنا لسنا مسؤولين عن أي أضرار غير مباشرة أو خاصة أو عرضية أو تبعية (بما في ذلك الأضرار الناجمة عن خسارة الأعمال أو خسارة الأرباح أو المدخرات أو التقاضي أو ما شابه ذلك)، سواء كانت مستندة على خرق العقد أو خرق الضمان. أو الضرر (بما في ذلك الإهمال)، أو مسؤولية المنتج، أو غير ذلك. يستند الاتفاق بيننا وبينك بشكل أساسي على نفي الأضرار المذكورة أعلاه والحد منها. بدون هذه القيود، لا يمكن تقديم هذه المنصة وما تحتويه من سلع وخدمات ومعلومات ومواد. لا توجد أي ضمانات أو إقرارات أو ضمانات تتضمنها أي نصيحة أو معلومات، سواء كانت صريحة أو ضمنية، قد تحصل عليها منا من خلال المنصة أو في أي مكان آخر. يُعفى الملف الإلكتروني الذي يحتوي على نموذج أو مستند من كافة المسئولية والمسؤولية عن أي ضرر ناتج عن الفيروسات.
                    </p>

                    <li style="font-weight: bold;">مسئولية قانونية :</li>

                    <p class="mb-5">
                        <b>أ.</b> نحن نعد بتقديم خدمة الاسترداد النقدي بعناية ومهارة معقولة بهدف الوفاء بمعاييرنا، ولكن لا يمكننا أن نعد بأن خدمة الاسترداد النقدي سوف تلبي احتياجاتك.<br>
                        <b>ب.</b> سنكون مسؤولين فقط إلى الحد المنصوص عليه صراحة في هذه الاتفاقية ولن نخضع لأي التزام أو واجب أو مسؤولية أخرى في العقد أو الضرر (بما في ذلك الإهمال وانتهاك الواجب القانوني والأضرار الأخرى) أو بموجب أي ضرر آخر. ظروف.<br>
                        <b>ج.</b> حدود المسؤولية: مع مراعاة أحكام البند د. أدناه، نحن مسؤولون فقط عن الخسارة أو الضرر المباشر الناتج عن إهمالنا أو سوء سلوكنا المتعمد أو أي سلوك ضار آخر، بغض النظر عما إذا كانت تلك الإجراءات نتيجة لسلوكنا أو سلوك موظفينا أو وكلائنا أو المقاولين من الباطن. بدلاً من أي تعويضات أخرى قد تكون لديكم ضد Dealsandcouponsmena وأي طرف تابع، المبلغ الإجمالي لمسؤولية Dealsandcouponsmena والأطراف التابعة فيما يتعلق بأي مطالبة تنشأ عن أو تتعلق بالمنصة و/أو البضائع والبيانات والمستندات، والخدمات المقدمة هنا أو بموجبه لا تتجاوز 100 درهم.
                         سواء كان ذلك في عقد أو ضرر (مثل الإهمال أو انتهاك واجب قانوني أو أي ضرر آخر) أو أي ظرف آخر، لن نكون مسؤولين تجاهك أو تجاه أي شخص آخر.
                        <br>

                    <p>
                    أولا. (أ) أي خسارة في الدخل أو العمل أو المدخرات المتوقعة أو الأرباح؛ (ب) عن أي معلومات غير دقيقة أو سهو في المنصة أو أي خدمات أو منتجات تم الحصول عليها منها؛ (ج) عدم توفر المنصة أو انقطاع الخدمة أو أي من ميزاتها؛ (د) لاستخدامك للمنصة؛ (هـ) للمعلومات والمواد الموجودة على المنصة؛ و (و) عن أي تأخير أو فشل في الأداء خارج نطاق سيطرتنا أو أي من الأطراف التابعة لنا.<br>
                    ثانيا. عن أي تسليم متأخر أو غير مكتمل لخدمة استرداد النقود، أو أي خرق آخر لهذه الاتفاقية، أو أي أضرار أو تكاليف أو مطالبات أخرى غير مباشرة أو خاصة أو تبعية، أيًا كان سببها أو نشأتها.<br>
                    ثالثا. يتم بموجب هذا إخلاء المسؤولية عن جميع الإقرارات والضمانات والشروط والشروط الأخرى، سواء كانت صريحة أو ضمنية (بموجب القانون العام أو التشريع أو الضمانات أو غير ذلك)، باستثناء حالات الاحتيال والحالات التي يحظر فيها إخلاء المسؤولية هذا بموجب القانون المعمول به.<br>
                    رابعا. للتوضيح، نحن لا نتحمل أي مسؤولية تجاهك أو تجاه أي شخص آخر عن أي محتوى يقدمه الأعضاء، أو أي معاملات (أو عدم معاملات) مع تجار التجزئة، أو أي نشاط أو اتصال مرتبط بهذا المحتوى أو المعاملات.<br>
                    ستظل أحكام هذا البند 14 سارية بعد انتهاء صلاحية هذه الاتفاقية أو إنهائها.
                        <br>
                    </p>

                    </p>

                    <p class="mb-5" style="font-weight: bold;">15. المحتوى الخارجي :</p>
                    <p class="mb-5">
                    على النظام الأساسي أو من خلال الارتباطات التشعبية من النظام الأساسي، قد يكون هناك محتوى وموارد تابعة لجهة خارجية. نحن نخلي مسؤوليتنا عن أي أخطاء أو تحريفات قانونية أو تشهير أو إغفال أو كذب أو فحش أو مواد إباحية أو لغة أخرى غير لائقة واردة في البيانات أو الآراء أو الإقرارات أو أي محتوى أو مواد أخرى متاحة على المنصة أو من خلال الروابط التشعبية من الموقع. منصة.
                        <br>
                    </p>

                    <p class="mb-5" style="font-weight: bold;">16. الاتصالات :</p>
                    <p class="mb-5">
                    أنت بموجب هذا توافق صراحةً على تلقي الاتصالات من Dealsandcouponsmena عبر الرسائل النصية القصيرة ورسائل البريد الإلكتروني والإشعارات من تطبيقات الهاتف المحمول والمتصفحات وأي رسائل أخرى من وقت لآخر فيما يتعلق بالخدمات المقدمة من خلال الموقع.
                    </p>

                    <p class="mb-5" style="font-weight: bold;">17. المسؤولية :</p>
                    <p class="mb-5">
                    أنت تتعهد بإعفائنا من أي وجميع الالتزامات والمطالبات والتكاليف التي قد تنجم عن أو تكون مرتبطة بـ (أ) أي انتهاك لهذه الاتفاقية من جانبك أو من خلال حسابك، أو (ب) أي تعاملات مع تجار التجزئة.                    </p>

                    <p class="mb-5" style="font-weight: bold;">18. المهمة :</p>
                    <p class="mb-5">
                    نحن نحتفظ بالحق في التنازل عن هذه الاتفاقية وأي من حقوقنا وواجباتنا بموجبها أو جميعها، لكننا لن نفعل ذلك بطريقة تقلل من الضمانات التي قدمناها لك هنا. لا يجوز لك التعاقد من الباطن على أي من حقوقك أو مسؤولياتك بموجب هذه الاتفاقية أو التنازل عنها أو التصرف فيها دون الحصول على إذن كتابي مسبق منا.
                    </p>


                    <p class="mb-5" style="font-weight: bold;">19. الاتفاقية الكاملة :</p>
                    <p class="mb-5">
                    من المفترض أن يتم تضمين فهمك الكامل معنا فيما يتعلق بخدمة استرداد النقود في هذا
                         الاتفاق الذي نعتبره عادلاً ومعقولًا. باستثناء أي احتيال أو تمثيل كاذب من قبل أحد
                          منا، فإنه يحل محل جميع الاتفاقيات والتفاهمات السابقة فيما يتعلق بخدمة الاسترداد النقدي التي قد تكون بيننا وبينك.
                    </p>

                    <p class="mb-5" style="font-weight: bold;">20. تعديلات على هذه الاتفاقية :</p>
                    <p class="mb-5">
                    يجوز تعديل هذه الاتفاقية من وقت لآخر، وسيتم نشر النسخة المحدثة على خدمة الاسترداد النقدي. عندما نقوم بذلك، سنقوم بتحديث هذه الشروط والأحكام ونشر نسخة جديدة من اتفاقية خدمة الاسترداد النقدي. سيحكم هذا الإصدار الجديد خدمة الاسترداد النقدي وعلاقتنا معك:
                         ج. إذا تم إجراء أي تغييرات على أحد الأحكام التنفيذية لهذه الاتفاقية والتي يمكن أن يكون لها تأثير سلبي عليك، فستدخل حيز التنفيذ في موعد لا يتجاوز ثلاثة أيام بعد تاريخ النشر (أو التاريخ اللاحق الذي نحدده في النشر ذي الصلة)؛ إذا كنت لا ترغب في أن تخضع للإصدار الجديد من الاتفاقية، فيمكنك إخطارنا في أو قبل التاريخ الذي يدخل فيه الإصدار الجديد من الاتفاقية حيز التنفيذ، واعتبارًا من ذلك التاريخ، يجب عليك التوقف عن استخدام خدمتنا. أو
                         ب. إذا كانت التغييرات لا تؤثر على أي أحكام منطوقة أو ليس من المحتمل أن يكون لها تأثير سلبي عليك، فستدخل حيز التنفيذ مباشرة بعد النشر (أو في وقت لاحق نحدده في النشر ذي الصلة)، على سبيل المثال، إذا كانت جهة الاتصال يتم تنقيح المعلومات المتعلقة بتغييرات الطرف المشار إليه أو الأحكام الحالية.
                    </p>

                    <p class="mb-5" style="font-weight: bold;">21. عام :</p>
                    <p class="mb-5">
                    تظل بقية هذه الاتفاقية قانونية وقابلة للتنفيذ حتى لو تبين أن أي شرط منها غير صالح أو غير قابل للتنفيذ. لا وكالة،
                         الشراكة أو المشروع المشترك أو العلاقة بين الموظف وصاحب العمل مقصودة أو منشأة بموجب هذه الاتفاقية؛ أنت ونحن مقاولين مستقلين.
                         ومع ذلك، يجوز لنا اتخاذ إجراءات قانونية ردًا على الانتهاكات اللاحقة أو المماثلة حتى لو اخترنا عدم الرد على انتهاك من جانبك أو من قبل شخص آخر.
                    </p>

                    <p class="mb-5" style="font-weight: bold;">22. القانون الحاكم :</p>
                    <p class="mb-5">
                    تحكم قوانين دول مجلس التعاون الخليجي هذه الاتفاقية وتفاعلاتنا معك ومع كل عضو.
                         إلى الاختصاص غير الحصري لمحاكم دول مجلس التعاون الخليجي فيما يتعلق بأي قضايا تنشأ عن هذه الاتفاقية أو تتعلق بها، فإننا نخضع لذلك.
                    </p>

                    <p class="mb-5" style="font-weight: bold;">23. الحفاظ على هذه الاتفاقية:</p>
                    <p class="mb-5">
                    لا يتم تقديم الاتفاقيات المحددة التي يوقعها الأعضاء عند الاشتراك في خدمة الاسترداد النقدي بشكل منفصل من قبلنا. وهي متوفرة في
                         www.dealsandcouponsmena.com. يرجى طباعة و/أو حفظ نسخة قابلة للتنزيل من هذه الاتفاقية على جهاز الكمبيوتر الخاص بك لإنشاء نسخة دائمة. وهي متاحة فقط باللغة الإنجليزية.
                    </p>

                    <p class="mb-5" style="font-weight: bold;">24. راسلنا :</p>
                    <p class="mb-5">
                        عنوانا الإلكتروني <a href="mailto:dealsandcouponsmena@gmail.com" style="font-size: large; color:#1DACE3">dealsandcouponsmena@gmail.com</a>

                    </p>




                </div>
                @endif



            </div>
        </div>


    </div>
</section>

<!-- Terms & Conditions section Start -->


@endsection