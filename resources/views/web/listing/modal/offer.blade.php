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
        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge('https://beta.dealsandcouponsmena.com/public/web_assets/images/logo/logo-DCM.png', .3, true)->size(200)->generate('https://dealsandcouponsmena.ae')) !!} ">
     </h2>
  </div>
</div>

<div class="grap_deal_social offer_deal_social">
   <div>
     <a href="{{route('offers.redeemPDF', [$region, base64_encode($qrid)])}}" target="_blank" class="grap_deal_icon">{{ __('translation.Download') }} &nbsp;<i class="fa fa-download"></i></a>
     |
     <a href="javascript:void(0)" data-href="{{$offer->retailer->store_link}}" class="grap_deal_icon whatsapp_chat" data-id="{{$offer->id}}">{{ __('translation.Whatsapp') }} &nbsp;<i class="fa fa-whatsapp"></i></a>
   </div>
</div>

<div class="grap_deal_disclaimer offer_deal_disclaimer">
  <p><strong>{{ __('translation.attention') }}</strong></p>
  <p>{{ __('translation.copy_it') }}</p>
</div> 