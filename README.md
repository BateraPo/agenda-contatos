# Agenda de Contatos - Twelve-Factor App

## O que precisa ter instalado

- XAMPP com PHP 8.1 ou mais (Apache e MySQL ligados)
- Composer
- Git

No `php.ini` do XAMPP (`C:\xampp\php\php.ini`) precisa estar sem o `;` na frente de `extension=intl` e `extension=curl`.

## Como rodar

```
git clone https://github.com/USUARIO/agenda-contatos-twelve-factor.git
cd agenda-contatos-twelve-factor
composer install
copy .env.example .env
```

1. Abre o phpMyAdmin (`http://localhost/phpmyadmin`) e cria um banco chamado `agenda_contatos`.
2. Confere os dados do banco dentro do `.env`.
3. Roda:

```
php spark migrate
php spark db:seed ContatoSeeder
php spark serve
```

4. Abre `http://localhost:8080`.
