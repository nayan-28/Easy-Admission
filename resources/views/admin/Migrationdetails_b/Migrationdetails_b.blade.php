<x-admin-layout>
    <x-slot name="header">
    <div class="panel-heading">
    <a href="{{route('admin.migration')}}" class="btn btn-secondary">Back</a>
            <h2 class="text-center mt-1">Admission Automation</h2>
    </div>
                <h4 class="text-center mt-1"><b>Subject Choice List</b></h4>
                <div>
                    <form class="col-5">
                    @csrf
                        <input class="form control" name="search" type="search" placeholder="GST Roll" aria-label="search">
                        <button class="btn btn-success" type="submit">Search</button>
                        <a href="{{ route('admin.migrationdetails_b') }}">
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
                                <th>Merit</th>
                                <th>Details</th>
                                <th>Migration</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subject_choice as $row)
                                <tr>
                                    <td class="text-center">{{$row->Roll}}</td>
                                    <td class="text-center">{{$row->Merit}}</td>
                                    <form class="col-5" action="Studentsdetails_b" method="POST">
                                        @csrf
                                            <td class="text-center"><button class="btn btn-primary" type="submit" name="roll[{{$row->Roll}}]" value="{{$row->Roll}}">View </button></td>
                                            </form>
                                            <form class="col-5" action="stopmigration_b" method="POST">
                                                @csrf
                                                <td class="text-center"><button class="btn btn-danger" type="submit" name="gstroll[{{$row->Roll}}]" value="{{$row->Roll}}" onclick="migartion()">Stop </button></td>
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>     
    </table>  
            <div class="row">
                {{$subject_choice->links()}}
            </div>       
    </x-slot>
</x-admin-layout>
<script>
    function migartion() {
  alert("Are you Sure to Proceed?");
}
</script>
