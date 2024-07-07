<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Queuing System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">

<!-- Card Section -->
<div class="bg-gray-300 shadow-lg rounded-lg p-5 max-w-5xl w-full mt-5 flex flex-col items-center">
    <h1 class="text-3xl font-bold mb-4"></h1>
    <p class="mb-6 text-lg">Please enter the details</p>
    <div id="services" class="grid grid-cols-1 sm:grid-cols-1">
        <form  class="w-full max-w-lg">
            @csrf

            <div class="space-y-3">
                <label for="input-label" class="block text-sm font-medium mb-2 dark:text-black">Full name</label>
                <input type="text"
                       name="name"
                       class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 bg-white text-gray-800 placeholder-gray-500"
                       placeholder="Enter your full name">
            </div>
            <div class="space-y-3 mt-5">
                <label for="input-label" class="block text-sm font-medium mb-2 dark:text-black">Description</label>
                <textarea class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 bg-white text-gray-800 placeholder-gray-500" rows="5" placeholder="Enter description"></textarea>
            </div>
            <div class="mt-6">
                <button type="submit" class="py-3 px-6 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 transition duration-300">Submit</button>
            </div>
        </form>
    </div>
</div>

<!-- End Card Section -->

<!-- overlay -->

<div id="hs-task-created-alert" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
  <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
    <div class="relative flex flex-col bg-white shadow-lg rounded-xl">
      <div class="absolute top-2 end-2">
        <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#hs-task-created-alert">
          <span class="sr-only">Close</span>
          <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
      </div>

      <div class="p-4 sm:p-10 text-center overflow-y-auto">
        <!-- Icon -->
        <span class="mb-4 inline-flex justify-center items-center size-[46px] rounded-full border-4 border-green-50 bg-green-100 text-green-500">
          <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z"/>
          </svg>
        </span>
        <!-- End Icon -->

        <h3 class="mb-2 text-xl font-bold text-gray-800">
          Your token number is <span class="inline-flex items-center gap-x-1.5 text-blue-600 decoration-2 hover:underline font-medium" href="#">Q1872</span>
        </h3>
        <p class="text-gray-500">
          Kindly patiently wait as for your turn. You will be notified when your turn arrives.
        </p>

        <div class="mt-6 flex justify-center gap-x-4">
          <a type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#hs-task-created-alert" href="kiosk2">
            finish
        </a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- end of overlay -->
</body>
</html>
