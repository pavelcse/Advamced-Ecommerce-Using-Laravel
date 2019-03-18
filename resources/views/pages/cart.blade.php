@extends('layout')
@section('content')
    <section id="cart_items">
        <div class="">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                  <li><a href="{{ URL::to('/') }}">Home</a></li>
                  <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
               <?php
                    $contents = Cart::content();
                    $data = Cart::total();
                ?>
                @if($data >0)
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td width="15%" class="image">Image</td>
                            <td width="35%" class="description">Name</td>
                            <td width="15%" class="price">Price</td>
                            <td width="15%" class="quantity">Quantity</td>
                            <td width="15%" class="total">Price</td>
                            <td width="5%" class="action">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contents as $content)
                        <tr>
                            <td class="cart_product">
                                <a href=""><img style="width: 80px; height: 80px" src="{{url($content->options->image)}}" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{ $content->name }}</a></h4>
                            </td>
                            <td class="cart_price">
                                <p>TK {{ $content->price }}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <a class="cart_quantity_down" href="{{ URL::to('/qty-decrease/'.$content->rowId, $content->qty) }}"> - </a>
                                    <input class="cart_quantity_input" type="text" name="quantity" value="{{ $content->qty }}" autocomplete="off" size="2">
                                    <a class="cart_quantity_up" href="{{ URL::to('/qty-increase/'.$content->rowId, $content->qty) }}"> + </a>
                                    
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">TK {{$content->total }}</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{URL::to('/delete-cart/'.$content->rowId)}}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div align="center">
                    <p class="btn btn-primary">Your Cart is Empty. Please Shop First. Thanks...</p>
                    <p><a class="btn btn-primary" href="{{ URL::to('/') }}">Shop Now</a></p>
                </div>
                @endif
            </div>
        </div>
    </section> <!--/#cart_items-->

    <section id="do_action">
        <div class="">
            <div class="row">
                <div class="col-sm-8">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span>TK {{ Cart::subtotal() }}</span></li>
                            <li>Eco Tax <span>TK {{Cart::tax() }}</span></li>
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Total <span>TK {{ Cart::total() }}</span></li>
                        </ul>
                            <a class="btn btn-default update" href="{{ URL::to('/') }}">Continue Shopping</a>
                            @if($data >0)
                            <a class="btn btn-default check_out" href="{{ URL::to('/checkout') }}">Check Out</a>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->

@endsection