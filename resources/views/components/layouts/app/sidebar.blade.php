<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-gradient-to-tr to-[#000041] from-blue-950 " :class="{ 'sidebar-expanded': sidebarExpanded }"
    x-data="{ sidebarExpanded: localStorage.getItem('sidebar-expanded') == 'true', }" x-init="$watch('sidebarExpanded', value => localStorage.setItem('sidebar-expanded', value));">

    <x-partials.admin.navbar />

    <div class="flex h-[calc(100dvh-4.5rem)] relative">

        <x-partials.admin.sidebar />

        <div class="flex-1 pb-1.5 px-1.5 lg:pr-1.5 lg:pl-0 overflow-auto">
            <div class="h-full overflow-auto rounded-lg">
                <div class="relative flex flex-col w-auto h-full overflow-y-auto bg-gray-200 custom-scrollbar2"
                    style="background: #e5e7eb url({{ asset('/img/bg.png') }}) repeat">
                    <main class="grow p-4 space-y-4 z-1">
                        {{ $slot }}
                    </main>

                    <div class="">
                        @include('partials.admin.footer')
                    </div>
                </div>
                <img class="absolute z-0 w-40 right-4 bottom-3" src="{{ asset('/img/logo.png') }}" alt="" />
            </div>
        </div>
    </div>

    @fluxScripts

    <x-toaster-hub />

</body>

</html>
