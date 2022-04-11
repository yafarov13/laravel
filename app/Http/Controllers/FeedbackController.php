<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('feedback.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'userName' => ['required', 'string']
        ]);

        $data = $request->only('userName', 'feedback');
        $data = json_encode($data);
        file_put_contents('feedback.txt', $data, FILE_APPEND);

        return view('feedback.feedbackSent');
    }
}
