<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class MailController extends Controller
{
    public function requestUser(Request $request) {
        $data = $request->all();

        Mail::send(['html' => 'mail.requestUser'], $data, function($message) {
            $message->to('jun1or.club@yandex.ru', 'To Junior Club')->subject('Новая заявка!');
            $message->from('jun1or.club@yandex.ru', 'Junior CLub');

        });
        return view('layouts.afterRequest');
    }
}
