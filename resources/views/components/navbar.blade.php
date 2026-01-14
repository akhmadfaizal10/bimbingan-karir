<div class="navbar bg-base-100 shadow-sm">
  <div class="navbar-start">
    <div class="dropdown">
      <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
        </svg>
      </div>
    </div>
    <img src={{ asset("assets/images/logo_bengkod.svg") }} />
  </div>
  <div class="navbar-center hidden lg:flex">
    <input  class="input w-72" placeholder="Cari Event..." />
  </div>
  <div class="navbar-end gap-2">

    {{-- JIKA BELUM LOGIN --}}
    @guest
        <a href="{{ route('login') }}" class="btn bg-blue-900 text-white">
            Login
        </a>
        <a href="{{ route('register') }}" class="btn text-blue-900">
            Register
        </a>
    @endguest

    {{-- JIKA SUDAH LOGIN --}}
    @auth
        <span class="font-semibold text-blue-900">
            {{ Auth::user()->name }}
        </span>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-error text-white">
                Logout
            </button>
        </form>
    @endauth

</div>

</div>