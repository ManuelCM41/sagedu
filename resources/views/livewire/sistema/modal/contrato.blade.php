<x-modal wire:model="abrirContrato" maxWidth="7xl" heightRem="80rem" bgColor="bg-[#3C3C3C]">
    <x-slot:title>
        <div class='flex gap-2 text-xs'>
            <div class='uppercase '>
                <span class='!font-semibold text-lg'>Contrato alumno</span>
                <p>Documento</p>
            </div>
        </div>
    </x-slot:title>

    <iframe src="/img/contrato_2024-2.pdf" title="Vista previa del PDF" width="100%" style="height: calc(100vh - 13rem);"
        class="border-none rounded-md">
    </iframe>

    <x-slot:footer>
        <button @click="openModal = false" wire:loading.attr="disabled"
            class="px-4 py-2.5 mr-1 text-xs font-medium text-red-500 uppercase transition-all rounded-lg middle none center hover:bg-red-500/10 active:bg-red-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none hover:cursor-pointer">
            Cancelar
        </button>
    </x-slot:footer>
</x-modal>
