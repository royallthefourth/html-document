# html-document
`html-document` is an object oriented tool for building HTML documents.
It's intended to be more practical than the standard DOM implementation.
This library provides every HTML element listed in [MDN](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/) that is not deprecated or experimental.
One thing this library does *not* do is provide any safety.
You could easily use it to create an invalid document or XSS vulnerability.
Be sure to handle any unsafe values before using them as arguments ot this library.

## Example
Building an HTML document with this library is easy. Take a look:
```php

```
One important difference from the usual conception of HTML documents is that these elements do not have values.
Instead, the library provides a special element type called `Text` that can be used to place arbitrary text within any node that has open and close tags.

There are also `Arbitrary` and `ArbitraryEmpty` elements in case you need a nonstandard element.
The only difference between these two is that `Arbitrary` has a closing tag while `ArbitraryEmpty` does not.
For example, `<br>` would be implemented as an `ArbitraryEmpty`.

For more examples, see the tests directory.
My intention is for this library to be very straightforward and self-documenting.

## Contributing
Bug reports, bug fixes, tests, and documentation are heartily welcomed.
If something in the library is missing or out of date, I'd love for it to be brought up to standard.
If it's a simple bugfix, go ahead and open a pull request.
Please include a test that exposes the bug along with your bugfix.

For anything more complex, open an issue first so we discuss how to handle it.
