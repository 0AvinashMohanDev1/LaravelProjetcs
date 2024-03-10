<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Batch {{$batch->name}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <form method="POST" action="{{ route('batches.update', ['batch' => $batch->id]) }}">
                    @csrf
                    @method("PUT")      
                    <div class="form-group">
                        <label for="exampleInputEmail1">Batch name</label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Batch name" value="{{ old('name', $batch->name) }}">
                        
                        <label for="exampleInputEmail1">Course Type</label>
                        <select name="type" id="type">
                            <option value="full-time" {{ old('type', $batch->type) == 'full-time' ? 'selected' : '' }}>Full-Time</option>
                            <option value="part-time" {{ old('type', $batch->type) == 'part-time' ? 'selected' : '' }}>Part-Time</option>
                        </select>
                        
                        <label for="exampleInputEmail1">Course</label>
                        <select name="course" id="course">
                            <option value="Android" {{ old('course', $batch->course) == 'Android' ? 'selected' : '' }}>Android</option>
                            <option value="Software" {{ old('course', $batch->course) == 'Software' ? 'selected' : '' }}>Software</option>
                            <option value="Analytics" {{ old('course', $batch->course) == 'Analytics' ? 'selected' : '' }}>Analytics</option>
                        </select>
                        
                        <label for="exampleInputEmail1">Start date</label>
                        <input type="date" class="form-control" name="created_at" id="created_at" value="{{ old('created_at', $batch->created_at) }}">
                    </div>
                    <button type="submit" class="btn btn-primary font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Submit</button>   
                    <form method="POST" action="{{ route('batches.update', ['batch' => $batch->id]) }}">
                        @csrf
                        @method("DELETE")  
                        <button type="submit" class="btn btn-primary font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Delete</button>   
                    </form>               
                </form>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
