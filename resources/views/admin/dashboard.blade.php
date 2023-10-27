<x-admin-layout>
<x-slot name="header">
    <div class="panel-heading">
            <h2 class="text-center mt-3">Admission Automation</h2>
    </div>
    <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col" class="text-center">S.L</th>
      <th scope="col" class="text-center">Details</th>
      <th scope="col" class="text-center">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row" class="text-center">1</th>
      <td>New Users Request</td>
      <td class="text-center"><a href="{{ route('admin.newusers') }}" class="btn btn-primary">
      View  
    </a>
      </td>
    </tr>
    <tr>
      <th scope="row" class="text-center">2</th>
      <td>Old Users</td>
      <td class="text-center"><a href="{{ route('admin.oldusers') }}" class="btn btn-secondary">View </a> 
      </td>
    </tr>
    <tr>
      <th scope="row" class="text-center">3</th>
      <td>Update Available Seat</td>
      <td class="text-center"><a href="{{ route('admin.availableseat') }}" class="btn btn-success">View </a> </td>
    </tr>
    <tr>
      <th scope="row" class="text-center">4</th>
      <td>Update Migration Lists</td>
      <td class="text-center"><a href="{{ route('admin.migration')}}" class="btn btn-danger">View </a> </td>
    </tr>
  </tbody>
</table>
    </x-slot>
</x-admin-layout>
