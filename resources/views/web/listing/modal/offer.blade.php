<img src="{{URL::to('/public/ticket.png')}}">
<a href="javascript:void(0)" class="grap_deal_close_btn" data-dismiss="modal" aria-label="Close">x</a>
<div class="grap_deal_row offer_deal_row">
  <div class="grap_deal_message">
     <p>THANK YOU!</p>
     <p>Your redeem successful</p>
  </div>
</div>


<div class="grap_deal_coupon">
  <div class="grap_deal_code">
     <p>Your Coupon Code Is</p>
     <h2>
        {!! QrCode::size(110)->generate(route('offers.qrcode', [$offer->retailer->slug, $qrid])); !!}
     </h2>
  </div>
</div>

<div class="grap_deal_social offer_deal_social">
   <div>
     <a href="{{route('offers.redeemPDF', $qrid)}}" target="_blank" class="grap_deal_icon">Download &nbsp;<i class="fa fa-download"></i></a>
     |
     <a href="javascript:void(0)" data-href="{{$offer->retailer->store_link}}" class="grap_deal_icon whatsapp_chat" data-id="{{$offer->id}}">Whatsapp &nbsp;<i class="fa fa-whatsapp"></i></a>
   </div>
</div>

<div class="grap_deal_disclaimer offer_deal_disclaimer">
  <p><strong>Attention!</strong></p>
  <p>Present your downloaded coupon code at the store to enjoy an exclusive discount! Don't forget to claim your cashback from us!</p>
</div> 