<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;
use App\Visit;

class VisitController extends Controller
{

    public function store(Request $request, Link $link){
        return $link->visits()->create([
            'user_agent' => $request->userAgent()
        ]);
    }
}
