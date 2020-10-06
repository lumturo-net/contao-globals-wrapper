# TL_DCA
```
$dca = Lupcom\Globals\Dca::new(string $namespace);
```

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

### Vorhandene Konfiguration erweitern ###

`$dca->config([bool $extend])`

### Exceptions ###

`DcaConfigNotSetException`

> Wird zurückgegeben wenn `$extend = true` und zu erweiternde Konfiguration nicht vorhanden ist.




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

### Vorhandene Liste erweitern ###

`$dca->list([bool $extend])`

### Exceptions ###

`DcaListNotSetException`

> Wird zurückgegeben wenn `$extend = true` und die zu erweiternde Liste nicht vorhanden ist.

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

### Vorhandenes Feld erweitern ###

`$dca->field('singleSRC', [bool $extend])`

### Exceptions ###

`DcaFieldExistsException`

> Wird zurückgegeben wenn `$extend = false` und Feld mit selben Namen im selben Namespace erstellt werden soll.

`DcaFieldNotSetException`

> Wird zurückgegeben wenn `$extend = true` und das zu erweiterndes Feld nicht vorhanden ist.


## Paletten
```
$dca->palettes(string $palette)
    ->group('title_legend' [string $translations, boolean $hidden])
    ->fields([
        'mein_feld',
        'anderes_feld',
        'nochein_feld'
    ])
    ->group('type_legend', [string $translations, boolean $hidden])
    ->selector(['subfeld_1', 'subfeld_2'])
        ->palette('subfeld_1')
        ->groups('sub1_legend')
        ->fields([
            'subfeld_1',
            'subfeld_2,
            'subfeld_3'
        ])
        ->palette('subfeld_2')
        ->groups('sub2_legend')
        ->fields([
            'subfeld_1_1',
            'subfeld_1_2',
            'subfeld_1_3'
        ])
        ->compile()
    ->compile()
```


# TL_CTE
```
use Namespace\Elements\MyCustomElement1;
use Namespace\Elements\MyCustomElement2;
use Namespace\Elements\MyCustomElement3;

Lupcom\Globals\Cte::new(string $namespace)->push([
    'MyCustomElement1' => MyCustomElement1::class,
    'MyCustomElement2' => MyCustomElement2::class,
    'MyCustomElement3' => MyCustomElement3::class,
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

# TL_MODELS
```
use Namespace\Models\MyModel;
use Namespace\Models\MySecondModel;

Lupcom\Globals\Models::bind([
    'tl_tabelle'   => MyModel:class,
    'tl_tabelle_2' => MySecondModel::class,
    ...
]);
```

### Exceptions ###

`BindingExistsException`

> Wird zurückgegeben wenn eines der übergebenen Bindings bereits existiert


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
use Namespace\Hooks\AddCommentHook;

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

### Exceptions ###

`CssExistsException`

> Wird zurückgegeben wenn die hinzuzufügende CSS bereits in TL_CSS vorhanden ist