<?php

namespace App\Http\Traits;

trait ApiResponse
{
    private function sendResponse($data, $success, $message, $status) {
        return response()->json([
            'success' => $success,
            'message' => $message,
            'data' => $data
        ])->setStatusCode($status);
    }

    public function success($data) {
        return $this->sendResponse($data, true, null, 200);
    }

    public function failure($status = 500) {
        switch ($status) {
            case 400:
                $message = 'Bad request';
                break;
            case 404:
                $message = 'Not found';
                break;
            case 500:
                $message = 'Internal server error';
                break;
            default:
                $message = null;
                break;
        }

        return $this->sendResponse(null, false, $message, $status);
    }
}