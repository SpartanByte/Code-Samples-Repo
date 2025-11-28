### Composer Snippets and Commands
![Composer Logo](/images/composer-logo.jpg "Composer Package Manager")

### Composer Install Related
Running composer install locally and ignore PHP version use `--ignore-platform-reqs`
**`composer install --ignore-platform-reqs`**

Prevent Composer from execuiting any scripts in `composer.json` file for environment control when running into setup issues.
**`composer install --no-scripts --no-interaction`**
*Note: this is also standard practice for automated build/deployment pipelines*
