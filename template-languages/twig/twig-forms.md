##### Mainly for use with Symfony projects
![Twig Logo](/images/twig-logo.png "Twig Template Language")

**Twig Forms**

**The most common Twig functions for forms**

**The "All-in-One" (Prototyping)**
These functions render the entire form or large sections in a single line.
They are great for rapid development bot offer the **least** controll over the layout.

**`form(form)`** - renders the complete form, including the start tag, all fields, and the end tag.
*Usage example:* `{{ form(myForm) }}`

**`form_rest(form)`**  - Renders all fields that have not been rendered. This is essengial for rendering hidden fields (like **CSRF** tokens) that may have been missed.
*Example usage:* `usually placed right before form_end`
> *I think this one is misleeding as I thought of "rest" as in "wait", rather than **the rest**.*

---

**The Scructural Helpers**
*These functions handle the **shell** of the form.*

**`form_start(form)`** - Renders the opening `<form>` tag. It automatically handles the `action`, `method`, and `enctype` (especially important for file upload).

--- 

**The Granular Helpers (Full Control)**
*Use these when you need to put a label in one `div` and the input in another for complex CSS layouts.*

**Basic Navigation**
| Function  | Purpose | Usage |
|---|---| --|
| `form_label(form.field)` | Renders the `<label>` tag for the field. You can pass a string as a second argument to override the label text.| `{{ form_label(myForm.name, 'Full Name') }}` |
| `form_widget(form.field)` | Renders the actual HTML input element <br/>(e.g., `<input>`, `<select>`, `<textarea>`) <br/> This is usually where you pass CSS classes. | `{{ form_widget(myForm.name, {'attr': {'class': 'my-custom-input'}}) }}` <br/> |
| `form_errors(form.field)` | Renders any validation error messages specifically for that field. If used on the entire `form` object, it renders "global" errors. <br/> (errors not tied to a specific field) | `{{ form_errors(myForm.email) }}` |
| `form_help(form.field)` | Renders the help message defined in the form type class. | `{{ form_help(myForm.password) }}` |

--- 

#### `form_label()` Example
Renders the label for the given field. You can optionally pass the specific label you want to display as the second argument.
```twig
{{ form_label(form.name) }}

{# The two following syntaxes are equivalent #}
{{ form_label(form.name, 'Your Name', {'label_attr': {'class': 'foo'}}) }}

{{ form_label(form.name, null, {
    'label': 'Your name',
    'label_attr': {'class': 'foo'}
}) }}
```

#### `form_row(view, variables)` Example
Renders the HTML widget of a given field. If you apply this to an entire form or collection of fields, each underlying form row will be rendered.

```twig
{# render a field row, but display a label with text "foo" #}
{{ form_row(form.name, {'label': 'foo'}) }}
```

#### `form_rest(view, variables)` Example
This renders all fields that have not yet been rendered for the given form.
Include it somewhere inside the form to render hidden fields and make missed fields easier to spot.

```twig
{{ form_rest(form) }}
```

**[Symfony: Twig Reference](https://symfony.com/doc/3.x/reference/forms/twig_reference.html)**
