@extends('layouts.app')

@section('title')
    LaraChapas - Registro
@endsection


@section('content')
    <div class="flex items-center justify-center  py-12 px-4 sm:px-6 lg:px-8">
      <div class="max-w-md w-full space-y-8">
        <div>
          <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
            Iniciar Sesión
          </h2>
        </div>

        @if (session('status'))
          <div class="bg-green-50 border-l-4 border-green-400 p-4 text-green-800">
            {{ session('status') }}
          </div>
        @endif

        <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST" novalidate>
          @csrf

          <div class="rounded-md shadow-sm -space-y-px">
            {{-- Nombre --}}
            <div class="mb-4">
              <label for="name" class="sr-only">Nombre completo</label>
              <input
                id="name"
                name="name"
                type="text"
                value="{{ old('name') }}"
                autocomplete="name"
                required
                class="appearance-none rounded-md relative block w-full px-3 py-2 border @error('name') border-red-500 @else border-gray-300 @enderror placeholder-gray-400 focus:outline-none focus:ring-orange-500 focus:border-orange-500 focus:z-10 sm:text-sm"
                placeholder="Nombre completo"
                aria-invalid="{{ $errors->has('name') ? 'true' : 'false' }}"
                aria-describedby="name-error"
              >
              @error('name')
                <p id="name-error" class="mt-2 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>

            {{-- Email --}}
            <div class="mb-4">
              <label for="email" class="sr-only">Correo electrónico</label>
              <input
                id="email"
                name="email"
                type="email"
                value="{{ old('email') }}"
                autocomplete="email"
                required
                class="appearance-none rounded-md relative block w-full px-3 py-2 border @error('email') border-red-500 @else border-gray-300 @enderror placeholder-gray-400 focus:outline-none focus:ring-orange-500 focus:border-orange-500 focus:z-10 sm:text-sm"
                placeholder="Correo electrónico"
                aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}"
                aria-describedby="email-error"
              >
              @error('email')
                <p id="email-error" class="mt-2 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>

            {{-- Password --}}
            <div class="mb-4 relative">
              <label for="password" class="sr-only">Contraseña</label>
              <input
                id="password"
                name="password"
                type="password"
                autocomplete="new-password"
                required
                class="appearance-none rounded-md relative block w-full px-3 py-2 border @error('password') border-red-500 @else border-gray-300 @enderror placeholder-gray-400 focus:outline-none focus:ring-orange-500 focus:border-orange-500 focus:z-10 sm:text-sm"
                placeholder="Contraseña (mín. 8 caracteres)"
                aria-invalid="{{ $errors->has('password') ? 'true' : 'false' }}"
                aria-describedby="password-error"
              >
              <button type="button" id="togglePassword" aria-label="Mostrar contraseña" class="absolute inset-y-0 right-2 px-2 py-1 text-sm rounded focus:outline-none">
                Mostrar
              </button>
              @error('password')
                <p id="password-error" class="mt-2 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>

            {{-- Password confirmation --}}
            <div class="mb-4 relative">
              <label for="password_confirmation" class="sr-only">Confirmar contraseña</label>
              <input
                id="password_confirmation"
                name="password_confirmation"
                type="password"
                autocomplete="new-password"
                required
                class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-400 focus:outline-none focus:ring-orange-500 focus:border-orange-500 focus:z-10 sm:text-sm"
                placeholder="Confirmar contraseña"
              >
            </div>
          </div>

          {{-- Global errors (opcional) --}}
          @if ($errors->any())
            <div class="rounded-md bg-red-50 p-3 text-sm text-red-700">
              <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <div>
            <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-orange-800 hover:bg-orange-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
              Registrarse
            </button>
          </div>
        </form>
      </div>
    </div>

    {{-- Pequeño script accesible para mostrar/ocultar contraseña --}}
    @push('scripts')
    <script>
      (function() {
        const toggleBtn = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        if (!toggleBtn || !passwordInput) return;

        toggleBtn.addEventListener('click', function() {
          const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
          passwordInput.setAttribute('type', type);
          // Actualiza texto/aria
          const text = type === 'password' ? 'Mostrar' : 'Ocultar';
          toggleBtn.textContent = text;
          toggleBtn.setAttribute('aria-pressed', type === 'text');
        });
      })();
    </script>
    @endpush



@endsection