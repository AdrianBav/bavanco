<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Validator;
use App\Events\ActivityReceived;

class ActivityController extends Controller
{
    /**
     * Record the given activity.
     *
     * @param  Request $request
     * @return Response
     */    
    public function record(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'site_identifier' => 'required',
            'ip_address'      => 'required',
            'user_agent'      => 'required'
        ]);

        if ($validator->fails()) 
        {
            return response('Missing parameters.', 422);
        }

        event(new ActivityReceived($request));

    	return response('The activity has been recorded successfully!', 201);
    }

}
