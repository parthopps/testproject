<?php

namespace App\Http\Controllers;
use App\User;
use App\License;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function allData()
    {
        $data = User::orderBy('id', 'DESC')->get();
        return response()->json($data);
    }



    public function searchuser(Request $request)
    {
        $data = User::where('id', 'like', '%' . $request->get('searchQuest') . '%')->get();
        return json_encode($data);
    }

    public function licencestore(Request $request)
    {
         $request->validate
       ([

        'gender' => 'required',
        

        ]);

      $random = rand(0,999);
      $Labpercent = new License();

      
      $Labpercent->key =$random ;
      $Labpercent->month =$request->gender;


      $Labpercent->save();

      return back();

    }

    public function userupdate(Request $request)
    {

        $product =User::find($request->search);

        $product->ukey =$request->key;

        $product->save();

        return redirect()->route('activecode',$product->id);

    }

    public function active($id)
    {

        $order=User::find( $id );
        return view ('active',compact('order'));

    }

    public function userupdate2(Request $request)
    {
        $product =User::find($request->id);

        $current = Carbon::now();
        $current = new Carbon();

        $product->expire_date = Carbon::now()->addMonth($request->month);

        $product->save();

        return redirect()->route('congratulation',$product->id);

    }

     public function congratulations($id)
    {

        $order=User::find( $id );
        return view ('congratulation',compact('order'));

    }
}
