@include('front.common.header')



<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">News details</span>
          <h1 class="text-capitalize mb-5 text-lg">Blog Single</h1>

          <!-- <ul class="list-inline breadcumb-nav">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">News details</a></li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
</section>



<section class="section blog-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">


                    @if (isset($geteditblog) )


                    <div class="col-lg-12 col-md-12 mb-5">
                        <div class="blog-item">
                            <div class="blog-thumb">
                                <img src="{{asset('uploads/blog/'.$geteditblog->image)}}" alt="" class="img-fluid ">
                            </div>

                            <div class="blog-item-content">
                                <div class="blog-item-meta mb-3 mt-4">
                                    <span class="text-muted text-capitalize mr-3"><i class="icofont-comment mr-2"></i>5 Comments</span>
                                    <span class="text-black text-capitalize mr-3"><i class="icofont-calendar mr-1"></i> 28th January</span>
                                </div>

                                <h2 class="mt-3 mb-3"><a href="blog-single.html">{{$geteditblog->title}}</a></h2>

                                <p class="mb-4">{{$geteditblog->description}}.</p>

                                <a href="{{route('front.blog-singlepage',$geteditblog->id)}}" target="_blank" class="btn btn-main btn-icon btn-round-full">Read More <i class="icofont-simple-right ml-2  "></i></a>
                            </div>
                        </div>
                    </div>



                    @endif

	<div class="col-lg-12">
		<div class="comment-area mt-4 mb-5">
			<h4 class="mb-4">2 Comments on Healthy environment... </h4>
			<ul class="comment-tree list-unstyled">
				<li class="mb-5">
					<div class="comment-area-box">
						<div class="comment-thumb float-left">
							<img alt="" src="images/blog/testimonial1.jpg" class="img-fluid">
						</div>

						<div class="comment-info">
							<h5 class="mb-1">John</h5>
							<span>United Kingdom</span>
							<span class="date-comm">| Posted April 7, 2019</span>
						</div>
						<div class="comment-meta mt-2">
							<a href="#"><i class="icofont-reply mr-2 text-muted"></i>Reply</a>
						</div>

						<div class="comment-content mt-3">
							<p>Some consultants are employed indirectly by the client via a consultancy staffing company, a company that provides consultants on an agency basis. </p>
						</div>
					</div>
				</li>

				<li>
					<div class="comment-area-box">
						<div class="comment-thumb float-left">
							<img alt="" src="images/blog/testimonial2.jpg" class="img-fluid">
						</div>

						<div class="comment-info">
							<h5 class="mb-1">Philip W</h5>
							<span>United Kingdom</span>
							<span class="date-comm">| Posted June 7, 2019</span>
						</div>

						<div class="comment-meta mt-2">
							<a href="#"><i class="icofont-reply mr-2 text-muted"></i>Reply </a>
						</div>

						<div class="comment-content mt-3">
							<p>Some consultants are employed indirectly by the client via a consultancy staffing company, a company that provides consultants on an agency basis. </p>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>


	<div class="col-lg-12">
		<form class="comment-form my-5" id="comment-form">
			<h4 class="mb-4">Write a comment</h4>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input class="form-control" type="text" name="name" id="name" placeholder="Name:">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input class="form-control" type="text" name="mail" id="mail" placeholder="Email:">
					</div>
				</div>
			</div>


			<textarea class="form-control mb-4" name="comment" id="comment" cols="30" rows="5" placeholder="Comment"></textarea>

			<input class="btn btn-main-2 btn-round-full" type="submit" name="submit-contact" id="submit_contact" value="Submit Message">
		</form>
	</div>
</div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar-wrap pl-lg-4 mt-5 mt-lg-0">
	<div class="sidebar-widget search  mb-3 ">
		<h5>Search Here</h5>
		<form action="#" class="search-form">
			<input type="text" class="form-control" placeholder="search">
			<i class="ti-search"></i>
		</form>
	</div>


	<div class="sidebar-widget latest-post mb-3">
		<h5>Popular Posts</h5>

        @if (isset($getblogspp) && !$getblogspp->isEmpty())

        @foreach ($getblogspp as $key=>$v)

        <div class="py-2">
        	<span class="text-sm text-muted">03 Mar 2018</span>
            <h6 class="my-2"><a href="#">{{$v->title}}</a></h6>
        </div>

        @endforeach

        @endif

	</div>

	<div class="sidebar-widget category mb-3">
		<h5 class="mb-4">Categories</h5>

		<ul class="list-unstyled">

            @if (isset($getcategories) && !$getcategories->isEmpty())

            @foreach ($getcategories as $key=>$v)

              <li class="align-items-center">
                <a href="#">{{$v->categories}}</a>
              </li>

            @endforeach

            @endif

		</ul>
	</div>


	<div class="sidebar-widget tags mb-3">
		<h5 class="mb-4">Tags</h5>

        @if (isset($gettags) && !$gettags->isEmpty())

        @foreach ($gettags as $key=>$v)

           <a href="#">{{$v->tags}}</a>

        @endforeach

        @endif

	</div>


	<div class="sidebar-widget schedule-widget mb-3">
		<h5 class="mb-4">Time Schedule</h5>

		<ul class="list-unstyled">
		  <li class="d-flex justify-content-between align-items-center">
		    <a href="#">Monday - Friday</a>
		    <span>9:00 - 17:00</span>
		  </li>
		  <li class="d-flex justify-content-between align-items-center">
		    <a href="#">Saturday</a>
		    <span>9:00 - 16:00</span>
		  </li>
		  <li class="d-flex justify-content-between align-items-center">
		    <a href="#">Sunday</a>
		    <span>Closed</span>
		  </li>
		</ul>

		<div class="sidebar-contatct-info mt-4">
			<p class="mb-0">Need Urgent Help?</p>
			<h3>+23-4565-65768</h3>
		</div>
	</div>

</div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-8">
                <nav class="pagination py-2 d-inline-block">
                    <div class="nav-links">
                        <span aria-current="page" class="page-numbers current">1</span>
                        <a class="page-numbers" href="#">2</a>
                        <a class="page-numbers" href="#">3</a>
                        <a class="page-numbers" href="#"><i class="icofont-thin-double-right"></i></a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>
            </div>
        </div>
    </div>
</section>
@include('front.common.footer')









