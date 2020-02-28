@extends('layouts.frontend')
@section('page')



<div class="container-fluid">
    <div class="row medium-padding120 bg-border-color">
      <div class="container">
  
        <div class="row">
  
          <div class="col-lg-12">
        <div class="order">
          <h2 class="h1 order-title text-center">Your Order</h2>
          @if(Cart::content()->count() !=0)
          <form action="#" method="post" class="cart-main">
            <table class="shop_table cart">
              <thead class="cart-product-wrap-title-main">
              <tr>
                <th class="product-name">Product</th>
                <th class="product-thumbnail">Image</th>
                <th class="product-quantity">Quantity</th>
                <th class="product-subtotal">Total</th>
              </tr>
              </thead>
              <tbody>
  
                @foreach(Cart::content() as $item)
              <tr class="cart_item">
  
                <td class="product-thumbnail">
  
                  <div class="cart-product__item">
                    <div class="cart-product-content">
                      <h5 class="cart-product-title">{{$item->name}}</h5>
                    </div>
                  </div>

                </td>
                <td class="cart-product__item">
                <img src="{{asset($item->model->image)}}" alt="product" width="100px" height="100px" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">
                </td>
                <td class="product-quantity">
  
                  <div class="quantity">
                    x {{$item->qty}}
                  </div>
  
                </td>
  
                <td class="product-subtotal">
                  <h5 class="total amount">${{$item->total}}</h5>
                </td>
  
              </tr>
              @endforeach
  
           
  
              <tr class="cart_item subtotal">
  
                <td class="product-thumbnail">
  
  
                  <div class="cart-product-content">
                    <h5 class="cart-product-title">	Subtotal:</h5>
                  </div>
  
  
                </td>
  
                <td class="product-quantity">
  
                </td>
  
                <td class="product-subtotal">
                  <h5 class="total amount">${{number_format(Cart::total())}}</h5>
                </td>
              </tr>
  
            
  
              </tbody>
            </table>
  
            <div class="cheque">
  
              <div class="logos">
                <a href="#" class="logos-item">
                  <img src="{{asset('app/img/visa.png')}}" alt="Visa">
                </a>
                <a href="#" class="logos-item">
                  <img src="{{asset('app/img/mastercard.png')}}" alt="MasterCard">
                </a>
                <a href="#" class="logos-item">
                  <img src="{{asset('app/img/discover.png')}}" alt="DISCOVER">
                </a>
                <a href="#" class="logos-item">
                  <img src="{{asset('app/img/amex.png')}}" alt="Amex">
                </a>
                
                <span style="float: right;">
                  <form action="route('cart.checkout)}}'" method="POST">
                    @csrf
                      <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="pk_test_4OvLSS1l2h08z3YK5DDcUPwI00llKFT1hX"
                        data-amount="{{Cart::total()*100}}"
                        data-name="Laravel_Stripe.com"
                        data-description="Laravel Ecommerce Using Stripe"
                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                        data-locale="auto"
                        data-zip-code="true">
                      </script>
                  </form>
                </span>
              </div>
            </div>
  
          </form>
          @endif
        </div>
      </div>
  
        </div>
      </div>
    </div>
  </div>
  @endsection