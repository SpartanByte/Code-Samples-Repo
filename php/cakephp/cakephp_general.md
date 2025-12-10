![CakePHP Logo](/images/cakephp-logo.png "CakePHP PHP Framework")
# CakePHP Snippets (in varying complexity)


##### Running migrations in Symfony
*Note: Unlike Laravel, CakePHP doesn't have it's own CLI but uses a `bin` directory instead. Such as in Laravel: `php artisan migrate`, the equivalent in Symfony is `php bin/cake migrations migrate`*

#### 📜 Migration Commands (Schema Updates)

| Command    | Purpose | 
| -------- | ------- | 
| `php bin/cake migrations migrate`  | Executes all pending migrations, updating your database schema to the latest version.    |
| `bin/cake migrations create <MigrationName>` | Generates a new, empty migration file. You then write the schema changes manually in the generated Phinx file. |
| `php bin/cake migrations rollback` | Reverts the last executed migration. |
| `php bin/cake migrations status` | Show the status of all migrations |
| `php bin/cake migrations seed` | Seeds the database (*like Laravel's php artisan db:seed*) |

---

#### 🔑 Other Key CakePHP Console Commands
| Command    | Purpose | 
| -------- | ------- | 
| `bin/cake cache clear_all`  | Clears all configured application caches.   |
| `bin/cake bake controller`  | Generates basic Controller code (part of the powerful bake utility).   |
| `bin/cake bake model <ModelName>`  | Generates the Entity and Table class files for your database tables.   |
| `bin/cake routes`  | Lists all defined application routes.   |


#### Example Commands
**Create a Seeder**
`bin/cake migrations seed create InitialUsersSeed`

**Run a Seeder**
`bin/cake migrations seed`