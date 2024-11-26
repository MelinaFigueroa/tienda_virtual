<!-- Modal de Confirmación para Eliminar -->
<div id="deleteModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
            <div>
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                    <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
                <div class="mt-3 text-center sm:mt-5">
                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="delete-modal-title">Confirmar Eliminación</h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-500" id="delete-modal-message">¿Estás seguro de que deseas eliminar este producto? Esta acción no se puede deshacer.</p>
                    </div>
                </div>
            </div>
            <div class="mt-5 sm:mt-6 flex justify-between space-x-2">
                <!-- Botón de Confirmar -->
                <button type="button" id="deleteConfirmButton" class="w-full rounded-md bg-red-600 text-white px-4 py-2 font-medium hover:bg-red-700 focus:outline-none sm:text-sm">
                    Eliminar
                </button>
                <!-- Botón de Cancelar -->
                <button type="button" id="deleteCancelButton" class="w-full rounded-md bg-gray-300 text-gray-700 px-4 py-2 font-medium hover:bg-gray-400 focus:outline-none sm:text-sm">
                    Cancelar
                </button>
            </div>
        </div>
    </div>
</div>