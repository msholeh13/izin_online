@extends('employee.layout.app')

@section('content')

    <div class="fixed top-0 w-full max-w-[640px] mx-auto bg-white border-b border-[#00000024] p-[20px_24px] z-30 font-bold">
        <a href="{{ route('e-dashboard') }}" class="flex gap-2">
            <span class="w-4 bg-center bg-contain bg-no-repeat" style="background-image: url('{{url('assets/icon/back.svg')}}')"></span>
            <span>Kembali</span>
        </a>
    </div>

    <form class="mt-20 mx-4" method="" action="#">
        @csrf
        <h1 class="font-bold pb-4 text-lg">Formulir Pengajuan</h1>

        <div class="pb-12">
            <div class="grid grid-cols-1 gap-x-6 gap-y-4 ">
              <div class="sm:col-span-2 sm:col-start-1">
                <label for="name" class="block text-sm/6 font-medium text-gray-900">Nama</label>
                <div class="mt-2">
                  <input type="text" name="name" id="name" autocomplete="name" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-[#006FFD] sm:text-sm/6">
                </div>
              </div>
      
              <div class="sm:col-span-2 sm:col-start-1">
                <label for="nip" class="block text-sm/6 font-medium text-gray-900">NIP</label>
                <div class="mt-2">
                  <input type="text" name="nip" id="nip" autocomplete="" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-[#006FFD] sm:text-sm/6">
                </div>
              </div>
            
              <div class="sm:col-span-2 sm:col-start-1">
                <label for="street-address" class="block text-sm/6 font-medium text-gray-900">Alamat</label>
                <div class="mt-2">
                  <textarea type="text" name="street-address" id="street-address" autocomplete="street-address" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-[#006FFD] sm:text-sm/6"></textarea>
                </div>
              </div>
      
              <div class="sm:col-span-2 sm:col-start-1">
                <label for="jabatan" class="block text-sm/6 font-medium text-gray-900">Jabatan</label>
                <div class="mt-2">
                  <input id="jabatan" name="jabatan" type="jabatan" autocomplete="" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-[#006FFD] sm:text-sm/6">
                </div>
              </div>
      
              <div class="sm:col-span-2 sm:col-start-1">
                <label for="unit" class="block text-sm/6 font-medium text-gray-900">Unit</label>
                <div class="mt-2">
                  <input id="unit" name="unit" type="unit" autocomplete="" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-[#006FFD] sm:text-sm/6">
                </div>
              </div>
      
              <div class="sm:col-span-2 sm:col-start-1">
                <label for="jenis_cuti" class="block text-sm/6 font-medium text-gray-900">Jenis Cuti</label>
                <div class="mt-2 grid grid-cols-1">
                  <select id="jenis_cuti" name="jenis_cuti" autocomplete="" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-[#006FFD] sm:text-sm/6">
                    <option>Tahunan</option>
                    <option>Melahirkan</option>
                    <option>Sakit</option>
                  </select>
                  <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                    <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                  </svg>
                </div>
              </div>

              <div class="sm:col-span-2 sm:col-start-1">
                <label for="keterangan" class="block text-sm/6 font-medium text-gray-900">Keterangan (opsional)</label>
                <div class="mt-2">
                  <textarea type="text" name="keterangan" id="keterangan" autocomplete="" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-[#006FFD] sm:text-sm/6" rows="3"></textarea>
                </div>
              </div>
      
              <div class="sm:col-span-2">
                <label for="tanggal_awal" class="block text-sm/6 font-medium text-gray-900">Tanggal Awal</label>
                <div class="mt-2">
                  <input type="date" name="tanggal_awal" id="tanggal_awal" autocomplete="" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-[#006FFD] sm:text-sm/6">
                </div>
              </div>
      
              <div class="sm:col-span-2">
                <label for="tanggal_akhir" class="block text-sm/6 font-medium text-gray-900">Tanggal Akhir</label>
                <div class="mt-2">
                  <input type="date" name="tanggal_akhir" id="tanggal_akhir" autocomplete="" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-[#006FFD] sm:text-sm/6">
                </div>
              </div>
              
              <div class="sm:col-span-2">
                <button type="submit" class="w-full rounded-md bg-[#006FFD] px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#006FFD]">Kirim</button>
              </div>
              
            </div>
        </div>
  
    </form>
    

@endsection