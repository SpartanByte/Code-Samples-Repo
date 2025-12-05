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
