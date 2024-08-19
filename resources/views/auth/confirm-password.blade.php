<x-guest-layout>
    <section class="absolute w-full h-full">
        <div
            class="absolute top-0 w-full h-full bg-gray-900"
            style="background-image: url({{ asset('images/loginPageBG.png')}}); background-size: 100%; background-repeat: no-repeat;"
        ></div>

        <div class="container mx-auto px-4 h-full">
            <div class="flex content-center items-center justify-center h-full">
                <div class="w-full lg:w-4/12 px-4">
                    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300 border-0">
                        <x-jet-authentication-card>
                            <x-slot name="logo">
                                <x-jet-authentication-card-logo />
                            </x-slot>

                            <div class="mb-4 text-sm text-gray-600">
                                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                            </div>

                            <x-jet-validation-errors class="mb-4" />

                            <form method="POST" action="{{ route('password.confirm') }}">
                                @csrf

                                <div>
                                    <x-jet-label for="password" value="{{ __('Password') }}" />
                                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" autofocus />
                                </div>

                                <div class="flex justify-end mt-4">
                                    <x-jet-button class="ml-4">
                                        {{ __('Confirm') }}
                                    </x-jet-button>
                                </div>
                            </form>
                        </x-jet-authentication-card>
                    </div>
                </div>
            </div>
        </div>

        <footer class="absolute w-full bottom-0 bg-gray-900 pb-6">
            <div class="container mx-auto px-4">
                <hr class="mb-6 border-b-1 border-gray-700" />
                <div class="flex flex-wrap items-center md:justify-between justify-center">
                    <div class="w-full md:w-4/12 px-4">
                        <div class="text-sm text-white font-semibold py-1">
                            {{ __('Copyright ©') }} {{ date('Y') }}
                            <a href="https://www.kalapresence.hr" class="text-white hover:text-gray-400 text-sm font-semibold py-1">
                                {{ __('Kala Presence') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </section>
</x-guest-layout>
