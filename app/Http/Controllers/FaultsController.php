<?php

namespace App\Http\Controllers;

use App\Fault;
use App\FaultReply;
use App\Http\Requests\FaultRequest;
use App\Photo;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class FaultsController extends Controller
{
    /**
     * Display a listing of all faults.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faults = Fault::where('status', 0)->paginate(7);

        return view('faults.index', compact('faults'));
    }


    /**
     * Display a charts.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {

        $data =array();

        for ($x = 1; $x <= 12; $x++) {

            $data[$x] = Fault::whereYear('created_at', '=', Carbon::now())->whereMonth('created_at', '=', $x)->count();

        }

        $completed_data =array();

        for ($y = 1; $y <= 12; $y++) {

            $completed_data[$y] = Fault::where('status', 1)->whereYear('created_at', '=', Carbon::now())->whereMonth('created_at', '=', $y)->count();

        }

        return view('pages.home', compact('data', 'completed_data'));
    }

    /**
     * Display a listing of completed faults.
     *
     * @return \Illuminate\Http\Response
     */
    public function completed()
    {
        $faults = Fault::where('status', 1)->paginate(7);

        return view('faults.completed', compact('faults'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\FaultRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaultRequest $request)
    {

        $fault = Fault::create($request->input());

        if($request->hasFile('photo_id')) {

            $files = $request->file('photo_id');

            foreach ($files as $file) {

                $name = time() . $file->getClientOriginalName();
                $file->move('images', $name);

                $photo = Photo::create([
                    'fault_id' => $fault->id,
                    'file' => $name,
                ]);

            }
        }

        Mail::send('emails.fault', $request->input(), function ($message) use($request){

            $message->from($request->input('email'));
            $message->to('cnp.thennakoon@gmail.com');
            $message->cc($request->input('email'));
            $message->subject($request->input('title'));

        });

        Session::flash('fault_sent', 'Fault has been reported successfully!');

        return redirect('/report');

    }
//
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\FaultRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function customerStore(FaultRequest $request)
    {

        $fault = Fault::create($request->input());

            if($request->hasFile('photo_id')) {

            $files = $request->file('photo_id');

            foreach ($files as $file) {

                $name = time() . $file->getClientOriginalName();
                $file->move('images', $name);

                $photo = Photo::create([
                    'fault_id' => $fault->id,
                    'file' => $name,
                ]);

            }
        }

        Mail::send('emails.fault', $request->input(), function ($message) use($request){

            $message->from($request->input('email'));
            $message->to('cnp.thennakoon@gmail.com');
            $message->cc($request->input('email'));
            $message->subject($request->input('title'));

        });

        return redirect('/thank');

    }
//


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Fault $fault)
    {
        return view ('faults.show')->withFault($fault);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fault $fault)
    {
        $fault->update($request->input());

        Session::flash('fault_completed', 'Fault Completed!');

        return redirect()->route('fault.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fault $fault)
    {

        $fault->delete();

        Session::flash('fault_delete', 'Fault report has been deleted successfully!');

        return redirect('/fault');

    }
}
