<img src="{{URL::to('/public/ticket.png')}}">
<a href="javascript:void(0)" class="grap_deal_close_btn" data-dismiss="modal" aria-label="Close">x</a>
<div class="grap_deal_row offer_deal_row">
  <div class="grap_deal_message">
     <p>{{ __('translation.thank_you') }}</p>
     <p>{{ __('translation.redeem_successful') }}</p>
  </div>
</div>


<div class="grap_deal_coupon">
  <div class="grap_deal_code">
     <p>{{ __('translation.your_coupon_code') }}</p>
     <h2>
        {!! QrCode::size(110)->generate(route('offers.qrcode', [$offer->retailer->slug, base64_encode($qrid)])) !!}
     </h2>
  </div>
</div>

<div class="grap_deal_social offer_deal_social">
   <div>
     <a href="javascript::void()" data-href="{{route('offers.redeemPDF', [base64_encode($qrid)])}}" onclick="return gtag_report_qrcodeDownload;" target="_blank" class="grap_deal_icon downloadQrcode">{{ __('translation.Download') }} &nbsp;<i class="fa fa-download"></i></a>
     |
     <a href="javascript:void(0)" data-href="{{$offer->retailer->store_link}}" onclick="return gtag_report_whatsappButton;" class="grap_deal_icon whatsapp_chat" data-id="{{$offer->id}}">{{ __('translation.Whatsapp') }} &nbsp;<i class="fa fa-whatsapp"></i></a>
   </div>
</div>

<div class="grap_deal_disclaimer offer_deal_disclaimer">
  <p><strong>{{ __('translation.attention') }}</strong></p>
  <p>{{ __('translation.copy_it') }}</p>
</div> 