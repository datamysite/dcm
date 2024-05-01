
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
     <a href="{{URL::to('/'.app()->getlocale().'/'.$region.'/coupon/grabDeal/'.$coupon->id)}}?m=1&h={{empty($coupon->link) ? $coupon->retailer->store_link : $coupon->link}}{{$coupon->retailer->slug == 'sivvi' ? '' : '?utm_source=dealsandcouponsmena&utm_campaign=cps'}}" class="grap_deal_btn" data-href="" id="popupButton">{{ __('translation.grab_deal') }}</a>
  </div>
</div>

<div class="grap_deal_social">
   <p>{{ __('translation.share_it') }}</p>
   <div>
     <a href="https://wa.me/?text={{route('brand', [$region, $coupon->retailer->slug])}}" data-action="share/whatsapp/share" class="grap_deal_icon" target="_blank">
        <amp-img src="{{URL::to('/public/wt.png')}}" layout="fixed" width="14px" height="14px"></amp-img>
     </a>
     <a href="https://www.facebook.com/share.php?u={{route('brand', [$region, $coupon->retailer->slug])}}" target="_blank" class="grap_deal_icon">
        <amp-img src="{{URL::to('/public/fb.png')}}" layout="fixed" width="14px" height="14px"></amp-img>
     </a>
   </div>
</div>

<div class="grap_deal_disclaimer">
  <p><strong>{{ __('translation.attention') }}</strong></p>
  <p>{{ __('translation.show_it') }}</p>
</div> 