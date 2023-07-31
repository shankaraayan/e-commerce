{{-- @dd($user) --}}
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 ">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>


    <form method="post" action="" class="mt-6 space-y-6">

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" disabled autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input  id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" disabled required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input  id="phone" name="phone" type="phone" class="mt-1 block w-full" :value="old('phone', $user->phone)" disabled required autocomplete="Phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button type="button"
            ><a href="{{route('admin.users.list')}}">{{ __('Go Back') }}</a></x-primary-button>
        </div>
    </form>
</section>

