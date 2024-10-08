<?php

declare(strict_types=1);

namespace Arokettu\PgpWordList;

final class PgpWordList
{
    private const ODD_WORDS = [
        'aardvark', 'absurd', 'accrue', 'acme', 'adrift', 'adult', 'afflict', 'ahead', 'aimless', 'Algol', 'allow',
        'alone', 'ammo', 'ancient', 'apple', 'artist', 'assume', 'Athens', 'atlas', 'Aztec', 'baboon', 'backfield',
        'backward', 'banjo', 'beaming', 'bedlamp', 'beehive', 'beeswax', 'befriend', 'Belfast', 'berserk', 'billiard',
        'bison', 'blackjack', 'blockade', 'blowtorch', 'bluebird', 'bombast', 'bookshelf', 'brackish', 'breadline',
        'breakup', 'brickyard', 'briefcase', 'Burbank', 'button', 'buzzard', 'cement', 'chairlift', 'chatter',
        'checkup', 'chisel', 'choking', 'chopper', 'Christmas', 'clamshell', 'classic', 'classroom', 'cleanup',
        'clockwork', 'cobra', 'commence', 'concert', 'cowbell', 'crackdown', 'cranky', 'crowfoot', 'crucial',
        'crumpled', 'crusade', 'cubic', 'dashboard', 'deadbolt', 'deckhand', 'dogsled', 'dragnet', 'drainage',
        'dreadful', 'drifter', 'dropper', 'drumbeat', 'drunken', 'Dupont', 'dwelling', 'eating', 'edict', 'egghead',
        'eightball', 'endorse', 'endow', 'enlist', 'erase', 'escape', 'exceed', 'eyeglass', 'eyetooth', 'facial',
        'fallout', 'flagpole', 'flatfoot', 'flytrap', 'fracture', 'framework', 'freedom', 'frighten', 'gazelle',
        'Geiger', 'glitter', 'glucose', 'goggles', 'goldfish', 'gremlin', 'guidance', 'hamlet', 'highchair', 'hockey',
        'indoors', 'indulge', 'inverse', 'involve', 'island', 'jawbone', 'keyboard', 'kickoff', 'kiwi', 'klaxon',
        'locale', 'lockup', 'merit', 'minnow', 'miser', 'Mohawk', 'mural', 'music', 'necklace', 'Neptune', 'newborn',
        'nightbird', 'Oakland', 'obtuse', 'offload', 'optic', 'orca', 'payday', 'peachy', 'pheasant', 'physique',
        'playhouse', 'Pluto', 'preclude', 'prefer', 'preshrunk', 'printer', 'prowler', 'pupil', 'puppy', 'python',
        'quadrant', 'quiver', 'quota', 'ragtime', 'ratchet', 'rebirth', 'reform', 'regain', 'reindeer', 'rematch',
        'repay', 'retouch', 'revenge', 'reward', 'rhythm', 'ribcage', 'ringbolt', 'robust', 'rocker', 'ruffled',
        'sailboat', 'sawdust', 'scallion', 'scenic', 'scorecard', 'Scotland', 'seabird', 'select', 'sentence',
        'shadow', 'shamrock', 'showgirl', 'skullcap', 'skydive', 'slingshot', 'slowdown', 'snapline', 'snapshot',
        'snowcap', 'snowslide', 'solo', 'southward', 'soybean', 'spaniel', 'spearhead', 'spellbind', 'spheroid',
        'spigot', 'spindle', 'spyglass', 'stagehand', 'stagnate', 'stairway', 'standard', 'stapler', 'steamship',
        'sterling', 'stockman', 'stopwatch', 'stormy', 'sugar', 'surmount', 'suspense', 'sweatband', 'swelter',
        'tactics', 'talon', 'tapeworm', 'tempest', 'tiger', 'tissue', 'tonic', 'topmost', 'tracker', 'transit',
        'trauma', 'treadmill', 'Trojan', 'trouble', 'tumor', 'tunnel', 'tycoon', 'uncut', 'unearth', 'unwind',
        'uproot', 'upset', 'upshot', 'vapor', 'village', 'virus', 'Vulcan', 'waffle', 'wallet', 'watchword',
        'wayside', 'willow', 'woodlark', 'Zulu',
    ];

