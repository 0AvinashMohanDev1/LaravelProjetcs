<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            create Batch
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <form method="POST" action="{{url('/')}}/batches">
                    <!-- route('batches.store') -->
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Batch name</label>
                        <input type="text" class="form-control" name="batch" id="exampleInputEmail1" placeholder="batch name">
                        <label for="exampleInputEmail1">Course Type</label>
                        <select name="type" id="">
                            <option value="full-time">Full-Time</option><br>
                            <option value="part-time">Part-Time</option>
                        </select><label for="exampleInputEmail1">Course</label>
                        <select name="course" id="">
                            <option value="Android">Android</option><br>
                            <option value="Software">Software</option><br>
                            <option value="Analytics">Analytics</option>
                        </select><br><br>
                        <label for="exampleInputEmail1">Start date</label>
                        <input type="date" class="form-control" name="created_at" id="">
                        <!-- <label for="exampleInputEmail1">End date</label>
                        <input type="date" class="form-control" name="updated_at" id=""> -->

                    </div>
                    <button type="submit" class=" btn btn-primary font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Submit</button>                    
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
