<div>
    <div class="max-w-6xl mx-auto bg-white shadow-md rounded-lg p-6">

        <!-- Success/Error Messages -->
        @if (session()->has('success'))
            <div class="bg-green-500 text-white p-3 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif 

        @if (session()->has('error'))
            <div class="bg-red-500 text-white p-3 rounded-md mb-4">
                {{ session('error') }}
            </div>
        @endif

        <!-- Add Button -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-700">{{ __('User List') }}</h2>
            <x-primary-button wire:click="openAddModal"  class="bg-primary-600 hover:bg-primary-600 hover">{{ __('Add New User') }}</x-primary-button>
        </div>

        <!-- User Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-2 px-4 text-left text-sm font-semibold text-gray-600">Name</th>
                        <th class="py-2 px-4 text-left text-sm font-semibold text-gray-600">Email</th>
                        <th class="py-2 px-4 text-left text-sm font-semibold text-gray-600">User Type</th>
                        <th class="py-2 px-4 text-left text-sm font-semibold text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr class="border-t border-gray-200">
                            <td class="py-2 px-4">{{ $user->name }}</td>
                            <td class="py-2 px-4">{{ $user->email }}</td>
                            <td class="py-2 px-4">{{ $user->user_type }}</td>
                            <td class="py-2 px-4">
                            <!-- Edit Button -->
                            <button wire:click="editUser({{ $user->id }})" class="text-blue-600 hover:text-blue-800 p-1" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 113 3L12 15l-4 1 1-4 9.5-9.5z" />
                                </svg>
                            </button>

                            <!-- Delete Button -->
                            <button wire:click="confirmDelete({{ $user->id }})" class="text-red-600 hover:text-red-800 p-1" title="Delete">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>

                            <!-- Reset Password Button -->
                            <button wire:click="confirmResetPassword({{ $user->id }})" class="text-yellow-500 hover:text-yellow-600 p-1" title="Reset Password">
                            <svg id='Reset_24' width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>
                                <g transform="matrix(0.83 0 0 0.83 12 12)" >
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" translate(-15, -15)" d="M 15 3 C 8.3845336 3 3 8.3845336 3 15 C 3 21.615466 8.3845336 27 15 27 C 21.615466 27 27 21.615466 27 15 C 27.005100289545485 14.63936408342243 26.815624703830668 14.303918635428394 26.50412715028567 14.122112278513484 C 26.19262959674067 13.940305921598572 25.80737040325933 13.940305921598572 25.49587284971433 14.122112278513484 C 25.184375296169332 14.303918635428394 24.994899710454515 14.63936408342243 25 15 C 25 20.534534 20.534534 25 15 25 C 9.4654664 25 5 20.534534 5 15 C 5 9.4654664 9.4654664 5 15 5 C 17.511974 5 19.790481 5.9310235 21.544922 7.4550781 L 19 10 L 25 10 L 25 4 L 22.960938 6.0390625 C 20.840494 4.1553732 18.053851 3 15 3 z" stroke-linecap="round" />
                                </g>
                                </svg>
                            </button>




                            </td>
                        </tr>   
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-gray-500">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add User Modal -->
    <x-modal wire:model="showAddModal">
        <x-slot name="title">Add New User</x-slot>

        <div class="space-y-4">
            <x-input-label for="name" value="Name" />
            <x-text-input wire:model="name" id="name" type="text" class="w-full" />
            <x-input-error :messages="$errors->get('name')" />

            <x-input-label for="email" value="Email" />
            <x-text-input wire:model="email" id="email" type="email" class="w-full" />
            <x-input-error :messages="$errors->get('email')" />

            <x-input-label for="password" value="Password" />
            <x-text-input wire:model="password" id="password" type="password" class="w-full" />
            <x-input-error :messages="$errors->get('password')" />

            <x-input-label for="password_confirmation" value="Confirm Password" />
            <x-text-input wire:model="password_confirmation" id="password_confirmation" type="password" class="w-full" />
            <x-input-error :messages="$errors->get('password_confirmation')" />
        </div>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('showAddModal', false)" >Cancel</x-secondary-button>
            <x-primary-button wire:click="addUser" class="bg-primary-600" >Save</x-primary-button>
        </x-slot>
    </x-modal>

    <!-- Edit User Modal -->
    <x-modal wire:model="showEditModal">
    <x-slot name="title">Edit User</x-slot>

    <div class="space-y-4">
    <x-input-label for="edit_name" value="Name" />
    <x-text-input wire:model="editingUser.name" id="edit_name" type="text" class="w-full" />

    <x-input-label for="edit_email" value="Email" />
    <x-text-input wire:model="editingUser.email" id="edit_email" type="email" class="w-full" />

    </div>

    <x-slot name="footer">
        <x-secondary-button wire:click="$set('showEditModal', false)">Cancel</x-secondary-button>
        <x-primary-button wire:click="updateUser" class="bg-primary-600 hover:bg-primary-600 hover">Update</x-primary-button>
    </x-slot>
</x-modal>



<!-- Delete Confirmation Modal -->
<x-modal wire:model="showDeleteModal">
    <x-slot name="title">Delete Confirmation</x-slot>

    <div class="text-gray-700">
        Are you sure you want to delete this user? This action cannot be undone.
    </div>

    <x-slot name="footer">
        <x-secondary-button wire:click="$set('showDeleteModal', false)">Cancel</x-secondary-button>
        <x-primary-button wire:click="deleteUser" class="bg-primary-600 hover:bg-primary-600 hover">Delete</x-primary-button>
    </x-slot>
</x-modal>

<!-- Reset Password Modal -->
<x-modal wire:model="showResetModal">
    <x-slot name="title">Reset Password</x-slot>

    <div class="text-gray-700">
        Are you sure you want to reset this user's password to <strong>"password"</strong>?
    </div>

    <x-slot name="footer">
        <x-secondary-button wire:click="$set('showResetModal', false)">Cancel</x-secondary-button>
        <x-primary-button wire:click="resetPassword" class="bg-primary-600 hover:bg-primary-600 hover">Confirm Reset</x-primary-button>
    </x-slot>
    </x-modal>

</div>
