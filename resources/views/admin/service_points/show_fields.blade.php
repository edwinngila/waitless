<!-- Service Name Field -->
<div class="col-sm-12">
    {!! Form::label('service_name', 'Service Name:') !!}
    <p>{{ $servicePoint->service_name }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $servicePoint->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $servicePoint->updated_at }}</p>
</div>

