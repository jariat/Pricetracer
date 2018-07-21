
@extends('layouts.app')
@section('title')
    {{'All Users'}}
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
                        <h4 class="content-title">Users</h4><!-- /.content-title -->
                        <div class="corner-content float-right">
                            <button class="content-settings" data-toggle="tooltip" data-placement="top" title="Settings"><i class="fa fa-cog"></i></button>
                            <button class="content-refresh" data-toggle="tooltip" data-placement="top" title="Reload"><i class="fa fa-refresh"></i></button>
                            <button class="content-collapse" data-toggle="tooltip" data-placement="top" title="Collapse"><i class="fa fa-angle-down"></i></button>
                            <button class="content-close" data-toggle="tooltip" data-placement="top" title="Close"><i class="fa fa-close"></i></button>
                        </div><!-- /.corner-content -->
                    </div><!-- /.content-head -->

                    <div class="content-details show">
                        @if(\Illuminate\Support\Facades\Session::has('success'))

                            <div class="alert alert-success">
                                {{\Illuminate\Support\Facades\Session::get('success')}}
                            </div>
                        @endif
                        <table id="data-table" class="table data-table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Added On</th>
                                <th>Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if($user->is_admin)
                                        {{"Admin"}}
                                            @elseif($user->is_retailer)
                                        {{'Retailer'}}
                                        @elseif($user->is_wholesaler)
                                        {{'Wholesaler'}}
                                            @endif
                                    </td>

                                    <td>{{explode(' ',$user->created_at)[0]}} </td>
                                    <td>
                                        <button class="edit-modal btn btn-primary" onclick="window.location.href='{{route('edit.user',$user->id)}}'" >
                                            <span class="fa fa-edit"></span> Edit
                                        </button>
                                        <button class="delete-modal btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                                            <span class="fa fa-trash"></span> Delete
                                        </button>
                                        <form id="delete-form" action="{{ route('users.destroy',$user->id) }}" method="POST" style="display:none">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Added On</th>
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
