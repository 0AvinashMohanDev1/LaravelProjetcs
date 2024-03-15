<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('questions.store') }}">
        @csrf

        <!-- option- Address -->
        <div>
            <div></div>
            <x-input-label for="question" :value="__('Write you question :')" />
            <x-text-input id="question" class="block mt-1 w-full" type="text" name="question" :value="old('question')" required autofocus />
            <div>
            <x-input-label for="option" :value="__('Options-A')" />
            <x-text-input id="option_A" class="block mt-1 w-full" type="text" name="option_A" :value="old('option_A')" required autofocus />
            <x-input-label for="option" :value="__('Options-B')" />
            <x-text-input id="option_B" class="block mt-1 w-full" type="text" name="option_B" :value="old('option_B')" required autofocus />
            <x-input-label for="option" :value="__('Options-C')" />
            <x-text-input id="option_C" class="block mt-1 w-full" type="text" name="option_C" :value="old('option_C')" required autofocus />
            <x-input-label for="option" :value="__('Options-D')" />
            <x-text-input id="option_D" class="block mt-1 w-full" type="text" name="option_D" :value="old('option_D')" required autofocus />
            <x-input-label for="option" :value="__('Correct Option')" />
            <x-text-input id="correct" class="block mt-1 w-full" type="text" name="correct" :value="old('correct')" required autofocus />
        </div><br>
        <!-- Quiz Address -->
        <div>
        <x-input-label for="Quiz" :value="__('Quiz')" />
        <select name="quiz_id" id="" class="form-select" aria-label="Default select example" >
            <option value="">Select Quiz</option>
            @foreach ($quizzes as $quiz){
                <option value="{{$quiz->id}}">{{$quiz->title}}</option>
            }
            @endforeach               
        </select>
        <select name="type" id="" class="form-select" aria-label="Default select example">
            <option value="mcq">MCQ</option>
            <option value="short">Short</option>
        </select>
        </div>
        <button type="submit" class=" btn btn-outline-success text-gray-800 dark:text-gray-200">Create Question</button>  

        </div>
        
    </form>
</x-guest-layout>
