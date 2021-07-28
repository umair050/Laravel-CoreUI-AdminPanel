@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('global.product.title') }}
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('global.product.fields.name') }}
                        </th>
                        <td>
                            {{ $product->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('global.product.fields.description') }}
                        </th>
                        <td>
                            {!! $product->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('global.product.fields.url') }}
                        </th>
                        <td>
                            {{ $product->url }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
