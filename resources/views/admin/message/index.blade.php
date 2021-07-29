@extends('layouts.admin')
@section('content')
    @can('message_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.messages.create') }}">
                    Add Message
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{-- {{ trans('global.message.title_singular') }} {{ trans('global.list') }} --}}
            Message List
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                title
                            </th>
                            <th>
                                Type
                            </th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($messages as $key => $message)
                            <tr data-entry-id="{{ $message->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $message->message ?? '' }}
                                </td>
                                <td>
                                    {{ $message->type == 1 ? 'Offer' : 'Request' }}
                                </td>
                                <td>
                                    @can('message_show')
                                        <a class="btn btn-xs btn-primary"
                                            href="{{ route('admin.messages.show', $message->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('message_edit')
                                        <a class="btn btn-xs btn-info"
                                            href="{{ route('admin.messages.edit', $message->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('message_delete')
                                        <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST"
                                            onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                            style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger"
                                                value="{{ trans('global.delete') }}">
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@section('scripts')
    @parent
    <script>
        $(function() {
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.messages.massDestroy') }}",
                className: 'btn-danger',
                action: function(e, dt, node, config) {
                    var ids = $.map(dt.rows({
                        selected: true
                    }).nodes(), function(entry) {
                        return $(entry).data('entry-id')
                    });

                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}')

                        return
                    }

                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                                headers: {
                                    'x-csrf-token': _token
                                },
                                method: 'POST',
                                url: config.url,
                                data: {
                                    ids: ids,
                                    _method: 'DELETE'
                                }
                            })
                            .done(function() {
                                location.reload()
                            })
                    }
                }
            }
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('message_delete')
                dtButtons.push(deleteButton)
            @endcan

            $('.datatable:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
        })
    </script>
@endsection
@endsection
