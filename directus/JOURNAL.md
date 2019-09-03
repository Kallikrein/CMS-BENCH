After reading the getting started, a lot of undocumetend php prerequisites seems to be required.
Apache with mods, quite a complex setup.

Reading the official yet 'experimental' docker files from the directus organization on github gives little insight.

### install steps for a given environment

- run composer to install dependencies
- init db

### settings

\*

### build

There is no concept of build or artifact.
The source loaded at runtime is the directus git repo "as is".
Customizing the server or adding extensions has to be done in the source directly.
This architecture may increase updating complexity.
Versionning or replicating the site with customization nested in the source as opposed to the directus source beeing a dependency of the CMS server will prove extremely challenging.

### run

The source loaded at runtime is the directus git repo "as is".

### variables and peristence

/public/uploads/ , /logs, /config/\*.php are persisted and modified at runtime
It seems an extremely bad practice to modify unversionable or versionable files in the middle of a source folder.
Uploading userland files on source disk and even worse, in source folder, is an extremely bad and unsecure practice and a definite NOGO.
Storing logs on source disk and even worse, in source folder, is a recipe for server downtime, an extremely bad practice and a definite NOGO.

### versioning

Since directus can't be consumed as a dependency, an API customisation has to happen in the sources themselves. Changing a version of directus is almost impossible in this architecture.
The conception team seems to have opted for a "versionless" approach, promising no breaking change development.
I don't recommend this pattern, since downgrading impacts are hard to audit and can be breaking.
Once customized from the source, updating directus core is non trivial, almost guaranteed to break.

### scalability

Monolithic php architecture strongly bound to server filesystem. May scale as separate applications but fixing the server-folder approach for uploaded data would require patching the source and prevent future updates.

### OPS

Seems hard to dev/test/build/administrate, I anticipate extremely challenging issues with CI/CD and maintainability.
No health check endpoint.

### SSO

The user must previously exist in DB and can't be created at signin time or inherit roles from openID scopes or JWT.
The signin requires to have created user ahead of time through directus API.

### API

gql is not available for users, only for admin
