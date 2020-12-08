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
                        <h1 class="h2-font color--white mb-4 mb-lg-6">How can we help?</h1>
                        <div class="form--v7 box-shadow--1 mb-3">
                            <form action="#" class="form border--around rounded--05 bg-white">
                                <div class="input-group d-flex">
                                    <input type="text" class="form-control" placeholder="Type your keyword" required>
                                    <button class="btn btn-hover--splash btn-bg--primary" type="submit"><span class="btn__text icon icon-zoom-bold"></span></button>
                                </div>
                            </form>
                            <!-- end of form -->
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- =========== End of Search ============ -->

        <!-- =========== Start of Body ============ -->
        <section class="space bg-color--primary-light--1">
            <div class="container">
                <div class="row justify-content-between">

                    <div class="col-12 col-md-12">
                        <div class="article-entry accordion accordion--v2 remove-space--bottom" id="accordion1">
                            <div class="mb-6" data-scroll-index="1">
                                <h2 class="headline font-size--30 font-w--600 mb-4">Frequently Asked Questions</h2>

                                @foreach($faq as $data)
                                <div class="card mb-1">
                                    <button class="btn btn-header btn-link collapsed bg-white" type="button" data-toggle="collapse" data-target="#collapse{{$data->id}}" aria-expanded="false" aria-controls="collapse{{$data->id}}">
                                        <span class="font-size--18 text-color--700 font-w--500">{{$data->title}}</span>
                                        <i class="icon icon-up-arrow"></i>
                                    </button>
                                    <div id="collapse{{$data->id}}" class="collapse" data-parent="#accordion1">
                                        <div class="card-body bg-white pl-3">
                                            <p>{!! $data->description !!}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                <!-- end of single accordion-->

                            </div>
                            <!-- end of Single group of accordions -->




                            </div>
                            <!-- end of Single group of accordions -->
                        </div>
                        <!-- end of FAQ row -->
                    </div>
                    <!-- end of accordions area col -->
                </div>
                <!-- end of accordions area row -->
            </div>
            <!-- end of container -->
        </section>
        <!-- =========== End of Body ============ -->

        <!-- =========== Start of Contact ============ -->
        <section class="space bg-color--primary">
            <div class="container">
                <div class="row">
                    <div class="col-12 color--white text-center mb-6">
                        <h2 class="mb-2">Can't find your answer?</h2>
                        <p class="opacity--70"> Hit us on Telegram, Slack channels or Email us and we'll get back to you as soon as we can.</p>
                    </div>
                </div>
                <!-- end of section title row -->
                <div class="row">
                    <div class="col-12 mx-auto">
                        <div class="icon-fill--wide text-center d-md-flex justify-content-lg-center flex-wrap">
                            <a class="t-icon btn-bg--white box-shadow--5 rounded--05 m-1 btn-hover--cta--4" href="#">
                                <span class="t-icon__brand-icon h4-font text-color--cta--4"><i class="icon icon-telegram"></i></span>
                                <span class="t-icon__brand-name h5-font font-w--500 text-color--700">telegram</span>
                            </a>
                            <a class="t-icon btn-bg--white box-shadow--5 rounded--05 m-1 btn-hover--cta--4" href="#">
                                <span class="t-icon__brand-icon h4-font text-color--cta--4"><i class="icon icon-newsletter"></i></span>
                                <span class="t-icon__brand-name h5-font font-w--500 text-color--700"><span class="__cf_email__" data-cfemail="3c5f5352485d5f487c59445d514c5059125f5351">[email&#160;protected]</span></span>
                            </a>
                            <a class="t-icon btn-bg--white box-shadow--5 rounded--05 m-1 btn-hover--cta--4" href="#">
                                <span class="t-icon__brand-icon h4-font text-color--cta--4"><i class="icon icon-logo-slack"></i></span>
                                <span class="t-icon__brand-name h5-font font-w--500 text-color--700">slack</span>
                            </a>
                        </div>
                        <!-- end of icon group -->
                    </div>
                    <!-- end of col -->
                </div>
                <!-- end of row -->
            </div>
            <!-- end of container -->
        </section>
        <!-- =========== End of Contact ============ -->

@endsection


