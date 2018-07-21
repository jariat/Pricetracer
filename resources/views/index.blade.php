@extends('layouts.app')
@section('title')
    {{'Dashboard'}}
@stop
@section('head_content')
    <style>
        .section-content {
            width: 100%;
            padding-left: 25px !important;
            padding-right: 25px !important;
        }
    </style>
@stop
@section('main_content')

    <div class="contents-inner">
        <div class="row">
            <div class="section-content">
                <div class="row" style="width: 100%;
            padding-left: 25px!important;
            padding-right: 25px!important;">
                    <div class="col-lg-3 col-md-6">
                        <div class="statistic-box m-0">
                            <h4 class="statistic-title float-left">Total Users</h4><!-- /.statistic-title -->
                            <div class="action-menu dropdown float-right">
                                <button class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                    <i class="fa fa-ellipsis-v"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Remove</a>
                                    <a class="dropdown-item" href="#">Modify</a>
                                </div>
                            </div><!-- /.action-menu -->
                            <div class="statistic-details">
                                <span class="count float-left">{{$wholesalersCount+$retailersCount}}</span>
                                <!-- /.count -->
                                <span class="statistic-icon color-success float-right"><i
                                            class="pe-7s-users"></i></span><!-- /.statistic-icon -->
                            </div><!-- /.statistic-details -->
                        </div><!-- /.statistic-box -->
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="statistic-box m-0">
                            <h4 class="statistic-title float-left">Total Products</h4><!-- /.statistic-title -->
                            <div class="action-menu dropdown float-right">
                                <button class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                    <i class="fa fa-ellipsis-v"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Remove</a>
                                    <a class="dropdown-item" href="#">Modify</a>
                                </div>
                            </div><!-- /.action-menu -->
                            <div class="statistic-details">
                                <span class="count float-left">{{$totalProducts}}</span><!-- /.count -->
                                <span class="statistic-icon color-primary float-right"><i
                                            class="pe-7s-ticket"></i></span><!-- /.statistic-icon -->
                            </div><!-- /.statistic-details -->
                        </div><!-- /.statistic-box -->
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="statistic-box m-0">
                            <h4 class="statistic-title float-left">Wholesalers
                                &nbsp;({{round(($wholesalersCount/($wholesalersCount+$retailersCount))*100,1)}}%)</h4>
                            <!-- /.statistic-title -->
                            <div class="action-menu dropdown float-right">
                                <button class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                    <i class="fa fa-ellipsis-v"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Remove</a>
                                    <a class="dropdown-item" href="#">Modify</a>
                                </div>
                            </div><!-- /.action-menu -->
                            <div class="statistic-details">
                                <span class="count float-left">{{$wholesalersCount}}</span><!-- /.count -->
                                <span class="statistic-icon color-purple float-right"><i class="pe-7s-id"></i></span>
                                <!-- /.statistic-icon -->
                            </div><!-- /.statistic-details -->
                        </div><!-- /.statistic-box -->
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="statistic-box m-0">
                            <h4 class="statistic-title float-left">Retailers
                                &nbsp;({{round(($retailersCount/($wholesalersCount+$retailersCount))*100,1)}}%)</h4>
                            <!-- /.statistic-title -->
                            <div class="action-menu dropdown float-right">
                                <button class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                    <i class="fa fa-ellipsis-v"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Remove</a>
                                    <a class="dropdown-item" href="#">Modify</a>
                                </div>
                            </div><!-- /.action-menu -->
                            <div class="statistic-details">
                                <span class="count float-left">{{$retailersCount}}</span><!-- /.count -->
                                <span class="statistic-icon color-danger float-right"><i class="pe-7s-user"></i></span>
                                <!-- /.statistic-icon -->
                            </div><!-- /.statistic-details -->
                        </div><!-- /.statistic-box -->
                    </div>

                </div>
            </div><!-- /.section-content -->
        </div>

        <div class="col-12">
            <div class="section-content">
                <div class="row">
                    <div class="col-lg-4 equal-height">
                        <div class="left-charts">
                            <div class="row">
                                <div class="col-12 ">
                                    <div class="section-contentpadding-0 mt-0 bg-primary show">
                                        <div class="chart max-240">
                                            <div class="chart-text">
                                                <div class="left-text float-left">
                                                    <span class="chart-title">Wholesalers Growth</span>
                                                    <span class="text">Showing The Last {{count($monthlyWholesalers)}} Months</span>
                                                </div>

                                            </div><!-- /.chart-text -->

                                            <div id="flotLine1" class="float-chart pb-2 max-140"></div>

                                        </div><!-- /.chart -->
                                    </div><!-- /.section-content -->
                                </div>

                                <div class="col-12">
                                    <div class="section-content padding-0 bg-danger show" style="min-height: 350px">
                                        <div class="chart max-240">
                                            <div class="chart-text">
                                                <div class="left-text float-left">
                                                    <span class="chart-title">Retailers Growth</span>
                                                    <span class="text">Showing The Last {{count($monthlyRetailers)}} Months</span>
                                                </div>

                                            </div><!-- /.chart-text -->

                                            <div id="reta" class="float-chart max-120">


                                            </div>

                                        </div><!-- /.chart -->
                                    </div><!-- /.section-content -->
                                </div>
                            </div>
                        </div><!-- /.left-charts -->
                    </div>

                    <div class="col-lg-8 equal-height">
                        <div class="right-charts">
                            <div class="section-content m-0">
                                <div class="content-head">
                                    <h4 class="content-title">Product Growth</h4><!-- /.content-title -->
                                    <div class="corner-content float-right">
                                        <button class="content-settings" data-toggle="tooltip" data-placement="top"
                                                title="Settings"><i class="fa fa-cog"></i></button>
                                        <button class="content-refresh" data-toggle="tooltip" data-placement="top"
                                                title="Reload"><i class="fa fa-refresh"></i></button>
                                        <button class="content-collapse" data-toggle="tooltip" data-placement="top"
                                                title="Collapse"><i class="fa fa-angle-down"></i></button>
                                        <button class="content-close" data-toggle="tooltip" data-placement="top"
                                                title="Close"><i class="fa fa-close"></i></button>
                                    </div><!-- /.corner-content -->
                                </div><!-- /.content-head -->

                                <div class="content-details show">

                                    <div id="traffic-chart" class="traffic-chart" style="height: 450px"></div>

                                </div><!-- /.content-details -->
                            </div>
                        </div><!-- /.right-charts -->
                    </div>

                </div>
            </div><!-- /.section-content -->
        </div>

    </div>
