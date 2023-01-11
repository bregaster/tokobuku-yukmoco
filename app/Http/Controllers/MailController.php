<?php

namespace App\Http\Controllers;

use App\Mail\PesananBaru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public static function pesananbaru($email){
        Mail::to($email)->send(new PesananBaru());
		return "Email telah dikirim";
    }
}
