<?php

/**
 * Created by PhpStorm.
 * User: yueguang
 * Date: 2022/4/17
 * Time: 12:01
 */

namespace core\Exception;

use Exception;

class TouTiaoException extends Exception
{
    /**
     * @var string
     */
    private $errorCode;
    /**
     * @var string
     */
    private $errorMessage;
    /**
     * @var string
     */
    private $errorType;

    /**
     * ClientException constructor.
     *
     * @param $errorMessage
     * @param $errorCode
     */
    public function __construct($errorMessage = '', $errorCode = 0)
    {
        parent::__construct($errorMessage);
        $this->errorMessage = $errorMessage;
        $this->errorCode = $errorCode;
        $this->setErrorType('TouTiao');
    }

    /**
     * @return string
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @param int $errorCode
     */
    public function setErrorCode($errorCode = 0)
    {
        $this->errorCode = $errorCode;
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @param string $errorMessage
     */
    public function setErrorMessage($errorMessage = '')
    {
        $this->errorMessage = $errorMessage;
    }

    /**
     * @return string
     */
    public function getErrorType()
    {
        return $this->errorType;
    }

    /**
     * @param string $errorType
     */
    public function setErrorType($errorType = '')
    {
        $this->errorType = $errorType;
    }
}
