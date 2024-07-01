@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tickets</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="card m-2">
        <div class="row d-flex justify-content-center align-content-center">
           <div class="col-5">
                <h2>Ticket in service:</h2>
                <h3>{{$ticket}}</h3>
           </div>
        </div>
    </div>

    <div class="content">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            @include('admin.tickets.table')
        </div>
    </div>

@endsection
