@extends('layouts.app')

@section('content')

<!-- ========== MAIN CONTENT ========== -->
<div class="w-full">
    <div class="p-2 sm:p-6 space-y-4 sm:space-y-6">
        <!-- Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
            <!-- Card -->
            <div class="flex flex-col bg-white border shadow-sm rounded-xl">
                <div class="p-4 md:p-5">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs uppercase tracking-wide text-gray-500">
                            People in line
                        </p>
                        <div class="hs-tooltip">
                            <div class="hs-tooltip-toggle">
                                <svg class="flex-shrink-0 size-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg>
                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm" role="tooltip">
                                    The number of people waiting to be served
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-1 flex items-center gap-x-2">
                        <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                            {{ $activeTicketCount }}
                        </h3>
                    </div>
                </div>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="flex flex-col bg-white border shadow-sm rounded-xl">
                <div class="p-4 md:p-5">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs uppercase tracking-wide text-gray-500">
                            Time spent
                        </p>
                    </div>

                    <div class="mt-1 flex items-center gap-x-2">
                        <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                            <span id="timerDisplay">00Min:00Sec</span>
                        </h3>
                    </div>
                </div>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="flex flex-col bg-white border shadow-sm rounded-xl">
                <div class="p-4 md:p-5">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs uppercase tracking-wide text-gray-500">
                            Cancelled tokens
                        </p>
                    </div>

                    <div class="mt-1 flex items-center gap-x-2">
                        <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                            {{ $cancelledTickets }}
                        </h3>
                    </div>
                </div>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="flex flex-col bg-white border shadow-sm rounded-xl">
                <div class="p-4 md:p-5">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs uppercase tracking-wide text-gray-500">
                            Completed tokens
                        </p>
                    </div>

                    <div class="mt-1 flex items-center gap-x-2">
                        <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                            {{ $completedTickets }}
                        </h3>
                    </div>
                </div>
            </div>
            {{-- {{ dd($url) }} --}}
            {{-- <audio style="display: none" autoplay controls>
                <source src="{{$activeTickets->audio_file}}" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio> --}}
            <!-- End Card -->
        </div>
        <!-- End Grid -->

        <div class="grid lg:grid-cols-2 gap-4 sm:gap-6">
            <!-- Card -->
            <div class="p-5 md:p-5 min-h-[410px] flex flex-col bg-white border shadow-sm rounded-xl">
                <!-- Header -->
                @foreach ($ticketNames as $ticket )
                <div class="flex justify-between mt-10">
                    <div>
                        <h2 class="text-sm text-gray-500">
                            @if ($loop->index === 0)
                              current in point
                            @else
                              Next in Line
                            @endif
                        </h2>
                        <p class="text-xl sm:text-2xl font-medium text-gray-800">
                            {{ $ticket->ticket_number }}
                        </p>
                    </div>
                    <div>
                        <span class="py-[5px] px-1.5 inline-flex items-center gap-x-1 text-xs font-medium rounded-md bg-teal-100 text-teal-800">
                            <svg class="inline-block size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14"/><path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"></path></svg>
                            2
                        </span>
                    </div>
                </div>
                @endforeach
                <!-- End Header -->
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="p-4 md:p-5 min-h-[410px] flex flex-col bg-white border shadow-sm rounded-xl">
                <!-- Header -->
                <div class="flex justify-between items-center">
                        <form action="{{ route('clearTicket') }}" method="POST">
                            @csrf
                            <input type="hidden" name="ticket_id" value="{{ $currentTicket->id }}">
                            <button type="submit" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-red-100 text-red-800 hover:bg-red-200 disabled:opacity-50 disabled:pointer-events-none">
                                Cancel
                            </button>
                        </form>

                        <form action="{{ route('completeTicket') }}" method="POST">
                            @csrf
                            <input type="hidden" name="ticket_id" value="{{ $currentTicket->id }}">
                            <input type="hidden" id="ticketTimer" name="ticket_timer" value="">
                            <button type="submit" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-100 text-blue-800 hover:bg-blue-200 disabled:opacity-50 disabled:pointer-events-none">
                                Complete
                            </button>
                        </form>

                    <form action="{{ route('nextTicket') }}" method="POST">
                        @csrf
                        <button type="submit" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-green-100 text-green-800 hover:bg-blue-200 disabled:opacity-50 disabled:pointer-events-none ">
                            Next
                        </button>
                    </form>


                </div>
                <!-- End Header -->
                <!-- content -->
                <div class="flex justify-center">
                    <div>
                        <p class="text-xs uppercase tracking-wide text-gray-500">
                            Currently Serving
                        </p>

                        <h3 class="text-6xl mt-20 font-medium text-gray-800">
                            {{ $currentTicket->ticket_number ?? 'No ticket number available' }}
                        </h3>
                    </div>
                </div>
                <!-- end content -->
            </div>
            <!-- End Card -->
        </div>
    </div>
</div>
<!-- ========== END MAIN CONTENT ========== -->
<script>
    // Example JavaScript to update the timer and input field
    function updateTimer(startTime) {
        setInterval(function() {
            var currentTime = new Date();
            var elapsed = new Date(currentTime - new Date(startTime));
            var hours = elapsed.getUTCHours();
            var minutes = elapsed.getUTCMinutes();
            var seconds = elapsed.getUTCSeconds();

            // Update the displayed timer
            document.getElementById('timerDisplay').textContent =
                ('0' + minutes).slice(-2) + ':' +
                ('0' + seconds).slice(-2);

            // Update the hidden input field value
            var timerValue = ('0' + minutes).slice(-2) + ':' + ('0' + seconds).slice(-2);
            localStorage.setItem('ticketElapsedTime', timerValue);
            document.getElementById('ticketTimer').value = timerValue;
        }, 1000); // Update every second (1000ms)
    }

    // Call the updateTimer function with the startTime from PHP
    updateTimer('{{ $data["startTime"] }}');
</script>


@endsection
