![Symfony Logo](/images/symfony-logo.png "Symfony PHP Framework")
# Symfony Queries (in varying complexity)
##### Basic Query:
**Note: Symfony uses the Query Builder that Laravel pulls in for Eloquent ORM**

```php
// Find products with a price greater than 19.99
public function findExpensiveProducts(float $minPrice): array
{
    // Start the Query Builder, aliasing the entity as 'p'
    return $this->createQueryBuilder('p')
        // Add a WHERE clause
        ->where('p.price > :price')
        // Bind the parameter value
        ->setParameter('price', $minPrice)
        // Order the results
        ->orderBy('p.price', 'ASC')
        // Get the Query object
        ->getQuery()
        // Execute the query and get the results as an array of Product objects
        ->getResult();
}
```

#### 📜 Migration Commands (Schema Updates)
Symfony doesn't have a specific rollback option like Laravel does that will rollback the last migration, which is great in development. 😞

**you can...**
Look up the version name, example `DoctrineMigrations\Version20250208132645` or sometimes just `20250208132645` will work. 
Then check the migrations list:
```cli
php bin/console doctrine:migrations:list
```
output should be similar to:
` >> 20250208132645 (executed)`

Now, to reset just that migration (in this case, in the Docker CLI)
`php bin/console doctrine:migrations:version 20250208132645 --delete`
Then rerun the migrate command
`php bin/console doctrine:migrations:migrate`

There is a **bit** of a workaround by specifically executing the `down()` and `up()` methods:
```cli
php bin/console doctrine:migrations:execute 20250208132645 --down
php bin/console doctrine:migrations:execute 20250208132645 --up

```