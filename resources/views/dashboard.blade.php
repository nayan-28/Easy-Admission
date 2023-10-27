<x-app-layout>
<x-slot name="header">
    @csrf
        <div class="d-flex justify-content-center">
            <marquee direction="left">
                <h3><b>Welcome to Easy Admission</b></h3>
            </marquee>
        </div>
        <div class="d-flex justify-content-center">
                <h3><b>What You Can Access</b></h3>
        </div>
        <div class="d-flex justify-content-center">
        <table id="" class="table table-striped table-bordered">
                        <thead class="table-success text-center">
                            <tr>
                                <th>S.L</th>
                                <th>Features</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Possibility of Chance (Subject Wise)</td>
                                
                                @if((Auth::user()->status) == '1')
                                <td rowspan="5" class="text-center">
                                <a href="{{ route('details')}}" class="btn btn-success" style="margin-top:88px">View</a>
                                </td>
                                @else
                                <td rowspan="5" class="text-center">
                                <button class="btn btn-warning disabled"  style="margin-top:88px" >View</button><p>Payment Verifying</p>
                                </td>
                                @endif
                                    
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>See the total number of Available seat (Subject Wise)</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>See your Position (Subject Wise)</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>You will know what subject you can get next.</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>You will know how many students you are behind in any subject.</td>
                            </tr>
                        </tbody> 
   
            </table>
        </div>
        <div>
                            @if((Auth::user()->status) == '0')
                                   <b class="text-warning bg-dark">N.B: Payment verifiyng takes some moment.After verification,you can access all features.Please wait.....</b>
                            @endif
        </div>
    </x-slot>
</x-app-layout>
