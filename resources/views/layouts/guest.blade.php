<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-[Poppins] text-slate-900 antialiased">
        <div class="relative min-h-screen overflow-hidden bg-slate-950">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(251,191,36,0.28),_transparent_35%),linear-gradient(135deg,_rgba(15,23,42,0.96),_rgba(30,41,59,0.9))]"></div>
            <div class="absolute inset-0 opacity-20" style="background-image: linear-gradient(rgba(255,255,255,0.08) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.08) 1px, transparent 1px); background-size: 42px 42px;"></div>

            <div class="relative mx-auto flex min-h-screen max-w-6xl items-center justify-center px-4 py-10 sm:px-6 lg:px-8">
                <div class="grid w-full max-w-5xl gap-8 lg:grid-cols-[1.1fr_0.9fr] lg:items-center">
                    <div class="hidden text-white lg:block">
                        <a href="/" class="inline-flex items-center gap-4">
                            <span class="flex h-16 w-16 items-center justify-center rounded-2xl bg-white/10 ring-1 ring-white/20 backdrop-blur">
                                <x-application-logo class="h-10 w-10 fill-current text-amber-300" />
                            </span>
                            <span>
                                <span class="block text-sm uppercase tracking-[0.35em] text-amber-200/80">Festival</span>
                                <span class="block text-3xl font-semibold tracking-[0.08em]">Layangan SMEA</span>
                            </span>
                        </a>

                        <div class="mt-10 max-w-xl">
                            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-amber-300/90">Portal Peserta, Juri, dan Admin</p>
                            <h1 class="mt-4 text-5xl font-semibold leading-tight">Masuk ke sistem festival dengan tampilan Breeze yang lebih mudah Anda kustom.</h1>
                            <p class="mt-6 max-w-lg text-base leading-7 text-slate-200/85">
                                Halaman login dan register sekarang berbagi layout yang sama, jadi perubahan desain auth bisa Anda lakukan dari satu tempat.
                            </p>
                        </div>
                    </div>

                    <div class="w-full">
                        <div class="overflow-hidden rounded-[28px] border border-white/20 bg-white/95 shadow-2xl shadow-slate-950/30 backdrop-blur">
                            <div class="border-b border-slate-200 bg-slate-50/80 px-6 py-5 sm:px-8 lg:hidden">
                                <a href="/" class="inline-flex items-center gap-3">
                                    <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-slate-900 text-amber-300">
                                        <x-application-logo class="h-7 w-7 fill-current" />
                                    </span>
                                    <span>
                                        <span class="block text-xs font-semibold uppercase tracking-[0.3em] text-slate-500">Festival</span>
                                        <span class="block text-lg font-semibold text-slate-900">Layangan SMEA</span>
                                    </span>
                                </a>
                            </div>

                            <div class="px-6 py-8 sm:px-8">
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
