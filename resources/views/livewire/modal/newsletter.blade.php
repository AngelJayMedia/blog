<div>
    <button wire:click="confirmSubscription" wire:loading.attr="disabled" class="px-8 py-4 mx-auto my-6 font-bold text-gray-800 transition duration-300 ease-in-out transform bg-white rounded-full shadow-lg lg:mx-0 hover:underline focus:outline-none focus:shadow-outline hover:scale-105">
        Action!
    </button>

    <x-jet-dialog-modal wire:model="confirmingSubscription">
        <x-slot name="title">
            {{ __('Subscribe to our Newsletter') }}
        </x-slot>


        <x-slot name="content">

            <form wire:submit.prevent="submit">

                {{-- Name --}}
                <input wire:model="name" type="text" placeholder="Name" class="block w-full mt-5 rounded-md shadow-sm border-theme-olive focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <x-jet-input-error for='name' class="my-2 font-medium" />

                {{-- Email --}}
                <input wire:model="email" type="email" placeholder="Email" class="block w-full mt-5 rounded-md shadow-sm border-theme-olive focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <x-jet-input-error for='email' class="my-2 font-medium" />

                <button type="submit" class="inline-flex items-center px-4 py-2 mt-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out border border-transparent rounded-md bg-theme-olive hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                    Please
                </button>

            </form>


        </x-slot>

        {{-- Footer --}}
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingSubscription')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2">
                {{ __('Subscribe') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
<div>
    {{-- Stop trying to control. --}}
</div>
