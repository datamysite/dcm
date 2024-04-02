<img src="{{URL::to('/public/ticket.png')}}">
<a href="javascript:void(0)" class="grap_deal_close_btn" data-dismiss="modal" aria-label="Close">x</a>
<div class="grap_deal_row">
  <div class="grap_deal_message">
     <p>{{ __('translation.thank_you') }}</p>
     <p>{{ __('translation.redeem_successful') }}</p>
  </div>
</div>


<div class="grap_deal_coupon">
  <div class="grap_deal_code">
     <p>{{ __('translation.your_coupon_code') }}</p>
     <h2>{{$coupon->code}}</h2>
  </div>

  <div class="grap_deal_button">
     <a href="javascript:void(0)" class="grap_deal_btn" data-id="{{$coupon->id}}" data-href="{{$coupon->link}}{{$coupon->retailer->slug == 'sivvi' ? '' : '?utm_source=dealsandcouponsmena&utm_campaign=cps'}}" id="popupButton">{{ __('translation.grab_deal') }}</a>
  </div>
</div>

<div class="grap_deal_social">
   <p>{{ __('translation.share_it') }}</p>
   <div>
     <a href="https://wa.me/?text={{route('brand', [$region, $coupon->retailer->slug])}}" data-action="share/whatsapp/share" class="grap_deal_icon" target="_blank"><i class="fa fa-whatsapp"></i></a>
     <a href="https://www.facebook.com/share.php?u={{route('brand', [$region, $coupon->retailer->slug])}}" target="_blank" class="grap_deal_icon"><i class="fa fa-facebook-square"></i></a>
   </div>
</div>

<div class="grap_deal_disclaimer">
  <p><strong>{{ __('translation.attention') }}</strong></p>
  <p>{{ __('translation.show_it') }}</p>
</div> 