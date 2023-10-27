<x-app-layout>
    <x-slot name="header">
                            @if((Auth::user()->status) == '1')
            <div class="d-flex justify-content-center">
                    <marquee direction="left">
                    <h3><b>Welcome to Easy Admission</b></h3>
                    </marquee>
        </div>

        <div class="text-center">GST Roll: {{ Auth::user()->roll }}</div>
            @php
                $user_roll = Auth::user()->Roll; 
            @endphp 
            
            @php 
            $combinedData = array();
                    foreach($seat as $row) {
                        $subjectCount = 0;
                        foreach($subject_choice as $subjectRow) {
                        if ($row->subject_name == $subjectRow->Subject) {
                        $subjectCount = $subjectRow->subject_count;
                        break;
                        }
                    }
                    $combinedData[] = array(
                    'subject_name' => $row->subject_name,
                    'total_seat' => $row->total_seat,
                    'admission_ratio' => $row->admission_ratio,
                    'available_seat' => $row->available_seat,
                    'Subject_Order' => $row->Subject_Order,
                    'subject_count' => $subjectCount,
    );
}
            @endphp
            @if(count($subject_name) > 0)
                    <table id="" class="table table-striped table-bordered">
                    <div class="text-center"><b style="color: green;"><h5>Congrats! You are selected</h5></b></div>
                        <thead class="table-success text-center">
                            <tr>
                                <th>S.L</th>
                                <th>Subject</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($subject_name as $row)
                            <tr>
                                <td class="text-center">{{$row->Subject_Order}}</td>
                                <td>{{$row->Alloted_Subject}}</td>
                                <td class="text-center" class="text-warning bg-dark"><b>Selected</b></td>
                            </tr>
                        @endforeach
                        @else
                            <tr>
                                <td><div class="text-center"><b style="color: red;"><h5>You are not selected to any subject yet</h5></b></div></td>
                            </tr>
                    @endif
                        </tbody>     
                    </table> 
@if (count($combinedData) > 0)
        <p class="text-center" style="color:blue">Waiting</p>
    <table id="" class="table table-striped table-bordered table-responsive">
    <form class="col-5">
        @csrf
                        <thead class="table-success text-center">
                            <tr>
                                <th>S.L</th>
                                <th>Subject</th>
                                <th>Available Seat</th>
                                <th>Position</th>
                                <th>Possibilty</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
    $found_100_percent = false;
@endphp

@foreach($combinedData as $row)
    <tr>
        <td class="text-center">{{$row['Subject_Order']}}</td>
        <td>{{$row['subject_name']}}</td>
        <td class="text-center">{{$row['available_seat']}}</td>
        <td class="text-center">{{$row['subject_count']}}</td>
        <td class="text-center">
            @if($row['subject_count'] == 0 || $row['available_seat'] >= $row['subject_count'])
                100%
            @elseif($row['available_seat'] == 0)
                0%
            @elseif(($row['available_seat']/($row['admission_ratio']*$row['subject_count'])) * 100 > 100)
                100%
            @else
                {{ number_format(($row['available_seat']/($row['admission_ratio']*$row['subject_count'])) * 100, 2) }}%
            @endif
        </td>
    </tr>
    @if($row['available_seat'] >= $row['subject_count'] || ($row['subject_count'] > 0 && ($row['available_seat']/($row['admission_ratio']*$row['subject_count']))* 100 >= 100))
        @php
            $found_100_percent = true;
        @endphp
        @break
    @endif
@endforeach

                        @endif

                        </tbody>     
                        </form>
                    </table> 
                                @else
                                <div class="d-flex justify-content-center">
                                    <marquee direction="left">
                                        <h3><b>Welcome to Easy Admission</b></h3>
                                    </marquee>
                                </div> 
                                    <b class="text-warning bg-dark">Your payment under verifying......Wait or contact to Support</b>
                                @endif
    </x-slot>
</x-app-layout>
