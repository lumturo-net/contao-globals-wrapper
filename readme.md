# TL_DCA
```
use Lupcom\Globals\Dca;

$dca = Dca::new(string $namespace);
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


## Paletten & Subpaletten
```
$dca->palettes(string $palette)
    ->group('title_legend' [string $translations, boolean $hidden])
    ->fields([
        'mein_feld',
        'anderes_feld',
        'nochein_feld'
    ])
    ->compile()

$dca->subpalette('mein_feld')
    ->fields([
        'unterfeld_1',
        'unterfeld_2'
    ])
    ->compile();
```


# TL_CTE

Mit `Cte::new($namespace)->push(Array [])` können Mappings 
von Inhaltselementen zu ihren respektiven Klassen definiert
werden.

```
use Lupcom\Globals\Cte;
use Namespace\Elements\MyCustomElement1;
use Namespace\Elements\MyCustomElement2;
use Namespace\Elements\MyCustomElement3;

Cte::new(string $namespace)->push([
    'MyCustomElement1' => MyCustomElement1::class,
    'MyCustomElement2' => MyCustomElement2::class,
    'MyCustomElement3' => MyCustomElement3::class,
]);
```

# TL_LANG
Mit dem Language Wrapper können sowohl neue Übersetzungen
erstellt, als auch aus existierenden Übersetzungen entsprechende
Werte ausgelesen werden.

## Übersetzung erstellen
```
use Lupcom\Globals\Lang;

$lang = Lang::set($namespace);
$lang->trans('MyCustomElement1', 'Ein cooles Inhaltselement')
     ->trans('MyCustomElement2', 'Und noch eins')
     ->trans('MyCustomElement3', 'Elemente gründen Gewerkschaft');
     ->trans('sharkday', ['Haitag', 'Es ist Haitag']);
```
## Übersetzungen holen
```
use Lupcom\Globals\Lang;

Lang::set($namespace);

$dca->field('text')
    ->label(__('sharkday'));
```
## Übersetungen aus anderem Namespace holen
```
use Lupcom\Globals\Lang;

$dca->field('text')
    ->label(Lang::__('deleteConfirm', 'MSC'));
```


# TL_MODELS
**!! Ab Contao 4.9.x !!**

Durch das Modelbinding ist es möglich, dass die Klassen
der Models anders benannt sein können als die Tabellen
in der Datenbank.

```
use Lupcom\Globals\Models;

use Namespace\Models\MyModel;
use Namespace\Models\MySecondModel;

Models::bind([
    'tl_tabelle'   => MyModel:class,
    'tl_tabelle_2' => MySecondModel::class,
    ...
]);
```

## Allgemeine Info zu Models

Ein Model repräsentiert EINE (!) Zeile aus einer Datenbanktabelle.

Daher sollte ein Model auch immer nach der Einzahl benannt sein. Beispiele:

`Lupcom\InserateBundle\Models\Inserat::class`

`Lupcom\SpeisenBundle\Models\Speise::class`

Sämtliche Datenbank-Interaktionen (Business Logik) sollten im Model abgebildet sein.

Gibt ein Model eine Instanz von `Model\Collection` zurück, so
sollte die entsprechende Variable nach der Mehrzahl benannt sein 
und über den Suffix `Collection verfügen. Beispiel:

`$inserateCollection = Inserat::findBy('published', 1);`

### Exceptions ###

`BindingExistsException`

> Wird zurückgegeben wenn eines der übergebenen Bindings bereits existiert


# BE_MOD
``` 
use Lupcom\Globals\Backend;

Backend::new(string $namespace, string $module)->tables([
    'tl_tabelle_1',
    'tl_tabelle_2',
    ...
]);
```

# TL_HOOKS
```
use Lupcom\Globals\Hooks;
use Namespace\Hooks\AddCommentHook;

$hooks = Hooks::get()
$hooks->activateAccount(array $myCallback)
      ->addComment([AddCommentHook::class, 'addCommentHook']);
```

# TL_CSS
``` 
use Lupcom\Globals\Css;

Css::push([
    'path/to/file1.css',
    'path/to/file2.css',
    ...
]);
```

### Exceptions ###

`CssExistsException`

> Wird zurückgegeben wenn die hinzuzufügende CSS bereits in TL_CSS vorhanden ist