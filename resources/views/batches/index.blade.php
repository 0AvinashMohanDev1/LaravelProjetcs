<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <h2>You can create Batch</h2>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <x-nav-link :href="route('batches.create')">
                    Create batches
                </x-nav-link>
                @foreach($batches as $batch)
                    <p><a href="{{route('batches.show',['batch'=>$batch])}}">{{$batch->id}}</a>. {{$batch->name}} --{{$batch->course}} --{{$batch->created_at}} <a href="{{route('batches.edit',['batch'=>$batch])}}">Edit</a></p>
                    
                @endforeach
                
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
