<?php

/**
 * User: shivam
 * Date: 07/04/16
 * Time: 4:34 PM
 */
class ResponseErrorPoPo {
    /**
     * @var
     */
    private $error;
    /**
     * @var
     */
    private $message;
    /**
     * @var
     */
    private $devMessage;

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param mixed $error
     */
    public function setError($error)
    {
        $this->error = $error;
    }

    /**
     * @return mixed
     */
    public function getDevMessage()
    {
        return $this->devMessage;
    }

    /**
     * @param mixed $devMessage
     */
    public function setDevMessage($devMessage)
    {
        $this->devMessage = $devMessage;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }
}