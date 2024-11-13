{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-jet-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-jet-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout> --}}

@extends('backend.layouts.main')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

@section('content')
    <div class="container-scroller">
        @include('backend.layouts.nav')

        <div class="container-fluid page-body-wrapper">
            @include('backend.layouts.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="col-12 grid-margin stretch-card">

                            <x-slot name="header">
                                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                    {{ __('Profile') }}
                                </h2>
                            </x-slot>

                            <div>
                                <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                                    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                                        <!-- Livewire component for updating profile information -->
                                        @livewire('profile.update-profile-information-form')

                                        <x-jet-section-border />
                                    @endif

                                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                                        <!-- Livewire component for updating password -->
                                        <div class="mt-10 sm:mt-0">
                                            @livewire('profile.update-password-form')
                                        </div>

                                        <x-jet-section-border />
                                    @endif

                                    @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                                        <!-- Livewire component for two-factor authentication -->
                                        <div class="mt-10 sm:mt-0">
                                            @livewire('profile.two-factor-authentication-form')
                                        </div>

                                        <x-jet-section-border />
                                    @endif

                                    <div class="mt-10 sm:mt-0">
                                        <!-- Livewire component for logging out other browser sessions -->
                                        @livewire('profile.logout-other-browser-sessions-form')
                                    </div>

                                    @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                                        <x-jet-section-border />

                                        <!-- Livewire component for deleting the user account -->
                                        <div class="mt-10 sm:mt-0">
                                            @livewire('profile.delete-user-form')
                                        </div>
                                    @endif

                                    @include('backend.layouts.footer')
                                </div>
                            </div>


                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
