<x-app-layout>
    <h2 class="font-semibold text-xl text-blue-600 leading-tight">
        {{ __('Edit Tenant') }}
    </h2>

    <div class="py-12">
        <form action="{{ route('tenants.update', $tenant->id) }}" method="post">
            @csrf
            @method('PUT')

            <!-- Add your form fields for editing here -->
            <label for="name">Name:</label>
            <input type="text" name="name" value="{{ $tenant->name }}">

            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ $tenant->email }}">

            <!-- Add other fields as needed -->

            <button type="submit">Update Tenant</button>
        </form>
    </div>
</x-app-layout>