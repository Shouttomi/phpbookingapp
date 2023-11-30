@extends('AdminDashboard.Layout.adminBaseView')
@section('dashContent')
    <div class="container">
        <a href="{{route('webpage.add')}}" class="btn btn-primary mb-2 float-end">Create New Page</a>
        <table class="table table-light table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Page Name</th>
                <th scope="col">Page Slug</th>
                <th scope="col">Action</th>


              </tr>
            </thead>
            <tbody>
                @php $i =1; @endphp
                @foreach($data as $page)
                <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{@$page->name}}</td>
                    <td>{{@$page->slug}}</td>


                    <td><div class="dropdown">
                        <span class="bi bi-list"></span>
                        <div class="dropdown-content">
                            <a href="{{route('webpage.edit',['id'=>$page->id])}}"><i class="bi bi-pencil-square"></i> Edit</a>
                            <a href="{{route('webpage.view.delete',['id'=>$page->id])}}"><i class="bi bi-trash"></i> Delete</a>
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
