# Sorteio-FINTOOLS

<p style="text-align: center;">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQIAOtqQ5is5vwbcEn0ZahZfMxz1QIeAYtFfnLdkCXu1sqAGbnX" width="300">
</p>

## Desenvolvido em:
Laravel Versão 7.*

## Requisitos:
1. [PHP](https://www.php.net/) (7.3)
2. [MariaDB](https://mariadb.org/) (10.4.14)

### Instruções para rodar o projeto (dentro da pasta do projeto):

1. composer install (pode levar alguns minutos)
2. criar arquivo .env com base no arquivo .env.example
3. php artisan key:generate
4. php artisan migrate --seed
5. php artisan funcionarios:sync

Obs.: Executar apenas na primeira vez que baixar o projeto
