# PGP Word List Encoder/Decoder

[![Packagist]][Packagist Link]
[![PHP Version]][Packagist Link]
[![License]][License Link]
[![Gitlab CI]][Gitlab CI Link]
[![Codecov]][Codecov Link]

[Packagist]: https://img.shields.io/packagist/v/arokettu/pgp-word-list.svg?style=flat-square
[PHP Version]: https://img.shields.io/packagist/php-v/arokettu/pgp-word-list.svg?style=flat-square
[License]: https://img.shields.io/github/license/arokettu/php-pgp-word-list.svg?style=flat-square
[Gitlab CI]: https://img.shields.io/gitlab/pipeline/sandfox/php-pgp-word-list/master.svg?style=flat-square
[Codecov]: https://img.shields.io/codecov/c/gl/sandfox/php-pgp-word-list?style=flat-square

[Packagist Link]: https://packagist.org/packages/arokettu/pgp-word-list
[License Link]: LICENSE.md
[Gitlab CI Link]: https://gitlab.com/sandfox/php-pgp-word-list/-/pipelines
[Codecov Link]: https://codecov.io/gl/sandfox/php-pgp-word-list/

[PGP Word List] encoder and decoder library for PHP.

## Installation

```bash
composer require 'arokettu/pgp-word-list'
```

## Simple use

```php
<?php

$encoded = \Arokettu\PgpWordList\PgpWordList::encode('test test');
var_dump($encoded); // "indoors glossary hockey hydraulic bison hydraulic fracture hurricane indoors"

$decoded = \Arokettu\PgpWordList\PgpWordList::decode(
    'indoors glossary hockey hydraulic bison hydraulic fracture hurricane indoors'
);
var_dump($decoded); // "test test"

// fuzzy decoding
$decoded = \Arokettu\PgpWordList\PgpWordList::decode(
    'indoors glossary hokkey hydrolic bson hydraulic fracture hurricane inndoors',
    2
);
var_dump($decoded); // "test test"
```

## Documentation

Read full documentation here: <https://sandfox.dev/php/pgp-word-list.html>

## Support

Please file issues on our main repo at GitLab: <https://gitlab.com/sandfox/php-pgp-word-list/-/issues>

Feel free to ask any questions in our room on Gitter: <https://gitter.im/arokettu/community>

## License

The library is available as open source under the terms of the [MIT License][License Link].

[PGP Word List]: https://en.wikipedia.org/wiki/PGP_word_list
