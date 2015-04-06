<?php namespace Learn\Services;


use GuzzleHttp\Client;

class CaptchaService {

    protected $http;

    function __construct(Client $http)
    {
        $this->http = $http;
    }


    public function validateCaptcha($input)
    {
        $recaptchaSecret = env('RECAPTCHA_SECRET');
        if (!$recaptchaSecret) {
            throw new \Exception('Recaptcha key not set');
        }
        $response = $this->http->post('https://www.google.com/recaptcha/api/siteverify', [
            'body' => [
                'secret' => $recaptchaSecret,
                'response' => $input
            ]
        ]);

        $json = $response->json();
        return $json['success'];
    }

}