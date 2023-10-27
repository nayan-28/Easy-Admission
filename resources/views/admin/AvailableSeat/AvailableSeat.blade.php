<x-admin-layout>
    <x-slot name="header">
    <div class="panel-heading">
            <h2 class="text-center mt-1">Admission Automation</h2>
            <h4 class="text-center mt-1"><b>Available Seat</b></h4>
    </div>
   <table id="" class="table table-striped table-bordered">
                        <thead class="table-success text-center">
                            <tr>
                                <th>S.L</th>
                                <th>Subject</th>
                                <th>Total Seat</th>
                                <th>Available Seat</th>
                                <th>Admission Ratio</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($seat as $row)
                                <tr>
                                    <td class="text-center">{{$row->s_id}}</td>
                                    <td>{{$row->subject_name}}</td>
                                    <td class="text-center">{{$row->total_seat}}</td>
                                <form action="updateavailableseat" method="POST">
                                     @csrf
                                    <td>
                                        <input class="form-control" name="newseat" value="{{$row->available_seat}}">
                                    </td>
                                    <td>
                                        <input class="form-control" name="ratio" value="{{$row->admission_ratio}}">
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-success" type="submit" name="ids[{{$row->s_id}}]" value="{{$row->s_id}}"/>Update</button>
                                    </td>
                               </form> 
                                </tr>
                            @endforeach
                        </tbody>     
    </table>            
    </x-slot>
</x-admin-layout>
