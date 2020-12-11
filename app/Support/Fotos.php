<?php


namespace App\Support;

use App\Models\Funcionario;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;

class Fotos
{
    /**
     * @var string
     */
    private $password;
    /**
     * @var string
     */
    private $user;
    /**
     * @var string
     */
    private $img_default;
    /**
     * @var string
     */
    private $path_img;
    /**
     * @var string
     */
    private $type_img;

    /**
     * Fotos constructor.
     */
    public function __construct()
    {
        $this->img_default = url(config('picture.img_default'));
        $this->path_img = config('picture.path_img');
        $this->user = config('picture.user');
        $this->password = config('picture.password');
        $this->type_img = config('picture.type_img');
    }

    /**
     * @param \App\Models\Funcionario $funcionario
     * @return string
     */
    public function getFoto(Funcionario $funcionario)
    {
        try {
            $client = new Client([
                'verify' => false,
                'http_errors' => false,
            ]);

            $picture = "{$this->path_img}{$funcionario->username}{$this->type_img}";

            $response = $client->request('GET', $picture, [
                'auth' => [$this->user, $this->password, 'ntlm']
            ]);

            if ($response->getStatusCode() !== 200) {
                $picture = $this->img_default;
            }

            Storage::disk('public_fotos')->put("{$funcionario->username}{$this->type_img}", $response->getBody());
            echo "OK: Foto de {$funcionario->nome} importada.\n";
        } catch (Exception $e) {
            echo "ERRO: Não foi possível importar a foto de {$funcionario->nome}. [{$e->getMessage()}]\n";
        }
    }
}
