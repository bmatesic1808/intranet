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

                            <div x-data="{ recovery: false }">
                                <div class="mb-4 text-sm text-gray-600" x-show="! recovery">
                                    {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
                                </div>

                                <div class="mb-4 text-sm text-gray-600" x-show="recovery">
                                    {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
                                </div>

                                <x-jet-validation-errors class="mb-4" />

                                <form method="POST" action="{{ route('two-factor.login') }}">
                                    @csrf

                                    <div class="mt-4" x-show="! recovery">
                                        <x-jet-label for="code" value="{{ __('Code') }}" />
                                        <x-jet-input id="code" class="block mt-1 w-full" type="text" inputmode="numeric" name="code" autofocus x-ref="code" autocomplete="one-time-code" />
                                    </div>

                                    <div class="mt-4" x-show="recovery">
                                        <x-jet-label for="recovery_code" value="{{ __('Recovery Code') }}" />
                                        <x-jet-input id="recovery_code" class="block mt-1 w-full" type="text" name="recovery_code" x-ref="recovery_code" autocomplete="one-time-code" />
                                    </div>

                                    <div class="flex items-center justify-end mt-4">
                                        <button type="button" class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer"
                                                x-show="! recovery"
                                                x-on:click="
                                        recovery = true;
                                        $nextTick(() => { $refs.recovery_code.focus() })
                                    ">
                                            {{ __('Use a recovery code') }}
                                        </button>

                                        <button type="button" class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer"
                                                x-show="recovery"
                                                x-on:click="
                                        recovery = false;
                                        $nextTick(() => { $refs.code.focus() })
                                    ">
                                            {{ __('Use an authentication code') }}
                                        </button>

                                        <x-jet-button class="ml-4">
                                            {{ __('Login') }}
                                        </x-jet-button>
                                    </div>
                                </form>
                            </div>
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
