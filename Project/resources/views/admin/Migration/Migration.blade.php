<x-admin-layout>
    <x-slot name="header">
    <div class="panel-heading">
    <a href="{{route('admin.dashboard')}}" class="btn btn-secondary">Back</a>
            <h2 class="text-center mt-1">Admission Automation</h2>
    </div>
    @csrf
    <table id="" class="table table-striped table-bordered">
                        <thead class="table-success text-center">
                            <tr>
                                <th>S.L</th>
                                <th>Details</th>
                                <th>Action</th>
                                <th>A Unit</th>
                                <th>B Unit</th>
                                <th>C Unit</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Update Subject after Publishing New Merit List</td>
                                    <form action="migrate" method="POST">
                                    @csrf
                                        <td class="text-center"><button class="btn btn-danger" onclick="migartion()">Migrate </button></td>
                                    </form> 
                                    <td class="text-center"><a href="{{ route('admin.migrationdetails_a') }}" class="btn btn-success">Details</a></td>
                                    <td class="text-center"><a href="{{ route('admin.migrationdetails_b') }}" class="btn btn-success">Details</a></td>
                                    <td class="text-center"><a href="{{ route('admin.migrationdetails_c') }}" class="btn btn-success">Details</a></td>
                                </tr>
                                <tr>
                                <td></td>
                                <td></td> 
                                <td></td> 
                                <td></td>
                                <td></td> 
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td> 
                                <td></td> 
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td> 
                            </tr>
                                <tr>
                                <td>2</td>
                                <td>Total Students Subject Choice with order</td>
                                <td ></td>
                                <td class="text-center"><a href="{{ route('admin.allSubjects_a')}}" class="btn btn-success">Details</a></td>
                                <td class="text-center"><a href="{{ route('admin.allSubjects_b')}}" class="btn btn-success">Details</a></td>
                                <td class="text-center"><a href="{{ route('admin.allSubjects_c')}}" class="btn btn-success">Details</a></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td> 
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td> 
                                <td></td> 
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td> 
                                <td></td> 
                            </tr>
                            </tr>
                                <tr>
                                <td>3</td>
                                <td>Selected Students</td>
                                <td></td> 
                                <td class="text-center"><a href="{{ route('admin.selectedlist')}}" class="btn btn-success">Details</a></td>
                                <td></td> 
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>  
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td> 
                                <td></td>
                                <td></td> 
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>  
                                <td></td>
                            </tr>
                            </tr>
                                <tr>
                                <td>4</td>
                                <td>Stop Migration for All Other Subject</td>
                                <form action="stopmigrate" method="POST">
                                    @csrf
                                        <td class="text-center"><button class="btn btn-danger" onclick="migartion()">Migrate </button></td>
                                    </form>
                                <td class="text-center"><a href="{{ route('admin.stopmigrationlist')}}" class="btn btn-success">Details</a></td>
                                <td></td> 
                                <td></td>
                            </tr>
                        </tbody>
    </table>    
    </x-slot>
</x-admin-layout>
<script>
    function migartion() {
  alert("Are you Sure to Proceed?");
}
</script>
