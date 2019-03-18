<style>

.input-hidden {
  position: absolute;
  left: -9999px;
}

input[type=radio]:checked + label>img {
  border: 1px solid #fff;
  box-shadow: 0 0 3px 3px #090;
}

/* Stuff after this is only to make things more pretty */
input[type=radio] + label>img {
  border: 1px dashed #444;
  width: 100px;
  height: 100px;
  margin: 20px;
  border-radius: 50%;
  transition: 500ms all;
}

input[type=radio]:checked + label>img {
  transform: 
    rotateZ(-10deg) 
    rotateX(10deg);
}
</style>




<input type="radio" checked="checked" name="payment_gateway" id="on_delivery" class="input-hidden" value="on_delivery" />
<label for="on_delivery">
  <img src="{{url('clientside/images/pay/cash.png')}}" alt="Cash On Delivery" />
</label>

<input type="radio" value="paypal" name="payment_gateway" id="paypal" class="input-hidden" />
<label for="paypal">
  <img src="{{url('clientside/images/pay/paypal.png')}}" alt="Paypal" />
</label>

<input type="radio" value="card" name="payment_gateway" id="mastercard" class="input-hidden" />
<label for="mastercard">
  <img src="{{url('clientside/images/pay/card.png')}}" alt="MasterCard" />
</label>

<input type="radio" value="bkash" name="payment_gateway" id="bkash" class="input-hidden" />
<label for="bkash">
  <img src="{{url('clientside/images/pay/bkash.png')}}" alt="bKash" />
</label>