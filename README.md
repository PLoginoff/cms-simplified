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
