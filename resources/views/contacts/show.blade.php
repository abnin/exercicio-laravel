<x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Contact Information') }}
            </h2>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @csrf
                        @method('patch')

                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="$contact->name" disabled/>
                        </div>

                        <div>
                            <x-input-label for="phone_number" :value="__('Phone Number')" />
                            <x-text-input id="phone_number" name="phone_number" type="text" class="mt-1 block w-full" :value="$contact->phone_number" disabled />
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="$contact->email" disabled/>
                        </div>

                        <div class="flex items-center gap-4">
                            <a class="'block uppercase font-medium text-sm text-gray-700 dark:text-gray-300" href="{{ route('contacts.edit', $contact->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <x-primary-button>{{ __('Delete') }}</x-primary-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>