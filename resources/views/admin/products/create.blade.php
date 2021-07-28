@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('global.product.title_singular') }}
        </div>

        <div class="card-body">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">{{ trans('global.product.fields.name') }}*</label>
                    <input type="text" id="name" name="name" class="form-control"
                        value="{{ old('name', isset($product) ? $product->name : '') }}">
                    @if ($errors->has('name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    <label for="description">{{ trans('global.product.fields.description') }}</label>
                    <textarea id="description" name="description"
                        class="form-control ">{{ old('description', isset($product) ? $product->description : '') }}</textarea>
                    @if ($errors->has('description'))
                        <em class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.description_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('url') ? 'has-error' : '' }}">
                    <label for="url">{{ trans('global.product.fields.url') }}</label>
                    <input type="text" id="url" name="url" class="form-control"
                        value="{{ old('url', isset($product) ? $product->url : '') }}" step="0.01">
                    @if ($errors->has('url'))
                        <em class="invalid-feedback">
                            {{ $errors->first('url') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.url_helper') }}
                    </p>
                </div>
                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>

@endsection
