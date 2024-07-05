<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="canonical" href="https://preline.co/">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class='bg-gray-100 h-full items-center py-16'>


<div class="flex">
<!-- Card Section -->
<div class="max-w-[105rem] px-4 py-10 sm:px-6 lg:px-2 lg:py-14 mx-auto">
    <div class="grid">
        <div class="flex justify-center items-center col-span-full">
            <h2 class="mt-1 mb-1 sm:mt-1 text-4xl font-bold text-white sm:text-6xl">
                <span class="bg-clip-text bg-gradient-to-tr from-blue-600 to-purple-400 text-transparent">WaitLess</span>
            </h2>
        </div>
    </div>


 <!-- Grid -->
 <div class="overflow-x-auto">
    <div class="grid">
        <div class="flex justify-center items-center col-span-full">
            <h4 class="mt-1 mb-8 sm:mt-3 text-4xl font-bold text-black sm:text-6xl">
                <span style="color: black;" class="bg-clip-text text-white text-transparent">services</span>
            </h4>
        </div>
    </div>
    <div class="flex space-x-4 p-4">
      @foreach ($services as $service)
        <div class="flex-none w-64">
          <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition" href="#">
            <div class="p-4 md:p-7">
              <div class="flex justify-between items-center">
                <div>
                  <h3 class="group-hover:text-blue-600 font-semibold text-gray-800">
                    {{ $service->name }}
                  </h3>
                  <p class="text-sm text-gray-500">
                    Click here
                  </p>
                </div>
                <div class="ps-3">
                  <svg class="flex-shrink-0 size-5 text-gray-800" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                </div>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>

 <div class="overflow-x-auto">
    <div class="grid">
        <div class="flex justify-center items-center col-span-full">
            <h4 class="mt-1 mb-8 sm:mt-3 text-4xl font-bold text-black sm:text-6xl">
                <span style="color: black;" class="bg-clip-text text-white text-transparent">services</span>
            </h4>
        </div>
    </div>
    <div class="flex space-x-4 p-4">
      @foreach ($services as $service)
        <div class="flex-none w-64">
          <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition" href="#">
            <div class="p-4 md:p-7">
              <div class="flex justify-between items-center">
                <div>
                  <h3 class="group-hover:text-blue-600 font-semibold text-gray-800">
                    {{ $service->name }}
                  </h3>
                  <p class="text-sm text-gray-500">
                    Click here
                  </p>
                </div>
                <div class="ps-3">
                  <svg class="flex-shrink-0 size-5 text-gray-800" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                </div>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>
  </div>

<!-- End Card Section -->
</div>

</body>
</html>
