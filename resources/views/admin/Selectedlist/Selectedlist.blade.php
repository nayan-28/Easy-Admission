<x-admin-layout>
    <x-slot name="header">
    <div class="panel-heading">
    <a href="{{route('admin.migration')}}" class="btn btn-secondary">Back</a>
            <h2 class="text-center mt-1">Admission Automation</h2>
    </div>
                <div>
                    <form class="col-5">
                    @csrf
                        <input class="form control" name="search" type="search" placeholder="Transaction ID" aria-label="search">
                        <button class="btn btn-success" type="submit">Search</button>
                        <a href="{{ route('admin.selectedlist')}}">
                        <button class="btn btn-primary " type="button">
                            Reset
                        </button>
                        </a>
                    </form><br>
                  </div>
    <table id="" class="table table-striped table-bordered">
                        <thead class="table-success text-center">
                            <tr>
                                <th>GST Roll</th>
                                <th>Alloted Subject</th>
                                <th>Merit</th>
                                <th>Order</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($selected as $row)
                            <tr>
                                <td class="text-center">{{$row->Roll}}</td>
                                <td>{{$row->Alloted_Subject}}</td>
                                <td class="text-center">{{$row->Merit}}</td>
                                <td class="text-center">{{$row->Subject_Order}}</td>
                            </tr>
                        @endforeach     
                        </tbody>
    </table>  
            <div class="row">
                {{$selected->links()}}
            </div>  
    </x-slot>
</x-admin-layout>
