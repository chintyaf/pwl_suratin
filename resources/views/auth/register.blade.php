<x-guest-layout>
    <h1 style="font-size: 23px; font-weight:900; text-align:center;">
        Admin Register
    </h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- NIP -->
        <div>
            <x-input-label for="nip" :value="__('NIP')" />
            <x-text-input id="nip" class="block w-full mt-1" type="text" name="nip" :value="old('nip')" required autofocus autocomplete="nip" />
            <x-input-error :messages="$errors->get('nip')" class="mt-2" />
        </div>

        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block w-full mt-1"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block w-full mt-1"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>


        <div class="mb-3">
            <input type="hidden" name="id_role" value="0">

            {{--            <label for="role" class="form-label">--}}
{{--                Role--}}
{{--            </label>--}}
{{--            <select name="id_role" required>--}}
{{--                <option value="">Pilih Role</option>--}}
{{--                <option value="0">Admin</option>--}}
{{--                <option value="2">Kaprodi</option>--}}
{{--                <option value="3">MO</option>--}}
{{--                <!-- Tambahkan sesuai dengan data di tabel roles -->--}}
{{--            </select>--}}


{{--            <select name="role" id="role" class="mb-3 form-select" required>--}}
{{--                <option selected>None</option>--}}
{{--                <option >Admin</option>--}}
{{--                <option>Ketua Program Studi</option>--}}
{{--                <option>Manajemen Operasional</option>--}}
{{--                <option>Mahasiswa</option>--}}
{{--            </select>--}}
        </div>


        <div class="flex items-center justify-end mt-4">
            <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
