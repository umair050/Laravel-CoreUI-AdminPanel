@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('global.product.title_singular') }}
        </div>

        <div class="card-body">
            <form action="{{ route('admin.messages.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
                    <label for="message">Title*</label>
                    <input type="text" id="message" name="message" class="form-control"
                        value="{{ old('name', isset($message) ? $message->message : '') }}">
                    @if ($errors->has('message'))
                        <em class="invalid-feedback">
                            {{ $errors->first('message') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
                    <label for="message">Type*</label>
                    <select name="type" class="form-control">
                        <option value="0">Request</option>
                        <option value="1">Offer</option>
                    </select>
                </div>
                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>

@endsection
