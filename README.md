# Como rodar este projeto com docker + sail
## Requisito
* docker e docker-compose
```shell
composer install
alias sail='bash vendor/bin/sail'
sail up -d
```
## .env
```dotenv
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=desafio
DB_USERNAME=sail
DB_PASSWORD=password
```
