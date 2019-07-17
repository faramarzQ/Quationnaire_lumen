@extends('layouts.app')
@section('content-title', 'مشاهده اطلاعات پرسشگر')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Widget: user widget style 1 -->
                        <div class="card card-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header text-white"
                                 style="background: url('../images/card_bg.png') center center;">
                                <h3 class="widget-user-username">{{ $user->name }}</h3>
                                <h5 class="widget-user-desc">پرسشگر</h5>
                            </div>
                            {{--<div class="widget-user-image">
                                <img class="img-circle" src="../dist/img/user3-128x128.jpg" alt="User Avatar">
                            </div>--}}
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-4 border-left">
                                        <div class="description-block">
                                            <h5 class="description-header">3,200</h5>
                                            <span class="description-text">فروش</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 border-left">
                                        <div class="description-block">
                                            <h5 class="description-header">13,000</h5>
                                            <span class="description-text">دنبال کننده</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4">
                                        <div class="description-block">
                                            <h5 class="description-header">35</h5>
                                            <span class="description-text">محصولات</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
                        <!-- /.widget-user -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </div>
    </section>
@endsection