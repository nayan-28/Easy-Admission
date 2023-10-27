<x-admin-layout>
    <x-slot name="header">
    <div class="panel-heading">
    <a href="{{route('admin.migration')}}" class="btn btn-secondary">Back</a>
            <h2 class="text-center mt-1">Admission Automation</h2>
            <h2 class="text-center mt-1">Stop Migration List</h2>
    </div>
                <div>
                    <form class="col-5">
                    @csrf
                        <input class="form control" name="search" type="search" placeholder="Transaction ID" aria-label="search">
                        <button class="btn btn-success" type="submit">Search</button>
                        <a href="{{ route('admin.stopmigrationlist')}}">
                        <button class="btn btn-primary " type="button">
                            Reset
                        </button>
                        </a>
                    </form>
                  </div><br>
    <table id="" class="table table-striped table-bordered">
                        <thead class="table-success text-center">
                            <tr>
                                <th>GST Roll</th>
                            </tr>
                        </thead>
                            <tbody>
                                <tr>
                                @foreach($roll as $row)
                                <tr>
                                    <td class="text-center">{{$row->Roll}}</td>
                               </form> 
                                </tr>
                            @endforeach
                                </tr>    
                            </tbody>
    </table>   
            <div class="row">
                {{$roll->links()}}
            </div> 
    </x-slot>
</x-admin-layout>
