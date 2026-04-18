<?php
namespace StudioAtrium\Application\Helper;

class ClickSearchMap
{
    private static array $map = [
        'type' => 'typ_projektu',
        26     => 'wysokoscbudynku',
        27     => 'katnachyleniadachu',
        28     => 'rodzajstropu',
        45     => 'liczbalazieneknaparterze',
        46     => 'liczbalazieneknaiikondygnacji',
        47     => 'wiatagarazowa',
        54     => 'typdachu',
        57     => 'garderoba',
        59     => 'kuchniaodfrontu',
        60     => 'kuchniaodogrodu',
        65     => 'spizarnia',
        67     => 'zadaszonytaras',
        69     => 'iloscpokoinaparterze',
        71     => 'iloscpokoinaiikondygnacji',
        94     => 'antresola',
        96     => 'pralnia',
        102    => 'tarasnadgarazem',
        103    => 'kalenica',
        104    => 'balkon',
        105    => 'lukarna',
        106    => 'ryzalit',
        107    => 'portfenetr',
        108    => 'narozneokno',
        109    => 'lokalizacjagarazu',
        110    => 'schody',
        111    => 'pergola',
        112    => 'wykusz',
        113    => 'masterbedroom',
        114    => 'centralnyodkurzacz',
        115    => 'fotowoltaika',
        119    => 'osobnewc',
        134    => 'sauna',
        135    => 'wyspakuchenna',
    ];

    private static array $paramsNames = [
        26  => 'wysokość budynku',
        27  => 'kąt nachylenia dachu',
        28  => 'rodzaj stropu',
        45  => 'liczba łazienek na parterze',
        46  => 'liczba łazienek na II kondygnacji',
        47  => 'wiata garażowa',
        54  => 'typ dachu',
        57  => 'garderoba',
        59  => 'kuchnia od frontu',
        60  => 'kuchnia od ogrodu',
        65  => 'spiżarnia',
        67  => 'zadaszony taras',
        69  => 'ilość pokoi na parterze',
        71  => 'ilość pokoi na II kondygnacji',
        94  => 'otwarta przestrzeń',
        96  => 'pralnia',
        102 => 'taras nad garażem',
        103 => 'kalenica',
        104 => 'balkon',
        105 => 'lukarna',
        106 => 'ryzalit',
        107 => 'portfenetr',
        108 => 'narożne okno',
        109 => 'lokalizacja garażu',
        110 => 'schody',
        111 => 'pergola',
        112 => 'wykusz',
        113 => 'master bedroom',
        114 => 'centralny odkurzacz',
        115 => 'fotowoltaika',
        119 => 'osobne w.c.',
        134 => 'sauna',
        135 => 'wyspa kuchenna',
    ];

    private static array $valueNames = [
        'lekki'             => 'lekki',
        'gęstożebrowy'      => 'gęstożebrowy',
        'płyta żelbetowa'   => 'płyta żelbetowa',
        'drewniany belkowy' => 'drewniany belkowy',
        'dwuspadowy'        => 'dwuspadowy',
        'wielospadowy'      => 'wielospadowy',
        'mansardowy'        => 'mansardowy',
        'stozkowy'          => 'stożkowy',
        'stropodach'        => 'stropodach',
        'rownolegla'        => 'równoległa do drogi',
        'prostopadla'       => 'prostopadła do drogi',
        'brak'              => 'brak',
        'wbryle'            => 'w bryle',
        'wpiwnicy'          => 'w piwnicy',
        'dostawiony'        => 'dostawiony do bryły',
        'wysuniety'         => 'wysunięty od frontu',
        'jednobiegowe'      => 'jednobiegowe',
        'zabiegowe'         => 'zabiegowe',
        'krecone'           => 'kręcone',
        'zespocznikiem'     => 'ze spocznikiem',
    ];

    private static array $paramsUnits = [
        26 => 'm',
        27 => '°',
        45 => '',
        46 => '',
        69 => '',
        71 => '',
    ];

    private static array $checkboxParams = [47, 57, 59, 60, 65, 67, 94, 96, 102, 104, 105, 106, 107, 108, 111, 112, 113, 114, 115, 119, 134, 135];
    private static array $selectParams   = [28, 54, 109, 110];

    public static function getMap(): array
    {
        return self::$map;
    }

    public static function getParamId(string $value): int|string
    {
        $flipped = array_flip(self::$map);
        return $flipped[$value] ?? 0;
    }

    public static function getParamsNames(): array
    {
        return self::$paramsNames;
    }

    public static function getValueNames(): array
    {
        return self::$valueNames;
    }

    public static function getParamsUnits(): array
    {
        return self::$paramsUnits;
    }

    public static function getDualParams(): array
    {
        return array_fill_keys(self::$checkboxParams, true);
    }

    public static function getDualParamsNames(): array
    {
        $names = [];
        foreach (self::$checkboxParams as $id) {
            $names[$id] = [1 => 'tak'];
        }
        return $names;
    }

    public static function getValueParams(): array
    {
        return self::$selectParams;
    }

    public static function getRangeParams(): array
    {
        return [];
    }

    public static function getTripleParams(): array
    {
        return [103 => true];
    }

    public static function getTripleParamsNames(): array
    {
        return [
            103 => [
                'rownolegla'  => 'równoległa do drogi',
                'prostopadla' => 'prostopadła do drogi',
                'brak'        => 'brak',
            ],
        ];
    }

    public static function getTypedParams(): array
    {
        return [
            'pow_min'       => 'min pow. użytkowa',
            'pow_max'       => 'max pow. użytkowa',
            'pow_zab_min'   => 'min pow. zabudowy',
            'pow_zab_max'   => 'max pow. zabudowy',
            'pow_total_min' => 'min pow. całkowita',
            'pow_total_max' => 'max pow. całkowita',
            'dzialka_szer'  => 'szerokość działki',
            'dzialka_dl'    => 'długość działki',
            'front_szer'    => 'szerokość frontu',
        ];
    }

    public static function getTypeParam(string $key): ?string
    {
        return null;
    }

    public static function getTypeName(string $typeId): ?string
    {
        return null;
    }

    public static function getTypeParamId(string $type): ?string
    {
        return null;
    }
}
