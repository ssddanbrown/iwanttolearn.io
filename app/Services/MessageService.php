<?php namespace Learn\Services;


use Illuminate\Session\Store;

class MessageService {

    protected $session;

    function __construct(Store $session)
    {
        $this->session = $session;
    }

    public function success($message)
    {
        $this->session->flash('success', $message);
    }


}