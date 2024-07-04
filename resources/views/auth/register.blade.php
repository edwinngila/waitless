<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black">
    <main id="content" class="w-full max-w-md mx-auto p-1 ">

        <div class="mt-1 bg-black rounded-xl shadow-sm">
          <div class="p-4 sm:p-7">
            <div class="text-center">
                <span class="bg-clip-text bg-gradient-to-tr from-blue-600 to-purple-400 text-transparent">WaitLess</span>
              <p class="mt-2 text-sm text-gray-600">
                Register a new Staff
              </p>
            </div>

            <div class="mt-5">

              <!-- Form -->
              <form method="post" action="{{ route('register') }}">
                @csrf
                <div class="grid gap-y-4">
                  <!-- Form Group -->
                  <div>
                    <label for="email" class="block text-sm text-white mb-2 ">Full Names</label>
                    <div class="relative">
                        <input name="name" type="text" id="hs-cover-with-gradient-form-name-1" class="py-3 ps-11 pe-4 block w-full bg-white/10 border-white/20 text-white placeholder:text-white rounded-lg text-sm focus:border-white/30 focus:ring-white/30 sm:p-4 sm:ps-11 @error('name')  is-invalid @enderror" placeholder="Full name">
                      {{-- <input type="email" id="email" name="email" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" required aria-describedby="email-error"> --}}
                      <div class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                        <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                        </svg>
                      </div>
                      @error('name')
                       <span class="error invalid-feedback text-white">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <!-- End Form Group -->

                      <!-- Form Group -->
                  <div>
                    <label for="email" class="block text-sm text-white mb-2">Email address</label>
                    <div class="relative">
                      {{-- <input type="email" id="email" name="email" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" required aria-describedby="email-error"> --}}
                      <input name="email" type="text" id="hs-cover-with-gradient-form-name-1" class="py-3 ps-11 pe-4 block w-full bg-white/10 border-white/20 text-white placeholder:text-white rounded-lg text-sm focus:border-white/30 focus:ring-white/30 sm:p-4 sm:ps-11 @error('email') is-invalid @enderror" placeholder="Email">
                      <div class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                        <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                        </svg>
                      </div>
                        @error('email')
                            <span class="error invalid-feedback text-white">{{ $message }}</span>
                        @enderror
                    </div>
                    <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid email address so we can get back to you</p>
                  </div>
                  <!-- End Form Group -->

                  <!-- Form Group -->
                  <div>
                    <label for="password" class="block text-sm text-white mb-2">Password</label>
                    <div class="relative">
                      {{-- <input type="password" id="password" name="password" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" required aria-describedby="password-error"> --}}
                      <input name="password" type="password" id="hs-cover-with-gradient-form-email-1" class="py-3 ps-11 pe-4 block w-full bg-white/10 border-white/20 text-white placeholder:text-white rounded-lg text-sm focus:border-white/30 focus:ring-white/30 sm:p-4 sm:ps-11 @error('password') is-invalid @enderror" placeholder="Password
                      ">
                      <div class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                        <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                        </svg>
                      </div>
                        @error('password')
                            <span class="error invalid-feedback text-white">{{ $message }}</span>
                        @enderror
                    </div>
                    <p class="hidden text-xs text-red-600 mt-2" id="password-error">8+ characters required</p>
                  </div>
                  <!-- End Form Group -->

                  <!-- Form Group -->
                  <div>
                    <label for="confirm-password" class="block text-sm text-white mb-2">Confirm Password</label>
                    <div class="relative">
                      {{-- <input type="password" id="confirm-password" name="confirm-password" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" required aria-describedby="confirm-password-error"> --}}
                      <input name="password_confirmation" type="password" id="hs-cover-with-gradient-form-email-1" class="py-3 ps-11 pe-4 block w-full bg-white/10 border-white/20 text-white placeholder:text-white rounded-lg text-sm focus:border-white/30 focus:ring-white/30 sm:p-4 sm:ps-11 @error('password') is-invalid @enderror" placeholder="Password
                      ">
                      <div class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                        <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                        </svg>
                      </div>
                      @error('password_confirmation')
                            <span class="error invalid-feedback text-white">{{ $message }}</span>
                        @enderror
                    </div>
                    <p class="hidden text-xs text-red-600 mt-2" id="confirm-password-error">Password does not match the password</p>
                  </div>
                  <!-- End Form Group -->

                  <!-- Checkbox -->
                  <div class="flex items-center">
                    <div class="flex">
                      <input id="remember-me" name="remember-me" type="checkbox" class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500">
                    </div>
                    <div class="ms-3">
                      <label for="remember-me" class="text-sm text-white">I accept the <a class="text-blue-600 decoration-2 hover:underline font-medium" href="#">Terms and Conditions</a></label>
                    </div>
                  </div>
                  <!-- End Checkbox -->
                    <button type="submit" class="sm:p-4 py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-gradient-to-tr from-blue-600 to-purple-400 bg-white/10 text-white hover:bg-white/20 disabled:opacity-50 disabled:pointer-events-none">
                    Login
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                    </button>
                </div>
              </form>
              <!-- End Form -->
            </div>
          </div>
        </div>
            <p class="mt-3 flex justify-center items-center text-center divide-x divide-gray-300 dark:divide-neutral-700">
              <a class="pe-3.5 inline-flex items-center gap-x-2 text-sm text-gray-600 decoration-2 hover:underline hover:text-blue-600 dark:text-neutral-500 dark:hover:text-neutral-200" href="{{ route('login') }}">
                <svg class="size-2.5" width="16" height="16" viewBox="0 0 16 16" fill="none">
                  <path d="M11.2792 1.64001L5.63273 7.28646C5.43747 7.48172 5.43747 7.79831 5.63273 7.99357L11.2792 13.64" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                </svg>
                I already have a membership
              </a>
            </p>
          </main>
</body>
</html>
