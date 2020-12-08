@extends('include.dashboard')

@section('content')

 <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="components-preview wide-md mx-auto">

                                    <div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h4 class="title nk-block-title">Create Testimoials</h4>
                                                <div class="nk-block-des">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-bordered">
                                            <div class="card-inner">
                                                <form action="{{route('post.testimonial')}}" method="post" enctype="multipart/form-data">
@csrf
<div class="content-area card"><div class="card-innr card-innr-fix"><div class="card-head"><h6 class="card-title">Your Testimonial Will Appear On The Front Page When Approved</h6></div><div class="gaps-1x"></div><!-- .gaps --><form action="#"><div class="row">
<div class="col-md-12"><div class="input-item input-with-label"><label class="input-item-label text-exlight">Testimonial Code</label><input value="{{$code}}" name="code" class="form-control" name="code" readonly type="text"><label class="input-item-label text-exlight"><small> (Please keep this as you may need it to qualify for offers and bonus)</small></label></div></div></div>

<div class="input-item input-with-label"><label class="input-item-label text-exlight">Your Testimonial</label><textarea name="body" class="form-control"></textarea></div><div class="gaps-1x"></div><br><button class="btn btn-primary">Post Testimonial</button></form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
@endsection
