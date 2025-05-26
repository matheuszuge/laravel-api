# Laravel API de Posts

Esta é uma API desenvolvida em Laravel para gerenciar posts recebidos da api JSONPLACEHOLDER. Ela permite criar, listar, visualizar, atualizar e deletar posts, utilizando Eloquent ORM e migrations para manipulação do banco de dados.

## Requisitos

- PHP >= 8.1
- Composer
- MySQL ou outro banco de dados suportado pelo Laravel

## Instalação

1. Clone o repositório:
   ```sh
   git clone https://github.com/seu-usuario/laravel-api.git
   cd laravel-api
   ```

2. Instale as dependências:
   ```sh
   composer install
   ```

3. Copie o arquivo `.env.example` para `.env` e configure as variáveis de ambiente:
   ```sh
   cp .env.example .env
   ```

4. Gere a chave da aplicação:
   ```sh
   php artisan key:generate
   ```

5. Execute as migrations:
   ```sh
   php artisan migrate
   ```

6. Inicie o servidor de desenvolvimento:
   ```sh
   php artisan serve
   ```

## Endpoints

| Método | Rota             | Descrição                        |
|--------|------------------|----------------------------------|
| GET    | /                | Lista todos os posts             |       
| GET    | /posts/create    | Cria um novo post (exemplo)      |
| GET    | /posts/read      | Lê um post específico (exemplo)  |
| GET    | /posts/update    | Atualiza um post (exemplo)       |
| GET    | /posts/delete    | Deleta um post (exemplo)         |

## Estrutura do Post

- `id`: inteiro
- `title`: string
- `content`: texto
- `author`: string
- `created_at`: timestamp
- `updated_at`: timestamp
- `deleted_at`: timestamp (soft delete)

## Licença

Este projeto está sob a licença MIT.