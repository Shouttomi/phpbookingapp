@extends('AdminDashboard.Layout.adminBaseView')
<style>
    .icon {  
  float: right;
  font-size:500%;
  position: absolute;
  top:0rem;
  right:-0.3rem;
  opacity: .16;
}


#user-container
{
  width: 1200px;
  display: flex;
}
#web-container
{
  width: 1200px;
  display: flex;
}
#booking-container
{
  width: 1200px;
  display: flex;
}

.grey-dark
{
  background: #495057;
  color: #efefef;
}

.red-gradient {
  background: linear-gradient(180deg, rgba(207,82,82,1) 0%, rgba(121,9,9,1) 80%);
  color: #fff;
}
.red {
  background: #a83b3b;
  color: #fff;
}


.purple
{
  background: #886ab5;
  color: #fff;
}

.orange {
  background: #ffc241;
  color: #fff;
}

.kpi-card
{
  overflow: hidden;
  position: relative;
  box-shadow: 1px 1px 3px rgba(0,0,0,0.75);;
  display: inline-block;
  float: left;
  padding: 1em;
  border-radius: 0.3em;
  font-family: sans-serif;  
  width: 240px;
  min-width: 180px;
  margin-left: 0.5em;
  margin-top: 0.5em;
}

.card-value {
  display: block;
  font-size: 200%;  
  font-weight: bolder;
}

.card-text {
  display:block;
  font-size: 70%;
  padding-left: 0.2em;
}
</style>
@section('dashContent')
    <div class="container mt-2">
        <h6>User KPI</h6><hr>
        <div id="user-container">
            <div class="kpi-card orange">
                <span class="card-value">{{$data['totalUsers']}}</span>
                <span class="card-text">Total Users</span>
                <i class="bi bi-people-fill icon"></i>
            </div>
            <div class="kpi-card orange">
                <span class="card-value">{{$data['adminUsers']}}</span>
                <span class="card-text">Admin Users</span>
                <i class="bi bi-person-lock icon"></i>
            </div>
            <div class="kpi-card orange">
                <span class="card-value">{{$data['clientUsers']}} </span>
                <span class="card-text">Client Users</span>
                <i class="bi bi-person icon"></i>
            </div>
        </div>
    </div>
    <div class="container  mt-2">
        <h6>Booking KPI</h6><hr>
        <div id="web-container">
            <div class="kpi-card purple">
                <span class="card-value">{{$data['totalBookings']}}</span>
                <span class="card-text">Total Bookings</span>
                <i class="bi bi-journal-plus icon"></i>
            </div>
            <div class="kpi-card grey-dark">
                <span class="card-value">{{$data['completedBookings']}}</span>
                <span class="card-text">Completed Bookings</span>
                <i class="bi bi-journal-check icon"></i>
            </div>
        </div>
    </div>
    <div class="container  mt-2">
        <h6>Webpage KPI</h6><hr>
        <div id="booking-container">
            <div class="kpi-card red">
                <span class="card-value">{{$data['totalWebpages']}}</span>
                <span class="card-text">Total Web Pages</span>
                <i class="bi bi-globe icon"></i>
            </div>
            <div class="kpi-card red">
                <span class="card-value">{{$data['activeWebpages']}}</span>
                <span class="card-text">Active Web Pages</span>
                <i class="bi bi-clipboard2-check icon"></i>
            </div>
        </div>
    </div>
  
@endsection