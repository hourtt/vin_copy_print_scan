            <!-- VIEW 2: LIST STATE -->
            <div x-show="viewState === 'LIST'" x-cloak class="space-y-4">
                <div class="space-y-3 max-h-[50vh] overflow-y-auto pr-1">
                    <template x-for="addr in addresses" :key="addr.id">
                        <div @click="selectedAddressId = addr.id"
                            class="relative flex items-start gap-3 p-4 rounded-xl border-2 cursor-pointer transition-all duration-200"
                            :class="selectedAddressId === addr.id ? 'border-indigo-600 bg-indigo-50/50' :
                                'border-gray-200 bg-white hover:border-gray-300'">

                            <!-- Radio -->
                            <div class="flex items-center h-5 mt-0.5">
                                <input type="radio" :name="'address_selection'" :value="addr.id"
                                    x-model="selectedAddressId"
                                    class="w-4 h-4 text-indigo-600 bg-white border-gray-300 focus:ring-indigo-600 focus:ring-2">
                            </div>

                            <!-- Body -->
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-2 mb-1">
                                    <span class="font-semibold text-gray-900 text-sm truncate"
                                        x-text="addr.name || 'User'"></span>
                                    <span class="text-gray-400 text-xs">•</span>
                                    <span class="text-gray-600 text-sm" x-text="addr.phone_number"></span>
                                    <template x-if="addr.is_default">
                                        <span
                                            class="ml-2 inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800">[Default]</span>
                                    </template>
                                </div>
                                <div class="text-sm text-gray-500 leading-relaxed truncate">
                                    <span x-text="addr.address"></span>, <span x-text="addr.city"></span>, <span
                                        x-text="addr.state"></span> <span x-text="addr.zip_code"></span>
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="flex items-center gap-1 ml-4">
                                <button @click.stop="openForm(addr)"
                                    class="p-2 text-gray-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors"
                                    aria-label="Edit">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </button>
                                <button @click.stop="promptDelete(addr.id)"
                                    class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors"
                                    aria-label="Delete">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </template>
                </div>

                <button @click="openForm()" type="button"
                    class="w-full flex justify-center items-center gap-2 py-3 px-4 border-2 border-dashed border-gray-300 text-sm font-medium rounded-xl text-gray-600 bg-white hover:bg-gray-50 hover:text-indigo-600 hover:border-indigo-300 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Add New Address
                </button>

                <div class="mt-6 flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
                    <button type="button"
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors"
                        onclick="closeModal('modal-address')">Cancel</button>
                    <button @click="confirmAddress()" type="button"
                        class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors"
                        :disabled="!selectedAddressId"
                        :class="{ 'opacity-50 cursor-not-allowed': !selectedAddressId }">Deliver Here</button>
                </div>
            </div>
