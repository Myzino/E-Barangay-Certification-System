<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function IndigencyShow() {         //to view student page

        return view('indigency');

    } //end method

    public function ResidenceShow() {         //to view student page

        return view('residence');

    } //end method

    public function ClearanceShow() {         //to view student page

        return view('clearance');

    } //end method
}
