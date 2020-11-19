<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
        
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <input wire:model='mailId' type="hidden" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="formjudul_surat">
                            {{-- @error('nama_employee') <span class="text-red-500">{{ $message }}</span>@enderror --}}
                        </div>
                        <div class="mb-4">
                            <label for="formjudul_surat" class="block text-gray-700 text-sm font-bold mb-2">Judul Surat:</label>
                            <input wire:model='judul_surat' type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="formjudul_surat">
                            {{-- @error('nama_employee') <span class="text-red-500">{{ $message }}</span>@enderror --}}
                        </div>
                        <div class="mb-4">
                            <label for="formisi_surat" class="block text-gray-700 text-sm font-bold mb-2">Isi Surat:</label>
                            <input wire:model='isi_surat' type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="formisi_surat" >
                            {{-- @error('jabatan') <span class="text-red-500">{{ $message }}</span>@enderror --}}
                        </div>
                        <div class="mb-4">
                            <label for="formsurat_dari" class="block text-gray-700 text-sm font-bold mb-2">Surat Dari:</label>
                            <input wire:model='surat_dari' type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="formsurat_dari" >
                            {{-- @error('no_hp') <span class="text-red-500">{{ $message }}</span>@enderror --}}
                        </div>
                        <div class="mb-4">
                            <label for="formditujukan_kepada" class="block text-gray-700 text-sm font-bold mb-2">Ditujukan Kepada:</label>
                            <input wire:model='ditujukan_kepada' type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="formditujukan_kepada">
                            {{-- @error('alamat') <span class="text-red-500">{{ $message }}</span>@enderror --}}
                        </div>
                        <div class="mb-4">
                            <label for="formditujukan_kepada" class="block text-gray-700 text-sm font-bold mb-2">status:</label>
                            <input wire:model='status' type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="formditujukan_kepada">
                            {{-- @error('alamat') <span class="text-red-500">{{ $message }}</span>@enderror --}}
                        </div>
                        <div class="mb-4">
                            <label for="formketerangan" class="block text-gray-700 text-sm font-bold mb-2">Keterangan:</label>
                            <input wire:model='keterangan' type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="formketerangan">
                            {{-- @error('alamat') <span class="text-red-500">{{ $message }}</span>@enderror --}}
                        </div>
                        {{-- <div class="mb-4">
                            <label for="formStatus" class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                            <select class="form-control" wire:model="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Pilih</option>
                                <option value="1">Premium</option>
                                <option value="0">Free</option>
                            </select>
                            @error('status') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div> --}}
                    </div>
                </div>
    
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-indigo-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        Simpan
                        </button>
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        
                        <button wire:click="hideModal()"  type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        Tutup
                        </button>
                    </span>
                </form>
            </div>
        </div>
    </div>
</div>