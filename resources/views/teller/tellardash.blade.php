@extends('layouts.app')

@section('content')

  <!-- ========== MAIN CONTENT ========== -->
  <div class="w-full ">
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
              {{ $activeTicket }}
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
            time spent
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
              2
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
            10
            </h3>
          </div>
        </div>
      </div>
      <!-- End Card -->
    </div>
    <!-- End Grid -->

    <div class="grid lg:grid-cols-2 gap-4 sm:gap-6">
      <!-- Card -->
      <div class="p-5 md:p-5 min-h-[410px] flex flex-col bg-white border shadow-sm rounded-xl">
        <!-- Header -->
        <div class="flex justify-between mt-10">
          <div>
            <h2 class="text-sm text-gray-500">
              Next in Line
            </h2>
            <p class="text-xl sm:text-2xl font-medium text-gray-800">
            QW2353
            </p>
          </div>
          <div>

            <span class="py-[5px] px-1.5 inline-flex items-center gap-x-1 text-xs font-medium rounded-md bg-teal-100 text-teal-800">
              <svg class="inline-block size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14"/><path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"></path></svg>
              2
            </span>
          </div>
        </div>

        <hr class="bg-gray-200 h-px mx-1 mt-3">
        <!-- End Header -->
         <!-- Header -->
        <div class="flex justify-between mt-20">
          <div>
            <h2 class="text-sm text-gray-500">
              3rd in line
            </h2>
            <p class="text-xl sm:text-2xl font-medium text-gray-800">
            QW2353
            </p>
          </div>
          <div>

            <span class="py-[5px] px-1.5 inline-flex items-center gap-x-1 text-xs font-medium rounded-md bg-teal-100 text-teal-800">
              <svg class="inline-block size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14"/><path d="M13.0001 7.82843V20H11.0001V7.82843L5.63614 13.1924L4.22192 11.7782L12.0001 4L19.7783 11.7782L18.3641 13.1924L13.0001 7.82843Z"></path></svg>
              3
            </span>
          </div>
        </div>
        <!-- End Header -->
        <hr class="bg-gray-200 h-px mx-1 mt-3">
         <!-- Header -->
        <div class="flex justify-between mt-20">
          <div>
            <h2 class="text-sm text-gray-500">
              4th in Line
            </h2>
            <p class="text-xl sm:text-2xl font-medium text-gray-800">
            QW2353
            </p>
          </div>
          <div>

            <span class="py-[5px] px-1.5 inline-flex items-center gap-x-1 text-xs font-medium rounded-md bg-teal-100 text-teal-800">
              <svg class="inline-block size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14"/><path d="M13.0001 7.82843V20H11.0001V7.82843L5.63614 13.1924L4.22192 11.7782L12.0001 4L19.7783 11.7782L18.3641 13.1924L13.0001 7.82843Z"></path></svg>
              4
            </span>
          </div>
        </div>
        <!-- End Header -->
      </div>
      <!-- End Card -->

      <!-- Card -->
      <div class="p-4 md:p-5 min-h-[410px] flex flex-col bg-white border shadow-sm rounded-xl">
        <!-- Header -->
        <div class="flex justify-between items-center">
          <div>
            <button type="button" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-red-100 text-red-800 hover:bg-red-200 disabled:opacity-50 disabled:pointer-events-none ">
                Cancel
            </button>
          </div>

          <div>
            <button type="button" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-100 text-blue-800 hover:bg-blue-200 disabled:opacity-50 disabled:pointer-events-none ">
                Complete
            </button>
          </div>

          <div>
            <button type="button" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-green-100 text-green-800 hover:bg-blue-200 disabled:opacity-50 disabled:pointer-events-none ">
                Next
            </button>
          </div>
        </div>
        <!-- End Header -->
         <!-- content -->
          <div class="flex justify-center">
          <div>
            <p class="text-xs uppercase tracking-wide text-gray-500">
              Currently Serving
            </p>

            <h3 class="text-6xl mt-20 font-medium text-gray-800">
              QW2354
            </h3>

          </div>
          </div>
          <!-- end content -->

      <!-- End Card -->
    </div>
  </div>
</div>
  <!-- ========== END MAIN CONTENT ========== -->
  <script>
    // Example JavaScript to update the timer
    function updateTimer(startTime) {
        setInterval(function() {
            var currentTime = new Date();
            var elapsed = new Date(currentTime - new Date(startTime));
            var hours = elapsed.getUTCHours();
            var minutes = elapsed.getUTCMinutes();
            var seconds = elapsed.getUTCSeconds();
            document.getElementById('timerDisplay').textContent =
                ('0' + minutes).slice(-2) + ':' +
                ('0' + seconds).slice(-2);
        }, 1000); // Update every second (1000ms)
    }

    // Call the updateTimer function with the startTime from PHP
    updateTimer('{{ $data["startTime"] }}');
</script>

@endsection
