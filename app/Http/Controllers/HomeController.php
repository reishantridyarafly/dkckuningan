<?php

namespace App\Http\Controllers;

use App\Mail\MailLolosAdministrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        // Mail::to('sigittitiw@gmail.com')->send(new MailLolosAdministrasi);
    }
}
