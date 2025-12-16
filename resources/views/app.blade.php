<!DOCTYPE html>
<html>
<head>
    <title>CRM PT Smart</title>
</head>
<body>
    @if(Auth::user()->role === 'manager')
        <h1>Halo Bos!</h1>
    @endif

    <h2>CRM PT Smart</h2>
    <h1>Selamat Datang, {{ Auth::user()->name }}!</h1>

    <nav>
            @if(Auth::user()->role !== 'manager')
                <h1>Halo Sales!</h1>
                 <a href="/leads">Leads</a> |
            @endif
       
        <a href="/products">Products</a> |
        <a href="/projects">Projects</a> |
        <a href="/customers">Customers</a> |
        
        <a href="{{ route('logout') }}" 
           onclick="event.preventDefault(); if(confirm('Ingin keluar?')) document.getElementById('logout-form').submit();">
           Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </nav>
    
    <div>
        @yield('content')
    </div>

</body>
</html>