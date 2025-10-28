<?php

namespace App\Traits;

trait ApiResponses
{
  protected function ok($message = null)
  {
    return $this->success($message, 200);
  }

  protected function success($message, $code = 200)
  {
    return response()->json([
      'status' => 'success',
      'message' => $message
    ], $code);
  }
}