@stop
@section('footer_js')
    <!--Morris Chart-->
    <script src="{{asset("js/charts/morris/raphael-min.js")}}"></script>
    <script src="{{asset("js/charts/morris/morris.js")}}"></script>

    <!--Chartist Chart-->
    <script src="{{asset("js/charts/chartist/chartist.min.js")}}"></script>
    <script src="{{asset("js/charts/chartist/chartist-plugin-legend.js")}}"></script>

    <!--Sparkline Chart-->
    <script src="{{asset("js/charts/sparkline/jquery.sparkline.min.js")}}"></script>

    <!--Flot Chart-->
    <script src="{{asset("js/d3.min.js")}}"></script>
    <script src="{{asset("js/d2b.min.js")}}"></script>

@stop
@section('raw_js')
    @php
        $whole_headers = array();
        $whole_data = array();
        foreach ($monthlyWholesalers as $monthlyWholesaler){
        array_push($whole_headers,substr($monthlyWholesaler->month,0,3));
        array_push($whole_data,$monthlyWholesaler->total);
        }
       $retail_headers = array();
       $retail_data = array();
        foreach ($monthlyRetailers as $monthlyRetailer){
        array_push($retail_headers,substr($monthlyRetailer->month,0,3));
        array_push($retail_data,$monthlyRetailer->total);
        }
        $product_headers = array();
        $product_data = array();
        foreach ($monthlyProducts as $monthlyProduct){
        array_push($product_headers,substr($monthlyProduct->month,0,3));
        array_push($product_data,$monthlyRetailer->total);
        }

    @endphp

    <script>
        var w_h = {!! json_encode($whole_headers) !!};
        var w_d = {!! json_encode($whole_data) !!};
        var r_h = {!! json_encode($retail_headers) !!};
        var r_d = {!! json_encode($retail_data) !!};
        var p_h = {!! json_encode($product_headers) !!};
        var p_d = {!! json_encode($monthlyProducts) !!};


        new Chartist.Line('#flotLine1', {
            labels: w_h,
            series: [
                w_d
            ]
        }, {
            fullWidth: true,
            chartPadding: {
                right: 40
            }
        });
        new Chartist.Line('#reta', {
            labels: r_h,
            series: [
                r_d
            ]
        }, {
            fullWidth: true,
            chartPadding: {
                right: 40
            }
        });
        drawBarGraph1(p_d,'Total Products');

        function drawBarGraph1(data1, label_1) {
            var axis = d2b.chartAxis();
            //        axis.legend().vertical(true);
            axis.chartFrame().legendOrient('top');
            var chart = d3.select('#traffic-chart')
                .datum({
                    sets: [
                        {
                            generators: [d2b.svgBar()],
                            graphs: [
                                {
                                    label: label_1,
                                    values: data1.map(function (d) {
                                        return {
                                            x: (d.month).substr(0,3),
                                            y: d.total
                                        }
                                    })
                                }
                            ]
                        }
                    ]
                })
                .call(axis);
            window.addEventListener('resize', function () {
                chart.call(axis);
            });

        }
    </script>
@stop