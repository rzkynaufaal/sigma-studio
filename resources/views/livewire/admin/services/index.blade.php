
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-zinc-900 dark:text-zinc-100">
                    Katalog Layanan
                </h1>
                <p class="text-sm text-zinc-500 dark:text-zinc-400">
                    Kelola layanan Sigma Studio yang bisa dipesan oleh customer.
                </p>
            </div>
        </div>

        {{-- Alert --}}
        @if (session('success'))
            <div class="rounded-md bg-emerald-50 px-4 py-2 text-sm text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-200">
                {{ session('success') }}
            </div>
        @endif

               {{-- Tabel Layanan --}}
        <div class="rounded-xl border border-zinc-200 bg-white p-4 shadow-sm dark:border-zinc-700 dark:bg-zinc-900">
            <h2 class="mb-4 text-lg font-semibold text-zinc-900 dark:text-zinc-100">
                Daftar Layanan
            </h2>

            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left">
                    <thead class="border-b border-zinc-200 text-xs uppercase text-zinc-500 dark:border-zinc-700 dark:text-zinc-400">
                        <tr>
                            <th class="px-3 py-2">Nama</th>
                            <th class="px-3 py-2">Durasi</th>
                            <th class="px-3 py-2">Harga</th>
                            <th class="px-3 py-2">Status</th>
                            <th class="px-3 py-2 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">
                        @forelse ($services as $service)
                            <tr>
                                <td class="px-3 py-2 text-zinc-900 dark:text-zinc-100">
                                    <div class="font-medium">{{ $service->name }}</div>
                                    @if($service->description)
                                        <div class="text-xs text-zinc-500 dark:text-zinc-400 line-clamp-2">
                                            {{ $service->description }}
                                        </div>
                                    @endif
                                </td>
                                <td class="px-3 py-2 text-zinc-700 dark:text-zinc-200">
                                    {{ $service->duration }} menit
                                </td>
                                <td class="px-3 py-2 text-zinc-700 dark:text-zinc-200">
                                    Rp {{ number_format($service->price, 0, ',', '.') }}
                                </td>
                                <td class="px-3 py-2">
                                    @if ($service->status === 'active')
                                        <span class="inline-flex items-center rounded-full bg-emerald-100 px-2 py-0.5 text-xs font-medium text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-200">
                                            Active
                                        </span>
                                    @else
                                        <span class="inline-flex items-center rounded-full bg-zinc-100 px-2 py-0.5 text-xs font-medium text-zinc-600 dark:bg-zinc-800 dark:text-zinc-300">
                                            Inactive
                                        </span>
                                    @endif
                                </td>
                                <td class="px-3 py-2 text-right">
                                    <button wire:click="edit({{ $service->id }})"
                                        class="rounded-lg border border-zinc-300 px-2 py-1 text-xs font-medium text-zinc-700 hover:bg-zinc-100 dark:border-zinc-700 dark:text-zinc-200 dark:hover:bg-zinc-800">
                                        Edit
                                    </button>
                                    <button wire:click="delete({{ $service->id }})"
                                        class="ml-2 rounded-lg border border-red-300 px-2 py-1 text-xs font-medium text-red-600 hover:bg-red-50 dark:border-red-700 dark:text-red-400 dark:hover:bg-red-950/40"
                                        onclick="return confirm('Yakin hapus layanan ini?')">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-3 py-4 text-center text-sm text-zinc-500 dark:text-zinc-400">
                                    Belum ada layanan. Tambah layanan pertama di atas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $services->links() }}
            </div>
        </div>
        {{-- Form Create / Edit --}}
        <div class="rounded-xl border border-zinc-200 bg-white p-4 shadow-sm dark:border-zinc-700 dark:bg-zinc-900">
            <h2 class="mb-4 text-lg font-semibold text-zinc-900 dark:text-zinc-100">
                {{ $serviceId ? 'Edit Layanan' : 'Tambah Layanan Baru' }}
            </h2>

            <form wire:submit.prevent="{{ $serviceId ? 'update' : 'store' }}" class="space-y-4">
                <div class="grid gap-4 md:grid-cols-2">
                    <div>
                        <label class="mb-1 block text-sm font-medium text-zinc-700 dark:text-zinc-200">
                            Nama Layanan
                        </label>
                        <input type="text" wire:model.defer="name"
                            class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-sm text-zinc-900 outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-100">
                        @error('name')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="mb-1 block text-sm font-medium text-zinc-700 dark:text-zinc-200">
                                Durasi (menit)
                            </label>
                            <input type="number" min="5" step="5" wire:model.defer="duration"
                                class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-sm text-zinc-900 outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-100">
                            @error('duration')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-zinc-700 dark:text-zinc-200">
                                Harga (Rp)
                            </label>
                            <input type="number" min="0" step="1000" wire:model.defer="price"
                                class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-sm text-zinc-900 outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-100">
                            @error('price')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div>
                    <label class="mb-1 block text-sm font-medium text-zinc-700 dark:text-zinc-200">
                        Deskripsi
                    </label>
                    <textarea rows="3" wire:model.defer="description"
                        class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-sm text-zinc-900 outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-100"></textarea>
                    @error('description')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between gap-4">
                    <div>
                        <label class="mb-1 block text-sm font-medium text-zinc-700 dark:text-zinc-200">
                            Status
                        </label>
                        <select wire:model.defer="status"
                            class="rounded-lg border border-zinc-300 bg-white px-3 py-2 text-sm text-zinc-900 outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-100">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        @error('status')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex gap-2 ml-auto">
                        @if ($serviceId)
                            <button type="button" wire:click="resetForm"
                                class="rounded-lg border border-zinc-300 px-4 py-2 text-sm font-medium text-zinc-700 hover:bg-zinc-100 dark:border-zinc-700 dark:text-zinc-200 dark:hover:bg-zinc-800">
                                Batal
                            </button>
                        @endif

                        <button type="submit"
                            class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">
                            {{ $serviceId ? 'Update' : 'Simpan' }}
                        </button>
                    </div>
                </div>
            </form>
        </div>

 
    </div>
