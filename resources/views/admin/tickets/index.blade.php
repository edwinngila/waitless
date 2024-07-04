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
                <h3 id="display_text">{{$ticket}}</h3>
                <p></p>
                <audio id="audioPlayer" controls style="display: none;">
                   <source id="audioSource" src="" type="audio/mpeg">
                   Your browser does not support the audio element.
                </audio>

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
<script>
    const elements = document. querySelectorAll('#display_text');
    const getTTSurl=async(ticket)=>{
     console.log(elements.value);
     await fetch(`http://127.0.0.1:8000/text-to-speech/text=${elements.value}`)
      .then(data => {
        if (data.audioUrl) {
            const audioPlayer = document.createElement('audio');
            audioPlayer.controls = true;
            audioPlayer.src = data.audioUrl;
            document.body.appendChild(audioPlayer);
            audioPlayer.play();
        }
     })
     .catch(error => console.error('Error:', error));
    }
    getTTSurl();
</script>
