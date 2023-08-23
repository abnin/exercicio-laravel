<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                        >{{ $message }}</p>
                    </div>
                    @endif
                    <div class="relative overflow-x-auto">
                        <div class="flex items-center gap-4 float-right pb-2">
                            <a href="{{ route('contacts.create') }}">Create Contacts</a>
                        </div>
                        <table class="w-full text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"> 
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact->id }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td class="text-sm uppercase">
                                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="Post">
                                                <div class="flex items-center gap-4">
                                                    <a href="{{ route('contacts.show', $contact->id) }}">Detail</a>
                                                    &nbsp;
                                                    <a href="{{ route('contacts.edit', $contact->id) }}">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    &nbsp;
                                                
                                                    <x-primary-button>{{ __('Delete') }}</x-primary-button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                    {!! $contacts->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
