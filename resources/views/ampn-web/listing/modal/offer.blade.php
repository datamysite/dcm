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
        <?php
          $qr = QrCode::size(110)->generate(route('offers.qrcode', [$region, $offer->retailer->slug, base64_encode($qrid)])); 
          $qr = str_replace('<?', '<!--?', $qr);
          $qr = str_replace('?>', '?-->', $qr);
        ?>
        {!! $qr !!}
     </h2>
  </div>
</div>

<div class="grap_deal_social offer_deal_social">
   <div>
     <a href="{{route('offers.redeemPDF', [$region, base64_encode($qrid)])}}" target="_blank" class="grap_deal_icon">
      <amp-img src="{{URL::to('/public/dl.png')}}" layout="fixed" width="14px" height="14px"></amp-img>
     </a>
     <span class="link_seperate">|</span>
     <a href="{{URL::to('/'.app()->getlocale().'/'.$region.'/offers/whatsapp/'.$offer->id)}}?m=1&h={{$offer->retailer->store_link}}" class="grap_deal_icon whatsapp_chat" data-id="{{$offer->id}}">
      <amp-img src="{{URL::to('/public/wt.png')}}" layout="fixed" width="14px" height="14px"></amp-img>
     </a>
   </div>
</div>

<div class="grap_deal_disclaimer offer_deal_disclaimer">
  <p><strong>{{ __('translation.attention') }}</strong></p>
  <p>{{ __('translation.copy_it') }}</p>
</div> 