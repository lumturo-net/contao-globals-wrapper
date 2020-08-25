# TL_DCA
```$dca = Lupcom\Globals\Dca::new(string $namespace);```

## Konfigurationen
```
$dca->config()
    ->dataContainer('Table')
    ->cTable(['tl_tabelle'])
    ->enableVersioning(true)
    ->custom([
        // Eigene Konfigurationsfelder
    ])
    ->sql([
        keys' => ['id' => 'primary']
    ]);
```

## Listen
```
$dca->list()
    ->sorting()
        ->fields(['title'])
        ->mode(1)
        ->flag(11)
        ->panelLayout('search;filter')
        ->compile()
    ->label()
        ->fields(['title'])
        ->compile()
    ->globalOperations('all')
        ->label($label)
        ->href()
        ->class()
        ->attributes()
        ->compile()
    ->operations('edit')
        ->href()
        ->icon()
        ->compile()
```

## Felder
```
$dca->fields('mein_feld')
    ->text()
    ->label(string|array $label)
    ->exclude(true)
    ->eval()
        ->mandatory(true)
        ->maxlength(255)
        ->compile()
    ->sql()
```

Wird ein Feld im gleichem Namespace erzeugt, wird eine `DcaFieldExistsExceptions`
zurückgegeben.

## Paletten
```
$dca->palettes(string $palette)
    ->group('title_legend' [string $translations, boolean $hidden])
    ->fields([
        'mein_feld',
        'anderes_feld'
    ])
    ->compile()
```


# TL_CTE
```
Lupcom\Globals\Cte::new(string $namespace)->push([
    'MyCustomElement1' => Namespace\MyCustomElement1::class,
    'MyCustomElement2' => Namespace\MyCustomElement2::class,
    'MyCustomElement3' => Namespace\MyCustomElement3::class,
]);
```

# TL_LANG
```
$lang = Lupcom\Globals\Lang::new($namespace);
$lang->trans('MyCustomElement1', 'Ein cooles Inhaltselement')
     ->trans('MyCustomElement2', 'Und noch eins')
     ->trans('MyCustomElement3', 'Elemente gründen Gewerkschaft');
     ->trans('sharkday', ['Haitag', 'Es ist Haitag']);
```

# BE_MOD
``` 
Lupcom\Globals\Backend::new(string $namespace, string $module)->tables([
    'tl_tabelle_1',
    'tl_tabelle_2',
    ...
]);
```

# TL_HOOKS
```
$hooks = Lupcom\Globals\Hooks::get()

$hooks->activateAccount(array $myCallback)
      ->addComment([AddCommentHook::class, 'addCommentHook']);
```

# TL_CSS
``` 
Lupcom\Globals\Css::push([
    'path/to/file1.css',
    'path/to/file2.css',
    ...
]);
```

Wenn die hinzuzufügende CSS Datei bereits anderweitig hinzugefügt wurde, wird eine `CssExistsException` zurückgegeben