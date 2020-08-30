<?php


namespace Donsoft\Zendesk\Services;


use InvalidArgumentException;
use Zendesk\API\HttpClient as ZendeskAPI;

class ZendeskService
{

    private $http;
    public function __construct()
    {
        $this->subdomain = config('zendesk.subdomain');
        $this->username = config('zendesk.username');
        $this->token = config('zendesk.token');
        $this->demo =config('zendesk.demo');
        if (!$this->subdomain || !$this->username || !$this->token) throw new InvalidArgumentException('Please set ZENDESK_SUBDOMAIN, ZENDESK_USERNAME and ZENDESK_TOKEN environment variables.');

        $http = new ZendeskAPI($this->subdomain);
        $http->setAuth('basic', ['username' => $this->username, 'token' => $this->token]);
    }

    public function listTicket(){

        return $this->http->tickets()->findAll();
    }
}
