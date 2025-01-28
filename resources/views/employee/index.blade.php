@extends('employee.layout.app')

@section('content')
      {{-- <div class="bg-white absolute bottom-0 max-w-[640px] w-full mx-auto rounded-t-[120px] h-[68%]"></div> --}}

      {{-- header --}}
      <div class="relative text-white mx-4 pt-10 pb-24 flex items-center justify-between">
        <div class="flex gap-4 items-center">
          <div class="">
            <img src="{{asset('assets/img/logo.svg')}}" alt="" class=" w-16 min-[400px]:w-20">
          </div>
          <p class="font-bold text-2xl min-[400px]:text-3xl">Izin Online App</p>
        </div>

        <form action="{{route('logout')}}" method="POST">
          @csrf
          <button type="submit">
            <img src="{{asset('assets/img/logout.svg')}}" alt="" class="w-9">
          </button>
        </form>
      </div>
      
      <div class="absolute top-36 z-10">

        {{-- employee --}}
        <div class=" mx-4 p-4 rounded-3xl border border-opacity-[32%] border-black bg-white">
          <div class="flex flex-col">
            <div class="text-right text-xs opacity-70"> {{Auth::user()->nip}} </div>
            <div class="flex gap-3 items-center">
              <img src="{{asset('assets/img/person.svg')}}" alt="employee image" class="w-20 ">
              <div class="flex flex-col">
                <p class="opacity-70"> {{Auth::user()->unit}} </p>
                <h1 class="text-lg font-bold"> {{Auth::user()->nama}} </h1>
                <p class="opacity-80 text-xs min-[400px]:text-sm md:text-base">{{Auth::user()->alamat}}</p>
              </div>
            </div>
          </div>
        </div>
        
        {{-- history --}}
        <div class="m-4">
          <h1 class="font-bold text-lg mb-4">Riwayat Pengajuan</h1>
          <div class="flex flex-col gap-3 mb-32">

            <div class="rounded-2xl bg-[#F8F9FE] border p-2">
              <div class="grid grid-cols-10 gap-2 items-center">
                <div class="col-span-6  flex flex-col gap-2 min-[400px]:gap-3">
                  <div class="">
                    <h1 class="font-bold text-xs min-[400px]:text-base">Jenis Cuti</h1>
                    <p class="text-[10px] min-[400px]:text-xs">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magnam, eaque!</p>
                  </div>
                  <div class="text-[10px] min-[400px]:text-xs opacity-60">
                    12-12-2024 s.d. 13-12-2024 (2 hari)
                  </div>
                </div>
                <div class="col-span-2  text-center text-[10px] min-[400px]:text-xs justify-self-center font-bold text-[#006FFD]">Waiting</div>
                <div class="col-span-2  text-center text-[10px] min-[400px]:text-xs justify-self-center">
                  <a href="#">
                    <img src="{{asset('assets/icon/trash.svg')}}" alt="Hapus">
                  </a>
                </div>
              </div>
            </div>
            <div class="rounded-2xl bg-[#F8F9FE] border p-2">
              <div class="grid grid-cols-10 gap-2 items-center">
                <div class="col-span-6  flex flex-col gap-2 min-[400px]:gap-3">
                  <div class="">
                    <h1 class="font-bold text-xs min-[400px]:text-base">Jenis Cuti</h1>
                    <p class="text-[10px] min-[400px]:text-xs">Percobaan</p>
                    <p class="text-[10px] min-[400px]:text-xs text-[#FF0004]">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magnam, eaque!</p>
                  </div>
                  <div class="text-[10px] min-[400px]:text-xs opacity-60">
                    12-12-2024 s.d. 13-12-2024 (2 hari)
                  </div>
                </div>
                <div class="col-span-2  text-center text-[10px] min-[400px]:text-xs justify-self-center font-bold text-[#FF0004]">Not Approved</div>
                <div class="col-span-2  text-center text-[10px] min-[400px]:text-xs justify-self-center">
                  {{-- <a href="#">
                    <img src="{{asset('assets/icon/trash.svg')}}" alt="Hapus">
                  </a> --}}
                </div>
              </div>
            </div>
            <div class="rounded-2xl bg-[#F8F9FE] border p-2">
              <div class="grid grid-cols-10 gap-2 items-center">
                <div class="col-span-6  flex flex-col gap-2 min-[400px]:gap-3">
                  <div class="">
                    <h1 class="font-bold text-xs min-[400px]:text-base">Jenis Cuti</h1>
                    <p class="text-[10px] min-[400px]:text-xs">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magnam, eaque!</p>
                  </div>
                  <div class="text-[10px] min-[400px]:text-xs opacity-60">
                    12-12-2024 s.d. 13-12-2024 (2 hari)
                  </div>
                </div>
                <div class="col-span-2  text-center text-[10px] min-[400px]:text-xs justify-self-center font-bold text-[#00FF2F]">Approved</div>
                <div class="col-span-2  text-center text-[10px] min-[400px]:text-xs justify-self-center">
                  <a href="#">
                    <img src="{{asset('assets/icon/download.svg')}}" alt="Hapus">
                  </a>
                </div>
              </div>
            </div>
          </div>
          
        </div>
  
      </div>
      
      
      {{-- <button class="fixed bottom-0 left-0 z-20 w-full bg-blue-500 text-white py-4 text-center font-semibold">
        Button Fixed Full Width
      </button> --}}
      <div class="fixed bottom-0 w-full max-w-[640px] mx-auto border-t border-[#E9E8ED] p-[20px_24px] z-20 bg-white text-white text-center"></div>
      <a href="{{ route('form') }}" class="fixed bottom-4 w-full max-w-[640px] mx-auto border-t border-[#E9E8ED] p-[20px_24px] z-30 bg-[#006FFD] text-white text-center rounded-[24px] font-bold">Buat Pengajuan Cuti</a>
      <div class="relative px-4 pt-32 mt-4 bg-white rounded-tl-[48px] rounded-tr-[48px] h-[68vh]"></div>
  @endsection
