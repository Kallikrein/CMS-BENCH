### installation

very straight-forward

npx -p strapi@beta strapi new server --quickstart

! installing ends by launching servers and opens a tab in the browser.
I don't like a CLI init to do more than just setup, especially user actions like launch browser.

### dependencies

strapi is a core dependency and several other plugins can incrementally upgrade features
It's weird all plugins packages aren't scoped under @strapi like @strapi/plugin-foo and are instead cluttering node modules strapi-plugin-foo.

### dev server

npm run develop (strapi develop)

hosts a localhost admin page at http://localhost:1337/admin

### side effects

I know CMS are usually an entrypoint to side effect as CRUD operations on entities in database.
It's often problematic that a second type of effect is "modifying sources" in response to admin update on the UI

Protocol:
use git to monitor version controlled files updated in response to admin operation

#### creating an admin user

persists it in a fake dev database in .tmp/data.db

#### creating a new database connection

in http://localhost:1337/admin/plugins/settings-manager/databases/development
side effect of UI action triggers unstaged changes in files on server sources

- adds new plugin dependencies in package.json
- modify config/environments/development/database.json

### a note on environments

There is a folder config by environment.
I think it's a very bad practice: divergence in environment config are "usual suspects" loopholes for bugs escaping tests in staging and landing in production.

The config has to be manually replicated and is not guaranteed homogeneity and compatibility between environments.
It may be advisable to consider only production config and override environment variability ourselves, potentially via cloud stack replication parameters.

### JSON configs

"\${process.env.DATABASE_PASSWORD || ''}"
It's a good practice to get environment variables from ... environment variables.
The JSON pattern here is worse than runtime async hook: a lot of best practice include key vaults, consul, etc. to forward relevant environment variables.
I will explore if a .js replacement of the json is functional.
