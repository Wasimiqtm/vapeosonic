 
  @foreach($data as $value)
<li class="fil1">

										<!-- mt product start here -->
										<div class="mt-product1 large">
											<!-- box start here -->
											<div class="box">
											 <img alt="image description" src="{{$value->getImageThumb)}}"> 
												<ul class="mt-stars">
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star-o"></i></li>
												</ul>
												<ul class="links">
													<li><a href="#"><i class="icon-handbag"></i></a></li>
													<li><a href="#"><i class="icon-heart"></i></a></li>
													<li><a href="#popup1" class="lightbox"><i class="fa fa-eye"></i></a></li> 
												</ul>
											</div><!-- box end here -->
											<!-- txt end here -->
											<div class="txt">
												<strong class="title">{{$value->name}}</strong>
												<!-- <span class="price"><i class="fa fa-eur"></i> <span>399,00</span></span> -->
											</div><!-- txt end here -->
											
										</div><!-- mt product1 end here -->
									</li>

                                    @endforeach
                                 