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

---

#### 🕵 Ways to Validate Form Submission Values
#### Method 1: Through Constraints

```php
// always keep use statements in alphabetical order so it's well organized
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Translation\TranslatableMessage;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\NotBlank;

public function buildForm(FormBuilderInterface $builder, array $options): void
{
    $builder
        ->add('firstName', TextType::class, [
            'label' => new TranslatableMessage('First Name'),
            'required' => true,
            'row_attr' => [
                'class' => 'col-12 col-md-6'
            ],
            'attr' => [
                'autocomplete' => 'form-first-name',
                'aria-required' => true,
            ],
            'constraints' => [
                new NotBlank([
                    'message' => new TranslatableMessage('Please enter your first name.'),
                ]),
            ],
        ])
}
```
#### Method 2: Using the Validator Interface

```php
use App\Entity\Author;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;

public function author(ValidatorInterface $validator): Response
{
    $author = new Author();

    $errors = $validator->validate($author);

    if (count($errors) > 0) {
        /*
         * Uses a __toString method on the $errors variable which is a
         * ConstraintViolationList object. This gives us a nice string
         * for debugging.
         */
        $errorsString = (string) $errors;

        return new Response($errorsString);
    }

    return new Response('The author is valid! Yes!');
}
```

