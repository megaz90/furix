<?php

namespace App\core\Response\HttpException;

class Handler
{
    protected $status;

    protected $message;


    public static function isHttpException()
    {
        $ins = new static;

        return $ins;
    }

    public function handleException($status, $message)
    {
        $this->status = $status;
        $this->message = $message;


        if ($this->status == '404') {
            return $this->makePath($this->status);
        }
    }

    public function handleErrorException()
    {
        return $this->makePath('error');
    }

    //Making a path of error file and returning it back
    //to the method
    protected function makePath($file_name)
    {
        return "Response/Http/Exception/views/{$file_name}.view.php";
    }
}
