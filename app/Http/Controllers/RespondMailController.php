<?php

namespace App\Http\Controllers;

use App\Fault;
use App\FaultReply;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

use App\Http\Requests;

class RespondMailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, array(

            'message' => 'required'

        ));

        $input = $request->all();

        FaultReply::create($input);

//


        $respond_data = array(

            'email' => $request->client_mail,
            'respond_message' => $request->message

        );

        Mail::send('emails.respond', $respond_data, function ($message) use($respond_data){

            $message->from('cnp.thennakoon@gmail.com');
            $message->to($respond_data['email']);
            $message->subject('Regarding the issue');

        });

        Session::flash('respond_sent', 'Reply sent successfully!');

        return redirect()->route('fault.show', $request->fault_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
