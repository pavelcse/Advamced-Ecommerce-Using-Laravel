    <section id="slider"><!--slider-->
        <div class="">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>
                        
                        <div class="carousel-inner">
                            <?php 
                                $get_slider = DB::table('tbl_slider')
                                                ->where('publication_status', 1)
                                                ->limit(3)
                                                ->latest('slider_id')
                                                ->get();
                                $i = 1;
                                foreach ($get_slider as $v_slider) {
                                    if ($i==1) {
                            ?>
                            <div class="item active">
                            <?php
                                    }else{
                            ?>
                            <div class="item">
                            <?php            
                                    }
                                
                            ?> 
                                <div class="col-sm-12">
                                    <img style="width: 100%; height: 300px" src="{{url($v_slider->slider_image)}}" class="girl img-responsive" alt="" />
                                    <div style="position: absolute; bottom: 8px; left: 16px;">
                                        <h3 style="display: block; color: #FE980F; padding-left: 5px;">{{$v_slider->slider_title}}</h3>
                                        <h4 style="display: block; color: #FE980F; padding-left: 5px;">{{$v_slider->slider_name}}</h4>
                                        <p style="display: block; color: #FE980F; padding-left: 5px;">{{$v_slider->slider_description}}</p>
                                        <p><a class="btn btn-default get" href="#">Get it now</a></p>
                                    </div>
                                </div> 
                            </div>
                            <?php
                                $i++;
                                }
                            ?>
                        </div>
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
                    
        </div>
    </section>