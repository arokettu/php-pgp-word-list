PGP Word List
#############

|Packagist| |GitLab| |GitHub| |Codeberg| |Gitea|

.. highlight:: php

`PGP Word List`_ encoder and decoder library for PHP.

.. _PGP Word List: https://en.wikipedia.org/wiki/PGP_word_list

Installation
============

.. code-block:: bash

   composer require arokettu/pgp-word-list

Documentation
=============

Encoding
--------

PGP Word List algorithm encodes binary data by assigning an English word to every byte::

    <?php

    \Arokettu\PgpWordList\PgpWordList::encode('test test');
    // "indoors glossary hockey hydraulic bison hydraulic fracture hurricane indoors"

Decoding
--------

Decoding will succeed if words are given for the correct odd/even positions::

    <?php

    \Arokettu\PgpWordList\PgpWordList::decode(
        'indoors glossary hockey hydraulic bison hydraulic fracture hurricane indoors'
    );
    // 'test test'
    \Arokettu\PgpWordList\PgpWordList::decode(
        'hydraulic glossary hockey indoors bison indoors fracture hurricane hydraulic'
    );
    // failure!!!

The string is case insensitive and space insensitive::

    <?php

    \Arokettu\PgpWordList\PgpWordList::decode(' InDoors    glossary  HOCKEY   hydraulic   ');
    // 'test'

Use fuzzy param (`Levenshtein distance`_ value) to try to correct typos (do not use values more than 2-3)::

    <?php

    \Arokettu\PgpWordList\PgpWordList::decode('inndoors glosary hokkey hydrolic', 2);
    // 'test'

.. _Levenshtein distance: https://en.wikipedia.org/wiki/Levenshtein_distance

License
=======

The library is available as open source under the terms of the `MIT License`_.

.. _MIT License: https://opensource.org/license/mit/

.. |Packagist|  image:: https://img.shields.io/packagist/v/arokettu/pgp-word-list.svg?style=flat-square
   :target:     https://packagist.org/packages/arokettu/pgp-word-list
.. |GitHub|     image:: https://img.shields.io/badge/get%20on-GitHub-informational.svg?style=flat-square&logo=github
   :target:     https://github.com/arokettu/php-pgp-word-list
.. |GitLab|     image:: https://img.shields.io/badge/get%20on-GitLab-informational.svg?style=flat-square&logo=gitlab
   :target:     https://gitlab.com/sandfox/php-pgp-word-list
.. |Codeberg|   image:: https://img.shields.io/badge/get%20on-Codeberg-informational.svg?style=flat-square&logo=codeberg
   :target:     https://codeberg.org/sandfox/php-pgp-word-list
.. |Gitea|      image:: https://img.shields.io/badge/get%20on-Gitea-informational.svg?style=flat-square&logo=gitea
   :target:     https://sandfox.org/sandfox/php-pgp-word-list
