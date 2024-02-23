<?php

declare(strict_types=1);

namespace Arokettu\PgpWordList\Tests;

use Arokettu\PgpWordList\PgpWordList;
use PHPUnit\Framework\TestCase;

class DecodeTest extends TestCase
{
    public function testDecodeRegular(): void
    {
        // Wiki example
        $hex = strtolower(str_replace(' ', '', 'E582 94F2 E9A2 2748 6E8B 061B 31CC 528F D7FA 3F19'));
        $encoded = 'topmost Istanbul Pluto vagabond treadmill Pacific brackish dictator goldfish Medusa ' .
            'afflict bravado chatter revolver Dupont midsummer stopwatch whimsical cowbell bottomless';

        self::assertEquals($hex, bin2hex(PgpWordList::decode($encoded)));

        // some random combination
        $hex = '12b4b0057400076fa5c0f5cbf726ac65';
        $encoded = 'atlas politeness ruffled almighty indoors adroitness ahead hemisphere reindeer recipe ' .
            'vapor revival virus caretaker ribcage glossary';

        self::assertEquals($hex, bin2hex(PgpWordList::decode($encoded)));

        // empty
        $hex = '';
        $encoded = '';

        self::assertEquals($hex, bin2hex(PgpWordList::decode($encoded)));
    }

    public function testDecodeOddEven(): void
    {
        $hex = '12b4057400076f';
        // odd/even word on even/odd position
        $encoded = 'atlas politeness almighty indoors adroitness ahead hemisphere';

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Unable to decode word: almighty');
        self::assertEquals($hex, bin2hex(PgpWordList::decode($encoded)));
    }

    public function testDecodeInsensitive(): void
    {
        $hex = '12b4b0057400076f';
        // case and space insensitive
        $encoded = '   ATLAS PoliteNess    ruffled  ALmiGHty   indoors adroitness     aHead hemisphere   ';

        self::assertEquals($hex, bin2hex(PgpWordList::decode($encoded)));
    }

    public function testDecodeFuzzy(): void
    {
        $hex = '12b4b0057400076f';
        $encoded = '  Altas  politeness  ruffeled  allmighty  InDoors   androidness  ahead hemisfere  ';

        self::assertEquals($hex, bin2hex(PgpWordList::decode($encoded, 2)));
    }

    public function testDecodeEvenVeryFuzzy(): void
    {
        $hex = '12b4b0057400076f';
        $encoded = '  Altas  politeness  ruffeled  allmighty  InDoors   androidness  ahead hemisfere  ';

        self::assertEquals($hex, bin2hex(PgpWordList::decode($encoded, 20)));
    }

    public function testFuzzyMustNotBeNegative(): void
    {
        $this->expectException(\DomainException::class);
        $this->expectExceptionMessage('$fuzzy must be a non-negative value');
        PgpWordList::decode('', -1);
    }

    public function testLevenshteinLimit(): void
    {
        $word = str_repeat('a', 300);

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Unable to decode word: ' . $word);
        PgpWordList::decode($word, 1);
    }

    public function testFailOnAmbiguity(): void
    {
        $word = 'acmo'; // 1 dist to ammo (0x03) and acme (0x0c)

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Unable to decode word: ' . $word);
        PgpWordList::decode($word, 10);
    }
}
