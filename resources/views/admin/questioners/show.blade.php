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
                                 style="background: url('/images/card_bg.jpg') center center;">
                                <h3 class="widget-user-username pull-left">{{ $user->name }}</h3>
                                <h5 class="widget-user-desc">پرسشگر</h5>
                            </div>
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
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header no-border">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">پرسشنامه های ثبت شده</h3>
                                    <a href="javascript:void(0);">مشاهده گزارش</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                        <span class="text-bold text-lg">820</span>
                                        <span>بازدید کننده در طول زمان</span>
                                    </p>
                                    <p class="mr-auto d-flex flex-column text-right">
                                        <span class="text-success">
                                          <i class="fa fa-arrow-up"></i> 12.5%
                                        </span>
                                        <span class="text-muted">از هفته گذشته</span>
                                    </p>
                                </div>
                                <!-- /.d-flex -->
                                <div class="position-relative mb-4">
                                    <canvas id="visitors-chart" height="200"></canvas>
                                </div>

                                <div class="d-flex flex-row justify-content-end">
                                    <span class="ml-2">
                                        <i class="fa fa-square text-primary"></i> این هفته
                                    </span>
                                    <span>
                                        <i class="fa fa-square text-gray"></i> هفته گذشته
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@php
    $labels = ['18th', '20th', '22nd', '24th', '26th', '28th', '30th'];
    $data = [100, 120, 170, 167, 180, 177, 160];
@endphp
@section('script')
    <script>
        $(function () {
            'use strict'

            var ticksStyle = {
                fontColor: '#495057',
                fontStyle: 'bold'
            }

            var mode      = 'index'
            var intersect = true

            var $visitorsChart = $('#visitors-chart')
            var visitorsChart  = new Chart($visitorsChart, {
                data   : {
                    // ['18th', '20th', '22nd', '24th', '26th', '28th', '30th']
                    labels  : <?php echo json_encode($labels); ?>,
                    datasets: [{
                        type                : 'line',
                        // [100, 120, 170, 167, 180, 177, 160]
                        data                : <?php echo json_encode($data); ?>,
                        backgroundColor     : 'transparent',
                        borderColor         : '#007bff',
                        pointBorderColor    : '#007bff',
                        pointBackgroundColor: '#007bff',
                        fill                : false
                        // pointHoverBackgroundColor: '#007bff',
                        // pointHoverBorderColor    : '#007bff'
                    // },
                    //     {
                    //         type                : 'line',
                    //         data                : [60, 80, 70, 67, 80, 77, 100],
                    //         backgroundColor     : 'tansparent',
                    //         borderColor         : '#ced4da',
                    //         pointBorderColor    : '#ced4da',
                    //         pointBackgroundColor: '#ced4da',
                    //         fill                : false
                            // pointHoverBackgroundColor: '#ced4da',
                            // pointHoverBorderColor    : '#ced4da'
                        }]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips           : {
                        mode     : mode,
                        intersect: intersect
                    },
                    hover              : {
                        mode     : mode,
                        intersect: intersect
                    },
                    legend             : {
                        display: false
                    },
                    scales             : {
                        yAxes: [{
                            // display: false,
                            gridLines: {
                                display      : true,
                                lineWidth    : '4px',
                                color        : 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks    : $.extend({
                                beginAtZero : true,
                                suggestedMax: 200
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display  : true,
                            gridLines: {
                                display: false
                            },
                            ticks    : ticksStyle
                        }]
                    }
                }
            })
        })
    </script>
@endsection