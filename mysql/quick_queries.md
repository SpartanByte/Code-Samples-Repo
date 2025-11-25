# MySQL Queries: Quick Queries

##### Basic Query for creating a record in a purchases table:

##### Simple SELECT statement:
```sql
SELECT Categories.id AS Categories__id, Categories.name AS Categories__name, Categories.priority AS Categories__priority FROM categories Categories ORDER BY Categories.name ASC
```

##### Insert record into purchases table
```sql
/* first_name = VARCHAR; last_name = VARCHAR; phone_number = VARCHAR; confirmed = BOOLEAN; created = TIMESTAMP; modified = TIMESTAMP*/
INSERT INTO purchases (first_name, last_name, phone_number, confirmed, created, modified)
VALUES ('Test', 'User', '7011234567', TRUE, NOW(), NOW());
```
##### Insert record into purchase_items table with purchase_id as the foreign key
```sql
/* item_id = INTEGER; quantity = INTEGER; item_price = CURRENCY */
INSERT INTO purchase_items (purchase_id, item_id, quantity, item_price)
VALUES (LAST_INSERT_ID(), 101, 2, 45.99);
```

##### Remove a record
```sql
DELETE FROM users
WHERE id = 123;
```