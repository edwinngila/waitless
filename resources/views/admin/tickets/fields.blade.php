
{!! Form::hidden('ticket_num', 'some_value') !!}

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_name', 'name:') !!}
    {!! Form::text('customer_name', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Service Field -->
<div class="form-group col-sm-7">
    {!! Form::label('service_id', 'Service:') !!}
    {!! Form::select('service_id',$services->pluck('name', 'id'), null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-7">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'required']) !!}
</div>
