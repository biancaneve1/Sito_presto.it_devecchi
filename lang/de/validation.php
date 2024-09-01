<?php

return [
    'required' => 'Das :attribute feld ist erforderlich',
    'min' => [
        'numeric' => 'Der :attribute muss mindestens :min euro betragen',
        'string' => 'Das :attribute feld muss mindestens :min zeichen enthalten',
    ],
    'max' => [
        'string' => 'Das :attribute darf maximal :max zeichen enthalten',
    ],
    'decimal' => 'Der :attribute muss :decimal dezimalstellen haben',
    'numeric' => 'Der :attribute muss eine zahl sein',

    'attributes' => [
        'title' => 'titel',
        'price' => 'preis',
        'description' => 'beschreibung',
        'category_id' => 'kategorie'
    ]
];