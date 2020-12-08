@extends('include.frontend')
@section('content')

 <!-- =========== Start of Search ============ -->
        <section class="space d-flex align-items-center">
            <div class="background-holder background--cover">
                <img src="{{asset('frontend/img/image-1.jpg')}}" alt="image" class="background-image-holder">
            </div>
            <!-- end of backgound image -->
            <div class="background-holder bg-color--primary"></div>
            <!-- end of overlay backgound color-->
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8 mx-auto text-center pt-7 pt-lg-9">
                        <h1 class="h2-font color--white mb-4 mb-lg-6">Blog Details</h1>
                        <div class="form--v7 box-shadow--1 mb-3">

                            <!-- end of form -->
                        </div>

                    </div>
                </div>
            </div>
        </section><main class="nk-pages"><section class="section bg-white">
<br><br>


        <div class="container"><div class="nk-block nk-block-blog"><div class="row"><div class="col-12"><div class="blog-details"><div class="row justify-content-center"><div class="col-xl-10 col-lg-12"><div class="blog-featured">@if( file_exists($blog->image))
                      <center>  <img src="{{asset($blog->image)}}" width="100"
                             alt="Notification Image">
                    </center> @else
                    @endif
</div></div><div class="col-xl-8 col-lg-10">
 <div class="entry-meta">
                                    <span class="posted-on">
                                        <a href="#"><time class="entry-date" datetime="{{$blog->created_at}}">{{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</time></a>
                                    </span>
                                    <div class="cat-links">
                                        <ul class="post-categories">
                                            <li><a href="#">{{$blog->category->name}}</a></li>
                                        </ul>
                                    </div>
                                </div>

 <div class="blog-content"><h2 class="title"><a href="#">{{$blog->title}}.</a></h2><p>{!! $blog->details !!}.</p></div> </div><!-- .row --></div><!-- .block @e --></div> <!-- .nk-ovm --></section>

 </div><!-- .nk-block --></div><!-- .container --></section><!-- .section --></main>
@endsection


