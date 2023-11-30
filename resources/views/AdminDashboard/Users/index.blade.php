@extends('AdminDashboard.Layout.adminBaseView')
@section('dashContent')
    <div class="container">
        <a href="{{route('user.add')}}" class="btn btn-primary mb-2 float-end">Create New user</a>
        <table class="table table-light table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">User Name</th>
                <th scope="col">User Email</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @php $i =1; @endphp
                @foreach($data as $user)
                <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{@$user->name}}</td>
                    <td>{{@$user->email}}</td>

                    <td><div class="dropdown">
                        <span class="bi bi-list"></span>
                        <div class="dropdown-content">
                            <a href="{{route('user.edit',['id'=>$user->id])}}"><i class="bi bi-pencil-square"></i> Edit</a>
                            <a href="{{route('user.view.delete',['id'=>$user->id])}}"><i class="bi bi-trash"></i> Delete</a>
                        </div>
                    </div>
                    </td>
                </tr>
                @php $i++; @endphp
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
