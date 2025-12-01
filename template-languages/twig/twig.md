##### Mainly for use with Symfony projects

**Output variables and expressions**
*Note `{{ ... }}` Displays contact in Twig like Laravel's Blade does*

```twig
<p>Welcome, {{ user.name }}!</p>
<p>The total price is: ${{ item.price * quantity }}</p>
```

**Setting variables (set), defines a new variable within a template**
```twig
{% set header_title = "Welcome to our site!" %}
<h1>**{{ header_title }}**</h1>
```

---
**Control Structures and Actions**
```twig
{% set greeting = "Hello World" %}
<p>{{ greeting }}</p>

{% if user.logged_in %}
    <p>You are logged in.</p>
{% else %}
    <p>Please log in.</p>
{% endif %}

<ul>
{% for item in list %}
    <li>{{ item.title }}</li>
{% endfor %}
</ul>
```
---
**Commenting**
```twig
{# This is a single-line comment #}

{#
  This is a multi-line comment.
  {{ variable_that_should_not_be_displayed }}
#}
```

---

**Basic Expressions**

Checking length of an array.
```twig <p>There are **{{ items|length }}** items.</p> ```

---

**Conditional Logic**
if/else

```twig
{% if user.is_logged_in %}
    <a href="/logout">Logout</a>
{% else %}
    <a href="/login">Login</a>
{% endif %}
```

for loop

```twig
<ul>
    {% for item in shopping_cart %}
        <li>**{{ loop.index }}**. {{ item.name }} - ${{ item.price }}</li>
    {% else %}
        <li>Your cart is empty.</li>
    {% endfor %}
</ul>
```


---

**Filters**
In Twig, filters are functions that are used to modify data within a template.
This includes formatting strings, numbers, or dates.

Basic syntax: 
**{{ my_variable|my_filter }}**

**Examples of built-in filters**
* **|upper**: Converts a string to uppercase.
* **|lower**: Converts a string to lowercase.
* **|escape**: Escapes a string to prevent cross-site scripting (XSS) attacks.
* **|date**: Formats a date to a specific format.
* **|length**: Gets the length of a sequence or string.
* **|join**: Joins an array into a string.
* **|raw**: Outputs an unescaped string, which is useful for pre-formatted HTML. 

**[Full list of filters (Twig documentation)](https://twig.symfony.com/doc/3.x/filters/index.html)**


**Example Usage (string conversion)**
```twig
{# Converts a string to uppercase #}
<p>{{ "Twig syntax"|upper }}</p>

{# Joins elements of a list with a comma and space #}
<p>Tags: {{ tags|join(', ') }}</p>

{# Formats a date using a constant from the PHP environment #}
<p>Date: {{ post.date|date(constant('DATE_W3C')) }}</p>
```

**Example Usage (json_encode conversion)**
```twig
{# Twig template code #}
{% set products = [{name: 'Laptop', price: 1200}, {name: 'Mouse', price: 25}] %}

<script>
    // Pass the PHP array to a JS variable by using the filter
    const productData = **{{ products|json_encode|raw }}**;

    console.log(productData);

    // Result of productData
    // [{name: 'Laptop', price: 1200}, {name: 'Mouse', price: 25}]
</script>
```

**Example Usage (path generation with path())**
```yaml
    # Route for example in YAML
    # config/routes.yaml
    app_product_show:
        path: /products/{slug}
        controller: App\Controller\ProductController::show
```

```twig
{% set product_slug = 'ultimate-widget' %}

<a href="{{ **path**('app_product_show', {slug: product_slug}) }}">
    View Product Details
</a>

{# results in HTML output #}
<a href="/products/ultimate-widget">
    View Product Details
</a>
```

Current page example:
```twig
{# Creates a URL to the current page, but adds or changes the 'page' query parameter #}
<a href="{{ **path**(app.request.attributes.get('_route'), app.request.query.all|merge({page: 2})) }}">
    Go to Page 2
</a>
```

---

**Template Inheritance**
Extending a layout with (using `extends`)
```twig
{% extends '**base.html.twig**' %}
```

Defining and overwriting content areas (using `block`)

```twig
{# base.html.twig (parent template) #}
<title>{% block **title** %}Welcome{% endblock %}</title>
<div id="content">
    {% block **content** %}{% endblock %}
</div>

{# in product.htmlo.twig}(child template) #}
{% extends 'base.html.twig' %}

{% block **title** %}My Product{% endblock %}

{% block **content** %}
    <h1>Product View</h1>
    <p>This is the product page content.</p>
{% endblock %}
```

Including other templates
```twig
<footer>
    {% include '**_footer.html.twig**' %}
</footer>
```



