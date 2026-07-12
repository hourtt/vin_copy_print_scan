{{-- Single-address form that saves directly to the users table --}}
<x-profiles.modal id="modal-address" title="Delivery Address">
    <div class="font-['DM_Sans',sans-serif]">

        {{-- Success Toast --}}
        @if (session('status') === 'profile-updated' && session('inline_field') === 'address')
            <div
                class="flex items-center gap-2 px-4 py-2.5 mb-4 rounded-lg bg-emerald-50 border border-emerald-200 text-emerald-700 text-sm font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2.5">
                    <polyline points="20 6 9 17 4 12" />
                </svg>
                Address updated successfully!
            </div>
        @endif

        {{-- Validation Errors --}}
        @if ($errors->any() && session('inline_field') === 'address')
            <div class="mb-4 p-3 rounded-lg bg-red-50 border border-red-200">
                <ul class="list-disc list-inside text-sm text-red-600 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')
            <input type="hidden" name="inline_field" value="address">

            <div class="space-y-4">
                {{-- Phone Number --}}
                <div class="relative w-full">
                    <input type="tel" name="phone_number" placeholder=" "
                        value="{{ old('phone_number', auth()->user()->phone_number) }}"
                        class="block px-3 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-white rounded-md border border-gray-300 appearance-none focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 peer" />
                    <label
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-3 bg-white px-1 peer-focus:text-indigo-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">
                        Phone Number
                    </label>
                </div>

                {{-- Street Address --}}
                <div class="relative w-full">
                    <input type="text" name="address" placeholder=" " required
                        value="{{ old('address', auth()->user()->address) }}"
                        class="block px-3 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-white rounded-md border border-gray-300 appearance-none focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 peer" />
                    <label
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-3 bg-white px-1 peer-focus:text-indigo-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">
                        Street Address
                    </label>
                </div>

                {{-- City + State row --}}
                <div class="grid grid-cols-2 gap-3">
                    <div class="relative w-full">
                        <input type="text" name="city" placeholder=" " required
                            value="{{ old('city', auth()->user()->city) }}"
                            class="block px-3 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-white rounded-md border border-gray-300 appearance-none focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 peer" />
                        <label
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-3 bg-white px-1 peer-focus:text-indigo-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">
                            City
                        </label>
                    </div>
                    <div class="relative w-full">
                        <input type="text" name="state" placeholder=" "
                            value="{{ old('state', auth()->user()->state) }}"
                            class="block px-3 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-white rounded-md border border-gray-300 appearance-none focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 peer" />
                        <label
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-3 bg-white px-1 peer-focus:text-indigo-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">
                            State
                        </label>
                    </div>
                </div>

                {{-- Zip Code --}}
                <div class="relative w-full" style="max-width: 180px;">
                    <input type="text" name="zip_code" placeholder=" "
                        value="{{ old('zip_code', auth()->user()->zip_code) }}"
                        class="block px-3 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-white rounded-md border border-gray-300 appearance-none focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 peer" />
                    <label
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-3 bg-white px-1 peer-focus:text-indigo-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">
                        Zip Code
                    </label>
                </div>
            </div>

            <div class="profile-form-actions">
                <button type="button" class="profile-btn-secondary"
                    onclick="closeModal('modal-address')">Cancel</button>
                <button type="submit" class="profile-btn-primary">Save Address</button>
            </div>
        </form>
    </div>
</x-profiles.modal>
