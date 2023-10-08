<?php

namespace App\Traits;

use Illuminate\Support\Facades\Request;

trait HttpResponse
{
    /**
     * --------------------------------------------------------
     *  handle the Http  request
     * --------------------------------------------------------
     * 
     * @contributor Shahria Sunnah   <sunnahshahria@gmail.com>
     * @last_modified october 08, 2023
     */
    protected function sendSuccess(string $message, array|object $data = [], int $code = 200)
    {

        $response = [
            "success"   => true,
            "status"    =>  "API called successfully",
            "status_code"   =>  $code,
            'message'   =>  $message,
            'api'   =>  [
                'endpoint'   =>  Request::url(),
                'method'   =>  Request::method(),
            ],
            'data' =>  $data
        ];

        if (auth()->user()) {
            $response['auth_user'] = auth()->user();
        }

        return response()->json($response, $code);
    }


    /**
     * --------------------------------------------------------------
     *  send Error response
     * --------------------------------------------------------------
     * 
     * @param string $message
     * @param array|object $data
     * @param int $code
     * 
     * @return \Illuminate\Http\JsonResponse
     * 
     * @contributor Shahria Sunnah <sunnahshahria@gmail.com>
     * @last_modified octobor 08, 2023
     */
    protected function sendError(string $message, array|object $data = [], int $code = 400)
    {
        $response = [
            "success"   => false,
            "status"    =>  "API called successfully",
            "status_code"   =>  $code,
            'message'   =>  $message,
            'api'   =>  [
                'endpoint'   =>  Request::url(),
                'method'   =>  Request::method(),
            ],
            'data'      =>  $data
        ];

        if (Request::user()) {
            $response['user'] = Request::user();
        }

        return response()->json($response, $code);
    }
}
