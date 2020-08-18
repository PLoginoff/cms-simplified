# cms-simplified

# Assignment
Headless (no UI) CMS for managing articles (CRUD).
Each article has its ID, title, body and timestamps (on creation and update). 
Managing articles is the typical set of CRUD calls including reading one and all the articles.
Creating/updating/deleting data is possible only if a secret token is provided (can be just one static token).   
For reading all the articles, the endpoint must allow specifyinga field to sort by including
whether in an ascending or descending order + basic limit/offset pagination.
The whole client-server communication must be in a JSON format.
The architecture must follow Domain-Driven Design

# Solution

 * Symfony 4.4 LTS
 * FOS Rest, Doctrine, phpunit, swagger
 
# Installation 
  
 * `composer install`
 * set up your database in .env.test.local/.env.dev.local
 * set up your APP_TOKEN in .env.test.local/.env.dev.local
 * `bin/console doctrine:migrations:migrate`
 * `bin/phpunit`

# Methods

`POST /api/article/list?sort=title&direction=desc&limit=11&offset=0`

```
POST /api/article/create
{"title": "title", "body": "body"}
```

```
POST /api/article/update/{id}
{"title": "title", "body": "body"}
```

`POST /api/article/delete/{id}`

# Swagger
 * run `symfony serve`
 * see http://localhost:8000/api/doc

# N.B.
 * diagram is here: [diagram.png]
 * need more time: tests for sorting
 * need more time: tests for different cases
