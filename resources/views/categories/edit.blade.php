
@extends('layouts.app')
@section('title')
    {{'Edit Category'}}
@stop
@section('main_content')

    <div class="contents-inner">
        <div class="row">
            <div class="col-md-2">
            </div>

            <div class="col-md-8">
                <div class="section-content">
                    <div class="content-head">
                        <h4 class="content-title">Edit Category</h4><!-- /.content-title -->
                        <div class="corner-content float-right">
                            <button class="content-collapse" data-toggle="tooltip" data-placement="top" title="Collapse"><i class="fa fa-angle-down"></i></button>
                            <button class="content-close" data-toggle="tooltip" data-placement="top" title="Close"><i class="fa fa-close"></i></button>
                        </div><!-- /.corner-content -->
                    </div><!-- /.content-head -->

                    <div class="content-details show">
                        <div class="card">
                            <form method="post" enctype="multipart/form-data"  action={{ route('categories.update', $category->id) }}>
                                {{csrf_field()}}
                                {{ method_field('PUT') }}

                                <div class="card-body card-block">
                                    @if(\Illuminate\Support\Facades\Session::has('success'))

                                        <div class="alert alert-success">
                                            {{\Illuminate\Support\Facades\Session::get('success')}}
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label class=" form-control-label">Category Name</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-navicon"></i></div>
                                            <input class="form-control" type="text" value="{{$category->name1}}" required name="name1">
                                        </div>
                                        @if ($errors->has('name1'))
                                            <small class=" alert alert-danger form-text text-muted">{{ $errors->first('name1') }}</small>
                                        @endif

                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Description</label>
                                        <textarea class="form-control" name="description" rows="5">{{trim($category->description)}}</textarea>
                                        @if ($errors->has('description'))
                                            <small class=" alert alert-danger form-text text-muted">{{ $errors->first('description') }}</small>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn with-icon btn-primary pull-right"><i class="fa fa-check"></i> Save Category</button>
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