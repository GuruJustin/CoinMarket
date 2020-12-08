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
                        <h1 class="h2-font color--white mb-4 mb-lg-6">Blog & News</h1>
                        <div class="form--v7 box-shadow--1 mb-3">

                            <!-- end of form -->
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- =========== End of Search ============ -->
        <!-- =========== Start of Blog Body ============ -->
        <section class="pb-10 pt-0 blog-articles bg-color--primary-light--1">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="row mb-5">
                            @foreach($blogs as $data)
                            <!-- end of single card col-->
                            <div class="col-12 col-sm-6 col-lg-4 mb-3">
                                <article class="article">
                                    <div class="card">
                                        <div class="article__thumbnail">
                                            <div class="article__thumbnail-image">
                                                <img src="{{asset('frontend/img/newsletter-illustrator-3.png')}}" alt="thumbnail" class="card-img-top background-image-holder">
                                            </div>
                                        </div>
                                        <!-- end of image -->
                                        <div class="article-author">
                                            <a href="#" class="article-author__avatar">
                                            @if( file_exists($data->image))
                                                 <img src="{{asset($data->image)}}" class="background-image-holder" alt="author">
                                            @else
                                                <img src="{{asset('frontend/img/author-avatar-4.png')}}" class="background-image-holder" alt="author">
                                            @endif
                                             </a>
                                            <div>
                                                <a href="#" class="article-author__name">{{$data->category->name}}</a>
                                            </div>
                                        </div>
                                        <!-- end of author avatar & name -->
                                        <div class="card-body">
                                            <a href="{{route('blogview',$data->id)}}" class="article__title">
                                                <h2>{{$data->title}}</h2>
                                            </a>
                                            <span class="article__date">{{ Carbon\Carbon::parse($data->created_at)->diffForHumans() }}</span>
                                        </div>
                                        <!-- end of body content -->
                                    </div>
                                </article>
                                <!-- end of single card -->
                            </div>
                            <!-- end of single card col-->
                            @endforeach

                        </div>
                        <!-- end of blog post row -->
                        <div class="row">
                            <div class="col">
                                <nav>
                                    <ul class="pagination justify-content-center">
                                        {{ $blogs->links() }}
                                    </ul>
                                </nav>
                                <!-- end of pagination -->
                            </div>
                            <!-- end of pagination col -->
                        </div>
                        <!-- end of pagination row -->
                    </div>
                    <!-- end of blog post body col -->
                </div>
                <!-- end of row -->
            </div>
            <!-- end of container -->
        </section>
        <!-- =========== End of Blog Body ============ -->

        <!-- =========== Start of Newsletter ============ -->
        <section class="bg-color--white">
            <div class="section-overlap bg-color--primary-light--1 pos-abs-top jsElement" data-height="50%"></div>
            <!-- end of section overlap bg -->

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="newsletter-form form--v3 position-relative d-lg-flex align-items-center bg-color--primary rounded--10 py-4 p-lg-4 p-xl-7">
                            <div class="svg-shape--top--right h-100">
                                <img src="{{asset('frontend/img/layout/diagonal-shape-7.svg')}}" alt="wave" class="svg h-100">
                            </div>
                            <!-- end of bg -->
                            <div class="col-12 col-lg-6 pr-lg-5 mb-3 mb-lg-0 text-center text-lg-left">
                                <h2 class="h3-font color--white">Subscribe our newsletter and get useful information every week</h2>
                            </div>
                            <!-- end of title -->
                            <div class="col-12 col-md-10 col-lg-6 mx-md-auto">
                                <form action="#" class="form bg-color--white-opacity--10 rounded--05 p-1">
                                    <div class="input-group d-flex">
                                        <input type="email" class="form-control" placeholder="Enter your email" required>
                                        <button class="btn btn-hover--splash btn-bg--primary" type="submit"><span class="btn__text"><i class="icon icon-arrow-right"></i></span></button>
                                    </div>
                                </form>
                                <!-- end of from -->
                            </div>
                        </div>
                    </div>
                    <!-- end of body col -->
                </div>
                <!-- end of row -->
            </div>
            <!-- end of container -->
        </section>
        <!-- =========== End of Newsletter ============ -->
@endsection


