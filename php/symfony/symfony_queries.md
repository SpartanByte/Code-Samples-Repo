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