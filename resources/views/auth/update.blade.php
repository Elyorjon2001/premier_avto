<x-layouts.auth>
    <div class="wrapper">
        <form action="{{ route('updatePassword') }}" method="POST">
            @csrf
            <h1>Parol va Username-ni o‘zgartirish</h1>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="input_box">
                <input name="current_password" type="password" placeholder="Joriy parol" required autocomplete="current-password">
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="input_box">
                <input name="new_password" type="password" placeholder="Yangi parol" required autocomplete="new-password">
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="input_box">
                <input name="new_password_confirmation" type="password" placeholder="Yangi parolni tasdiqlang" required autocomplete="new-password">
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="input_box">
                <input name="new_username" type="text" placeholder="Yangi username" 
                value="{{ old('new_username', $admin->username ?? '') }}" required>
                         <i class='bx bxs-user'></i>
            </div>

            @error('current_password')
                <div class="error-message" style="color:red">{{ $message }}</div>
            @enderror
            @error('new_password')
                <div class="error-message">{{ $message }}</div>
            @enderror
            @error('new_username')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn">Yangilash</button>
        </form>
    </div>
</x-layouts.auth>
