<?php

namespace CoderSpotting\Bundle\ToastMessageBundle\Service;

class ToastMessage
{
    /** @var string */
    private $toastType;
    /** @var string */
    private $message;

    /**
     * @return string
     */
    public function getToastType()
    {
        return $this->toastType;
    }

    /**
     * @param string $toastType
     */
    public function setToastType($toastType)
    {
        $this->toastType = $toastType;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }
}