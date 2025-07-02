# Meu Projeto de API para Posts

Oi! Este é o projeto que eu criei para o teste de Desenvolvedor Backend Júnior.

O objetivo era construir uma API simples que permite criar, ler, atualizar e apagar posts de um blog, usando PHP e MySQL.

## O que eu usei para construir

**Prompt de Comando:** Para criar as pastas e inicializar o servidor.
**PHP:** Para criar toda a lógica da API.
**MySQL Workbench:** Banco de dados do projeto.
**Postman:** Para testar cada funcionalidade e ver se estava tudo certo.

## Como fazer o projeto rodar na sua máquina

Para testar o projeto, você vai precisar de algumas coisas instaladas (PHP,  Workbench e Git). Depois, é só seguir os passos:

**1. Baixe o código do GitHub**

No seu terminal, use o comando `git clone` para baixar os arquivos.

```bash
git clone [https://github.com/VanessaGardingo/api-posts-project.git]
```

**2. Prepare o Banco de Dados**

Você precisa criar o banco de dados e a tabela onde os posts ficarão salvos.

* Abra sua ferramenta de MySQL Workbench.
* Crie um banco de dados novo com o nome `db_posts_api`.
* Dentro dele, execute o código abaixo para criar a tabela `posts`:

```sql
create table posts(
id int auto_increment primary key,
title varchar(255) not null,
content text not null,
created_at timestamp default current_timestamp);
```
> **Nota:** Modifique o usuário e a senha de acordo com o banco de dados que será utilizado em `config/Database.php`.

**3. Ligue o servidor local do PHP**

Para a API funcionar, precisamos de um servidor. O PHP já vem com um que é perfeito para testes. Na raiz do projeto, rode o comando:

```bash
php -S localhost:8000
```
Isso vai ligar um servidor em `http://localhost:8000`. Deixe este terminal aberto enquanto testa.

## Como testar a API no Postman

Aqui estão os "links" (endpoints) que você pode usar para testar a API.

#### `POST /api/post/create.php`
Serve para **criar** um novo post.

* **Método:** `POST`
* **Body (raw, JSON):**
> **Nota:** Código Json utilizado:

    {
        "title": "Título de Teste",
        "content": "Conteúdo do post de teste."
    }
 

#### `GET /api/post/read.php`
Serve para **listar todos** os posts que estão no banco.

* **Método:** `GET`

#### `GET /api/post/read_one.php`
Serve para **buscar um post específico** pelo `id`.

* **Método:** `GET`
* **URL:** `http://localhost:8000/api/post/read_one.php?id=1` (1 = exemplo de id)

#### `PUT /api/post/update.php`
Serve para **atualizar** um post que já existe.

* **Método:** `PUT`
* **Body (raw, JSON):**
> **Nota:** Código Json utilizado:

    {
        "id": 1,
        "title": "Título já atualizado",
        "content": "Conteúdo que foi modificado."
    }

#### `DELETE /api/post/delete.php`
Serve para **apagar** um post.

* **Método:** `DELETE`
* **Body (raw, JSON):**
> **Nota:** Código Json utilizado:

    {
        "id": 1
    }

## Como eu me organizei

Para não me perder durante o desenvolvimento, eu dividi o trabalho em pequenas tarefas, como uma lista de afazeres. Isso me ajudou a focar em uma coisa de cada vez.

- [x] Entender o desafio e planejar as pastas do projeto.
- [x] Configurar o Git e o repositório no GitHub.
- [x] Criar o banco de dados e a tabela `posts`.
- [x] Fazer o código de conexão com o banco (`Database.php`).
- [x] Criar a função de **CRIAR** um post e testar.
- [x] Criar as funções de **LER** os posts e testar.
- [x] riar a função de **ATUALIZAR** um post e testar.
- [x] Criar a função de **DELETAR** um post e testar.
- [x] Escrever este `README.md` para explicar tudo o que eu fiz.