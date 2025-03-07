<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Information</title>
    <style>
        .error { color: red; }
    </style>
</head>
<body>

    <h2>Personal Information</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('form') }}" method="POST">
        @csrf

        <label>First Name:</label>
        <input type="text" name="firstName" value="{{ old('firstName') }}">
        @error('firstName') <span class="error">{{ $message }}</span> @enderror
        <br>

        <label>Last Name:</label>
        <input type="text" name="lastName" value="{{ old('lastName') }}">
        @error('lastName') <span class="error">{{ $message }}</span> @enderror
        <br>

        <label>Sex:</label>
        <input type="radio" name="sex" value="Male" {{ old('sex') == 'Male' ? 'checked' : '' }}> Male
        <input type="radio" name="sex" value="Female" {{ old('sex') == 'Female' ? 'checked' : '' }}> Female
        @error('sex') <span class="error">{{ $message }}</span> @enderror
        <br>

        <label>Mobile Phone:</label>
        <input type="text" name="mobile" value="{{ old('mobile') }}">
        @error('mobile') <span class="error">{{ $message }}</span> @enderror
        <br>

        <label>Telephone No:</label>
        <input type="text" name="telephone" value="{{ old('telephone') }}">
        @error('telephone') <span class="error">{{ $message }}</span> @enderror
        <br>

        <label>Birth Date:</label>
        <input type="date" name="birth_date" value="{{ old('birth_date') }}">
        @error('birth_date') <span class="error">{{ $message }}</span> @enderror
        <br>

        <label>Address:</label>
        <input type="text" name="address" value="{{ old('address') }}">
        @error('address') <span class="error">{{ $message }}</span> @enderror
        <br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email') <span class="error">{{ $message }}</span> @enderror
        <br>

        <label>Website:</label>
        <input type="url" name="website" value="{{ old('website') }}">
        @error('website') <span class="error">{{ $message }}</span> @enderror
        <br>

        <button type="submit">Submit</button>
    </form>

</body>
</html>
