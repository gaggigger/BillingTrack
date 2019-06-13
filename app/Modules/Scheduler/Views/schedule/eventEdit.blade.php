@extends('layouts.master')

@section('content')
    @include('layouts._alerts')
    <section class="content-header">

        <div class="container-fluid m-2">
            {!! Form::model($schedule,['route' => ['scheduler.updateevent', $schedule->id],'id' => 'event', 'accept-charset' => 'utf-8']) !!}
            <div class="card card-light">
                <div class="card-header">
                    <h3 class="card-title"><i
                                class="fa fa-edit fa-fw"></i> {{ trans('bt.'.$title) }}
                        <a class="btn btn-warning float-right" href={!! url('/scheduler')  !!}><i class="fa fa-ban"></i> @lang('bt.cancel')</a>
                        <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> {{ trans('bt.'.$title) }} </button>
                    </h3></div>
                <div class="card-body">
                    {!! Form::hidden('id') !!}
                    {!! Form::hidden('oid') !!}
                    {{--{!! Form::hidden('public_id') !!}--}}
                    <div class="form-group">
                        {!! Form::label('title',trans('bt.title'),['class'=>'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('title',null,['class'=>'form-control']) !!}
                        </div>
                        <script>
                            $("#title").autocomplete({
                                appendTo: "#event",
                                source: "/scheduler/ajax/employee",
                                minLength: 2
                            }).autocomplete("widget");
                        </script>
                    </div>
                    <div class="form-group">
                        {!! Form::label('description',trans('bt.description'),['class'=>'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('description',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('Start DateTime',null,['for'=>'start_date', 'class'=>'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::input('text','start_date',null, ['id'=>'start_date','class'=>'form-control datepicker from ','style'=>'cursor: pointer','readonly']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('End DateTime',null,['for'=>'end_date', 'class'=>'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::input('text','end_date',null, ['id'=>'end_date','class'=>'form-control to','style'=>'cursor: pointer','readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('category_id',trans('bt.category'),['class'=>'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-3">
                            {!! Form::select('category_id',$categories,null, ['id' => 'category_id','class'=>'form-control']) !!}
                        </div>
                    </div>

                    @if(!$schedule->reminders->isEmpty())
                        @foreach($schedule->reminders as $reminder)
                            <div class="reminder_delete_div">
                                <div class="form-group">
                                    <hr class="col-sm-8 width60 hr-clr-green"/>
                                    <span class="col-sm-1 float-left reminder-cross-table delete_reminder"
                                          style="cursor: pointer"><i class="fa fa-times-circle"></i> </span>
                                </div>
                                <br>
                                <div class="form-group">
                                    {!! Form::label('reminder_date',trans('bt.reminder_date'),['for'=>'reminder_date', 'class'=>'col-sm-2 col-form-label']) !!}
                                    <div class="col-sm-10">
                                        {!! Form::input('text','reminder_date[]',$reminder->reminder_date, ['class'=>'form-control datepicker reminder_date ','style'=>'cursor: pointer','readonly']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('reminder_location',trans('bt.reminder_location'),['class'=>'col-sm-2 col-form-label']) !!}
                                    <div class="col-sm-10">
                                        {!! Form::text('reminder_location[]',$reminder->reminder_location ,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('reminder_text',trans('bt.reminder_text'),['class'=>'col-sm-2 col-form-label']) !!}
                                    <div class="col-sm-10">
                                        {!! Form::text('reminder_text[]',$reminder->reminder_text,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    <div id="addReminderShow">
                    </div>
                    <div class="form-group">
                        <div class="offset-2 col-sm-10">
                            <button type="button" id="addReminderCreate"
                                    class="btn btn-primary"><i class="fa fa-plus"></i> @lang('bt.add_reminder')
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {!! Form::close() !!}

    <div class="addReminderView" style="display: none">
        @include('partials._reminderdiv')
    </div>
@stop
@section('javascript')
    @include('partials._js_datetimepicker')
    <script>
        $(document).ready(function () {
            $("#addReminderCreate").click(function (event) {
                event.preventDefault();
                $("#addReminderCreate").html('<i class="fa fa-plus"></i> @lang('bt.add_another_reminder')');
                $("#addReminderShow").append($(".addReminderView").html());
            });
            //changed on focus to mousedown. was taking 2 clicks
            $(document).on('mousedown', '.reminder_date', function () {
                $(this).datetimepicker({
                    format: 'Y-m-d H:i',
                    formatTime: '{{ config('bt.use24HourTimeFormat') ? 'H:i' : 'g:i A' }}',
                    defaultDate: '+1970/01/08' //plus 1 week
                });
            });

            $(document).on('click', '.delete_reminder', function () {
                $(this).parent().parent().remove();
            });
        });
    </script>
@stop
