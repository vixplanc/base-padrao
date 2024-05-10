# Passo a Passo

* abra o terminal e digite
* * laravel new NomeDoProjeto
* * composer require inertiajs/inertia-laravel
* * php artisan inertia:middleware
* escolher vue após digitar o proximo comando no termminal
* * composer require laravel/breeze --dev

* * php artisan breeze:install
* * php artisan migrate
* * npm install

* * composer require vixplanc/base-padrao:dev-main

* dentro de config/app.php adicione essa linha dentro do vetor de providers *
Vixplanc\BasePadrao\ServiceProvider::class

* escolha o provider Vixplanc\BasePadrao\ServiceProvider após digitar o codigo abaixo no terminal
* * php artisan vendor:publish
