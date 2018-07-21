
@extends('layouts.app')
@section('title')
    {{'Edit User'}}
@stop
@section('head_content')
    <link rel="stylesheet" href="{{asset("css/widget/widgets.css")}}">
@stop
@section('main_content')

    <div class="contents-inner">
        <div class="row">
            <div class="col-md-4 advanced-card text-center">
                <div class="social-box">
                    <div class="avatar background-bg" data-image-src="{{asset('images/bg1.jpg')}}">
                        <img src="{{asset($user->avatar?$user->avatar:'images/avatar-d.png')}}" alt="Avatar" class="rounded-circle" style="max-width: 200px;max-height: 100px; width: 100px;height: 150px">
                    </div><!-- /.avatar -->
                    <div class="details">
                        <h4 class="name"><a href="#">{{$user->name}}</a></h4><!-- /.name -->
                        <span class="designation">@if($user->is_admin)
                                {{"Admin"}}
                            @elseif($user->is_retailer)
                                {{'Retailer'}}
                            @elseif($user->is_wholesaler)
                                {{'Wholesaler'}}
                            @endif</span><!-- /.designation -->
                        <p>
                            Joined on: &nbsp; {{$user->created_at}}
                        </p>
                    </div>

                </div>

            </div>

            <div class="col-md-8">
                <div class="section-content">
                    <div class="content-head">
                        <h4 class="content-title">Edit Profile</h4><!-- /.content-title -->
                        <div class="corner-content float-right">
                            <button class="content-collapse" data-toggle="tooltip" data-placement="top" title="Collapse"><i class="fa fa-angle-down"></i></button>
                            <button class="content-close" data-toggle="tooltip" data-placement="top" title="Close"><i class="fa fa-close"></i></button>
                        </div><!-- /.corner-content -->
                    </div><!-- /.content-head -->

                    <div class="content-details show">
                        <div class="card">
                            <form method="post" enctype="multipart/form-data"  action={{route('users.update',$user->id)}}>
                                {{csrf_field()}}
                                {{ method_field('PUT') }}

                                <div class="card-body card-block">
                                    @if(\Illuminate\Support\Facades\Session::has('success'))

                                        <div class="alert alert-success">
                                            {{\Illuminate\Support\Facades\Session::get('success')}}
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class=" form-control-label"> Name</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                <input class="form-control" type="text" value="{{$user->name}}" required name="name">
                                            </div>
                                            @if ($errors->has('name'))
                                                <small class="alert-danger form-text text-muted">{{ $errors->first('name') }}</small>
                                            @endif

                                        </div>
                                        <div class="form-group">
                                            <label class=" form-control-label">Email</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                                <input class="form-control" type="email" value="{{$user->email}}" required name="email" disabled>
                                            </div>
                                            @if ($errors->has('email'))
                                                <small class=" alert alert-danger form-text text-muted">{{ $errors->first('email') }}</small>
                                            @endif

                                        </div>
                                        <div class="form-group">
                                            <label class=" form-control-label">Category</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-list"></i></div>
                                                <select class="form-control" name="category_id" required>
                                                    <option value="">Select</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}" {{$user->category_id == $category->id ? 'selected' : '' }}>{{$category->name1}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if ($errors->has('category_id'))
                                                <small class=" alert alert-danger form-text text-muted">{{ $errors->first('category_id') }}</small>
                                            @endif

                                        </div>

                                        <div class="form-group">
                                            <label class=" form-control-label"> Longitude</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                <input class="form-control" type="text" value="{{$user->longitude}}" required name="longitude">
                                            </div>
                                            @if ($errors->has('name'))
                                                <small class="alert-danger form-text text-muted">{{ $errors->first('longitude') }}</small>
                                            @endif

                                        </div>
                                        <div class="form-group">
                                            <label class=" form-control-label"> Latitude</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                <input class="form-control" type="text" value="{{$user->latitude}}" required name="latitude">
                                            </div>
                                            @if ($errors->has('name'))
                                                <small class="alert-danger form-text text-muted">{{ $errors->first('latitude') }}</small>
                                            @endif

                                        </div>
                                        <div class="form-group">
                                            <label class=" form-control-label"> Get Coordinates from here</label>
                                            <div class="input-group">
                                                <a href="https://www.maps.ie/coordinates.html"> <button type="button" class="btn with-icon btn-primary pull-right"><i class="fa fa-map-marker"></i> Pick Coordinates</button></a>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label class=" form-control-label">Avatar</label>
                                            <div class="input-group">
                                                <input class="form-control" type="file" name="picture">
                                            </div>
                                            @if ($errors->has('picture'))
                                                <small class=" alert alert-danger form-text text-muted">{{ $errors->first('picture') }}</small>
                                            @endif

                                        </div>

                                        <button type="submit" class="btn with-icon btn-primary pull-right"> Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.content-details -->
                </div>
            </div>

        </div>
    </div><!-- /.contents-inner -->

@stop