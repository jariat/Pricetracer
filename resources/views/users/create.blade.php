
@extends('layouts.app')
@section('title')
    {{'New User'}}
@stop
@section('main_content')

    <div class="contents-inner">
        <div class="row">
            <div class="col-md-2">
            </div>

            <div class="col-md-8">
                <div class="section-content">
                    <div class="content-head">
                        <h4 class="content-title">Add New User</h4><!-- /.content-title -->
                        <div class="corner-content float-right">
                            <button class="content-collapse" data-toggle="tooltip" data-placement="top" title="Collapse"><i class="fa fa-angle-down"></i></button>
                            <button class="content-close" data-toggle="tooltip" data-placement="top" title="Close"><i class="fa fa-close"></i></button>
                        </div><!-- /.corner-content -->
                    </div><!-- /.content-head -->

                    <div class="content-details show">
                        <div class="card">
                            <form method="post" enctype="multipart/form-data"  action={{url('/home/add-user')}}>
                                {{csrf_field()}}

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
                                            <input class="form-control" type="text" value="{{old('name')}}" required name="name">
                                        </div>
                                        @if ($errors->has('name'))
                                            <small class="alert-danger form-text text-muted">{{ $errors->first('name') }}</small>
                                        @endif

                                    </div>
                                        <div class="form-group">
                                            <label class=" form-control-label"> Contact</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                                <input class="form-control" type="tel" value="{{old('contact')}}" required name="contact">
                                            </div>
                                            @if ($errors->has('name'))
                                                <small class="alert-danger form-text text-muted">{{ $errors->first('contact') }}</small>
                                            @endif

                                        </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Email</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                            <input class="form-control" type="email" value="{{old('email')}}" required name="email">
                                        </div>
                                        @if ($errors->has('email'))
                                            <small class=" alert alert-danger form-text text-muted">{{ $errors->first('email') }}</small>
                                        @endif

                                    </div>

                                    <div class="form-group">
                                        <label class=" form-control-label">Default Password</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                                            <input class="form-control" type="password" required name="password">
                                        </div>
                                        @if ($errors->has('password'))
                                            <small class=" alert alert-danger form-text text-muted">{{ $errors->first('password') }}</small>
                                        @endif

                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Verify Password</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                                            <input class="form-control"  type="password" required name="password_confirmation">
                                        </div>
                                        @if ($errors->has('password_confirmation'))
                                            <small class=" alert alert-danger form-text text-muted">{{ $errors->first('password_confirmation') }}</small>
                                        @endif

                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">User Role</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-list"></i></div>
                                            <select class="form-control" name="type" required>
                                                <option value="">Select Role</option>
                                                    <option value="is_retailer" {{old('type') == 'is_retailer' ? 'selected' : '' }}>Retailer</option>
                                                    <option value="is_wholesaler" {{old('type') == 'is_wholesaler' ? 'selected' : '' }}>Wholesaler</option>
                                                    <option value="is_admin" {{old('type') == 'is_admin' ? 'selected' : '' }}>Administrator</option>
                                            </select>
                                        </div>
                                        @if ($errors->has('type'))
                                            <small class=" alert alert-danger form-text text-muted">{{ $errors->first('type') }}</small>
                                        @endif

                                    </div>
                                        <div class="form-group">
                                            <label class=" form-control-label">Category</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-list"></i></div>
                                                <select class="form-control" name="category_id" required>
                                                    <option value="">Select</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : '' }}>{{$category->name1}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if ($errors->has('category_id'))
                                                <small class=" alert alert-danger form-text text-muted">{{ $errors->first('category_id') }}</small>
                                            @endif

                                        </div>
										<div class="form-group">
                                            <label class=" form-control-label"> Location Name</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-map"></i></div>
                                                <input class="form-control" type="text" value="{{old('location')}}" name="location">
                                            </div>
                                            @if ($errors->has('location'))
                                                <small class="alert-danger form-text text-muted">{{ $errors->first('location') }}</small>
                                            @endif

                                        </div>
                                        <div class="form-group">
                                            <label class=" form-control-label"> Longitude</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                <input class="form-control" type="text" value="{{old('longitude')}}" name="longitude">
                                            </div>
                                            @if ($errors->has('name'))
                                                <small class="alert-danger form-text text-muted">{{ $errors->first('longitude') }}</small>
                                            @endif

                                        </div>
                                        <div class="form-group">
                                            <label class=" form-control-label"> Latitude</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                <input class="form-control" type="text" value="{{old('latitude')}}" name="latitude">
                                            </div>
                                            @if ($errors->has('name'))
                                                <small class="alert-danger form-text text-muted">{{ $errors->first('latitude') }}</small>
                                            @endif

                                        </div>
                                        <div class="form-group">
                                            <label class=" form-control-label"> Get Coordinates from here</label>
                                            <div class="input-group">
                                                <a href="https://www.maps.ie/coordinates.html" target="_blank"> <button type="button" class="btn with-icon btn-primary pull-right"><i class="fa fa-map-marker"></i> Pick Coordinates</button></a>
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

                                    <button type="submit" class="btn with-icon btn-primary pull-right"><i class="fa fa-check"></i> Save User</button>

                                </div>
                            </form>
                        </div>
                    </div><!-- /.content-details -->
                </div>
            </div>

            <div class="col-md-2">
            </div>

        </div>
    </div><!-- /.contents-inner -->

@stop