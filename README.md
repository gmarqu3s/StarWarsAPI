# Star Wars Movie Catalog
Este projeto exibe um catálogo interativo dos filmes de Star Wars, utilizando a API pública de filmes e exibindo detalhes como nome, episódio, sinopse, diretor, produtores e idade dos filmes. A aplicação foi construída em PHP com MySQL (via Docker) e AJAX para interatividade.

-> Funcionalidades
    - Catálogo de Filmes: Lista todos os filmes de Star Wars, ordenados por data de lançamento. Detalhes do Filme: Ao clicar em um filme, exibe informações detalhadas e calcula sua idade (em anos, meses e dias).Logs de Interação: Registra todas as interações com a API no banco de dados.

-> Tecnologias Utilizadas
    - Backend: PHP 7.4, cURL para consumir a API do Star Wars, Programação Orientada a Objetos.
    - Banco de Dados: MySQL com Docker.
    - Frontend: HTML, CSS, JavaScript, jQuery, Bootstrap.
    - API do Star Wars: Consumo de dados da API pública https://swapi.py4e.com/api/films/.

-> Como Rodar
  Requisitos
    - PHP 7.4
    - Docker
    - MySQL

-> Passos
   - Para iniciar os serviços do apache e mysql:
     docker-compose up -d

-> Acessar a Aplicação: Abra o navegador e vá para http://localhost:8000.
