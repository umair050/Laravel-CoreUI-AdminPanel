@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Update Product
        </div>

        <div class="card-body">
            <form action="{{ route('admin.messages.update', [$message->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
                    <label for="message">Title*</label>
                    <input type="text" id="message" name="message" class="form-control"
                        value="{{ old('message', isset($message) ? $message->message : '') }}">
                    @if ($errors->has('message'))
                        <em class="invalid-feedback">
                            {{ $errors->first('message') }}
                        </em>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
                    <label for="type">Type</label>
                    <select name="type" class="form-control">
                        <option value="0" @if ($message->type == 0) selected @endif>Request</option>
                        <option value="1" @if ($message->type == 1) selected @endif>Offer</option>
                    </select>
                </div>
                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>

@endsection
