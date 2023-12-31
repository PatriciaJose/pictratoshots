<x-admin-layout>
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    @include('admin.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    @include('admin.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 -800 sm:rounded-lg">
                <div class="max-w-xl">
                    @include('admin.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
