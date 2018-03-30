<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FeedbackController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $feedback = new Feedback;
        $feedback->nota = $request->nota;
        $feedback->feedback = $request->feedback;
        $feedback->save();

        return Redirect::route('quiz.escolher')->with('status', 'Obrigado por nos dar seu feedback!');
    }

}
