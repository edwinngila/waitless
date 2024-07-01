<!-- Service Field -->
<div class="col-sm-12">
    {!! Form::label('service', 'Service:') !!}
    <p>{{ $tickets->service_id }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $tickets->description }}</p>
</div>

<!-- Ticket Number Field -->
<div class="col-sm-12">
    {!! Form::label('ticket_number', 'Ticket Number:') !!}
    <p>{{ $tickets->ticket_number }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $tickets->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $tickets->updated_at }}</p>
</div>

