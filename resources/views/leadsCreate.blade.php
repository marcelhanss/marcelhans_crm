<!DOCTYPE html>
<html>
<head>
    <title>Create Lead</title>
</head>
<body>

<h2>Create Lead</h2>
<a href="/">Back</a>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<form method="POST" action="/leads">
    @csrf

    <div>
        <label>Name</label><br>
        <input type="text" name="name" required>
    </div>

    <div>
        <label>Email</label><br>
        <input type="email" name="email">
    </div>

    <div>
        <label>User</label><br>
        <input type="text" value="{{ auth()->user()->name }}" disabled>
    </div>

    <br>
    <button type="submit">Save Lead</button>
</form>

</body>
</html>
