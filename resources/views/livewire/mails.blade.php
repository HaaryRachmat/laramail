<x-slot name='header'>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Surat</h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <button wire:click="showModal()" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded my-3">Tambah Data</button>
            {{-- <a wire:click="showModal()" class="w-full flex items-center justify-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                Sign up
              </a>--}}

              @if ($isOpen)
                  @include('livewire.createmail')
              @endif 

              @if (session()->has('info'))
              <div class="block text-sm text-left mb-2 bg-indigo-200 border border-indigo-400 h-12 items-center p-4 rounded-sm" role="alert">
                  <div>
                      <h1 class="text-indigo-600 font-bold">{{session('info')}}</h1>
                  </div>
              </div>
              @endif

            {{-- @if($isModal)
                @include('livewire.create')
            @endif --}}

            <table class="table-fixed ">
                <thead>
                    <tr class="bg-gray-100">
                        {{-- <th class="px-4 py-2">No Surat</th> --}}
                        <th class="px-4 py-2">Judul Surat</th>
                        <th class="px-4 py-2">Isi Surat</th>
                        <th class="px-4 py-2">Surat Dari</th>
                        <th class="px-4 py-2">Ditujukan Kepada</th>
                        <th class="px-4 py-2 w-20">Status</th>
                        <th class="px-4 py-2">Keterangan</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mails as $mail)
                        <tr>
                            {{-- <td class="border px-4 py-2">{{ $mail->id}}</td> --}}
                            <td class="border px-4 py-2">{{$mail->judul_surat}}</td>
                            <td class="border px-2 py-2">{{$mail->isi_surat}}</td>
                            <td class="border px-14 py-2">{{$mail->surat_dari}}</td>
                            <td class="border px-4 py-2">{{$mail->ditujukan_kepada}}</td>
                            <td class="border px-4 py-2">{!! $mail->status_label !!}</td>
                            <td class="border px-4 py-2">{{$mail->keterangan}}</td>
                            <td class="border px-4 py-2">
                                <button wire:click="edit({{ $mail->id}})" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold  py-2 px-4 rounded">Edit</button>
                                <button  wire:click="delete({{ $mail->id}})" class="bg-red-600 hover:bg-red-700 text-white font-bold mt-1 py-2 px-4 rounded">Hapus</button>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
