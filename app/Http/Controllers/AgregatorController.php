<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgregatorController extends Controller
{
    public function index()
    {
        return view('agregator.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'client' => ['required', 'string']
        ]);

        $data = $request->only('client', 'phone', 'email', 'info');
        $data = json_encode($data);
        file_put_contents('agregator.txt', $data, FILE_APPEND);

        return view('agregator.agregatorSent');
    }
}
