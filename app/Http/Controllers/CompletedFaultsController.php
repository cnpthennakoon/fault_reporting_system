<?php

namespace App\Http\Controllers;

use App\Fault;
use App\FaultReply;
use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;

class CompletedFaultsController extends Controller
{
    public function getIndex()
    {
        $faults = Fault::paginate(8);

        return view('completedFaults.index', compact('faults'));
    }

    public function show($id)
    {
        $fault = Fault::find($id);

        $responds = FaultReply::where('fault_id', $fault->id)->get();

        $images = Photo::where('fault_id', $fault->id)->get();

        return view ('completedFaults.show', compact('responds', 'images'))->withFault($fault);
    }
}
