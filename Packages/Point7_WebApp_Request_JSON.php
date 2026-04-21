<?php
class Point7_WebApp_Request_JSON extends Point7_WebApp_Request
{
    public function __construct()
    {
        $body = file_get_contents('php://input');
        $data = $body ? (json_decode($body, true) ?? []) : [];
        parent::__construct($data, [], [], $_COOKIE ?? [], $_SERVER['REQUEST_METHOD'] ?? 'GET');
    }
}
