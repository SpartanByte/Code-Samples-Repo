![Symfony Logo](/images/symfony-logo.png "Symfony PHP Framework")
# Symfony Notes (in varying complexity)
##### Running migrations in Symfony
*Note: Unlike Laravel, Symfony doesn't have it's own CLI but uses a `bin` directory instead. Such as in Laravel: `php artisan migrate`, the equivalent in Symfony is `php bin/console doctrine:migrations:migrate`*

Executes all pending migrations, updating the database schema to the latest version. This is the main command you'll use.

| Command    | Purpose | 
| -------- | ------- | 
| `php bin/console doctrine:migrations:migrate`  | run migrations    |
| `php bin/console make:migration` | Generating an empty migration file |
| `php bin/console make:rollback` | Roll back a migration |
| `php bin/console make:status` | Show the status of all migrations |
| `php bin/console doctrine:database:drop --force` | Drops and recreates the database |
| `php bin/console doctrine:schema:update --force` | Applies schema with no migrations (bypasses migrations) |
| `php bin/console doctrine:fixtures:load` | Seeds the database (*like Laravel's php artisan db:seed*) |
| `php bin/console doctrine:migrations:migrate prev` | This executes the down() method of your most recent migration and updates the `doctrine_migration_versions` table. |

---

#### Cleaning up incorrect migration files that are causing issues or make the application code cleaner
**Note:** *It is **bad practice** to manually delete migration files. This leads to errors and complications because the Doctrine migration history is out of sync with the application.*

One way is to rollback the most recent migration. In my experience, this is the best approach when the issue is during development and in the local development environment. Also, when the issue is within the last migration. This command is great for a typo in a column name or simple changes in one migration file.

```console
php bin/console doctrine:migrations:migrate prev
```

When needing to revert several steps of migrations or if migration files were accidentally ran twice, you need to look at the Doctrine migration history itself.

<ol>
    <li>You need a list of registered migrations that Doctrine is aware of.</li>
    <ul>
        <li><code>php bin/console doctrine:migrations:list</code> will list the registered migrations in the format of <strong>DoctrineMigrations\Version{YYYYMMDD}{milliseconds}</strong></li>
    </ul>
    <li>Once the infected/problematic migrations(s) are found, you can reset the Doctrine history to start at a version number and omit migrations after that point. Example:</li>
    <ul>
        <li><code>php bin/console doctrine:migrations:migrate 'DoctrineMigrations\Version20260127100000'</code></li>
    </ul>
<ol>

--- 

**Notes** (Key Differences between Fixtures and Migrations)
> **Migrations** (doctrine:migrations:migrate): Handle schema changes (creating, altering, or dropping tables and columns).
> **Fixtures** (doctrine:fixtures:load): Handle data population (inserting rows into existing tables).

**Other Development and Maintenance Commands**
| Command    | Purpose | 
| -------- | ------- | 
| `cache:clear`  | Clears the application cache (templates, compiled configuration, etc.). Crucial after making certain config changes or encountering odd errors.   |
| `cache:warmup` | Generates the application cache before the code is executed. Essential for production deployments to ensure fast first access. |
| `debug:router` | (*the same as Laravel's `route:list`) Lists all registered routes in your application, including their names, HTTP methods, and controller actions. |
| `debug:container` | Inspects the Service Container. You can view all defined services or check a specific service definition: **debug:container App\Service\MyService**. (*There is no Laravel equivalent for this one* ) |
| `lint:twig` | Checks all Twig template files for syntax errors. |
| `lint:yaml` | Checks all YAML configuration files (e.g., in config/packages/) for syntax errors. |

---

##### 📊 Database & Schema Commands (Doctrine ORM)
| Command    | Purpose | 
| -------- | ------- | 
| `make:entity`  | Generates a new Doctrine Entity class (e.g., php bin/console make:entity Product). It's interactive and helps define fields. Remember: Symfony has a Entity folders rather than Model folders  |
| `doctrine:schema:update`  | Compares your entities to the database schema and shows the SQL required to synchronize them. Use with --force to execute it (though migrations are preferred).  |
| `doctrine:database:create`  | Creates the configured database if it doesn't exist yet.  |
| `doctrine:database:drop`  |Drops (deletes) the configured database. Use with --force. **USE WITH CAUTION!**  |

---


##### 🏗️ Code Generation Commands (make:*)
| Command    | Purpose | 
| -------- | ------- | 
| `make:controller`  | Generates a new Controller class with a basic route and action method.  |
| `make:form`  | Generates a new Form Type class based on an Entity, used for handling form submissions.  |
| `make:user`  | Generates the necessary code for user authentication (User Entity, firewall config, etc.).  |
| `make:unit-test`  | Generates a PHPUnit test class for a controller or service.  |

---

#### Get a full list of commands with `php bin/console list` or `php bin/console cache:clear --help`
