<div class="space-y-4">
    <x-card border_top>
        <div class="flex items-center justify-between">
            <img class="w-14" src="/img/logo.png" alt="" />
            <div class="text-center">
                <p class="!font-semibold">Institución Educativa Privada SAGEDU</p>
                <p class="text-xs">Carret. Central Km 19.5 Ñaña. Telef. 6816300</p>
                <p class="text-xs">Fax. 618-6339 Castilla 3564 Lima 1, Perú.</p>
            </div>
            <i class="ml-3 fa-solid fa-coins text-4xl"></i>
        </div>
        <div class="py-1.5 bg-yellow-500 text-center text-white text-sm !font-medium -mx-3">
            Estado Financiero
        </div>
        <div class="grid grid-cols-2 gap-3 lg:grid-cols-4">
            <div>
                <p class="mb-1 text-xs text-center text-gray-600">Entidad:</p>
                <x-dropdown-custom :options="$entidad" :value="$selectedEntidad" :eventName="'entidadChanged'" />
            </div>
            <div>
                <p class="mb-1 text-xs text-center text-gray-600">Año:</p>
                <x-dropdown-custom :options="$años" :value="$selectedAño" :eventName="'añoChanged'" />
            </div>
            <div class="col-span-2 sm:col-span-1">
                <p class="mb-1 text-xs text-center text-gray-600">Alumno:</p>
                <x-dropdown-custom :options="$alumnos" :value="$selectedAlumno" :eventName="'alumnoChanged'" />
            </div>
            <div class="col-span-2 sm:col-span-1">
                <p class="invisible hidden mb-1 text-xs text-center text-gray-600 sm:block">Filtro:</p>
                <x-button-gradient color="none" class="!p-0 !bg-transparent !border-none !ring-0 !w-full">
                    <x-tag orden="5" class="!w-full !py-2.5 border border-yellow-500">
                        <i class="mr-2 fa-regular fa-eye fa-fw"></i>
                        FILTRAR
                    </x-tag>
                </x-button-gradient>
            </div>
            <div class="lg:col-start-2">
                <p class="mb-1 text-xs text-center text-gray-600">De:</p>
                <x-input-label disabled value="Enero" class="text-center bg-gray-100" />
            </div>
            <div>
                <p class="mb-1 text-xs text-center text-gray-600">Hasta:</p>
                <x-input-label disabled value="Diciembre" class="text-center bg-gray-100" />
            </div>
        </div>
        <x-card class="border border-zinc-200">
            <div class="flex flex-wrap items-center gap-6">
                <img class="rounded-full w-20 h-20 mx-auto sm:mx-0 border border-blue-900 object-cover p-0.5"
                    src="https://lamb-files.upeu.edu.pe/lamb-academic/general-secretay/fotodb/lPsmJyya9gLtMueL4Mpv8ETbnrkpXkIa1FXq0Bkp.jpg"
                    alt="" />
                <div class="space-y-2 text-xs">
                    <div class=" text-blue-900">
                        <i class="mr-2 fa-regular fa-user fa-fw"></i>
                        <span class="!font-medium mr-1">Alumno:</span>
                        <span class="text-black">Jose Manuel, Chunca Mamani</span>
                    </div>
                    <div class=" text-blue-900">
                        <i class="mr-2 fa-regular fa-credit-card fa-fw"></i>
                        <span class="!font-medium mr-1">DNI:</span>
                        <span class="text-black">48594859</span>
                    </div>
                    <div class=" text-blue-900">
                        <i class="mr-2 fa-regular fa-bookmark fa-fw"></i>
                        <span class="!font-medium mr-1">Nivel:</span>
                        <span class="text-black">Secundaria</span>
                    </div>
                    <div class=" text-blue-900">
                        <i class="mr-2 fa-regular fa-chess-rook fa-fw"></i>
                        <span class="!font-medium mr-1">Sección:</span>
                        <span class="text-black">3er grado - leones</span>
                    </div>
                </div>
                <div class="space-y-2 text-xs">
                    <div class=" text-blue-900">
                        <i class="mr-2 fa-solid fa-at fa-fw"></i>
                        <span class="!font-medium mr-1">Email:</span>
                        <span class="text-black">Jose Manuel, Chunca Mamani</span>
                    </div>
                    <div class=" text-blue-900">
                        <i class="mr-2 fa-solid fa-phone-volume fa-fw"></i>
                        <span class="!font-medium mr-1">Telef/cel:</span>
                        <span class="text-black">984253615</span>
                    </div>
                    <div class=" text-blue-900">
                        <i class="mr-2 fa-solid fa-user-tag fa-fw"></i>
                        <span class="!font-medium mr-1">Resp. Finan:</span>
                        <span class="text-black">Efrain Chunca Mamani</span>
                    </div>
                    <div class=" text-blue-900">
                        <i class="mr-2 fa-solid fa-phone-volume fa-fw"></i>
                        <span class="!font-medium mr-1">Tel R.F:</span>
                        <span class="text-black">997485922</span>
                    </div>
                </div>
            </div>
        </x-card>

        <x-card class="border border-zinc-200">
            <p class="text-xs text-center">Movimiento académico</p>
            <x-table-container>
                <x-table-thead>
                    <th class="px-2 py-1.5 font-normal">#</th>
                    <th class="px-2 py-1.5 font-normal">Fecha</th>
                    <th class="px-2 py-1.5 font-normal">Id</th>
                    <th class="px-2 py-1.5 font-normal">Mov</th>
                    <th class="px-2 py-1.5 font-normal">Documento</th>
                    <th class="px-2 py-1.5 font-normal">Glosa</th>
                    <th class="px-2 py-1.5 font-normal text-right">Débito</th>
                    <th class="px-2 py-1.5 font-normal text-right">Crédito</th>
                    <th class="px-2 py-1.5 font-normal text-center">PDF</th>
                </x-table-thead>
                <x-table-tbody class="!text-[0.688rem]">
                    <tr class="divide-x divide-gray-300 bg-red-100/70">
                        <td class="px-2 py-1">1</td>
                        <td class="px-2 py-1">24/02/2025</td>
                        <td class="px-2 py-1">11</td>
                        <td class="px-2 py-1">T500-00018711</td>
                        <td class="px-2 py-1">TRAN: T500-00018711</td>
                        <td class="px-2 py-1">Matrícula 2025-1</td>
                        <td class="px-2 py-1 text-right">575.00</td>
                        <td class="px-2 py-1 text-right">0.00</td>
                        <td class="px-2 py-1 text-center">
                            <i class="fa-solid fa-arrow-up-right-from-square fa-fw text-sky-500"></i>
                        </td>
                    </tr>
                    <tr class="divide-x divide-gray-300 bg-red-100/70">
                        <td class="px-2 py-1">2</td>
                        <td class="px-2 py-1">29/04/2025</td>
                        <td class="px-2 py-1">28</td>
                        <td class="px-2 py-1">T500-00018711</td>
                        <td class="px-2 py-1">DEP: 5040-00241341</td>
                        <td class="px-2 py-1">7124-5: Dep.-BCP- Op- 7508639 - 23/04/25-5040-241341-BECA CONTINUIDAD
                        </td>
                        <td class="px-2 py-1 text-right">0.00</td>
                        <td class="px-2 py-1 text-right">575.00</td>
                        <td class="px-2 py-1 text-center">
                            <i class="fa-solid fa-arrow-up-right-from-square fa-fw text-sky-500"></i>
                        </td>
                    </tr>
                    <tr class="divide-x divide-gray-300">
                        <td class="px-2 py-1">3</td>
                        <td class="px-2 py-1">24/02/2025</td>
                        <td class="px-2 py-1">11</td>
                        <td class="px-2 py-1">T500-00018712</td>
                        <td class="px-2 py-1">TRAN: T500-00018712</td>
                        <td class="px-2 py-1">1ra armada 2025-1</td>
                        <td class="px-2 py-1 text-right">920.00</td>
                        <td class="px-2 py-1 text-right">0.00</td>
                        <td class="px-2 py-1 text-center">
                            <i class="fa-solid fa-arrow-up-right-from-square fa-fw text-sky-500"></i>
                        </td>
                    </tr>
                    <tr class="divide-x divide-gray-300">
                        <td class="px-2 py-1">4</td>
                        <td class="px-2 py-1">29/04/2025</td>
                        <td class="px-2 py-1">28</td>
                        <td class="px-2 py-1">T500-00018712</td>
                        <td class="px-2 py-1">DEP: 5040-00241341</td>
                        <td class="px-2 py-1">7124-5: Dep.-BCP- Op- 7508639 - 23/04/25-5040-241341-BECA CONTINUIDAD
                        </td>
                        <td class="px-2 py-1 text-right">0.00</td>
                        <td class="px-2 py-1 text-right">920.00</td>
                        <td class="px-2 py-1 text-center">
                            <i class="fa-solid fa-arrow-up-right-from-square fa-fw text-sky-500"></i>
                        </td>
                    </tr>
                    <tr class="divide-x divide-gray-300">
                        <td colSpan="6" class="px-2 py-1 text-right">Sumas:</td>
                        <td class="px-2 py-1 text-right bg-gray-100">1495.00</td>
                        <td class="px-2 py-1 text-right bg-gray-100">1495.00</td>
                        <td class="px-2 py-1 text-center">
                        </td>
                    </tr>
                    <tr class="divide-x divide-gray-400">
                        <td colSpan="6" class="px-2 py-1 text-right !font-medium">Saldo final:</td>
                        <td class="px-2 py-1 text-right bg-gray-300 !font-medium">0.00</td>
                        <td class="px-2 py-1 text-right bg-gray-300 !font-medium">0.00</td>
                        <td class="px-2 py-1 text-center">
                        </td>
                    </tr>
                </x-table-tbody>
            </x-table-container>
        </x-card>
    </x-card>
</div>
