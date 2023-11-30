@extends('AdminDashboard.Layout.adminBaseView')
@section('dashContent')
<form action="{{route('booking.delete',['id'=>Request::segment(3)])}}" method="post">
    @csrf
    <div class="mb-3 w-50">
        <h6 for="usertype"  class="form-label">Are you Sure you want to delete this Booking?</h6>
    </div>
    <div class="mb-3 w-50">
        <button type="submit" class="btn btn-danger">Delete</button>
    </div>
</form>
@endsection