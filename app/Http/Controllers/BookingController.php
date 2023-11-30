<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BookingController extends Controller
{
    public function index()
    {

        /* 'bookings.*': This part of the select statement selects
        all columns from the "bookings" table. It's a shorthand way
         of saying "select all columns in the 'bookings' table."

        'users.name as user_name': This part of the select statement selects
        the "name" column from the "users" table, and it gives it an alias
        "user_name." This means that when you fetch the results of this
        query, the "name" column from the "users" table will be available
         as "user_name." */

        $query = Bookings::select('bookings.*', 'users.name as user_name');

        /* In the expression bookings.user_id,
         "bookings" is the name of the table, and "user_id"
         is the name of the column within that table. This
         notation is used to specify which table and column
         you are referring to when constructing SQL queries */

        $query->leftJoin('users', 'bookings.user_id', '=', 'users.id');
        $data = $query->get();
        return view('AdminDashboard.Bookings.index', ['data' => $data]);
    }
    public function userBookings()
    {
        $query = Bookings::select('bookings.*', 'users.name as user_name');

        $query->leftJoin('users', 'bookings.user_id', '=', 'users.id');
        $query->where('bookings.user_id',Auth::user()->id);
        $data = $query->get();
        return view('UserDashboard.Bookings.index', ['data' => $data]);

    }

    public function add()
    {

        /* User::get() is a query that fetches all records
        (rows) from the "users" table. This data is then
        assigned to the variable $data. */
     $data = User::get();
     return view('AdminDashboard.Bookings.addEdit', ['data'=>$data]);
    }


    public function adduserbooking()
    {

        /* User::get() is a query that fetches all records
        (rows) from the "users" table. This data is then
        assigned to the variable $data. */
     $data = User::get();
     return view('UserDashboard.Bookings.addEdit', ['data'=>$data]);
    }

    public function save(Request $request)
    {
        $user = new Bookings([
            'name'=> $request->get('booking_name'),
            'booking_datetime'=> $request->get('booking_on'),
            'status'=> $request->get('booking_status'),
            'user_id'=>Auth::user()->user_type == 1? $request->get('user_name'):Auth::user()->id,




        ]);

        $user->save();
        if(Auth::user()->user_type == 1){
            $route = 'booking.all';
        }
        else{
            $route = 'booking.my';
        }

        return redirect()->route($route);
    }
    public function getBookingById($id)
    {
        $data = User::get();
        $booking = Bookings::find($id);
        return view('AdminDashboard.Bookings.addEdit',['data'=>$data,'booking'=>$booking]);
    }
    public function updateBookingById(Request $request,$id)
    {
        $booking = Bookings::find($id);
        $booking->name= $request->get('booking_name');
        $booking->booking_datetime= $request->get('booking_on');
        $booking->status = $request->get('booking_status');
        $booking->user_id =Auth::user()->user_type == 1? $request->get('user_name'):Auth::user()->id;

        $booking->save();

        if(Auth::user()->user_type == 1){
            $route = 'booking.all';
        }
        else{
            $route = 'booking.my';
        }

        return redirect()->route($route);

    }
    public function viewDelete($id)
    {
        if(Auth::user()->user_type == 1){
            $view = 'AdminDashboard.Bookings.delete';
        }
        else{
            $view = 'UserDashboard.Bookings.delete';
        }

        return view($view);

    }
    public function delete($id)
    {
        $status = Bookings::where('id',$id)->delete();

        if(Auth::user()->user_type == 1){
            $route = 'booking.all';
        }
        else{
            $route = 'booking.my';
        }

        return redirect()->route($route);

    }
}
