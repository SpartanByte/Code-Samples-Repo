
<link rel="stylesheet" href="https://portfolio.brianwardwell.com/code-samples-repo/style.css">

<div class="md-main-container">
<div class="md-header">

# DDL (Data Definition Language)
![Data Definition Language graphic](/images/ddl-graphic.png "DDL Databases")

</div>
<div class="md-content-container" style="padding: 50px">

#### 🛢️ What is DDL?
Data Definition Language sets a set of commands used to create a structure and maintain databases. Commands include CREATE, ALTER, DROP, TRUNCATE, and RENAME statements for creating/changing structure and dropping structures such as table. IN short, it deals with the storage of the data but not the data itself.

---

#### 💪 Strengths
- Strong Definition of Structure - CREATE/ALTER sets up and modifies specifically structure and organizing data effectively.
- Manages Schema - simpler to maintain and update schemas, especially during development
- Enforces Data Integrity - implementation of rules/constraints (PRIMARY KEY, FOREIGN KEY, UNIQUE, NOT NULL) ensures data is consistent and accurate.
- Boosts Performance - creates indexes and partitions, significantly improving query performance/data retrieval
- Standardized - DDL commands are standardized

#### ❗Risks to be aware of
- Irreversible Changes - the commands are auto-committed so they can't be undon once executed
- Risk of Data Loss - Misuse of commands especially DROP can delete entire tables **along with their data**. This can lead to significant data loss especially without regular backups.
- Complex for Large Databases - altering database structure in large databases can become complicated and require downtime to make changes.
- Cause Locking - DDL operations can lock database object during execution which slows down or blocks other operations
- Compatibility Issues - DDL is standardized but MySQL, Oracle or PostgreSQL have variations in syntax that can cause compatibility issues during migrations.

#### 📝 Applications of DDL
- Creating Database Objects - tables, views, indexes, stored procedures
- Modifying Database Objects - modification of the structure of existing database objects such as adding/dropping columns, modifying data types, etc.
- Managing Database Constraints - altering database constraints such as primary keys, foreign keys, unique requirements, check constraints.
- Granting or Revoking Permissions - granting and revoking permissions to all the various database objects.
- Indexing - creation or modification of indexes on database tables. This can improve performance.
- Partitioning - creation or modification of partitioned tables, improving the performance of databases handling large amounts of data

--- 

##### Examples
**Creating a table**
```sql
-- Creates a table named 'Users' with five columns and a primary key constraint.
CREATE TABLE Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY, -- Auto-incrementing integer, primary key
    username VARCHAR(50) NOT NULL UNIQUE,  -- String with max 50 chars, cannot be NULL, must be unique
    email VARCHAR(100) NOT NULL,           -- String with max 100 chars, cannot be NULL
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Timestamp, defaults to the current time
    is_active BOOLEAN DEFAULT TRUE         -- Boolean (stored as tinyint in MySQL), defaults to TRUE
);

**DDL**
public function up(Schema $schema): void
{
    $this->addSql(sql: <<<'SQL'
        CREATE TABLE Users (
            user_id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL UNIQUE,
            email VARCHAR(100) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            is_active BOOLEAN DEFAULT TRUE
        );
    SQL);
}
```
> Notes:
    > `sql:` is a named argument that is supported in Doctrine Migrations 3+ (Symfony 5+)
    > `<<<'SQL'` is correct for nowdoc to avoid escaping.

<div class="md-resources">

--- 

### Great Resources

- [🔗 GeeksForGeeks DDL tutorial](https://www.geeksforgeeks.org/sql/ddl-full-form/)
- [🔗 Snowflake documentation: DDL](https://docs.snowflake.com/en/sql-reference/sql-ddl-summary)

</div>

</div>

</div>
