<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <h2>You can create Batch</h2>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <x-nav-link :href="route('batches.create')">
                    Create batches
                </x-nav-link>
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1>Batch name:-> {{$batch->name}}</h1>
                <h2>Course name:-> {{$batch->course}}</h2>
                <h2>Course Type:-> {{$batch->type}}</h2>
                <p>Batch start:-> {{$batch->created_at}}</p>
                <a class="bg-b"  href="{{route('batches.edit',['batch'=>$batch])}}">Edit</a>
                
            </div>
            <div class="p-6 text-gray-900 dark:text-gray-100">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <b>All Quizzes:-</b>
                @foreach($quizzes as $quiz)
                    
                    <p><a href="{{route('quizzes.show',['quiz'=>$quiz])}}">{{$quiz->id}}.</a> {{$quiz->title}}</p>
                @endforeach
                
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
