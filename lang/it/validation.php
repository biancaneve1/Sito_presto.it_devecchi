<?php

return [
    'required' => 'Il campo :attribute è richiesto',
    'min' => [
        'numeric' => 'Il :attribute deve essere almeno di :min euro',
        'string' => 'Il campo :attribute deve contenere almeno :min caratteri',
    ],
    'max' => [
        'string' => 'Il campo :attribute deve contenere massimo :max caratteri',
    ],
    'decimal' => 'Il :attribute deve avere :decimal decimali',
    'numeric' => 'Il :attribute deve essere un numero',

    'attributes' => [
        'title' => 'titolo',
        'price' => 'prezzo',
        'description' => 'descrizione',
        'category_id' => 'categoria'
    ]
];