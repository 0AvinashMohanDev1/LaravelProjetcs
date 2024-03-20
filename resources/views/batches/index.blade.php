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
                <form action="" method="GET">
                    <input type="text" name="name" class="text-black-900" placeholder="find course">
                </form>
                <x-nav-link :href="route('batches.create')">
                    Create batches
                </x-nav-link>
                <!-- <x-primary-button class="ms-3">
                    <a href="{{ route('batches.index', ['count' => 'empty']) }}">Empty</a>
                </x-primary-button>

                <x-primary-button class="ms-3">
                    <a href="{{ route('batches.index', ['count' => 'non-empty']) }}">Non-Empty</a>
                </x-primary-button> -->
                <form action="{{ route('batches.index') }}" method="GET" class="inline">
                    <x-primary-button type="submit" class="ms-3">
                        <input type="hidden" name="count" value="all">
                        All
                    </x-primary-button>
                </form>
                <form action="{{ route('batches.index') }}" method="GET" class="inline ms-3">
                    <x-primary-button type="submit" class="mt-3">
                        <input type="hidden" name="count" value="empty">
                        Empty
                    </x-primary-button>
                </form>
                <form action="{{ route('batches.index') }}" method="GET" class="inline ms-3">
                    <x-primary-button type="submit" class="mt-3">
                        <input type="hidden" name="count" value="non-empty">
                        Non-Empty
                    </x-primary-button>
                </form>
                @foreach($batches as $batch)
                    <p><a href="{{route('batches.show',['batch'=>$batch])}}">{{$batch->id}}</a>. {{$batch->name}} --{{$batch->course}} --{{$batch->created_at}} <p>Total Quizzes: {{$batch->quizzes_count}}</p><a href="{{route('batches.edit',['batch'=>$batch])}}">Edit</a></p>
                @endforeach
                {{$batches->links()}}
                
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
