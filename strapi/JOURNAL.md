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

### build

Build only outputs the admin UI page, the api server is not built.

### startup (lambda consideration)

empty and fresh server output from CLI : 0.8 ~ 1 s

### roles safety breach

The default admin has the ability to create or edit "content types" that trigger source code modification.
Commiting and tracking these modifications, integrating them in a continuous delivery pipeline, can prove to be extremely challenging and opens a back-door to breaking updates in any environment.
It seems advisable to allow admin features only in development environment and create custom roles restricted to content (resources) edition in a production environment.

### preview feature

Giving a preview of a page or widget via the backoffice is incomptible with the headless approach: The backoffice would need "knowledge" of front end target templates beforehand, conflicting with the core concept behind headless CMS that the front end display is decorelated from the backoffice.

### SSO support

Classical third party auth are supported natively, we need to audit feasability and cost of implementing AXA pass SSO for signin.

### major issue

Cloning a strapi application then running npm install does not regenerate the required, by default unversionned, .cache folder at the root of the application.
Without this folder the application server can't serve the backoffice (at least, didn't test for more).
Running the development script regenerates the application.
On a broader note, the application is poorly documented and rely on cli hidden functionality to perform. The .cache folder architecture relevence is unclear at best, and most probably a bad implementation/architecture.

There is no open issue on the subject, wich makes me wonder how many real users are effectively depending on the package.

### overall

The package is complex yet poorly documented. Submodule dependencies are not using scoped package wich is surprising at best.
Required implicit pseudo-build steps happen as a side effect of development watch mode serve. Running a development script once, shutting it down, then launching the production serve script is a very poor interface.
A lot of "packaged" dependencies, orms like knex, bookshelf, are abstracted from the developper control.
The "ready-to-go" fully packaged approached is a good one for very little team but can be a bottle neck for larger scale development and delivery.

Maybe the whole CMS concept may be have to be challenged.
