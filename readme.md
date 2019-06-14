## Primeiros passos

Pré-requisitos: [Git](http://git-scm.com/downloads) e o [Composer](https://getcomposer.org/)

2. Clone o repositório:

    ```sh
    $ git clone https://github.com/swlucas/desafio_mdi
    ```

3. Vá para pasta do projeto:

    ```sh
    $ cd desafio_mdi
    ```

4. Instale todas as dependências:

    ```sh
    $ composer install
    ```

5. Gere a Key do projeto:

    ```sh
    $ php artisan key:generate
    ```

6. Apos isso, irá gerar um arquivo .env, você deverá alterar esses dados de acordo com seu banco de dados

    ```
    DB_CONNECTION=mysql/pgsql
    DB_HOST=127.0.0.1
    DB_PORT=3306/5432
    DB_DATABASE=db_name
    DB_USERNAME=user
    DB_PASSWORD=password
    ```

7. Rode as migrate(criar as tabelas)

    ```sh
    $ php artisan migrate
    ```

8. E finalmente rode:

    ```sh
    $ php artisan serve
    ```

    O site estará rodando em `localhost:8000`
