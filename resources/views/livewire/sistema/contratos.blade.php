<div class="space-y-4">
    <x-card borderTop>
        <div class="flex items-center justify-between">
            <img class="w-14" src="/img/logo.png" alt="" />
            <div class="text-center">
                <p class="!font-semibold">Universidad Peruana Unión</p>
                <p class="text-xs">Carret. Central Km 19.5 Ñaña. Telef. 6816300</p>
                <p class="text-xs">Fax. 618-6339 Castilla 3564 Lima 1, Perú.</p>
            </div>
            <i class="ml-3 fa-solid fa-file-lines text-4xl"></i>
        </div>
        <div class="py-1.5 bg-sky-500 text-center text-white text-sm !font-medium -mx-3">
            Contratos Académicos
        </div>
        <div class="grid gap-3 lg:grid-cols-3">
            <div>
                <p class="mb-1 text-xs text-center text-gray-600">Periodo:</p>
                <x-dropdown-custom :options="$periodos" :value="$selectedPeriodo" :eventName="'periodoChanged'" />
            </div>
            <div>
                <p class="mb-1 text-xs text-center text-gray-600">Contrato:</p>
                <x-dropdown-custom :options="$contratos" :value="$selectedContrato" :eventName="'contratoChanged'" />
            </div>
        </div>
        <div class="grid grid-cols-2 gap-3 lg:grid-cols-7">
            <x-card borderTop title="Información" class="col-span-2">
                <div class="relative flex justify-center">
                    <div class="absolute top-0 right-0">
                        <x-tag orden="9">
                            1
                        </x-tag>
                    </div>
                    <img class="rounded-full w-20 h-20 border border-blue-900 object-cover p-0.5"
                        src="https://lamb-files.upeu.edu.pe/lamb-academic/general-secretay/fotodb/lPsmJyya9gLtMueL4Mpv8ETbnrkpXkIa1FXq0Bkp.jpg"
                        alt="" />
                </div>
                <div class="space-y-1 text-xs">
                    <div class=" text-blue-950">
                        <i class="mr-2 fa-regular fa-user fa-fw"></i>
                        <span class="!font-medium mr-1">Nombre:</span>
                        <span class="text-black">Jose Manuel, Chunca Mamani</span>
                    </div>
                    <div class=" text-blue-950">
                        <i class="mr-2 fa-regular fa-credit-card fa-fw"></i>
                        <span class="!font-medium mr-1">DNI:</span>
                        <span class="text-black">48594859</span>
                    </div>
                    <div class=" text-blue-950">
                        <i class="mr-2 fa-regular fa-bookmark fa-fw"></i>
                        <span class="!font-medium mr-1">Nivel:</span>
                        <span class="text-black">Secundaria</span>
                    </div>
                    <div class=" text-blue-950">
                        <i class="mr-2 fa-regular fa-chess-rook fa-fw"></i>
                        <span class="!font-medium mr-1">Sección:</span>
                        <span class="text-black">3er grado - leones</span>
                    </div>
                </div>
            </x-card>
            <x-card borderTop title="Contratos generados" class="col-span-2 lg:col-span-5">
                <x-table-container>
                    <x-table-thead>
                        <x-table-th class="!py-1">#</x-table-th>
                        <x-table-th class="!py-1 text-center">Contrato/responsable</x-table-th>
                        <x-table-th class="!py-1 text-center">Matrícula</x-table-th>
                        <x-table-th class="!py-1 text-center">Mensualidad</x-table-th>
                        <x-table-th class="!py-1 text-center">PDF</x-table-th>
                        <x-table-th class="!py-1"></x-table-th>
                    </x-table-thead>
                    <x-table-tbody>
                        <tr class="hover:bg-gray-100">
                            <x-table-td class="!py-1">
                                1
                            </x-table-td>
                            <x-table-td class="!py-1">
                                <div>
                                    <p class="text-black !font-normal">Regular 2025-1-2160008</p>
                                    <p class="text-[0.688rem] pl-3">
                                        <i class="fa-solid fa-chevron-right mr-1 text-[0.565rem]"></i>
                                        Juan Diego Aguilar Contreras
                                    </p>

                                </div>
                            </x-table-td>
                            <x-table-td class="!py-1 text-center">120.00</x-table-td>
                            <x-table-td class="!py-1 text-center">150.00</x-table-td>
                            <x-table-td class="!py-1 text-center">
                                <x-button-gradient color="none"
                                    class="!px-2 !py-1 !bg-transparent !border-none !ring-0 !text-gray-600 !text-xs"
                                    wire:click="abrir()">
                                    <img class="w-8 mr-1" src="/img/pdf_icon.svg" alt="" /> Ver
                                </x-button-gradient>
                            </x-table-td>
                            <x-table-td class="!py-1">
                                <i class="fa-regular fa-circle-check fa-lg fa-fw text-sky-400"></i>
                            </x-table-td>
                        </tr>
                        <tr class="hover:bg-gray-100">
                            <x-table-td class="!py-1">
                                2
                            </x-table-td>
                            <x-table-td class="!py-1">
                                <div>
                                    <p class="text-black !font-normal">Regular 2024-2-2160009</p>
                                    <p class="text-[0.688rem] pl-3">
                                        <i class="fa-solid fa-chevron-right mr-1 text-[0.565rem]"></i>
                                        Juan Diego Aguilar Contreras
                                    </p>
                                </div>
                            </x-table-td>
                            <x-table-td class="!py-1 text-center">98.00</x-table-td>
                            <x-table-td class="!py-1 text-center">115.00</x-table-td>
                            <x-table-td class="!py-1 text-center">
                                <x-button-gradient color="none"
                                    class="!px-2 !py-1 !bg-transparent !border-none !ring-0 !text-gray-600 !text-xs"
                                    wire:click="abrir()">
                                    <img class="w-8 mr-1" src="/img/pdf_icon.svg" alt="" /> Ver
                                </x-button-gradient>
                            </x-table-td>
                            <x-table-td class="!py-1">
                                <i class="fa-regular fa-circle-check fa-lg fa-fw text-sky-400"></i>
                            </x-table-td>
                        </tr>
                    </x-table-tbody>
                </x-table-container>
            </x-card>
        </div>
    </x-card>

    @include('livewire.sistema.modal.contrato')
</div>