    private const EVEN_WORDS = [
        'adroitness', 'adviser', 'aftermath', 'aggregate', 'alkali', 'almighty', 'amulet', 'amusement', 'antenna',
        'applicant', 'Apollo', 'armistice', 'article', 'asteroid', 'Atlantic', 'atmosphere', 'autopsy', 'Babylon',
        'backwater', 'barbecue', 'belowground', 'bifocals', 'bodyguard', 'bookseller', 'borderline', 'bottomless',
        'Bradbury', 'bravado', 'Brazilian', 'breakaway', 'Burlington', 'businessman', 'butterfat', 'Camelot',
        'candidate', 'cannonball', 'Capricorn', 'caravan', 'caretaker', 'celebrate', 'cellulose', 'certify',
        'chambermaid', 'Cherokee', 'Chicago', 'clergyman', 'coherence', 'combustion', 'commando', 'company',
        'component', 'concurrent', 'confidence', 'conformist', 'congregate', 'consensus', 'consulting', 'corporate',
        'corrosion', 'councilman', 'crossover', 'crucifix', 'cumbersome', 'customer', 'Dakota', 'decadence', 'December',
        'decimal', 'designing', 'detector', 'detergent', 'determine', 'dictator', 'dinosaur', 'direction', 'disable',
        'disbelief', 'disruptive', 'distortion', 'document', 'embezzle', 'enchanting', 'enrollment', 'enterprise',
        'equation', 'equipment', 'escapade', 'Eskimo', 'everyday', 'examine', 'existence', 'exodus', 'fascinate',
        'filament', 'finicky', 'forever', 'fortitude', 'frequency', 'gadgetry', 'Galveston', 'getaway', 'glossary',
        'gossamer', 'graduate', 'gravity', 'guitarist', 'hamburger', 'Hamilton', 'handiwork', 'hazardous', 'headwaters',
        'hemisphere', 'hesitate', 'hideaway', 'holiness', 'hurricane', 'hydraulic', 'impartial', 'impetus', 'inception',
        'indigo', 'inertia', 'infancy', 'inferno', 'informant', 'insincere', 'insurgent', 'integrate', 'intention',
        'inventive', 'Istanbul', 'Jamaica', 'Jupiter', 'leprosy', 'letterhead', 'liberty', 'maritime', 'matchmaker',
        'maverick', 'Medusa', 'megaton', 'microscope', 'microwave', 'midsummer', 'millionaire', 'miracle', 'misnomer',
        'molasses', 'molecule', 'Montana', 'monument', 'mosquito', 'narrative', 'nebula', 'newsletter', 'Norwegian',
        'October', 'Ohio', 'onlooker', 'opulent', 'Orlando', 'outfielder', 'Pacific', 'pandemic', 'Pandora',
        'paperweight', 'paragon', 'paragraph', 'paramount', 'passenger', 'pedigree', 'Pegasus', 'penetrate',
        'perceptive', 'performance', 'pharmacy', 'phonetic', 'photograph', 'pioneer', 'pocketful', 'politeness',
        'positive', 'potato', 'processor', 'provincial', 'proximate', 'puberty', 'publisher', 'pyramid', 'quantity',
        'racketeer', 'rebellion', 'recipe', 'recover', 'repellent', 'replica', 'reproduce', 'resistor', 'responsive',
        'retraction', 'retrieval', 'retrospect', 'revenue', 'revival', 'revolver', 'sandalwood', 'sardonic', 'Saturday',
        'savagery', 'scavenger', 'sensation', 'sociable', 'souvenir', 'specialist', 'speculate', 'stethoscope',
        'stupendous', 'supportive', 'surrender', 'suspicious', 'sympathy', 'tambourine', 'telephone', 'therapist',
        'tobacco', 'tolerance', 'tomorrow', 'torpedo', 'tradition', 'travesty', 'trombonist', 'truncated', 'typewriter',
        'ultimate', 'undaunted', 'underfoot', 'unicorn', 'unify', 'universe', 'unravel', 'upcoming', 'vacancy',
        'vagabond', 'vertigo', 'Virginia', 'visitor', 'vocalist', 'voyager', 'warranty', 'Waterloo', 'whimsical',
        'Wichita', 'Wilmington', 'Wyoming', 'yesteryear', 'Yucatan',
    ];

    public static function encode(string $bytes): string
    {
        $encoded = [];

        for ($i = 0; $i < \strlen($bytes); $i += 1) {
            // odd and even are reversed here because words are counted from 1 and bytes are counted from 0
            $encoded[] = (($i % 2 === 0) ? self::ODD_WORDS : self::EVEN_WORDS)[\ord($bytes[$i])];
        }

        return implode(' ', $encoded);
    }

    public static function decode(string $encoded, int $fuzzy = 0): string
    {
        if ($fuzzy < 0) {
            throw new \DomainException('$fuzzy must be a non-negative value');
        }

        $odd = array_flip(array_map(function ($s) {
            return strtolower($s);
        }, self::ODD_WORDS));
        $even = array_flip(array_map(function ($s) {
            return strtolower($s);
        }, self::EVEN_WORDS));

        $words = array_values(array_filter(explode(' ', $encoded), function ($s) {
            return $s !== '';
        }));
        $decoded = '';

        for ($i = 0; $i < \count($words); $i += 1) {
            $wordValues = ($i % 2 === 0) ? $odd : $even;

            $word = strtolower($words[$i]);
            if (isset($wordValues[$word])) {
                $decoded .= \chr($wordValues[$word]);
                continue;
            }

            // do not do fuzzy search for values > 50 chars
            if ($fuzzy > 0 && \strlen($word) < 50) {
                $distances = [];
                $minDist = $fuzzy;

                foreach ($wordValues as $w => $v) {
                    $dist = levenshtein($w, $word);

                    if ($dist <= $minDist) {
                        $minDist = $dist;
                        $distances[$v] = $dist;
                    }
                }

                if ($distances !== []) {
                    $distances = array_filter($distances, function ($d) use ($minDist) {
                        return $d === $minDist;
                    });
                    if (\count($distances) === 1) { // unambiguously found
                        $decoded .= \chr(array_key_first($distances));
                        continue;
                    }
                }
            }

            throw new \UnexpectedValueException('Unable to decode word: ' . $word);
        }

        return $decoded;
    }
}
