@extends('voyager::master')

@section('page_title', __('voyager::generic.viewing').' '.__('voyager::generic.bread'))

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-bread"></i> {{ __('voyager::generic.bread') }}
    </h1>
    @if (Route::has('voyager.import-all'))
        <a href="#import-all-bread"
            class="btn btn-info btn-sm import-all" style="margin-right: 0;">
            <i class="voyager-upload"></i> {{ __('joy-voyager-import::generic.bulk_import_all') }}
        </a>
    @endif
    @if (Route::has('voyager.export-all'))
        <a href="{{ route('voyager.export-all') }}"
        class="btn btn-info btn-sm export-all" style="margin-right: 0;">
            <i class="voyager-download"></i> {{ __('joy-voyager-export::generic.bulk_export_all') }}
        </a>
    @endif
@stop

@section('content')

    <div class="page-content container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">

                <table class="table table-striped database-tables">
                    <thead>
                        <tr>
                            <th>{{ __('voyager::database.table_name') }}</th>
                            <th style="text-align:right">{{ __('voyager::bread.bread_crud_actions') }}</th>
                        </tr>
                    </thead>

                @foreach($tables as $table)
                    @continue(in_array($table->name, config('voyager.database.tables.hidden', [])))
                    <tr>
                        <td>
                            <p class="name">
                                <a href="{{ route('voyager.database.show', $table->prefix.$table->name) }}"
                                   data-name="{{ $table->prefix.$table->name }}" class="desctable">
                                   {{ $table->name }}
                                </a>
                                <i class="voyager-data"
                                   style="font-size:25px; position:absolute; margin-left:10px; margin-top:-3px;"></i>
                            </p>
                        </td>

                        <td class="actions text-right">
                            @if($table->dataTypeId)
                                <a href="{{ route('voyager.' . $table->slug . '.index') }}"
                                   class="btn btn-warning btn-sm browse_bread" style="margin-right: 0;">
                                    <i class="voyager-plus"></i> {{ __('voyager::generic.browse') }}
                                </a>
                                <a href="{{ route('voyager.bread.edit', $table->name) }}"
                                   class="btn btn-primary btn-sm edit">
                                    <i class="voyager-edit"></i> {{ __('voyager::generic.edit') }}
                                </a>
                                <a href="#delete-bread" data-id="{{ $table->dataTypeId }}" data-name="{{ $table->name }}"
                                     class="btn btn-danger btn-sm delete">
                                    <i class="voyager-trash"></i> {{ __('voyager::generic.delete') }}
                                </a>
                                @if (Route::has('voyager.' . $table->slug . '.import'))
                                    <a href="#import-bread"
                                        data-id="{{ $table->dataTypeId }}"
                                        data-name="{{ $table->name }}"
                                        data-slug="{{ $table->slug }}"
                                        data-import-action="{{ route('voyager.'.$table->slug.'.import') }}"
                                        data-import-template-action="{{ route('voyager.'.$table->slug.'.import-template') }}"
                                        class="btn btn-info btn-sm import" style="margin-right: 0;">
                                        <i class="voyager-upload"></i> {{ __('joy-voyager-import::generic.bulk_import') }}
                                    </a>
                                @endif
                                @if (Route::has('voyager.' . $table->slug . '.export'))
                                    <a href="{{ route('voyager.' . $table->slug . '.export') }}"
                                    class="btn btn-info btn-sm export" style="margin-right: 0;">
                                        <i class="voyager-download"></i> {{ __('joy-voyager-export::generic.bulk_export') }}
                                    </a>
                                @endif
                            @else
                                <a href="{{ route('voyager.bread.create', $table->name) }}"
                                   class="_btn btn-default btn-sm pull-right">
                                    <i class="voyager-plus"></i> {{ __('voyager::bread.add_bread') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </table>
            </div>
        </div>
    </div>
    {{-- Delete BREAD Modal --}}
    <div class="modal modal-danger fade" tabindex="-1" id="delete_builder_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i>  {!! __('voyager::bread.delete_bread_quest', ['table' => '<span id="delete_builder_name"></span>']) !!}</h4>
                </div>
                <div class="modal-footer">
                    <form action="#" id="delete_builder_form" method="POST">
                        {{ method_field('DELETE') }}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-danger" value="{{ __('voyager::bread.delete_bread_conf') }}">
                    </form>
                    <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal modal-info fade" tabindex="-1" id="table_info" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-data"></i> @{{ table.name }}</h4>
                </div>
                <div class="modal-body" style="overflow:scroll">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>{{ __('voyager::database.field') }}</th>
                            <th>{{ __('voyager::database.type') }}</th>
                            <th>{{ __('voyager::database.null') }}</th>
                            <th>{{ __('voyager::database.key') }}</th>
                            <th>{{ __('voyager::database.default') }}</th>
                            <th>{{ __('voyager::database.extra') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="row in table.rows">
                            <td><strong>@{{ row.Field }}</strong></td>
                            <td>@{{ row.Type }}</td>
                            <td>@{{ row.Null }}</td>
                            <td>@{{ row.Key }}</td>
                            <td>@{{ row.Default }}</td>
                            <td>@{{ row.Extra }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">{{ __('voyager::generic.close') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    {{-- Bulk import modal --}}
    <div class="modal modal-info fade" tabindex="-1" id="bulk_import_modal" role="dialog">
        <form action="" id="bulk_import_form" method="POST" enctype="multipart/form-data">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        <i class="voyager-upload"></i> {{ __('joy-voyager-import::generic.bulk_import_title') }} <span id="bulk_import_count"></span> <span id="bulk_import_display_name"></span>
                    </h4>
                </div>
                <div class="modal-body" id="bulk_import_modal_body">
                    {{ csrf_field() }}
                    <input type="file" name="file">
                </div>
                <div class="modal-footer">
                    <a
                        class="btn btn-info pull-left"
                        id="bulk_import_template_btn"
                        href=""
                        title="{{ __('joy-voyager-import::generic.bulk_import_template') }}"
                        target="_blank"
                    >
                        <i class="voyager-download"></i> <span>{{ __('joy-voyager-import::generic.bulk_import_template') }}</span>
                    </a>
                    <input type="submit" class="btn btn-info pull-right import-confirm"
                                value="{{ __('joy-voyager-import::generic.bulk_import_confirm') }} ">
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">
                        {{ __('voyager::generic.cancel') }}
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
        </form>
    </div><!-- /.modal -->

    {{-- Bulk import all modal --}}
    <div class="modal modal-info fade" tabindex="-1" id="bulk_import_all_modal" role="dialog">
        <form action="{{ route('voyager.import-all') }}" id="bulk_import_all_form" method="POST" enctype="multipart/form-data">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        <i class="voyager-upload"></i> {{ __('joy-voyager-import::generic.bulk_import_all_title') }} <span id="bulk_import_all_count"></span> <span id="bulk_import_all_display_name"></span>
                    </h4>
                </div>
                <div class="modal-body" id="bulk_import_all_modal_body">
                    {{ csrf_field() }}
                    <input type="file" name="file">
                </div>
                <div class="modal-footer">
                    <a
                        class="btn btn-info pull-left"
                        id="bulk_import_all_template_btn"
                        href="{{ route('voyager.import-template-all') }}"
                        title="{{ __('joy-voyager-import::generic.bulk_import_all_template') }}"
                        target="_blank"
                    >
                        <i class="voyager-download"></i> <span>{{ __('joy-voyager-import::generic.bulk_import_all_template') }}</span>
                    </a>
                    <input type="submit" class="btn btn-info pull-right import-confirm"
                                value="{{ __('joy-voyager-import::generic.bulk_import_all_confirm') }} ">
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">
                        {{ __('voyager::generic.cancel') }}
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
        </form>
    </div><!-- /.modal -->

@stop

@section('javascript')

    <script>

        var table = {
            name: '',
            rows: []
        };

        new Vue({
            el: '#table_info',
            data: {
                table: table,
            },
        });

        $(function () {

            // Setup Delete BREAD
            //
            $('table .actions').on('click', '.delete', function (e) {
                id = $(this).data('id');
                name = $(this).data('name');

                $('#delete_builder_name').text(name);
                $('#delete_builder_form')[0].action = '{{ route('voyager.bread.delete', ['__id']) }}'.replace('__id', id);
                $('#delete_builder_modal').modal('show');
            });

            // Setup Show Table Info
            //
            $('.database-tables').on('click', '.desctable', function (e) {
                e.preventDefault();
                href = $(this).attr('href');
                table.name = $(this).data('name');
                table.rows = [];
                $.get(href, function (data) {
                    $.each(data, function (key, val) {
                        table.rows.push({
                            Field: val.field,
                            Type: val.type,
                            Null: val.null,
                            Key: val.key,
                            Default: val.default,
                            Extra: val.extra
                        });
                        $('#table_info').modal('show');
                    });
                });
            });

            // Bulk import selectors
            var $bulkImportBtn = $('#bulk_import_btn');
            var $bulkImportModal = $('#bulk_import_modal');
            var $bulkImportCount = $('#bulk_import_count');
            var $bulkImportDisplayName = $('#bulk_import_display_name');
            var $bulkImportInput = $('#bulk_import_input');
            var $bulkImportForm = $('#bulk_import_form');
            var $bulkImportTemplateBtn = $('#bulk_import_template_btn');
            // Reposition modal to prevent z-index issues
            $bulkImportModal.appendTo('body');
            // Bulk import listener
            $('table .actions').on('click', '.import', function (e) {
                $bulkImportForm[0].reset();
                id = $(this).data('id');
                name = $(this).data('name');
                slug = $(this).data('slug');
                importAction = $(this).data('import-action');
                importTemplateAction = $(this).data('import-template-action');

                $bulkImportDisplayName.html(name);
                $bulkImportForm.attr('action', importAction);
                $bulkImportTemplateBtn.attr('href', importTemplateAction);
                // Show modal
                $bulkImportModal.modal('show');
            });

            // Bulk import all selectors
            var $bulkImportAllBtn = $('.import-all');
            var $bulkImportAllModal = $('#bulk_import_all_modal');
            var $bulkImportAllCount = $('#bulk_import_all_count');
            var $bulkImportAllDisplayName = $('#bulk_import_all_display_name');
            var $bulkImportAllInput = $('#bulk_import_all_input');
            var $bulkImportAllForm = $('#bulk_import_all_form');
            var $bulkImportAllTemplateBtn = $('#bulk_import_all_template_btn');
            // Reposition modal to prevent z-index issues
            $bulkImportAllModal.appendTo('body');
            // Bulk import listener
            $bulkImportAllBtn.click(function () {
                $bulkImportAllForm[0].reset();
                // Show modal
                $bulkImportAllModal.modal('show');
            });
        });
    </script>

@stop
