
@extends('layouts.app')
@section('title')
    {{'All Categories'}}
@stop
@section('head_content')
    <link rel="stylesheet" href="{{asset("css/data-tables.css")}}">
@stop
@section('main_content')
    <div class="contents-inner">
        <div class="row">
            <div class="col-12">
                <div class="section-content">
                    <div class="content-head">
                        <h4 class="content-title">Categories</h4><!-- /.content-title -->
                        <div class="corner-content float-right">
                            <button class="content-settings" data-toggle="tooltip" data-placement="top" title="Settings"><i class="fa fa-cog"></i></button>
                            <button class="content-refresh" data-toggle="tooltip" data-placement="top" title="Reload"><i class="fa fa-refresh"></i></button>
                            <button class="content-collapse" data-toggle="tooltip" data-placement="top" title="Collapse"><i class="fa fa-angle-down"></i></button>
                            <button class="content-close" data-toggle="tooltip" data-placement="top" title="Close"><i class="fa fa-close"></i></button>
                        </div><!-- /.corner-content -->
                    </div><!-- /.content-head -->

                    <div class="content-details show">
                        <table id="data-table" class="table data-table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Products</th>
                                <th>Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->name1}}</td>
                                    <td style="max-width: 300px">{{$category->description}}</td>
                                    <td>{{$category->products_count}}</td>
                                    <td>
                                        <button class="edit-modal btn btn-primary" onclick="window.location.href='{{route('categories.edit',$category->id)}}'">
                                            <span class="fa fa-edit"></span> Edit
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Products</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.content-details -->
                </div>
            </div>

        </div>
    </div><!-- /.contents-inner -->
@stop
@section('footer_js')
    <script src="{{asset("js/tables/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("js/tables/dataTables.bootstrap4.min.js")}}"></script>
@stop

@section('raw_js')
    <script>
        $(document).ready(function() {
            "use strict";

            $('.data-table').DataTable();
        });
    </script>
@stop
