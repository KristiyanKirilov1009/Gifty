@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', __('admin.' . $module . '.pages.list.subtitle'))
@section('content_header_title', __('admin.' . $module . '.pages.list.content_header_title'))
@section('content_header_subtitle', __('admin.' . $module . '.pages.list.content_header_subtitle'))

@section('plugins.Datatables', true)

{{-- Content body: main page content --}}

@section('content_body')
    <section class="content">

        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h3 class="card-title">{{ __('admin.' . $module . '.pages.list.content_card_title') }}</h3>
                    </div>
                    <div class="col-6 text-right">
                        <div class="mr-n1">
                            <a class="btn btn-success" href="{{ route('admin.' . $module . '.create') }}">
                                <i class="fas fa-plus"></i> {{ __('buttons.add') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6">

                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div id="example1_filter" class="dataTables_filter">
                            <form action="{{ request()->url() }}" method="get">
                                <label>Search:<input type="search" name="search" id="search" value="{{ request()->input('search', old('search')) }}" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- <table class="table table-striped"> -->
                <table id="datatable" class="table table-bordered table-hover table-striped table-sm dataTable no-footer">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center" style="width: 1%">#</th>
                            @foreach($datatable as $field)
                                <th>{{ __('admin.' . $module . '.fields.' . $field . '.title')}}</th>
                            @endforeach

                            <th class="text-center" style="width: 20%">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($records as $key => $record)
                        <tr>
                            <td>
                                {{ ((($records->currentPage() - 1) * $records->perPage()) + ($key+1)) }}
                            </td>
                            @foreach($datatable as $field)
                                <td>{{ $record->$field }}</td>
                            @endforeach
                            <td class="text-center">
                                <a class="btn btn-info btn-sm" href="{{ route('admin.' . $module . '.edit', ['blog' => $record]) }}">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmModal" data-url="{{ route('admin.' . $module . '.destroy', ['blog' => $record]) }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                        @if($records->isEmpty())
                            <tr>
                                <td colspan="{{ (count($datatable) + 2) }}" class="text-center">No Records found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <div class="row p-2">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                            Showing {{ $records->currentPage() == 1 ? 1 : (($records->currentPage() - 1) * $records->perPage() + 1) }} to {{ ((($records->currentPage() - 1) * $records->perPage()) + $records->count()) }} of {{ $records->total() }} entries
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                            {{ $records->appends($_GET)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('modals.confirm.delete.title') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ trans('modals.confirm.delete.body') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('buttons.cancel') }}</button>
                        <form id="delete" action="" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{ trans('buttons.delete') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

{{-- Push extra CSS --}}
@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href=""> --}}
    <style type="text/css">
        #datatable tr td,  #datatable tr th {
            vertical-align: middle;
        }
    </style>
@endpush

{{-- Push extra scripts --}}

@push('js')
    <script>
        $('#confirmModal').on('show.bs.modal', function (e) {
            var button = $(e.relatedTarget);
            $('#delete').attr('action', button.data('url'));
        });
    </script>
@endpush
