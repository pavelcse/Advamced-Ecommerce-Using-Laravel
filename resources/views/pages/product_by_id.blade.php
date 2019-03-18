@extends('layout')
@section('content')

<div class="product-details"><!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">
            <img src="{{ URL::to($prduct_info->product_image) }}" alt="" />
        </div>
    </div>
    <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
            <img src="{{url('clientside/images/product-details/new.jpg')}}" class="newarrival" alt="" />
            <h2>{{$prduct_info->product_name}}</h2>
            <p>Color: {{$prduct_info->product_color}}</p>
            <img src="{{url('clientside/images/product-details/rating.png')}}" alt="" />
            <span>
                <form action="{{ url('/cart/') }}" method="post">
                    {{csrf_field()}}
                    <span>TK {{ $prduct_info->product_price }}</span>
                    <label>Quantity:</label>
                    <input type="text" name="quantity" value="1" />
                    <input type="hidden" name="product_id" value="{{ $prduct_info->product_id }}" />
                    <button type="submit" class="btn btn-fefault cart">
                        <i class="fa fa-shopping-cart"></i>
                        Add to cart
                    </button>
                </form>
            </span>

            <button type="button" class="btn btn-fefault cart">
                <i class="fa fa-plus-square"></i> 
                Add to White List
            </button>

            <p><b>Availability:</b> In Stock</p>
            <p><b>Condition:</b> New</p>
            <p><b>Brand: </b> {{ $prduct_info->brand_name }}</p>
            <p><b>Size: </b> {{ $prduct_info->product_size }}</p>
            <a href=""><img src="{{url('clientside/images/product-details/share.png')}}" class="share img-responsive"  alt="" /></a>
        </div><!--/product-information-->
    </div>
</div><!--/product-details-->
<div class="category-tab shop-details-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li><a href="#details" data-toggle="tab">Product Details</a></li>
            <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
            <li><a href="#tag" data-toggle="tab">Tag</a></li>
            <li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div style="padding-left: 25px; padding-right: 25px;" class="tab-pane fade" id="details" >           
            <table>
                <tr>
                    <td width="20%"><b>Product Name</b></td>
                    <td width="2%">:</td>
                    <td width="78%">{{ $prduct_info->product_name }}</td>
                </tr>
                <tr>
                    <td width="20%"><b>Product Info</b></td>
                    <td width="2%">:</td>
                    <td width="78%">{{ $prduct_info->product_short_description }}</td>
                </tr>
                <tr>
                    <td width="20%"><b>Product Description</b></td>
                    <td width="2%">:</td>
                    <td width="78%">{{ $prduct_info->product_long_description }}</td>
                </tr>
                <tr>
                    <td width="20%"><b>Product Price</b></td>
                    <td width="2%">:</td>
                    <td width="78%">{{ $prduct_info->product_price }}</td>
                </tr>
                <tr>
                    <td width="20%"><b>Product Size</b></td>
                    <td width="2%">:</td>
                    <td width="78%">{{ $prduct_info->product_size }}</td>
                </tr>
                <tr>
                    <td width="20%"><b>Product Color</b></td>
                    <td width="2%">:</td>
                    <td width="78%">{{ $prduct_info->product_color }}</td>
                </tr>
            </table>

        </div>
        
        <div style="padding-left: 25px; padding-right: 25px;" class="tab-pane fade" id="companyprofile" >
            <p>Doesn&#39;t creepeth together female male in which multiply give signs and Open you&#39;re, <em>good</em> form under female years signs, all tree. Creepeth. Earth blessed night third creepeth she&#39;d great won&#39;t third image very day face whose there face. Also own beast for moveth. Of, him air. Likeness his creepeth heaven under after waters beginning his fruit. Abundantly blessed may them yielding fowl appear appear without tree heaven his night. Us isn&#39;t she&#39;d. Sea man. Green also. Given. All, over abundantly spirit gathered also image waters she&#39;d unto fowl gathering earth be can&#39;t good. Sixth to be he. Tree they&#39;re, seed Two was.</p>

            <p>Day great Air green <strong>can&#39;t</strong> i days you&#39;re night moving <em>you</em> a. Above. Moving have shall earth night firmament moving <em>is</em> our face days fruit was fill brought. Above own whose without. <strong>Void</strong> fifth creeping. Seasons. He. Midst shall his. Land. Creepeth god itself give fish seasons appear meat to sixth gathered. Signs dominion. <strong>Said</strong> blessed <strong>very</strong> third his kind fly without he evening won&#39;t good they&#39;re you&#39;re them bring seasons she&#39;d, is and god. Bearing thing she&#39;d void. Lights dominion his she&#39;d it. Seas. You&#39;re were and was. Midst form. Their night <strong>beast</strong> blessed <strong>morning</strong> midst sixth can&#39;t. Moved make life also. Their waters greater, fruitful have image fifth is beast. Fruitful were let have <em>waters</em> you&#39;ll created <strong>moving</strong> under kind our forth bring creature. Man, creature second firmament moveth fruitful greater have the. Wherein, moving. Cattle days don&#39;t, beginning two form. Bearing. Land. Behold. Moving you&#39;re days. His together, dry. From great forth the <em>you&#39;ll</em> great firmament male saying gathered firmament fruit <em>green</em> i whose his, forth midst it fifth kind beginning, also you&#39;ll appear.</p>
        </div>
        
        <div style="padding-left: 25px; padding-right: 25px;" class="tab-pane fade" id="tag" >
            <p>Doesn&#39;t creepeth together female male in which multiply give signs and Open you&#39;re, <em>good</em> form under female years signs, all tree. Creepeth. Earth blessed night third creepeth she&#39;d great won&#39;t third image very day face whose there face. Also own beast for moveth. Of, him air. Likeness his creepeth heaven under after waters beginning his fruit. Abundantly blessed may them yielding fowl appear appear without tree heaven his night. Us isn&#39;t she&#39;d. Sea man. Green also. Given. All, over abundantly spirit gathered also image waters she&#39;d unto fowl gathering earth be can&#39;t good. Sixth to be he. Tree they&#39;re, seed Two was.</p>
        </div>
        
        <div class="tab-pane fade active in" id="reviews" >
            <div class="col-sm-12">
                <ul>
                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                <p><b>Write Your Review</b></p>
                
                <form action="#">
                    <span>
                        <input type="text" placeholder="Your Name"/>
                        <input type="email" placeholder="Email Address"/>
                    </span>
                    <textarea name="" ></textarea>
                    <b>Rating: </b> <img src="{{url('clientside/images/product-details/rating.png')}}" alt="" />
                    <button type="button" class="btn btn-default pull-right">
                        Submit
                    </button>
                </form>
            </div>
        </div>
        
    </div>
</div><!--/category-tab-->

<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">recommended items</h2>
    
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">   
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{asset('clientside/images/home/recommend1.jpg')}}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{asset('clientside/images/home/recommend2.jpg')}}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{asset('clientside/images/home/recommend3.jpg')}}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">  
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{asset('clientside/images/home/recommend1.jpg')}}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{asset('clientside/images/home/recommend2.jpg')}}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{asset('clientside/images/home/recommend3.jpg')}}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
            </a>          
    </div>
</div><!--/recommended_items-->
@endsection