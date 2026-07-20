        <script>
            function addressManager() {
                return {
                    addresses: [
                        @foreach (auth()->user()?->addresses ?? [] as $addr)
                            {
                                id: {{ $addr->id }},
                                name: '{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}',
                                phone_number: '{{ $addr->phone_number }}',
                                address: '{{ $addr->address }}',
                                city: '{{ $addr->city }}',
                                state: '{{ $addr->state }}',
                                zip_code: '{{ $addr->zip_code }}',
                                is_default: {{ $addr->is_default ? 'true' : 'false' }}
                            }{{ !$loop->last ? ',' : '' }}
                        @endforeach
                    ],
                    viewState: 'EMPTY',
                    selectedAddressId: null,
                    editingId: null,
                    addressToDelete: null,
                    formData: {
                        phone_number: '',
                        address: '',
                        city: '',
                        state: '',
                        zip_code: ''
                    },

                    init() {
                        this.updateViewState();
                    },

                    formatPhone() {
                        // 1. Remove all non-digit characters
                        let cleaned = this.formData.phone_number.replace(/\D/g, '');
                        
                        // 2. Limit to max 10 digits (Cambodian numbers are 9 or 10 digits max)
                        cleaned = cleaned.substring(0, 10);
                        
                        // 3. Apply the spacing: xxx xxx xxxx
                        let match = cleaned.match(/^(\d{0,3})(\d{0,3})(\d{0,4})$/);
                        if (match) {
                            this.formData.phone_number = !match[2] ? match[1] 
                                : match[1] + ' ' + match[2] + (match[3] ? ' ' + match[3] : '');
                        }
                    },

                    updateViewState() {
                        if (this.addresses.length > 0) {
                            this.viewState = 'LIST';
                            if (!this.selectedAddressId || !this.addresses.find(a => a.id === this.selectedAddressId)) {
                                this.selectedAddressId = this.addresses[0].id;
                            }
                        } else {
                            this.viewState = 'EMPTY';
                            this.selectedAddressId = null;
                        }
                    },

                    openForm(address = null) {
                        if (address) {
                            this.editingId = address.id;
                            this.formData = {
                                ...address
                            };
                        } else {
                            this.editingId = null;
                            this.formData = {
                                phone_number: '',
                                address: '',
                                city: '',
                                state: '',
                                zip_code: ''
                            };
                        }
                        this.viewState = 'FORM';
                    },

                    goBack() {
                        if (this.addresses.length === 0) {
                            this.viewState = 'EMPTY';
                        } else {
                            this.viewState = 'LIST';
                        }
                    },

                    closeModalAndReset() {
                        closeModal('modal-address');
                        setTimeout(() => {
                            this.goBack();
                        }, 300);
                    },

                    promptDelete(id) {
                        this.addressToDelete = id;
                        this.viewState = 'DELETE_CONFIRM';
                    },

                    executeDelete() {
                        if (!this.addressToDelete) return;

                        // Send request to clear address from DB
                        fetch('{{ route('profile.update') }}', {
                            method: 'PATCH',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify({
                                inline_field: 'address',
                                address_id: this.addressToDelete,
                                delete: true
                            })
                        })
                        .then(async res => {
                            if (!res.ok) {
                                let errMsg = `HTTP ${res.status} ${res.statusText}`;
                                try {
                                    const errData = await res.json();
                                    errMsg = errData.message || errMsg;
                                } catch (e) {}
                                throw new Error(errMsg);
                            }
                            
                            this.addresses = this.addresses.filter(a => a.id !== this.addressToDelete);
                            this.addressToDelete = null;
                            this.selectedAddressId = null;
                            this.updateViewState();
                        })
                        .catch(error => {
                            console.error('Error deleting address:', error.message);
                            alert('An error occurred while trying to delete the address. Please try again.');
                        });
                    },

                    saveAddress() {
                        fetch('{{ route('profile.update') }}', {
                                method: 'PATCH',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Accept': 'application/json'
                                },
                                body: JSON.stringify({
                                    inline_field: 'address',
                                    address_id: this.editingId,
                                    phone_number: this.formData.phone_number,
                                    address: this.formData.address,
                                    city: this.formData.city,
                                    state: this.formData.state,
                                    zip_code: this.formData.zip_code
                                })
                            })
                            .then(response => {
                                if (!response.ok) throw new Error('Failed to save to database');
                                return response.json();
                            })
                            .then(data => {
                                const updatedAddress = {
                                    name: '{{ auth()->user()?->first_name }} {{ auth()->user()?->last_name }}',
                                    ...data.address
                                };

                                if (this.editingId) {
                                    const index = this.addresses.findIndex(a => a.id === this.editingId);
                                    if (index !== -1) this.addresses[index] = updatedAddress;
                                } else {
                                    this.addresses.push(updatedAddress);
                                }

                                this.selectedAddressId = updatedAddress.id;
                                this.updateViewState();
                            })
                            .catch(error => {
                                alert(
                                    'Error saving address to database. Please check your console or fillable model attributes.');
                                console.error(error);
                            });
                    },

                    confirmAddress() {
                        if (this.selectedAddressId) {
                            closeModal('modal-address');
                        }
                    }
                }
            }
        </script>
