<?php

function respons($message,$data = null,$status = 200)
{
    return response()->json([
        'message' => $message,
        'data' => $data,
    ], $status);
}
