# Laravel Eloquent Queries (in varying complexity)

##### Basic Eloquent Query:

```php
// Find all users who are active
$activeUsers = User::where('is_active', true)->get();
```

##### Slightly more complex with Eloquent methods
```php
// Retrieve a unique list of category names that have been used by published posts
$uniqueCategories = Category::query()
    ->leftJoin('posts', 'categories.id', '=', 'posts.category_id') // Join to the 'posts' table
    ->where('posts.status', 'published') // Filter the joined posts to only include 'published' ones
    ->distinct() // ensure only unique records are returned
    ->select('categories.id', 'categories.name') // Select columns
    ->get();

// groupBy can also be added
->groupBy('column_name')


// SQL Equivalent
// SELECT DISTINCT `categories`.`id`, `categories`.`name` 
// FROM `categories` 
// LEFT JOIN `posts` ON `categories`.`id` = `posts`.`category_id` 
// WHERE `posts`.`status` = 'published'
```
**You can also use `::leftJoin()` directly:**
```php
$postsWithCategory = Post::leftJoin('categories', 'posts.category_id', '=', 'categories.id')
    ->select('posts.*', 'categories.name as category_name')
    ->get();
```