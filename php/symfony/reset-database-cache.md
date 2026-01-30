
Note: this is a **Hard Reset** script that handles file deletions that the standard `bin/console` commands sometimes miss.
Copy this into a file named reset.sh or run the commands sequentially in your terminal:
```bash
#!/bin/bash

# 1. Kill the old cache files manually
echo "Removing var/cache..."
rm -rf var/cache/*

# 2. Remove the compiled environment file (The most likely culprit)
if [ -f .env.local.php ]; then
    echo "Removing .env.local.php..."
    rm .env.local.php
fi

# 3. Clear Doctrine's internal metadata
echo "Clearing Doctrine cache..."
php bin/console doctrine:cache:clear-metadata --quiet

# 4. Warm up the new cache
echo "Warming up fresh cache..."
php bin/console cache:warmup
```