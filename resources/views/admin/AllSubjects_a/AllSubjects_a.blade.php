<x-admin-layout>
    <x-slot name="header">
    <div class="panel-heading">
        
            <a href="{{ route('admin.migration')}}" class="btn btn-secondary">Back</a>
                <h2 class="text-center mt-1">Admission Automation</h2>
    </div>
                <h4 class="text-center mt-1"><b>Student Subject Choice</b></h4>
                <div>
                    <form class="col-5">
                    @csrf
                        <input class="form control" name="search" type="search" placeholder="GST Roll" aria-label="search">
                        <button class="btn btn-success" type="submit">Search</button>
                        <a href="{{ route('admin.allSubjects_a')}}">
                        <button class="btn btn-primary " type="button">
                            Reset
                        </button>
                        </a>
                    </form><br>
                </div>
   <table id="" class="table table-striped table-bordered">
                        <thead class="table-success text-center">
                            <tr>
                                <th>Roll</th>
                                <th>Subject</th>
                                <th>Subject Order</th>
                                <th>Merit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subject_choice as $row)
                                <tr>
                                    <td class="text-center">{{$row->Roll}}</td>
                                    <td>{{$row->Subject}}</td>
                                    <td td class="text-center">{{$row->Subject_Order}}</td>
                                    <td td class="text-center">{{$row->Merit}}</td>
                                </tr>
                            @endforeach
                        </tbody>     
    </table>
    <div class="row">
        {{$subject_choice->links()}}
    </div>          
    </x-slot>
</x-admin-layout>
