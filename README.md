# Sistema de Monitoramento de Saúde

Este sistema tem como propósito servir como uma plataforma para realizar check-ups.



Para realizar a instalação e execução do projeto Monitoramento de Saúde Siga as instruções abaixo.
> Se preferir selecionar uma sessão.
- [Pré-Requisitos](#pré-requisitos)
- [Instalação](#instalação)
- [Ferramentas](#ferramentas)
## Pré-Requisitos
> Instalação do servidor Mysql,com o seguinte comando.
```
# apt-get install mysql-server
```
Instale o (make) digitando o comado abaixo, para executar as configurações do projeto.
```
# apt-get install make 
```
Instale o  gerenciador de pacotes (composer)
```
# apt-get install composer 
```
> Instalação do Laravel obrigatória para a execução do projeto, veja mais em :
* [Laravel-Installation](https://laravel.com/docs/5.8/installation) - Instalação completa na documentação do framework -
## Instalação
- Para Clonar o repositório do projeto no seu computador digite : ```git clone https://github.com/Wolaci/Greys-anatomy.git```
### Configuração
> Em seguida entre na pasta do projeto e utilize o composer digitando o comando abaixo.
```
$ composer install
```
após isso:
```
$ cp .env.example .env
```
```
$ php artisan key:generate
```
```
$ php artisan migrate:fresh
```

```
$ php artisan serve
```

## Execução
> Após a configuração do make conf,coloque no navegador : ```localhost:8000 ``` ou  ``` http://127.0.0.1:8000 ``` e você terá acesso ao nosso projeto.:
## Ferramentas
- [Laravel](https://laravel.com) - PHP Framework
- [Bootstrap](https://getbootstrap.com/) - CSS && HTML Framework
- [Sublime Text](https://www.sublimetext.com/) - Editor de texto
- [MYSQL](https://www.mysql.com/) -Sistema de gerenciamento de banco de dados
- [PHP](https://php.net/) - Linguagem de programação


