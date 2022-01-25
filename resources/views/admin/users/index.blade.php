@extends('layouts.admin')

@section('content')
<div class="container col-md-10">
    <div class="row justify-content-center">
        <div class="col">
            <br>
            <h2>List User</h2>
            <div class="row g-0">
                <div class="col-md-9">
                    
                </div>
                <div class="col-md-3">
                    {{-- <div class="form-group">
                        <select id="order_field" class="custom-select mr-sm-2">
                            <option value="" disabled selected> Urutkan </option>
                            <option value="nama_asc">Nama A-Z</option>
                            <option value="nama_desc">Nama Z-A</option>
                            <option value="terbaru">Terbaru</option>
                        </select>
                    </div> --}}
                </div>
            </div>
            <div class="card" style="padding-right: 10px; padding-left: 10px;">
                <div class="table-responsive">
                    <table class="table table-md">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role ( 1 = Admin, 0 = User)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->is_admin }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data?')"> <i class="fas fa-trash-alt"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>                           
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

   {{-- <!-- Jquery -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script type="text/javascript">
       $(document).ready(function(){
           $('#order_field').change(function() {
            window.location.href = 'users/?order_by=' + $(this).val();
           });
       });
   </script> --}}
@endsection