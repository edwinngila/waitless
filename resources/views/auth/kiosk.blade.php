<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <script>
        function setServiceAndSubmit(serviceId) {
            document.getElementById('service_id').value = serviceId;
            document.getElementById('service_form').submit();
        }
    </script>
</head>
<body class='bg-black h-full items-center'>

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

        <!-- Form -->
        <form id="service_form" action="/your-action-url" method="POST">
            @csrf
            <input type="hidden" id="service_id" name="service_id">
        </form>

        <!-- Services Grid -->
        <div class="overflow-x-auto">
            <div class="grid">
                <div class="flex justify-center items-center col-span-full">
                    <h5 class="mt-1 mb-8 sm:mt-3 text-3xl text-black sm:text-3xl">
                        <span style="color: rgb(255, 255, 255);" class="bg-clip-text text-white text-transparent">services</span>
                    </h5>
                </div>
            </div>
            <div class="flex space-x-4 p-4">
                @foreach ($services as $service)
                <div class="flex-none w-64">
                    <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition cursor-pointer" href="javascript:void(0);" onclick="setServiceAndSubmit({{ $service->id }})">
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

        <!-- Services Point Grid -->
        <div class="overflow-x-auto">
            <div class="grid">
                <div class="flex justify-center items-center col-span-full">
                    <h4 class="mt-1 mb-8 sm:mt-3 text-3xl text-black sm:text-3xl">
                        <span style="color: rgb(255, 255, 255);" class="bg-clip-text text-white text-transparent">services point</span>
                    </h4>
                </div>
            </div>

            <div class="flex space-x-4 p-4">
                @foreach ($services_point as $services_points)
                <div class="flex-none w-64">
                    <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition cursor-pointer" href="javascript:void(0);" onclick="setServiceAndSubmit({{ $services_points->id }})">
                        <div class="p-4 md:p-7">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="group-hover:text-blue-600 font-semibold text-gray-800">
                                        {{ $services_points->service_point_name }}
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

        <!-- Services Point Grid -->
        <div class="overflow-x-auto">
          
        </div>

    </div>
    <!-- End Card Section -->
</div>

</body>
</html>
