<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600 mt-4">
            {{ __('¿Olvidaste tu contraseña? No hay problema. Simplemente díganos su dirección de correo electrónico y le enviaremos un enlace para restablecer la contraseña que le permitirá elegir una nueva.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="mt-4">
                <x-input id="email" class="block mt-1 w-full text-center" type="email" name="email" :value="old('email')" required
                    autofocus placeholder="Correo"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button style="background-color: #3977C3;">
                    {{ __('Correo electrónico Enlace de restablecimiento de contraseña') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
