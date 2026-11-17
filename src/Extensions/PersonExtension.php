<?php

namespace Xefi\Faker\DeCh\Extensions;

use Xefi\Faker\Extensions\PersonExtension as BasePersonExtension;

class PersonExtension extends BasePersonExtension
{
    public function getLocale(): string|null
    {
        return 'de_CH';
    }

    protected $firstNameMale = [
        'Hans', 'Peter', 'Markus', 'Andreas', 'Beat', 'Daniel', 'Stefan', 'Thomas',
        'Christian', 'Martin', 'Roland', 'Bruno', 'Heinz', 'Jürg', 'Kurt', 'Walter',
        'Ueli', 'Reto', 'Patrick', 'Marcel', 'Pascal', 'Adrian', 'Roger', 'Roman',
        'Lukas', 'Simon', 'Fabian', 'Tobias', 'Manuel', 'Dominik', 'Sandro', 'Severin',
        'Linus', 'Noah', 'Elias', 'Gian', 'Levin', 'Joel', 'Yannick', 'Cedric',
    ];

    protected $firstNameFemale = [
        'Maria', 'Anna', 'Ursula', 'Ruth', 'Margrit', 'Verena', 'Beatrice', 'Sandra',
        'Claudia', 'Monika', 'Barbara', 'Andrea', 'Petra', 'Brigitte', 'Elisabeth',
        'Helena', 'Lina', 'Lara', 'Mia', 'Laura', 'Anita', 'Doris', 'Nicole', 'Karin',
        'Esther', 'Vreni', 'Heidi', 'Susanne', 'Erika', 'Silvia', 'Regula', 'Corinne',
        'Tanja', 'Jasmin', 'Melanie', 'Selina', 'Sarina', 'Noemi', 'Livia', 'Alina',
    ];

    protected $lastName = [
        'Müller', 'Meier', 'Schmid', 'Keller', 'Weber', 'Schneider', 'Huber', 'Steiner',
        'Meyer', 'Frei', 'Fischer', 'Brunner', 'Baumann', 'Gerber', 'Widmer', 'Studer',
        'Roth', 'Bachmann', 'Hofer', 'Egger', 'Berger', 'Stalder', 'Imhof', 'Furrer',
        'Wyss', 'Lüthi', 'Sommer', 'Aebi', 'Bosshard', 'Marti', 'Suter', 'Ammann',
        'Burkhalter', 'Zimmermann', 'Bürgi', 'Lehmann', 'Vogel', 'Hess', 'Graf', 'Bühler',
    ];

    protected $titleMale = ['Herr', 'Dr.', 'Prof.'];

    protected $titleFemale = ['Frau', 'Dr.', 'Prof.'];

    /**
     * Return a Swiss social security number (AHV) with a valid EAN-13 check digit.
     *
     * @param bool $formatted Format the number as 756.XXXX.XXXX.XX
     *
     * @return string
     */
    public function avs(bool $formatted = false): string
    {
        $avs = '756'.$this->randomizer->getBytesFromString('0123456789', 9);
        $avs .= $this->ean13CheckDigit($avs);

        if ($formatted) {
            $avs = sprintf('%s.%s.%s.%s', substr($avs, 0, 3), substr($avs, 3, 4), substr($avs, 7, 4), substr($avs, 11, 2));
        }

        return $avs;
    }

    /**
     * Compute the EAN-13 check digit of a twelve-digit number.
     *
     * @param string $number
     *
     * @return int
     */
    protected function ean13CheckDigit(string $number): int
    {
        $sum = 0;

        foreach (str_split($number) as $index => $digit) {
            $sum += (int) $digit * ($index % 2 === 0 ? 1 : 3);
        }

        return (10 - $sum % 10) % 10;
    }
}
