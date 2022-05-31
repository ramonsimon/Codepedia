<link rel="stylesheet" href="{{ asset('css/app.css') }}">


<!-- This example requires Tailwind CSS v2.0+ -->
<!--
  This example requires updating your template:

  ```
  <html class="h-full">
  <body class="h-full">
  ```
-->
<div class="flex h-full justify-center items-center bg-gray-800">
    <div class="min-h-full pt-16 pb-12 flex flex-col">
      <main class="flex-grow flex flex-col justify-center max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex-shrink-0 flex justify-center">
          <a href="{{ route('index') }}" class="inline-flex">
            <img class="h-32 w-auto" src="{{ asset('codepedia_logo.png') }}" alt="">
          </a>
        </div>
        <div class="py-16">
          <div class="text-center">
            <p class="text-sm font-semibold text-amber-600 uppercase tracking-wide">404 error</p>
            <h1 class="mt-2 text-4xl font-extrabold text-gray-200 tracking-tight sm:text-5xl">Pagina niet gevonden.</h1>
            <p class="mt-2 text-base text-gray-300">Sorry, deze pagina bestaat niet.</p>
            <div class="mt-6">
              <a href="{{ route('index') }}" class="text-base font-medium text-amber-600 hover:text-indigo-500">Terug naar homepagina<span aria-hidden="true"> &rarr;</span></a>
            </div>
          </div>
        </div>
      </main>
    </div>
</div>
