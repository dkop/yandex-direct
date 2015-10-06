<?php

namespace Biplane\YandexDirect\Event;

use Biplane\YandexDirect\User;

/**
 * FailCallEvent.
 *
 * @author Ural Davletshin <u.davletshin@biplane.ru>
 */
class FailCallEvent extends BaseAfterCallEvent
{
    private $exception;

    /**
     * Constructor.
     *
     * @param string     $methodName The method name of API
     * @param array      $params     The params for method of API
     * @param User       $user       The configuration
     * @param string     $requestId  The request identifer
     * @param \Exception $exception  The thrown exception
     */
    public function __construct($methodName, array $params, User $user, $requestId, \Exception $exception)
    {
        parent::__construct($methodName, $params, $user, $requestId);

        $this->exception = $exception;
    }

    /**
     * Gets the thrown exception.
     *
     * @return \Exception
     */
    public function getException()
    {
        return $this->exception;
    }
}