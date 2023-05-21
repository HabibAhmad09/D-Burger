@extends('layouts.main')
@section('title', 'Menu - ')
@section('content')
    <section class="flex gap-2 px-4 md:px-12 lg:px-32 mt-8">
        <button
            data-te-toggle="modal"
            data-te-target="#addMenuModal"
            class="inline-block rounded bg-sky-700 hover:bg-sky-800  px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow transition duration-150 ease-in-out shadow ">
            Tambah Menu
        </button>
    </section>
    <!-- Modal -->
    <div
        data-te-modal-init
        class="fixed left-0 top-12 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
        id="addMenuModal"
        tabindex="-1"
        aria-labelledby="addMenuModalLabel"
        aria-hidden="true">
        <div
            data-te-modal-dialog-ref
            class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
            <div
                class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none ">
                <form action="{{ route('menu.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
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
                                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 ">Nama</label>
                                <input type="text" id="nama" name="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" autocomplete="off" value="{{ old('nama') }}" required>
                            </div>
                        <div class="mb-6">
                                <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 ">Harga</label>
                                <input type="number" id="harga" name="harga" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" autocomplete="off" value="{{ old('nama') }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 ">Deskripsi</label>
                                <textarea rows="5" id="deskripsi" name="deskripsi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" >{{ old('deskripsi') }}</textarea>
                            </div>
                            <div class="mb-6">
                                <label for="gambar" class="block mb-2 text-sm font-medium text-gray-900 ">Gambar</label>
                                <input type="file" id="gambar" name="foto" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" autocomplete="off" required>
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
                        <button
                            type="submit"
                            class="inline-block rounded bg-sky-500 hover:bg-sky-600  px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow transition duration-150 ease-in-out shadow">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <main class="grid md:grid-cols-2 lg:grid-cols-5 gap-4 px-4 md:px-12 lg:px-32 pt-8">
        @foreach($menus as $menu)
            <div
                class="block rounded-lg bg-white shadow">
                <div
                    class="relative overflow-hidden bg-cover bg-no-repeat"
                    data-te-ripple-init
                    data-te-ripple-color="light">
                    <img
                        class="rounded-t-lg"
                        src="{{ $menu->foto }}"
                        alt="" />
                </div>
                <div class="p-2">
                    <h5
                        class="mb-2 text-xl font-medium leading-tight text-neutral-800 ">
                        {{ $menu->nama }}
                    </h5>
                    <p class="mb-4 text-base text-neutral-600 ">
                        {{ $menu->deskripsi }}
                    </p>
                    <div class="flex gap-2">
                        <button
                           data-te-toggle="modal"
                           data-te-target="#menuEdit{{ $menu->id }}"
                           class="inline-block rounded bg-emerald-500 hover:bg-emerald-600  px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out shadow ">
                            Edit
                        </button>
                        <button
                           data-te-toggle="modal"
                           data-te-target="#menu{{ $menu->id }}"
                           class="inline-block rounded bg-red-500 hover:bg-red-600  px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow transition duration-150 ease-in-out shadow ">
                            Hapus
                        </button>
                    </div>

                    <!-- Moda Editl -->
                    <div
                        data-te-modal-init
                        class="fixed left-0 top-12 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                        id="menuEdit{{ $menu->id }}"
                        tabindex="-1"
                        aria-labelledby="menuEdit{{ $menu->id }}Label"
                        aria-hidden="true">
                        <div
                            data-te-modal-dialog-ref
                            class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                            <div
                                class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none ">
                                <form action="{{ route('menu.update', $menu->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-6 ">
                                        <!--Modal title-->
                                        <h5
                                            class="text-xl mt-4 font-medium leading-normal text-neutral-800 "
                                            id="exampleModalLabel">
                                            Edit {{ $menu->nama }}
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
                                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 ">Nama</label>
                                            <input type="text" id="nama" name="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" autocomplete="off" value="{{ $menu->nama }}" required>
                                        </div>
                                        <div class="mb-6">
                                            <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 ">Deskripsi</label>
                                            <textarea rows="5" id="deskripsi" name="deskripsi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" >{{ $menu->deskripsi }}</textarea>
                                        </div>
                                        <div class="mb-6">
                                            <label for="gambar" class="block mb-2 text-sm font-medium text-gray-900 ">Gambar</label>
                                            <input type="file" id="gambar" name="foto" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
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
                                        <button
                                            type="submit"
                                            class="inline-block rounded bg-sky-500 hover:bg-sky-600  px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow transition duration-150 ease-in-out shadow">
                                            Simpan Perubahan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Hapus -->
                    <div
                        data-te-modal-init
                        class="fixed left-0 top-12 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                        id="menu{{ $menu->id }}"
                        tabindex="-1"
                        aria-labelledby="menu{{ $menu->id }}Label"
                        aria-hidden="true">
                        <div
                            data-te-modal-dialog-ref
                            class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                            <div
                                class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none ">
                                <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-6 ">
                                    <!--Modal title-->
                                    <h5
                                        class="text-xl mt-4 font-medium leading-normal text-neutral-800 "
                                        id="exampleModalLabel">
                                        Hapus Menu
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
                                    Apa Anda yakin ingin menghapus manu <b>{{ $menu->nama }}</b>?
                                </div>

                                <!--Modal footer-->
                                <div
                                    class="flex flex-shrink-0 gap-2 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 ">
                                    <button
                                        type="button"
                                        class="inline-block rounded bg-gray-500 hover:bg-gray-600  px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow transition duration-150 ease-in-out shadow "
                                        data-te-modal-dismiss
                                        data-te-ripple-init
                                        data-te-ripple-color="light">
                                        Close
                                    </button>
                                    <button
                                        type="button"
                                        class="inline-block rounded bg-red-500 hover:bg-red-600  px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow transition duration-150 ease-in-out shadow">
                                        Save changes
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </main>
@endsection
