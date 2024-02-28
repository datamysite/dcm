<img src="{{URL::to('/public/ticket.png')}}">
<a href="javascript:void(0)" class="grap_deal_close_btn" data-dismiss="modal" aria-label="Close">x</a>
<div class="grap_deal_row">
  <div class="grap_deal_message">
     <p>THANK YOU!</p>
     <p>Your redeem successful</p>
  </div>
</div>


<div class="grap_deal_coupon">
  <div class="grap_deal_code">
     <p>Your Coupon Code Is</p>
     <h2>{{$coupon->code}}</h2>
  </div>

  <div class="grap_deal_button">
     <a href="javascript:void(0)" class="grap_deal_btn" data-id="{{$coupon->id}}" data-href="{{$coupon->link}}/?utm_source=dealsandcouponsmena&utm_campaign=cps" id="popupButton">Grab Deal</a>
  </div>
</div>

<div class="grap_deal_social">
   <p>Share With Your Friends</p>
   <div>
     <a href="https://wa.me/?text={{route('brand', $coupon->retailer->slug)}}" data-action="share/whatsapp/share" class="grap_deal_icon" target="_blank"><i class="fa fa-whatsapp"></i></a>
     <a href="https://www.facebook.com/share.php?u={{route('brand', $coupon->retailer->slug)}}" target="_blank" class="grap_deal_icon"><i class="fa fa-facebook-square"></i></a>
   </div>
</div>

<div class="grap_deal_disclaimer">
  <p><strong>Attention!</strong></p>
  <p>Copy this exclusive code to unlock special savings when you check out! Don't forget to claim your cashback from us!</p>
</div> 