<?php

namespace App\Http\Controllers;


use App\Models\WebPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebpageController extends Controller
{
    public function index(){

        $data = WebPage::where('status',1)->get();
        return view('AdminDashboard.WebPage.index',['data' => $data ]);
    }
    public function add(){
        return view('AdminDashboard.WebPage.addEdit');
    }
    public function save(Request $request){

        $page = new WebPage([
            'name'=> $request->get('page_name'),
            'slug'=> $request->get('page_slug'),
            'html'=> $request->get('page_content'),
            'created_by'=>Auth::user()->user_type,
            'status'=> $request->get('page_status')




        ]);

        //$page->status = $request->get('page_status');


        $page->save();
        return redirect()->route('webpage.index');
    }
    public function edit($id){

        $data = WebPage::find($id);
        return view('AdminDashboard.WebPage.addEdit',['data'=>$data]);

    }
    public function update(Request $request,$id){

        $page =  WebPage::find($id);
            $page->name =  $request->get('page_name');
            $page->slug=  $request->get('page_slug');
            $page->html=  $request->get('page_content');
            $page->status=  $request->get('page_status');

            $page->updated_by=  Auth::user()->$id;



        $page->save();
        return redirect()->route('webpage.index');
    }
    public function viewDelete($id){

        return view('AdminDashboard.WebPage.delete');
    }
    public function delete($id){
        WebPage::where('id',$id)->delete();
        return redirect()->route('webpage.index');

    }
    public function landing(){
        return view('index');
    }
    public function viewPage($page){

        $data = WebPage::where('slug',$page)->first();


        /* ['data'=>$data] this is an associative array
        The key 'data' will be accessible as a variable with
        the same name in the Blade template
        For example, you can use {{ $data }} in the Blade view
        to display the value of $data.*/
        return view('dynamic',['data'=>$data]);
    }

}
