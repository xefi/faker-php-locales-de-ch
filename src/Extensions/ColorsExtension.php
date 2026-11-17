<?php

namespace Xefi\Faker\DeCh\Extensions;

use Xefi\Faker\Extensions\ColorsExtension as BaseColorsExtension;

class ColorsExtension extends BaseColorsExtension
{
    public function getLocale(): string|null
    {
        return 'de_CH';
    }

    protected array $safeColorNames = [
        'Schwarz', 'Braun', 'Grün', 'Marine', 'Olive',
        'Lila', 'Türkis', 'Limette', 'Blau', 'Silber',
        'Grau', 'Gelb', 'Fuchsia', 'Aqua', 'Weiss',
    ];

    protected array $colorNames = [
        'Aqua', 'Aquamarin', 'Azur',
        'Beige', 'Braun', 'Koralle', 'Grün', 'Blau',
        'Fuchsia', 'Cyan', 'DunkelBlau', 'DunkelCyan', 'DunkelGrau',
        'DunkelGrün', 'DunkelOrange', 'DunkelRot', 'DunkelViolett', 'TiefPink', 'TiefHimmelBlau',
        'DimmGrau', 'DodgerBlau', 'WaldGrün', 'Gold', 'Grau',
        'GrünGelb', 'Honigmelone', 'HeissPink', 'IndischesRot', 'Indigo', 'Elfenbein', 'Khaki', 'Lavendel',
        'Rasengrün', 'ZitronenChiffon', 'HellesBlau', 'HellesKoralle', 'HellesCyan',
        'HellesGrau', 'HellesGrün', 'HellesPink', 'HellesLachs', 'HellesSeeGrün', 'HellesHimmelBlau', 'HellesGelb',
        'Limette', 'LimettenGrün', 'Leinen', 'Magenta', 'Kastanienbraun',
        'MittleresAquamarin', 'MittleresBlau', 'MittlereOrchidee', 'MittleresViolett', 'MittleresSeeGrün',
        'MittleresSchieferBlau', 'MittleresFrühlingGrün', 'MittleresTürkis', 'MittleresViolettRot', 'MitternachtsBlau',
        'MintCreme', 'RosigeRose', 'Mokassin', 'NavajoWeiss', 'Marine',
        'Olive', 'OlivenBraun', 'Orange', 'OrangeRot',
        'Orchidee', 'BlassesGrün', 'BlassesTürkis', 'BlassesViolettRot', 'Papayacreme',
        'Pfirsich', 'Peru', 'Pink', 'Pflaume', 'PulverBlau',
        'Lila', 'Rot', 'Rosenholz', 'KönigsBlau', 'SattelBraun',
        'Lachs', 'SandyBraun', 'SeeGrün', 'Muschelschale', 'Siena',
        'Silber', 'HimmelBlau', 'SchieferBlau', 'SchieferGrau', 'Schnee',
        'FrühlingGrün', 'StahlBlau', 'Türkis',
        'Distel', 'Tomate', 'Violett', 'Weizen',
        'Weiss', 'WeissRauch', 'Gelb',
    ];
}
