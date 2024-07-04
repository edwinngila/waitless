<!-- Service Name Field -->
<div class="form-group col-sm-7">
    {!! Form::label('service_name', 'Service:') !!}
    {!! Form::select('service_name',$services->pluck('name', 'name'), null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Service Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service_point_name', 'Service Point Name:') !!}
    {!! Form::text('service_point_name', null, ['class' => 'form-control', 'required']) !!}
</div>
