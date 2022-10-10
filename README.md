#Started working
##Identify key objective of the project
- security
  - sql injection
  - sanitize inputs
  - storing sensitive information. Should be hased. Like Password.
- clean code
- OOP

##Though
- Session maybe
- Just create random string and use it as JWT
  - where should I store token
- Might seem to be easy way but going to use MVC/Laravel structure.
  - nothing special required in the task.
- Might add error logging but seems out off scope.
- MIght use singleton pattern but seems out of scope.
- Could have added a lot more exception handlers
- Not creating model relations.

#Installation
- clone git project
- run `composer install`
- configure cors (default is http://localhost:3000)
- import database.sql
- adjust required database connection in config
- clone react repository
- run `npm install`
- run `npm run build`
- User login: `admin@admin.com` and password `password`