            <!-- VIEW 1: EMPTY STATE -->
            <div x-show="viewState === 'EMPTY'" x-cloak>
                <div @click="openForm()"
                    class="w-full py-12 px-6 flex flex-col items-center justify-center border-2 border-dashed border-gray-300 rounded-xl bg-gray-50 hover:bg-gray-100 hover:border-gray-400 cursor-pointer transition-colors group">
                    <div
                        class="w-12 h-12 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-1">Add Delivery Address</h3>
                    <p class="text-sm text-gray-500 text-center">You haven't saved any addresses yet.</p>
                </div>
                <div class="mt-6 flex items-center justify-end pt-4 border-t border-gray-100">
                    <button type="button"
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors"
                        onclick="closeModal('modal-address')">Cancel</button>
                </div>
            </div>
