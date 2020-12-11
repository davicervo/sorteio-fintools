<?php

namespace App\Service;

use Exception;
use Illuminate\Support\Facades\Config;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Psr7\Request;

class FuncionarioService
{
    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * Service constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->setClient();
    }

    public function getFuncionarios()
    {
        $uri = config('funcionario.url_get');
        $request = new Request('GET', $uri);

        // INÍCIO TRY-CATCH
        try {
            $send = $this->client->send($request);
            if ($send->getStatusCode() == 401) {
                throw new Exception('Usuário não está logado');
            }
        } catch (Exception $e) {
            // Atualiza token do client se o erro for 401 (Não autorizado)
            $this->updateClient(401);
            $send = $this->client->send($request);
        }
        // FIM TRY-CATCH

        $logData = [
            'url' => $uri,
            'statusCode' => $send->getStatusCode()
        ];

        if (!in_array($send->getStatusCode(), ['200'])) {
            Log::warning('Error in access url', $logData);
        } else {
            Log::info('Success in access url', $logData);
        }

        $body = json_decode($send->getBody()->getContents(), true);

        if ($body['success']) {
            return $body['data'];
        }
        return [];
    }

    private function setClient()
    {
        $this->client = new Client([
            'verify' => false,
            'http_errors' => false,
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . config('token.hash'),
                'Realm' => config('funcionario.realm')
            ]
        ]);
    }

    private function updateClient(int $status = null)
    {
        if (is_null(config('token.hash')) || $status == 401) {
            Config::set('token.hash', $this->getToken());
        }

        $this->setClient();
    }

    public function getToken()
    {
        $client = new Client([
            'verify' => false,
            'http_errors' => false,
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/x-www-form-urlencoded'
            ]
        ]);

        $resp = $client->request('POST', config('funcionario.client_url_token'), [
            'form_params' => [
                'client_id' => config('funcionario.client_id'),
                'client_secret' => config('funcionario.client_secret'),
                'grant_type' => 'client_credentials',
            ]
        ]);

        $token = json_decode($resp->getBody()->getContents());
        return $token->access_token;
    }
}
