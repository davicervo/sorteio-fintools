<?php


namespace App\Support;

use App\Models\Funcionario;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\UrlGenerator;

class Fotos
{
    /**
     * @var Repository|Application|mixed
     */
    private $password;
    /**
     * @var Repository|Application|mixed
     */
    private $user;
    /**
     * @var Repository|Application|mixed
     */
    private $url;
    /**
     * @var Application|UrlGenerator|string
     */
    private $img_default;
    /**
     * @var string
     */
    private $path_img;

    /**
     * Fotos constructor.
     */
    public function __construct()
    {
        $this->img_default = url('img/default.png');
        $this->path_img = 'http://portal/Arquivos/fotos/';
        $this->url = config('picture.url');
        $this->user = config('picture.user');
        $this->password = config('picture.password');
    }

    /**
     * @param \App\Models\Funcionario $funcionario
     * @param string $type_img
     * @return Application|UrlGenerator|string
     * @throws GuzzleException
     */
    public function getFoto(Funcionario $funcionario, string $type_img = '.jpg')
    {
        try {
            /**
             * Alteração para buscar a foto do team fintools
             */
            if (strpos($funcionario->departamento->nome_exibicao, 'FINTOOLS')) {
                return url('team_fintools') . '/' . $funcionario->username . $type_img;
            }

            $client = new Client([
                'verify' => false,
                'http_errors' => false,
            ]);

            $picture = "{$this->path_img}{$funcionario->username}{$type_img}";

            $response = $client->request('GET', $picture, [
                'auth' => [$this->user, $this->password, 'ntlm']
            ]);

            if ($response->getStatusCode() === 200) {
                return $picture;
            }

            return $this->img_default;
        } catch (Exception $e) {
            return $this->img_default;
        }
    }
}
