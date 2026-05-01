<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

<div class="bg-white p-6 rounded-xl shadow-md w-80">
    <h2 class="text-xl font-bold mb-4 text-center">Login</h2>

    @if ($errors->any())
        <div class="text-red-500 text-sm mb-3">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="/login">
        @csrf

        <input type="email" name="email" placeholder="Email"
            class="w-full mb-3 px-3 py-2 border rounded-lg">

        <input type="password" name="password" placeholder="Password"
            class="w-full mb-4 px-3 py-2 border rounded-lg">

        <button class="w-full bg-emerald-500 text-white py-2 rounded-lg">
            Login
        </button>
    </form>
</div>

</body>
</html>