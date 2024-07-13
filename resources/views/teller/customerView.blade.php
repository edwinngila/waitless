<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .flex {
            display: flex;
        }

        .justify-center {
            justify-content: center;
        }

        .max-w-[85rem] {
            max-width: 85rem;
        }

        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .py-10 {
            padding-top: 2.5rem;
            padding-bottom: 2.5rem;
        }

        .sm\:px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .lg\:px-8 {
            padding-left: 2rem;
            padding-right: 2rem;
        }

        .lg\:py-14 {
            padding-top: 3.5rem;
            padding-bottom: 3.5rem;
        }

        .grid {
            display: grid;
        }

        .sm\:grid-cols-2 {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .lg\:grid-cols-3 {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .gap-6 {
            gap: 1.5rem;
        }

        .group {
            display: flex;
            flex-direction: column;
            background-color: white;
            border: 1px solid #e5e7eb;
            border-radius: 0.5rem;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }

        .h-full {
            height: 100%;
        }

        .bg-white {
            background-color: white;
        }

        .border {
            border-width: 1px;
        }

        .border-gray-200 {
            border-color: #e5e7eb;
        }

        .shadow-sm {
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }

        .rounded-xl {
            border-radius: 0.75rem;
        }

        .h-52 {
            height: 13rem;
        }

        .justify-center {
            justify-content: center;
        }

        .items-center {
            align-items: center;
        }

        .rounded-t-xl {
            border-top-left-radius: 0.75rem;
            border-top-right-radius: 0.75rem;
        }

        .mt-20 {
            margin-top: 5rem;
        }

        .font-medium {
            font-weight: 500;
        }

        .text-gray-800 {
            color: #1f2937;
        }

        .bg-gray-200 {
            background-color: #e5e7eb;
        }

        .h-px {
            height: 1px;
        }

        .mx-1 {
            margin-left: 0.25rem;
            margin-right: 0.25rem;
        }

        .mt-3 {
            margin-top: 0.75rem;
        }

        .p-4 {
            padding: 1rem;
        }

        .md\:p-6 {
            padding: 1.5rem;
        }

        .mb-1 {
            margin-bottom: 0.25rem;
        }

        .text-xl {
            font-size: 1.25rem;
        }

        .font-semibold {
            font-weight: 600;
        }

        .uppercase {
            text-transform: uppercase;
        }

        .text-green-500 {
            color: #10b981;
        }

        .text-gray-500 {
            color: #6b7280;
        }

        /* Marquee styles */
        .marquee-container {
            overflow: hidden;
            white-space: nowrap;
            width: 100vw; /* Full width */
            background-color: #fff;
            border-top: 2px solid #ccc;
            border-bottom: 2px solid #ccc;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 10px 0;
            position: absolute;
            bottom: 0; /* Stick to the bottom */
            left: 0;
        }

        .marquee {
            display: inline-block;
            white-space: nowrap;
            animation: marquee 50s linear infinite;
        }

        .marquee-text {
            display: inline-block;
            font-size: 1.5em;
            padding: 0 20px;
            color: #333;
        }

        @keyframes marquee {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }
    </style>
</head>
<body>
    <!-- Card Blog -->
    <div class="flex justify-center">
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14">
            <!-- Grid -->
            <div class="grid sm:grid-cols- lg:grid-cols-4 gap-7">
                @foreach ($ticketNames as $ticket)
                <!-- Card -->
                <div class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl">
                    <div class="h-52 flex flex-col justify-center items-center bg-white rounded-t-xl">
                        <h3 class="text-6xl mt-20 font-medium text-gray-800">
                            {{ $ticket->ticket_number }}
                        </h3>
                        <hr class="bg-gray-200 h-px mx-1 mt-3">
                    </div>
                    <div class="p-4 md:p-6">
                        <span class="block mb-1 text-xl font-semibold uppercase text-green-500">
                            Next in Line
                        </span>
                        <h3 class="text-xl font-semibold text-gray-800">
                            Tellar 001
                        </h3>
                        <p class="mt-3 text-gray-500">
                            Assigned to: {{$user->name}}
                        </p>
                    </div>
                </div>
                <!-- End Card -->
                @endforeach
            </div>
            <!-- End Grid -->
        </div>
    </div>
    <!-- Marquee -->
    <div class="marquee-container">
        <div class="marquee">
            @foreach ($allTicketNames as $allTicketName)
                <span class="marquee-text">TICKE {{ $allTicketName->ticket_number }}</span>
            @endforeach
        </div>
    </div>
    <!-- End Marquee -->
</body>
</html>

