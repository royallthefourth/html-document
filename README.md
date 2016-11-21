# html-document

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/ee8a0fc2-0db8-45b2-86b9-35ff7e165b4c/mini.png)](https://insight.sensiolabs.com/projects/ee8a0fc2-0db8-45b2-86b9-35ff7e165b4c)

`html-document` is an object oriented tool for building HTML documents.
It's intended to be more practical than the standard DOM implementation.
Of course, it's not actually a DOM implementation.
This is just an HTML document builder; it is write-only and does nothing to ensure correctness.
This library provides every HTML element listed in [MDN](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/) that is not deprecated or experimental.
One thing this library does *not* do is provide any safety.
You could easily use it to create an invalid document or XSS vulnerability.
Be sure to handle any unsafe values before using them as arguments to this library.

## Installation
Install with [Composer](https://getcomposer.org/).
Add the library to your `composer.json`:

```json
{
    "require": {
        "royallthefourth/html-document": "^1.0"
    }
}
```
Then install:
```
composer install --no-dev
```

There are no dependencies for this library.

## Example
Building all or part of an HTML document with this library is easy. Take a look:
```php
use RoyallTheFourth\HtmlDocument\Document;
use RoyallTheFourth\HtmlDocument\Element\Body;
use RoyallTheFourth\HtmlDocument\Element\Head;
use RoyallTheFourth\HtmlDocument\Element\Html;
use RoyallTheFourth\HtmlDocument\Element\Paragraph;
use RoyallTheFourth\HtmlDocument\Element\Text;
use RoyallTheFourth\HtmlDocument\Element\Title;

echo (new Document())
    ->add((new Html())
        ->withChild((new Head())
            ->withChild((new Title())
                ->withChild(new Text('HTML Document'))
            )
        )
        ->withChild((new Body())
            ->withChild((new Paragraph())
                ->withChild(new Text('Build a whole document at once like this, or piece existing parts together'))
            )
        )
    )->render();
```

This returns a complete HTML page as a string:

```html
<!DOCTYPE html>
<html>
<head>
<title>
HTML Document
</title>

</head>

<body>
<p>
Build a whole document at once like this, or piece existing parts together
</p>

</body>

</html>

```

Of course, you're unlikely to want to build whole documents in place like this.
The real idea behind this library is to allow objects to represent themselves as elements to put on a page.
For example, you might have a `TableRowInterface` with a `toTableRow` method.
Now your object can represent itself as a `<tr>` without the need for a templating engine, public properties, or getter methods.
With this appraoch, a thoughtfully composed system of objects *almost* leads directly to a finished HTML document.

One important difference from the usual conception of HTML documents is that these elements do not have values.
Instead, the library provides a special element type called `Text` that can be used to place arbitrary text within any node that has open and close tags.

There are also `Arbitrary` and `ArbitraryEmpty` elements in case you need a nonstandard element.
The only difference between these two is that `Arbitrary` has a closing tag while `ArbitraryEmpty` does not.
For example, `<br>` could be implemented as an `ArbitraryEmpty`.

For more examples, see the tests directory.
My intention is for this library to be very straightforward and self-documenting.

## Contributing
Bug reports, bug fixes, tests, and documentation are heartily welcomed.
If something in the library is missing or out of date, I'd love for it to be brought up to standard.
If it's a simple bugfix, go ahead and open a pull request.
Please include a test that exposes the bug along with your bugfix.

For anything more complex, open an issue first so we can discuss how to handle it.
