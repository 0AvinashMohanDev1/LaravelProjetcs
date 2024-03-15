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
                <h1>Quiz name:-> {{$quiz->title}}</h1>
                <h2>From:-> {{$quiz->starting}}</h2>
                <h2>To :-> {{$quiz->ending}}</h2>
                <p>Duration :-> {{$quiz->duration}} hour</p>
                <a class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"  href="{{route('quizzes.edit',['quiz'=>$quiz])}}">Edit</a>
                <x-danger-button><a class="bg-b"  href="{{route('quizzes.destroy',['quiz'=>$quiz->id])}}">Delete</a></x-danger-button>
            </div>
            <div class="p-6 text-gray-900 dark:text-gray-100">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <b>All Quizzes:-</b>
                <a href="{{route('questions.create',['quiz_id'=>$quiz->id])}}">Add question</a>
                
                @foreach($questions as $question)
                    <div class="p-6 text-gray-900 dark:text-gray-50">
                    <div >
                        <b>Question: {{$question->question}}</b>
                        <p>Type: {{$question->type}}</p>
                    </div>
                    <h2>Answer: {{$question->answer}}</h2>
                    <h2>A: {{$question->option_a}}</h2>
                    <h2>B: {{$question->option_b}}</h2>
                    <h2>C: {{$question->option_c}}</h2>
                    <h2>D: {{$question->option_d}}</h2>
                    </div>

                @endforeach
                
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
