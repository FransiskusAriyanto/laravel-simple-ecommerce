<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::asset('/css/main.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />

    <title>@yield('title')</title>
</head>
<body>
    <main>
        <div class="header">
            <div class="headeratas">
                <ul class="kiri">
                    <li><a href="#"> @yield('home') </a></li>
                </ul>
                <ul class="kanan">
                    @yield('search')
                    <li class="dropdown pt-2"><a onclick="myFunction()" class="dropbtn"> <i class="fas fa-user"></i></a>
                        <div id="myDropdown" class="dropdown-content">
                            @guest
                                @if (Route::has('login'))
                                        <a href="{{ route('login') }}" style="border-bottom: 1px solid #ccc">{{ __('Login') }}</a>
                                @endif

                                @if (Route::has('register'))
                                        <a href="{{ route('register') }}" style="border-bottom: 1px solid #ccc">{{ __('Register') }}</a>
                                @endif
                            @else                                
                                    @yield('account')
                                    @yield('reqfarm')
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            @endguest
                        </div>
                    </li>
                </ul>
            </div>
            <div class="headerbawah" >
                    @yield('menu')
            </div>
        </div>
        <div class="container">
            @yield('content')
        </div>
    </main>
<script>
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
</body>
</html>