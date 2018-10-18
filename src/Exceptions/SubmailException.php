<?php

/**
 *  @version 1.0.0
 *  @todo use throw error code
 *  @author Eckoo <howcyan@gmail.com>
 */


 class SubmailException extends \Exception
 {
    public function __construct($message, $code = 0, \Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
 }
 