<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="form-container">
    <h2>Register here</h2>
    <label for="first_name">First Name</label>
        <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required>

        <label for="last_name">Last Name</label>
        <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>

        <label for="phone">Phone Number</label>
        <input type="text" id="phone" name="phone" value="{{ old('phone') }}" required>
{{--    moet alleen cijfers zijn--}}
        <button class="loginButton" type="submit">Register</button>
        <button class="loginButton" type="submit">Continue as anonymous</button>
</div>
<x-main>

    <x-slot name="buttons">

    </x-slot>
</x-main>

<footer>
    <p>No Copyright</p>
</footer>
</body>
</html>


