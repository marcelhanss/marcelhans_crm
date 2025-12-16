<!DOCTYPE html>
<html>
<head>
    <title>CRM PT Smart</title>
</head>
<body>

    <h2>CRM PT Smart</h2>
    <h1>Selamat Datang, {{ Auth::user()->name }}!</h1>

    <nav>
        <a href="/leads">Leads</a> |
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