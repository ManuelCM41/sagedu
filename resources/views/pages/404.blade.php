<x-layouts.app>
    <div class="m-auto h-full flex flex-col justify-center items-center">
        <div class="text-center px-4">
            <img class="mx-auto" style="width: 15rem" src="{{ asset('img/404_illustration.svg') }}"
                alt="404 illustration" />
            <div class="mb-6">Hmm...esta página no existe. Intenta buscar otra cosa!</div>
            <a href="{{ route('dashboard') }}"
                class="px-3 py-1 rounded-full text-white text-sm bg-blue-900 hover:bg-blue-950 active:bg-blue-900">
                Volver a inicio
            </a>
        </div>
    </div>
</x-layouts.app>
