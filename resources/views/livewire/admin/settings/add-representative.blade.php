<div>
    <div class="p-6 mb-10 bg-white rounded shadow">
        <h2 class="mb-4 text-lg font-bold">Add Deal Representative</h2>

        @if (session()->has('message'))
        <div class="p-4 mb-4 text-green-700 bg-green-100 rounded">
            {{ session('message') }}
        </div>
        @endif

        <form wire:submit.prevent="save" class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <x-ts-input type="text" id="name" wire:model="name" class="m-2"
                    placeholder="Enter representative name" />
                {{-- @error('name') <span class="text-sm text-red-600">{{ $message }}</span> @enderror --}}
            </div>
            <button type="submit"
                class="flex items-center px-4 py-2 space-x-2 text-white rounded bg-primary-600 hover:bg-primary-700">
                <span>Add Representative</span>
            </button>

        </form>
    </div>
    <div>

    </div>
    <div class="p-6 rounded shadow">
        <h3 class="mt-8 mb-4 text-lg font-bold">Existing Representatives</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        {{-- <th class="px-6 py-3 text-sm font-medium tracking-wider text-left text-gray-500 uppercase">
                            ID
                        </th> --}}
                        <th class="px-6 py-3 text-sm font-medium tracking-wider text-left text-gray-500 uppercase">
                            Name
                        </th>
                        <th class="px-6 py-3 text-sm font-medium tracking-wider text-right text-gray-500 uppercase">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($representatives as $representative)
                    <tr>
                        {{-- <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">
                            {{ $representative->id }}
                        </td> --}}
                        <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">
                            {{ $representative->name }}
                        </td>
                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                            <div class="flex justify-end">
                                <button wire:click="delete({{ $representative->id }})"
                                    class="flex items-center px-2 py-1 space-x-2 text-white bg-red-600 rounded hover:bg-red-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    <span>Delete</span>
                                </button>
                            </div>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-sm text-center text-gray-500">
                            No representatives found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>