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
                            Title
                        </th>
                        <td>
                            {{ $message->message }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Type
                        </th>
                        <td>
                            {!! $message->type == 1 ? 'Offer' : 'Request' !!}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
