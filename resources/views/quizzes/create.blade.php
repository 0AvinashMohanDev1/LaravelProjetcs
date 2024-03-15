<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('quizzes.store') }}">
        @csrf

        <!-- Title Address -->
        <div>
            <x-input-label for="title" :value="__('Quiz-Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
        </div><br>
        <!-- Email Address -->
        <div>
        <x-input-label for="Batch" :value="__('Batch')" />
        <select name="batch_id" id="" class="form-select" aria-label="Default select example" >
            <option value="">Select Batch</option>
            @foreach ($batches as $batch){
                <option value="{{$batch->id}}">{{$batch->name}}</option>
            }
            @endforeach               
        </select>
        </div>
        <x-input-label for="from" :value="__('from')" />
        <input type="datetime-local" name="starting" id="">
        <x-input-label for="to" :value="__('to')" />
        <input type="datetime-local" name="ending" id="">
        <div>
            <x-input-label for="duration" :value="__('Duration')" />
            <x-text-input id="duration" class="block mt-1 w-half" type="number" name="duration" :value="old('duration')" required autofocus />
        </div><br>
        <button type="submit" class=" btn btn-outline-success text-gray-800 dark:text-gray-200">Create Quiz</button>  

        </div>
        
    </form>
</x-guest-layout>
