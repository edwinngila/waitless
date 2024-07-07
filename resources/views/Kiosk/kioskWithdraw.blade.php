<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 flex h-full items-center py-16">
  <!-- ========== MAIN CONTENT ========== -->
  <main id="content" class="w-full max-w-md mx-auto p-6">

    <div class="mt-7 bg-gray border border-gray-200 rounded-xl shadow-sm ">
      <div class="p-4 sm:p-7">
        <div class="text-center">
          <h1 class="block text-2xl font-bold text-gray-800">{{ $serviceName }}</h1>
          <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
            Please enter the details
          </p>
        </div>

        <div class="mt-5">
          <!-- Form -->
          <form action="" method="POST">
            @csrf
            <div class="grid gap-y-4">
                <input name="id" style="display: none;" value="{{ $id }}" type="text">
              <!-- Form Group -->
              <div>
                <label for="email" class="block text-sm mb-2 ">Full Name</label>
                <div class="relative">
                  <input type="fullName" id="fullName" name="fullName" class="py-3 px-4 block w-full border-gray-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none ">
                  <div class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                    <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"></path>
                    </svg>
                  </div>
                </div>
                <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid email address so we can get back to you</p>
              </div>

              <div>
                <label for="description" class="block text-sm mb-2 ">Description</label>
                <div class="relative">
                  <input type="text" id="Description" name="description" class="py-8 px-4 block w-full border-gray-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none " required="" aria-describedby="email-error">
                  <div class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                    <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"></path>
                    </svg>
                  </div>
                </div>
                <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid description</p>
              </div>
              <!-- End Form Group -->

              <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Print ticket </button>
            </div>
          </form>
          <!-- End Form -->
        </div>
      </div>
    </div>
  </main>
  <!-- ========== END MAIN CONTENT ========== -->

  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }

    gtag('js', new Date());
    gtag('config', 'G-B73TDMXKF5');
  </script>

</body>
</html>
