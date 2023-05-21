@extends('layouts.main')
@section('title', 'Pesanan - ')
@section('content')
    <section class="flex gap-1 px-4 md:px-12 lg:px-32 mt-4">
        <a href="{{ route('pesanan.add') }}"
           class="inline-block rounded bg-sky-700 hover:bg-sky-800  px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow transition duration-150 ease-in-out shadow ">
            Tambah Pesanan
        </a>
    </section>
    <section class="flex gap-1 px-4 md:px-12 lg:px-32 mt-4">
        <a href="{{ route('pesanan.show') }}">
            <div
                class="my-[5px] flex h-[32px] cursor-pointer items-center justify-between rounded-[16px] bg-gray-200 hover:bg-gray-300 px-6 py-0 text-[13px] font-normal normal-case leading-loose text-[#4f4f4f] shadow-none transition-[opacity] duration-300 ease-linear hover:!shadow-none active:bg-[#cacfd1]">
                Semua
            </div>
        </a>
        <a href="{{ route('pesanan.show.makan-di-tempat') }}">
            <div
                class="my-[5px] flex h-[32px] cursor-pointer items-center justify-between rounded-[16px] bg-gray-400 hover:bg-gray-500 text-white px-6 py-0 text-[13px] font-normal normal-case leading-loose shadow-none transition-[opacity] duration-300 ease-linear hover:!shadow-none active:bg-[#cacfd1]">
                Makan Ditempat
            </div>
        </a>
        <a href="{{route('pesanan.show.bawa-pulang')}}">
            <div
                class="my-[5px] flex h-[32px] cursor-pointer items-center justify-between rounded-[16px] bg-gray-200 hover:bg-gray-300 px-6 py-0 text-[13px] font-normal normal-case leading-loose text-[#4f4f4f] shadow-none transition-[opacity] duration-300 ease-linear hover:!shadow-none active:bg-[#cacfd1]">
                Bawa Pulang
            </div>
        </a>

    </section>
    <section class="px-4 md:px-12 lg:px-32">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-left text-sm font-light">
                            <thead class="border font-medium bg-gray-100">
                            <tr>
                                <th scope="col" class="px-6 py-4">No</th>
                                <th scope="col" class="px-6 py-4">Nama Pemesan</th>
                                <th scope="col" class="px-6 py-4">Total Harga</th>
                                <th scope="col" class="px-6 py-4">List Pesanan</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pesanans as $pesanan)
                                @foreach($pesanan as $item)
                                    <tr
                                        class="border-b border-x transition duration-300 ease-in-out hover:bg-neutral-100 ">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $loop->iteration }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $item['nama_pemesan'] }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">@currency($item['total_harga'])</td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <ul class="list-disc">
                                                @foreach(  $item['menu_pesanan'] as $menu)
                                                    @foreach($menu as $d)
                                                        <li>{{ $d->nama }} </li>
                                                    @endforeach
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
