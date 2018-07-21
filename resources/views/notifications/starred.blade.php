
@extends('layouts.app')
@section('title')
    {{'Starred'}}
@stop
@section('head_content')
    <link rel="stylesheet" href="{{asset('css/mail/mail.css')}}">

@stop
@section('main_content')
    <div class="contents-inner">
        <div class="row">

            <div class="col-12">
                <div class="section-content">
                    <div class="content-head">
                        <h4 class="content-title">Mail (Inbox)</h4><!-- /.content-title -->
                        <div class="corner-content float-right">
                            <button class="content-settings" data-toggle="tooltip" data-placement="top" title="Settings"><i class="fa fa-cog"></i></button>
                            <button class="content-refresh" data-toggle="tooltip" data-placement="top" title="Reload"><i class="fa fa-refresh"></i></button>
                            <button class="content-collapse" data-toggle="tooltip" data-placement="top" title="Collapse"><i class="fa fa-angle-down"></i></button>
                            <button class="content-close" data-toggle="tooltip" data-placement="top" title="Close"><i class="fa fa-close"></i></button>
                        </div><!-- /.corner-content -->
                    </div><!-- /.content-head -->

                    <div class="content-details show">
                        <div class="mail-content inbox">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="box mb-4">
                                        <div class="box-header with-border">
                                            <h3 class="card-title">Folders</h3>
                                        </div>
                                        <div class="box-body no-padding mailbox-nav">
                                            <ul class="nav nav-pills flex-column">
                                                <li class="nav-item"><a class="nav-link active" href="{{route('notifications.index')}}"><i class="ion ion-ios-email-outline"></i> Inbox
                                                        <span class="badge badge-success float-right">{{$realCount}}</span></a>
                                                </li>
                                                <li class="nav-item"><a class="nav-link" href="{{route('notifications.starred')}}"><i class="ion ion-star"></i>  Starred <span class="badge badge-danger float-right">{{$starredCount}}</span></a>
                                                </li>
                                                <li class="nav-item"><a class="nav-link" href="{{route('notifications.trashed')}}"><i class="ion ion-trash-a"></i> Trash<span class="badge badge-danger float-right">{{$trashedCount}}</span></a></li>
                                            </ul>
                                        </div><!-- /.box-body -->
                                    </div><!-- /. box -->

                                </div>

                                <div class="col-lg-9">
                                    <div class="box">


                                        <!-- /.box-header -->
                                        <div class="box-body no-padding">
                                            <div class="mailbox-controls">

                                                <button type="button" class="btn btn-default btn-sm"><a href="{{route('notifications.starred')}}"><i class="fa fa-refresh"></i></a></button>
                                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash"></i></button>

                                            </div>
                                            <div class="mailbox-messages">
                                                <table class="table table-hover table-striped table-responsive">
                                                    <tbody>
                                                    @foreach($userNotifications as $userNotification)
                                                        <tr>
                                                            <td><a href="{{route('notifications.trash', $userNotification->id)}}"><i class="fa fa-trash"></i></a></td>

                                                            <td class="mailbox-star">@if($userNotification->starred)<a href="{{route('notifications.unstar', $userNotification->id)}}"><i class="fa fa-star color-warning"></i></a>
                                                                @elseif(!$userNotification->starred)
                                                                    <a href="{{route('notifications.star', $userNotification->id )}}"><i class="fa fa-star-o color-warning"></i></a>
                                                                @endif

                                                            </td>
                                                            <td class="mailbox-name">{{$userNotification->title}}</td>
                                                            <td class="mailbox-subject"><a href="{{route('notifications.show',$userNotification->id)}}">{{$userNotification->message}}</a>
                                                            </td>
                                                            <td class="mailbox-date">3 mins ago</td>
                                                        </tr>

                                                    @endforeach


                                                    </tbody>
                                                </table><!-- /.table -->

                                            </div><!-- /.mail-box-messages -->
                                        </div><!-- /.box-body -->

                                        <div class="box-footer no-padding">
                                            <div class="mailbox-controls">

                                                <button type="button" class="btn btn-default btn-sm"><a href="{{route('notifications.starred')}}"><i class="fa fa-refresh"></i></a></button>

                                            </div>
                                        </div>
                                    </div><!-- /. box -->
                                </div><!-- /.col -->

                            </div>
                        </div>
                    </div><!-- /.mail-content -->
                </div><!-- /.content-details -->
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
