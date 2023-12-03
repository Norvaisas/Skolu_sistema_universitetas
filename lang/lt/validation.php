<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute laukas turi būti priimtas.',
    'accepted_if' => ':attribute laukas turi būti priimtas, kai :other yra :value.',
    'active_url' => ':attribute laukas turi būti galiojantis URL.',
    'after' => ':attribute laukas turi būti data po :date.',
    'after_or_equal' => ':attribute laukas turi būti data po arba lygi :date.',
    'alpha' => ':attribute laukas gali turėti tik raides.',
    'alpha_dash' => ':attribute laukas gali turėti tik raides, skaičius, brūkšnius ir pabraukimus.',
    'alpha_num' => ':attribute laukas gali turėti tik raides ir skaičius.',
    'array' => ':attribute laukas turi būti masyvas.',
    'ascii' => ':attribute laukas gali turėti tik ASCII simbolius.',
    'before' => ':attribute laukas turi būti data prieš :date.',
    'before_or_equal' => ':attribute laukas turi būti data prieš arba lygi :date.',
    'between' => [
        'array' => ':attribute laukas turi turėti nuo :min iki :max elementų.',
        'file' => ':attribute laukas turi būti nuo :min iki :max kilobaitų.',
        'numeric' => ':attribute laukas turi būti nuo :min iki :max.',
        'string' => ':attribute laukas turi būti nuo :min iki :max simbolių.',
    ],
    'boolean' => ':attribute laukas turi būti tiesa arba melas.',
    'can' => ':attribute laukas turi neteisingą vertę.',
    'confirmed' => ':attribute laukas nesutampa su patvirtinimu.',
    'current_password' => 'Slaptažodis yra neteisingas.',
    'date' => ':attribute laukas turi būti galiojanti data.',
    'date_equals' => ':attribute laukas turi būti data lygi :date.',
    'date_format' => ':attribute laukas turi atitikti formatą :format.',
    'decimal' => ':attribute laukas turi turėti :decimal dešimtainių skaičių.',
    'declined' => ':attribute laukas turi būti atmestas.',
    'declined_if' => ':attribute laukas turi būti atmestas, kai :other yra :value.',
    'different' => ':attribute laukas ir :other turi būti skirtingi.',
    'digits' => ':attribute laukas turi būti :digits skaitmenų.',
    'digits_between' => ':attribute laukas turi būti nuo :min iki :max skaitmenų.',
    'dimensions' => ':attribute lauko paveikslėlio matmenys yra netinkami.',
    'distinct' => ':attribute lauko reikšmė turi būti unikali.',
    'doesnt_end_with' => ':attribute laukas turi baigtis vienu iš šių: :values.',
    'doesnt_start_with' => ':attribute laukas turi prasidėti vienu iš šių: :values.',
    'email' => ':attribute laukas turi būti galiojantis el. pašto adresas.',
    'ends_with' => ':attribute laukas turi baigtis vienu iš šių: :values.',
    'enum' => 'Pasirinkta :attribute yra neteisinga.',
    'exists' => 'Pasirinkta :attribute yra neteisinga.',
    'file' => ':attribute laukas turi būti failas.',
    'filled' => ':attribute laukas turi turėti reikšmę.',
    'gt' => [
        'array' => ':attribute laukas turi turėti daugiau nei :value elementus.',
        'file' => ':attribute laukas turi būti didesnis nei :value kilobaitai.',
        'numeric' => ':attribute laukas turi būti didesnis nei :value.',
        'string' => ':attribute laukas turi būti ilgesnis nei :value simboliai.',
    ],
    'gte' => [
        'array' => ':attribute laukas turi turėti :value elementų arba daugiau.',
        'file' => ':attribute laukas turi būti didesnis arba lygus :value kilobaitams.',
        'numeric' => ':attribute laukas turi būti didesnis arba lygus :value.',
        'string' => ':attribute laukas turi būti ilgesnis arba lygus :value simboliams.',
    ],
    'image' => ':attribute laukas turi būti paveikslėlis.',
    'in' => 'Pasirinkta :attribute yra neteisinga.',
    'in_array' => ':attribute lauko reikšmė neegzistuoja :other.',
    'integer' => ':attribute laukas turi būti sveikasis skaičius.',
    'ip' => ':attribute laukas turi būti galiojantis IP adresas.',
    'ipv4' => ':attribute laukas turi būti galiojantis IPv4 adresas.',
    'ipv6' => ':attribute laukas turi būti galiojantis IPv6 adresas.',
    'json' => ':attribute laukas turi būti galiojantis JSON tekstas.',
    'lowercase' => ':attribute laukas turi būti mažosiomis raidėmis.',
    'lt' => [
        'array' => ':attribute laukas turi turėti mažiau nei :value elementus.',
        'file' => ':attribute laukas turi būti mažesnis nei :value kilobaitai.',
        'numeric' => ':attribute laukas turi būti mažesnis nei :value.',
        'string' => ':attribute laukas turi būti trumpesnis nei :value simboliai.',
    ],
    'lte' => [
        'array' => ':attribute laukas neturi turėti daugiau nei :value elementus.',
        'file' => ':attribute laukas turi būti mažiau arba lygus :value kilobaitams.',
        'numeric' => ':attribute laukas turi būti mažiau arba lygus :value.',
        'string' => ':attribute laukas turi būti mažiau arba lygus :value simboliams.',
    ],
    'mac_address' => ':attribute laukas turi būti galiojantis MAC adresas.',
    'max' => [
        'array' => ':attribute laukas neturi turėti daugiau nei :max elementus.',
        'file' => ':attribute laukas neturi būti didesnis nei :max kilobaitai.',
        'numeric' => ':attribute laukas neturi būti didesnis nei :max.',
        'string' => ':attribute laukas neturi būti didesnis nei :max simboliai.',
    ],
    'max_digits' => ':attribute laukas neturi turėti daugiau nei :max skaitmenis.',
    'mimes' => ':attribute laukas turi būti failas tipo: :values.',
    'mimetypes' => ':attribute laukas turi būti failas tipo: :values.',
    'min' => [
        'array' => ':attribute laukas turi turėti bent :min elementus.',
        'file' => ':attribute laukas turi būti bent :min kilobaitai.',
        'numeric' => ':attribute laukas turi būti bent :min.',
        'string' => ':attribute laukas turi būti bent :min simboliai.',
    ],
    'min_digits' => ':attribute laukas turi turėti bent :min skaitmenis.',
    'missing' => ':attribute laukas turi būti prarastas.',
    'missing_if' => ':attribute laukas turi būti prarastas, kai :other yra :value.',
    'missing_unless' => ':attribute laukas turi būti prarastas, nebent :other yra :value.',
    'missing_with' => ':attribute laukas turi būti prarastas, kai :values yra present.',
    'missing_with_all' => ':attribute laukas turi būti prarastas, kai :values yra present.',
    'multiple_of' => ':attribute laukas turi būti kartotinis :value.',
    'not_in' => 'Pasirinktas :attribute yra neteisingas.',
    'not_regex' => ':attribute lauko formatas yra neteisingas.',
    'numeric' => ':attribute laukas turi būti skaičius.',
    'password' => [
        'letters' => ':attribute lauke turi būti bent viena raidė.',
        'mixed' => ':attribute lauke turi būti bent viena didžioji ir mažoji raidė.',
        'numbers' => ':attribute lauke turi būti bent vienas skaičius.',
        'symbols' => ':attribute lauke turi būti bent vienas simbolis.',
        'uncompromised' => 'Duomenys :attribute buvo nutekėję. Prašome pasirinkti kitą :attribute.',
    ],
    'present' => ':attribute laukas turi būti present.',
    'prohibited' => ':attribute lauko naudojimas yra draudžiamas.',
    'prohibited_if' => ':attribute lauko naudojimas yra draudžiamas, kai :other yra :value.',
    'prohibited_unless' => ':attribute lauko naudojimas yra draudžiamas nebent :other yra :value.',
    'prohibits' => ':attribute laukas draudžia :other naudojimąsi.',
    'regex' => ':attribute lauko formatas yra neteisingas.',
    'required' => ':attribute laukas yra privalomas.',
    'required_array_keys' => ':attribute laukas turi turėti įrašus :values.',
    'required_if' => ':attribute laukas yra privalomas, kai :other yra :value.',
    'required_if_accepted' => ':attribute laukas yra privalomas, kai :other yra priimtas.',
    'required_unless' => ':attribute laukas yra privalomas, nebent :other yra :values.',
    'required_with' => ':attribute laukas yra privalomas, kai :values yra present.',
    'required_with_all' => ':attribute laukas yra privalomas, kai :values yra present.',
    'required_without' => ':attribute laukas yra privalomas, kai :values nėra present.',
    'required_without_all' => ':attribute laukas yra privalomas, kai nėra jokių :values.',
    'same' => ':attribute laukas turi sutapti su :other.',
    'size' => [
        'array' => ':attribute laukas turi turėti :size elementus.',
        'file' => ':attribute laukas turi būti :size kilobaitai.',
        'numeric' => ':attribute laukas turi būti :size.',
        'string' => ':attribute laukas turi būti :size simboliai.',
    ],
    'starts_with' => ':attribute laukas turi prasidėti vienu iš šių: :values.',
    'string' => ':attribute laukas turi būti tekstinis.',
    'timezone' => ':attribute laukas turi būti galiojanti laiko juosta.',
    'unique' => ':attribute jau yra naudojamas.',
    'uploaded' => ':attribute nepavyko įkelti.',
    'uppercase' => ':attribute laukas turi būti didžiosiomis raidėmis.',
    'url' => ':attribute laukas turi būti galiojantis URL.',
    'ulid' => ':attribute laukas turi būti galiojantis ULID.',
    'uuid' => ':attribute laukas turi būti galiojantis UUID.',    

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'end_date' => [
            'after_or_equal' => 'Antroji data turi būti vėliau už pirmąją.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
