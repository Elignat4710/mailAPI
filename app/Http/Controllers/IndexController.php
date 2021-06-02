<?php

namespace App\Http\Controllers;

use App\Jobs\MailSend;
use App\Models\Log;
use DateTime;
use DateTimeZone;
use Exception;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('index', [
            'logs' => Log::orderBy('id', 'desc')->paginate(10)
        ]);
    }

    public function form()
    {
        return view('form');
    }

    public function send(Request $request)
    {
        try {
            $log = new Log;
            $log->fill($request->all())->save();
    
            $date = new DateTime($log['date'], new DateTimeZone('Etc/GMT-3'));
    
            $job = (new MailSend($log))->onConnection('redis')->onQueue('emails')->delay($date);
            dispatch($job);
    
            return redirect()->back()->withSuccess('Form sent');
        } catch (Exception $ex) {
            return redirect()->back()->withErrors('Try again');
        }
    }
}
