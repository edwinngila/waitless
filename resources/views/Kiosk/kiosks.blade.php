<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Queuing System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="bg-gray-300  shadow-lg rounded-lg p-8 max-w-3xl w-full mt-6">
        <h1 class="text-3xl font-bold mb-4 text-center">Hello</h1>
        <p class="mb-6 text-center text-lg">Please select a service</p>
        <div id="services" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
              <!-- Card -->
              @foreach ($services as $service)
              <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition dark:bg-neutral-900 dark:border-neutral-800 btn-service"
                 href="{{ route('kioskWithdraw', ['id' => $service->id,'serviceName' => $service->name]) }}"
                 data-service-name="{{ $service->id }}">
                  <div class="py-8 px-4">
                      <div class="flex justify-between items-center">
                          <div class="flex items-center">
                              <img class="size-[38px] rounded-full" src="https://images.unsplash.com/photo-1612046264803-6d6b67fdee80?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80" alt="Image Description">
                              <div class="ms-3">
                                  <h3 class="group-hover:text-blue-600 font-semibold text-gray-800 dark:group-hover:text-neutral-400 dark:text-neutral-200">
                                      {{ $service->name }}
                                  </h3>
                              </div>
                          </div>
                          <div class="ps-3">
                              <svg class="flex-shrink-0 size-5 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                          </div>
                      </div>
                  </div>
              </a>
              @endforeach
        </div>
    </div>
    <script>
           document.querySelectorAll('.btn-service').forEach(button => {
           button.addEventListener('click', (event) => {
            event.preventDefault(); // Prevent default link behavior

            // Get ID from data attribute or other method if applicable
            const serviceId = button.dataset.serviceId;

            // Get URL from href attribute
            const url = button.href;

            // Optionally, perform any actions before navigation
            console.log(`Navigating to ${url} with ID ${serviceId}`);

            // Navigate to the URL
            window.location.href = url;
        });
    });
    </script>
</body>
</html>


