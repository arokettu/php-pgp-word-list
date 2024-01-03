<?php

declare(strict_types=1);

namespace Arokettu\PgpWordList\Tests;

use Arokettu\PgpWordList\PgpWordList;
use PHPUnit\Framework\TestCase;

class EncodeTest extends TestCase
{
    public function testEncoding(): void
    {
        // Wiki example
        $bytes = hex2bin(str_replace(' ', '', 'E582 94F2 E9A2 2748 6E8B 061B 31CC 528F D7FA 3F19'));
        $encoded = 'topmost Istanbul Pluto vagabond treadmill Pacific brackish dictator goldfish Medusa ' .
            'afflict bravado chatter revolver Dupont midsummer stopwatch whimsical cowbell bottomless';
        self::assertEquals($encoded, PgpWordList::encode($bytes));

        // some random combination
        $bytes = hex2bin('12b4b0057400076fa5c0f5cbf726ac65');
        $encoded = 'atlas politeness ruffled almighty indoors adroitness ahead hemisphere reindeer recipe ' .
            'vapor revival virus caretaker ribcage glossary';

        self::assertEquals($encoded, PgpWordList::encode($bytes));

        // empty
        $bytes = '';
        $encoded = '';

        self::assertEquals($encoded, PgpWordList::encode($bytes));
    }
}
