            <!-- VIEW 4: DELETE CONFIRM STATE -->
            <div x-show="viewState === 'DELETE_CONFIRM'" x-cloak>
                <div class="py-8 px-6 flex flex-col items-center justify-center text-center">
                    <div class="w-12 h-12 rounded-full bg-red-100 text-red-600 flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Remove Address?</h3>
                    <p class="text-sm text-gray-500 mb-6">Are you sure you want to delete this delivery address? This action cannot be undone.</p>
                    
                    <div class="w-full flex items-center gap-3 justify-center">
                        <button type="button" @click="goBack()"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors w-full sm:w-auto">
                            Cancel
                        </button>
                        <button type="button" @click="executeDelete()"
                            class="px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors w-full sm:w-auto">
                            Yes, Remove
                        </button>
                    </div>
                </div>
            </div>
