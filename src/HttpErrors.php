<?php

namespace Antares\Http;

class HttpErrors
{
    //-- descendent classes define their own error code constants and overwrite makeErrorMessages() method.
    //   A generic one is defined here.

    public const GENERIC_ERROR = 999999;

    protected function makeMessages()
    {
        //-- descendent classas should call
        //   parent::makeMessages()

        //-- register current class error messages
        if (!in_array(static::class, $this->registeredClasses)) {
            $this->registerClass(static::class);

            $this->addMessage(self::GENERIC_ERROR, 'Generic error.');
        }
    }

    //-- descendent classes do not need to define the follow methods and properties

    protected $registeredClasses;

    protected function registerClass($class)
    {
        $class = trim($class);
        if (!empty($class) and !in_array($class, $this->registeredClasses)) {
            $this->registeredClasses[] = $class;
        }
    }

    protected $messages;

    protected function addMessage($code, $message)
    {
        if ($code != '' and !array_key_exists($code, $this->messages)) {
            $this->messages[$code] = $message;
        }
    }

    public function getMessage($code, $default = null)
    {
        if ($code != '' and array_key_exists($code, $this->messages)) {
            return $this->messages[$code];
        }
        return $default;
    }

    private function __construct()
    {
        $this->messages = [];
        $this->registeredClasses = [];

        $this->makeMessages();
    }

    //-- singleton instance

    private static $singleton;

    private static function instance()
    {
        if (self::$singleton === null) {
            self::$singleton = new static;
        }
        return self::$singleton;
    }

    //-- public methods

    public static function message($code, $default = null)
    {
        return static::instance()->getMessage($code, $default);
    }
}
