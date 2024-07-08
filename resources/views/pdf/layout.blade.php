<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Receipt</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 flex h-full items-center py-16">
  <!-- ========== MAIN CONTENT ========== -->
  <main id="content" class="w-full max-w-md mx-auto p-6">

    <div class="mt-7 bg-white border border-gray-200 rounded-xl shadow-sm ">
      <div class="p-4 sm:p-7">
        <div class="text-center">
          <h3 class="block text-lg font-bold text-gray-800">Kindly wait for your turn!</h3>
          <h3 class="block text-xl font-bold text-gray-800 mt-5">Nairobi Branch</h3>


          <h3 class="block text-xl font-bold text-gray-800 mt-16">Service ID</h3>

          <h4 class="text-5xl mt-10 font-bold text-gray-800">
            {{ $service_id }}
          </h4>

          <h3 class="block text-xl font-bold text-gray-800 mt-16">Ticket Number</h3>

          <h4 class="text-5xl mt-10 font-bold text-gray-800">
            {{ $ticket_number }}
          </h4>

          <h3 class="block text-xl font-bold text-gray-800 mt-16">Customer Name</h3>

          <h4 class="text-5xl mt-10 font-bold text-gray-800">
            {{ $customer_name }}
          </h4>

          <h3 class="block text-2xl font-bold text-gray-800 mt-16">Please proceed to counter</h3>
          <h3 class="text-3xl mt-10 font-bold text-gray-800">
              03
          </h3>

        </div>
      </div>
    </div>
  </main>
  <!-- ========== END MAIN CONTENT ========== -->
</body>
</html>
