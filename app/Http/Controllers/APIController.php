<?php

namespace App\Http\Controllers;

use App\Jobs\MailSend;
use App\Models\Log;
use DateTime;
use DateTimeZone;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class APIController extends Controller
{
    public function send(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|max:100|regex:/^[^@\s]+@[^@\s]+\.[^@\s]+$/',
            'body' => 'required|max:255',
            'date' => 'required|date|after:today'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors())->setStatusCode(404);
        }
        
        try {
            $log = new Log;
            $log->fill($request->all())->save();
    
            $date = new DateTime($log['date'], new DateTimeZone('Etc/GMT-3'));
    
            $job = (new MailSend($log))->onConnection('redis')->onQueue('emails')->delay($date);
            dispatch($job);
    
            return response()->json($log);
        } catch (Exception $ex) {
            return response()->json(['message' => $ex->getMessage()])->setStatusCode(404);
        }
    }
}
