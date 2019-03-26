<?php

namespace BasecampPhpLaravel;

use Basecamp\Factory;
use InvalidArgumentException;

class BasecampClientService
{
    /**
     * @var array
     */
    protected $config;

    public function __construct()
    {
        $this->config = \Config::get('basecamp-php-laravel.identifier');

        // override auth method since basecamp3 api only works with oauth method.
        $this->config['auth'] = 'oauth';
    }

    /**
     * Set access token
     */
    public function setToken($token)
    {
        $this->config['token'] = $token;
        return $this;
    }

    /**
     * Create instance of GuzzleClient.
     */
    public function initialize()
    {
        if (empty($this->config['token'])) {
            throw new InvalidArgumentException();
        }

        return Factory::create($this->config);
    }
}
