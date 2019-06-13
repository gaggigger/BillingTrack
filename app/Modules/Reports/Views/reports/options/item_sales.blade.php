@extends('layouts.master')

@section('javascript')

    @include('layouts._daterangepicker')

    <script type="text/javascript">
        $(function () {
            $('#btn-run-report').click(function () {

                const from_date = $('#from_date').val();
                const to_date = $('#to_date').val();
                const company_profile_id = $('#company_profile_id').val();

                $.post("{{ route('reports.itemSales.validate') }}", {
                    from_date: from_date,
                    to_date: to_date,
                    company_profile_id: company_profile_id
                }).done(function () {
                    clearErrors();
                    $('#form-validation-placeholder').html('');
                    output_type = $("input[name=output_type]:checked").val();
                    query_string = "?from_date=" + from_date + "&to_date=" + to_date + "&company_profile_id=" + company_profile_id;
                    if (output_type == 'preview') {
                        $('#preview').show();
                        $('#preview-results').attr('src', "{{ route('reports.itemSales.html') }}" + query_string);
                    }
                    else if (output_type == 'pdf') {
                        window.location.href = "{{ route('reports.itemSales.pdf') }}" + query_string;
                    }

                }).fail(function (response) {
                    showErrors($.parseJSON(response.responseText).errors, '#form-validation-placeholder');
                });
            });
        });
    </script>
@stop

@section('content')

    <section class="content-header">
        <h1 class="float-left">@lang('bt.item_sales')</h1>
        <div class="float-right">
            <button class="btn btn-primary" id="btn-run-report">@lang('bt.run_report')</button>
        </div>
        <div class="clearfix"></div>
    </section>

    <section class="container-fluid">

        <div id="form-validation-placeholder"></div>

        <div class="card card-light">
            <div class="card-header">
                <h3 class="card-title">@lang('bt.options')</h3>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>@lang('bt.company_profile'):</label>
                            {!! Form::select('company_profile_id', $companyProfiles, null, ['id' => 'company_profile_id', 'class' => 'form-control'])  !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>@lang('bt.date_range'):</label>
                            {!! Form::hidden('from_date', null, ['id' => 'from_date']) !!}
                            {!! Form::hidden('to_date', null, ['id' => 'to_date']) !!}
                            {!! Form::text('date_range', null, ['id' => 'date_range', 'class' => 'form-control', 'readonly' => 'readonly']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-check form-check-inline">
                            <label>@lang('bt.output_type'):</label>
                            <label class="form-check-label ml-3">
                                <input class="form-check-input" type="radio" name="output_type" value="preview"
                                       checked="checked"> @lang('bt.preview')
                            </label>
                            <label class="form-check-label ml-3">
                                <input class="form-check-input" type="radio" name="output_type"
                                       value="pdf"> @lang('bt.pdf')
                            </label>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="row" id="preview"
             style="height: 100%; background-color: #e6e6e6; padding: 25px; margin: 0; display: none;">
            <div class="col-lg-8 offset-lg-2" style="background-color: white;">
                <iframe src="about:blank" id="preview-results" frameborder="0" style="width: 100%;" scrolling="no"
                        onload="resizeIframe(this, 500);"></iframe>
            </div>
        </div>

    </section>

@stop
