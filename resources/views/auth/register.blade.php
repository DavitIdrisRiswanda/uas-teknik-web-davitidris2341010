<x-guest-layout>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <input type="hidden" name="role" value="{{ $role }}">

        <!-- Nama -->
        <div>
            <x-input-label for="name" :value="$role == 'seller' ? 'Nama Pemilik' : 'Nama Lengkap'" />

            <x-text-input
                id="name"
                class="block mt-1 w-full"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
            />

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Nama Toko (hanya seller) -->
        @if($role == 'seller')

            <div class="mt-4">
                <x-input-label for="store_name" value="Nama Toko" />

                <x-text-input
                    id="store_name"
                    class="block mt-1 w-full"
                    type="text"
                    name="store_name"
                    :value="old('store_name')"
                    required
                />

                <x-input-error :messages="$errors->get('store_name')" class="mt-2" />
            </div>

        @endif

        <!-- Email -->
        <div class="mt-4">

            <x-input-label for="email" :value="__('Email')" />

            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
            />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />

        </div>

        <!-- Password -->
        <div class="mt-4">

            <x-input-label for="password" :value="__('Password')" />

            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />

        </div>

        <!-- Konfirmasi Password -->
        <div class="mt-4">

            <x-input-label
                for="password_confirmation"
                value="Konfirmasi Password"
            />

            <x-text-input
                id="password_confirmation"
                class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                required
            />

        </div>

        <div class="flex items-center justify-between mt-6">

            <a
                href="{{ route('login') }}"
                class="text-sm underline text-gray-600 hover:text-gray-900">

                Sudah punya akun?

            </a>

            <x-primary-button>

                {{ $role == 'seller' ? 'Daftar Sebagai Penjual' : 'Daftar Sebagai Pembeli' }}

            </x-primary-button>

        </div>

    </form>

</x-guest-layout>