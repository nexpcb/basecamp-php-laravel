<?php

namespace BasecampPhpLaravel;

use Basecamp\Factory as BasecampServiceFactory;

class BasecampClientService
{
    /**
     * @var array
     */
    protected $config;

    public function __construct()
    {
        $this->config = config('basecamp-php-laravel.identifier');
    }

    /**
     * Create instance of GuzzleClient.
     *
     * @param array $config
     *
     * @return $this
     */
    public static function create($config = [])
    {
        return new static($config);
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
     * @param $name
     * @param array $arguments
     *
     * @return
     */
    public function __call($name, $arguments = [])
    {
        $service = BasecampServiceFactory::create($this->config);
        return $service->$name($arguments);
    }
}
