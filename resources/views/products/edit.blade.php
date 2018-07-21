
@extends('layouts.app')
@section('title')
    {{'Edit Product'}}
@stop
@section('main_content')

    <div class="contents-inner">
        <div class="row">
            <div class="col-md-2">
            </div>

            <div class="col-md-8">
                <div class="section-content">
                    <div class="content-head">
                        <h4 class="content-title">Edit Product</h4><!-- /.content-title -->
                        <div class="corner-content float-right">
                            <button class="content-collapse" data-toggle="tooltip" data-placement="top" title="Collapse"><i class="fa fa-angle-down"></i></button>
                            <button class="content-close" data-toggle="tooltip" data-placement="top" title="Close"><i class="fa fa-close"></i></button>
                        </div><!-- /.corner-content -->
                    </div><!-- /.content-head -->

                    <div class="content-details show">
                        <div class="card">
                            <form method="post" enctype="multipart/form-data"  action={{ route('products.update', $product->id) }}>
                                {{csrf_field()}}
                                {{ method_field('PUT') }}

                                <div class="card-body card-block">
                                    @if(\Illuminate\Support\Facades\Session::has('success'))

                                        <div class="alert alert-success">
                                            {{\Illuminate\Support\Facades\Session::get('success')}}
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label class=" form-control-label">Product Name</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-navicon"></i></div>
                                            <input class="form-control" type="text" value="{{$product->name}}" required name="name">
                                        </div>
                                        @if ($errors->has('name'))
                                            <small class=" alert alert-danger form-text text-muted">{{ $errors->first('name') }}</small>
                                        @endif

                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Price</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                            <input class="form-control" type="number" value="{{$product->price}}" required name="price">
                                        </div>
                                        @if ($errors->has('price'))
                                            <small class=" alert alert-danger form-text text-muted">{{ $errors->first('price') }}</small>
                                        @endif

                                    </div>

                                    <div class="form-group">
                                        <label class=" form-control-label">Quantity</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></div>
                                            <input class="form-control" value="{{$product->quantity}}" type="number" required name="quantity">
                                        </div>
                                        @if ($errors->has('quantity'))
                                            <small class=" alert alert-danger form-text text-muted">{{ $errors->first('quantity') }}</small>
                                        @endif

                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Category</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-list"></i></div>
                                            <select class="form-control" name="category_id" required>
                                                <option value="">Select</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}" {{$product->category_id == $category->id ? 'selected' : '' }}>{{$category->name1}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('category_id'))
                                            <small class=" alert alert-danger form-text text-muted">{{ $errors->first('category_id') }}</small>
                                        @endif

                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Image</label>
                                        <div class="input-group">
                                            <input class="form-control" type="file" name="picture">
                                        </div>
                                        <small class=" alert alert-info form-text text-muted"> Image:-- &nbsp;{{ $product->image }}</small>
                                        @if ($errors->has('picture'))
                                            <small class=" alert alert-danger form-text text-muted">{{ $errors->first('picture') }}</small>
                                        @endif

                                    </div>
                                    <button type="submit" class="btn with-icon btn-primary pull-right"><i class="fa fa-check"></i> Save Product</button>

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