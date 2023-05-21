<!-- Main navigation container -->
<nav
    class="flex-no-wrap px-4 md:px-12 lg:px-32 relative flex w-full items-center justify-between bg-[#d3ed05] py-4 shadow-md shadow-black/5 lg:flex-wrap lg:justify-start lg:py-4"
    data-te-navbar-ref>
    <div class="flex w-full flex-wrap items-center justify-between px-3">
        <!-- Hamburger button for mobile view -->
        <button
            class="block border-0 bg-transparent px-2 text-neutral-500 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0  lg:hidden"
            type="button"
            data-te-collapse-init
            data-te-target="#navbarSupportedContent1"
            aria-controls="navbarSupportedContent1"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <!-- Hamburger icon -->
            <span class="[&>svg]:w-7">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor"
            class="h-7 w-7">
          <path
              fill-rule="evenodd"
              d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
              clip-rule="evenodd" />
        </svg>
      </span>
        </button>

        <!-- Collapsible navigation container -->
        <div
            class="!visible hidden flex-grow basis-[100%] items-center lg:!flex lg:basis-auto"
            id="navbarSupportedContent1"
            data-te-collapse-item>
            <!-- Logo -->
            <a
                class="mb-4 mr-2 mt-3 flex items-center text-neutral-900 hover:text-neutral-900 focus:text-neutral-900   lg:mb-0 lg:mt-0"
                href="#">
                <h1 class="text-2xl text-bold">D'Burger</h1>
            </a>
            <!-- Left navigation links -->
            <ul
                class="list-style-none mr-auto flex flex-col pl-0 lg:flex-row items-center"
                data-te-navbar-nav-ref>
                <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
                    <!-- Dashboard link -->
                    <a class="text-gray-900 hover:text-gray-700 focus:text-neutral-700 disabled:text-black/30   lg:px-2 [&.active]:text-black/90 "
                        href="#"
                        data-te-nav-link-ref
                    >Beranda</a
                    >
                </li>
                <!-- Team link -->
                <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
                    <a
                        class="text-gray-900 hover:text-gray-700 focus:text-neutral-700 disabled:text-black/30   lg:px-2 [&.active]:text-black/90 "
                        href="{{ route('menu.show') }}"
                        data-te-nav-link-ref
                    >Menu</a
                    >
                </li>
                <!-- Projects link -->
                <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
                    <a
                        class="text-gray-900 hover:text-gray-700 focus:text-neutral-700 disabled:text-black/30   lg:px-2 [&.active]:text-black/90 "
                        href="{{ route('pesanan.show') }}"
                        data-te-nav-link-ref
                    >Pesanan</a
                    >
                </li>
            </ul>
        </div>

        <!-- Right elements -->
        <div class="relative flex items-center">


            <!-- Second dropdown container -->
            <div class="relative" data-te-dropdown-ref>
                <!-- Second dropdown trigger -->
                <a
                    class="hidden-arrow flex gap-2 items-center whitespace-nowrap transition duration-150 ease-in-out motion-reduce:transition-none"
                    href="#"
                    id="dropdownMenuButton2"
                    role="button"
                    data-te-dropdown-toggle-ref
                    aria-expanded="false">
                    <p>{{ \Illuminate\Support\Facades\Auth::user()->name }}</p>
                    <!-- User avatar -->
                    <img
                        src="https://tecdn.b-cdn.net/img/new/avatars/2.jpg"
                        class="rounded-full"
                        style="height: 25px; width: 25px"
                        alt=""
                        loading="lazy" />
                </a>
                <!-- Second dropdown menu -->
                <ul
                    class="absolute left-auto right-0 z-[1000] float-left m-0 mt-1 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg  [&[data-te-dropdown-show]]:block"
                    aria-labelledby="dropdownMenuButton2"
                    data-te-dropdown-menu-ref>
                    <!-- Second dropdown menu items -->
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="block cursor-pointer w-full whitespace-nowrap bg-transparent px-12 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400  "
                            >Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
