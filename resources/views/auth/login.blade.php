<x-layouts.auth>
    <div class="wrapper">
        <!-- Session orqali yuborilgan muvaffaqiyat xabarini ko‘rsatish -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('authenticate') }}" method="POST">
            @csrf
            <h1>Login</h1>

            <!-- Username input -->
            <div class="input_box">
                <input name="username" type="text" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>

            <!-- Password input -->
            <div class="input_box">
                <input name="password" type="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <!-- Remember me va forgot password -->
            <div class="remember-forgot">
                <label><input type="checkbox"> Remember me</label>
                <a href="#">Forgot password?</a>
            </div>

            <!-- Login tugmasi -->
            <button type="submit" class="btn">Login</button>
        </form>

        <!-- Rename sahifasiga yo‘naltiruvchi link -->
        <div class="register-link">
            <p>Don't you know a password?</p>
            <a href="{{ route('update') }}">Rename</a>
        </div>
    </div>
</x-layouts.auth>
