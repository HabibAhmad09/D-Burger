@extends('layouts.main')
@section('title', 'Tambah Pesanan - ')
@section('content')
    <section class="px-4 md:px-12 lg:px-32 mt-4">
        <nav class="w-full rounded-md">
            <ol class="list-reset flex">
                <li>
                    <a
                        href="{{ route('pesanan.show') }}"
                        class="text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600"
                    >Pesanan</a
                    >
                </li>
                <li>
                    <span class="mx-2 text-neutral-500 dark:text-neutral-400">/</span>
                </li>
                <li class="text-neutral-500 dark:text-neutral-400">Tambah Pesanan</li>
            </ol>
        </nav>
    </section>

    <section class="px-4 md:px-12 lg:px-32 mt-4 ">
        <div class="p-4 border border-gray-200 shadow rounded-lg">
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="input-nama-pemesan" class="block mb-2 text-sm font-medium text-gray-900">Nama Pemesan</label>
                    <input type="text" id="input-nama-pemesan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukkan Nama Pemesan" autocomplete="off">
                </div>
                <div>
                    <label for="total-harga-semua" class="block mb-2 text-sm font-medium text-gray-900">Total Harga</label>
                    <input type="text" id="total-harga-semua" disabled class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" autocomplete="off">
                </div>
                <div>
                    <label for="total-harga-semua" class="block mb-2 text-sm font-medium text-gray-900">Total Harga</label>
                    <select id="status_pesanana"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="pilih-menu">-- Pilih Status --</option>
                        <option value="bawa_pulang">Bawa Pulang</option>
                        <option value="makan_ditempat">Makan Ditempat</option>

                    </select>
               </div>
            </div>
            <section class="flex gap-2">
                <div data-te-toggle="modal"
                    data-te-target="#addMenuModal"
                    class="inline-block rounded bg-sky-700 hover:bg-sky-800  px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow transition duration-150 ease-in-out shadow ">
                    Tambah Menu
                </div>
            </section>

            <div>
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full text-left text-sm font-light">
                                    <thead class="border font-medium bg-gray-100">
                                    <tr>
                                        <th scope="col" class="px-6 py-4">Menu</th>
                                        <th scope="col" class="px-6 py-4">Harga Satuan</th>
                                        <th scope="col" class="px-6 py-4">Jumlah</th>
                                        <th scope="col" class="px-6 py-4">Total Harga</th>
                                    </tr>
                                    </thead>
                                    <tbody id="body-table">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex w-full justify-end mt-12">
                <button id="button-buat-pesananan" class="inline-block rounded bg-green-700 hover:bg-green-800  px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow transition duration-150 ease-in-out shadow ">
                    Buat Pesanan
                </button>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div
        data-te-modal-init
        class="fixed left-0 top-12 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
        id="addMenuModal"
        tabindex="-1"
        aria-labelledby="addMenuModalLabel"
        aria-hidden="true">
        <div data-te-modal-dialog-ref
            class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
            <div  class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none ">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-6 ">
                        <!--Modal title-->
                        <h5
                            class="text-xl mt-4 font-medium leading-normal text-neutral-800 "
                            id="exampleModalLabel">
                            Tambah Menu
                        </h5>
                        <!--Close button-->
                        <button
                            type="button"
                            class="box-content mt-4 rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                            data-te-modal-dismiss
                            aria-label="Close">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="h-6 w-6">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!--Modal body-->
                    <div class="relative flex-auto p-4" data-te-modal-body-ref>

                        <div class="mb-6">
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 ">Jumlah</label>

                            <select id="select-menu"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="pilih-menu">-- Pilih Menu --</option>
                                @foreach($menus as $menu)
                                    <option value="{{ $menu->id }}">{{ $menu->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="harga-menu" class="block mb-2 text-sm font-medium text-gray-900 ">Harga</label>
                            <input type="text" id="harga-menu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" disabled>
                        </div>
                        <div class="mb-6">
                            <label for="jumlah-menu" class="block mb-2 text-sm font-medium text-gray-900 ">Jumlah</label>
                            <input type="text" id="jumlah-menu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" autocomplete="off" >
                        </div>
                        <div class="mb-6">
                            <label for="total-harga-menu" class="block mb-2 text-sm font-medium text-gray-900 ">Jumlah</label>
                            <input type="text" id="total-harga-menu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" autocomplete="off" disabled>
                        </div>
                    </div>

                    <!--Modal footer-->
                    <div
                        class="flex flex-shrink-0 gap-2 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 ">
                        <span
                            type="button"
                            class="inline-block rounded bg-gray-500 hover:bg-gray-600  px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow transition duration-150 ease-in-out shadow "
                            data-te-modal-dismiss
                            data-te-ripple-init
                            data-te-ripple-color="light">
                            Close
                        </span>
                        <button id="button-add-menu"
                            class="inline-block rounded bg-sky-500 hover:bg-sky-600  px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow transition duration-150 ease-in-out shadow">
                            Tambah
                        </button>
                    </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <input type="hidden" id="url-store-pesanan" value="{{ route('api-store-pesanan') }}">
    <script>
        let selectMenu = document.getElementById('select-menu')
        let hargaMenu = document.getElementById('harga-menu')
        let jumlahMenu = document.getElementById('jumlah-menu')
        let totalHargaMenu = document.getElementById('total-harga-menu')
        let buttonAddMenu = document.getElementById('button-add-menu')
        let totalHargaSemua = document.getElementById('total-harga-semua')
        let buttonBuatPesananan = document.getElementById('button-buat-pesananan')
        let menuActive;
        let jumlahPesananMenu;
        let jumlahTotalHargaMenu;
        let jumlahTotalHargaSemua = 0;
        let listMenu = [];

        let bodyTable = document.getElementById('body-table')

        selectMenu.addEventListener('change', () =>{
            axios.get('/menu/api/'+ selectMenu.value)
                .then(function (res) {
                    let menu = res.data.data
                    menuActive = menu
                    hargaMenu.value = menu.harga
                    console.log(menu.harga)
                })
        })
        jumlahMenu.addEventListener('keyup', () =>{
            if (jumlahMenu.value == ""){
                jumlahPesananMenu = 0
                jumlahTotalHargaMenu = 0
                totalHargaMenu.value = "0"
            } else {
                jumlahPesananMenu = parseInt(jumlahMenu.value)
                jumlahTotalHargaMenu = parseInt(jumlahMenu.value) * parseInt(hargaMenu.value)
                totalHargaMenu.value = parseInt(jumlahMenu.value) * parseInt(hargaMenu.value)
            }
        })

        buttonAddMenu.addEventListener('click', () =>{
            let html = '<tr ' +
                        '     class="border-b border-x transition duration-300 ease-in-out hover:bg-neutral-100 "> ' +
                        '     <td class="whitespace-nowrap px-6 py-4">' + menuActive.nama + '</td> ' +
                        '     <td class="whitespace-nowrap px-6 py-4">' + menuActive.harga + '</td> ' +
                        '     <td class="whitespace-nowrap px-6 py-4">' + jumlahPesananMenu + '</td> ' +
                        '     <td class="whitespace-nowrap px-6 py-4">' + jumlahTotalHargaMenu + '</td> ' +
                        ' </tr> ';

            bodyTable.innerHTML = bodyTable.innerHTML + html
            jumlahTotalHargaSemua = jumlahTotalHargaSemua + parseInt(jumlahTotalHargaMenu)
            totalHargaSemua.value = jumlahTotalHargaSemua
            let dataPushMenu = {id_menu: menuActive.id, jumlah_pesanan:jumlahPesananMenu};
            listMenu.push(dataPushMenu)

            menuActive = null;
            selectMenu.value = 'pilih-menu'
            hargaMenu.value = ""
            jumlahMenu.value =""
            totalHargaMenu.value =""
        })

        buttonBuatPesananan.addEventListener('click', () => {
            let inputNamaPemesan = document.getElementById('input-nama-pemesan')
            let statusPesanana = document.getElementById('status_pesanana')
            let url = document.getElementById('url-store-pesanan').value
            let d = {
                'status_pesanana' : statusPesanana.value,
                'pemesan' : inputNamaPemesan.value,
                'total_pesanan' : totalHargaSemua.value,
                "list_menu" : listMenu
            }

            axios.post(url, d)
                .then((res) => {
                    window.location.href = '/pesanan'
                })
        })





    </script>
@endsection
