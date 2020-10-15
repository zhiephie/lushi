# Laravel Lushi 📜

[![CI status](https://github.com/zhiephie/lushi/workflows/run-tests/badge.svg)](https://github.com/zhiephie/lushi/actions)

Lushi is a library of static Eloquent models for fixture data Administrative Subdivisions of Indonesia, such as provincies, regencies, districts and villages.

## Contents

- [Installing Lushi](#installing-lushi)
- [Using a model](#using-a-model)
- [Available models](#available-models)
  - [`Lushi\Models\Province`](#lushimodelsprovince)
  - [`Lushi\Models\Regency`](#lushimodelsregency)
  - [`Lushi\Models\District`](#lushimodelsdistrict)
  - [`Lushi\Models\Village`](#lushimodelsvillage)
- [Model relationships](#model-relationships)
- [Column customisation](#column-customisation)
- [Contributing](#contributing)

## Installing Lushi

You can use Composer to install Lushi into your application.

```
composer require zhiephie/lushi
```

No additional setup is required.

## Using a model

You can interact with a Lushi model just like you would any other Eloquent model, except that it only handles read-only operations.

```php
use Lushi\Models\Country;

Province::all(); // Get information about all provinces.

Province::find(11); // Get information about the ID 11.

Province::where('name', 'like', '%JAWA%')->get(); // Get information about all provinces that contain the character "JAVA".
```

## Available models

### `Lushi\Models\Province`

| Column Name | Description | Example |
|--|--|--|
| `id` | ID province. | `11` |
| `name` | Province name. | `Jawa Timur` |

| Relationship name | Model |
|--|--|
| `regencies` | [`Lushi\Models\Regency`](#lushimodelsregency) |

### `Lushi\Models\Regency`
| Column Name | Description | Example |
|--|--|--|
| `id` | ID regency. | `1101` |
| `province_id` | ID province. | `11` |
| `name` | Regency name. | `KOTA SABANG` |

| Relationship name | Model |
|--|--|
| `districts` | [`Lushi\Models\District`](#lushimodelsdistrict) |

### `Lushi\Models\District`
| Column Name | Description | Example |
|--|--|--|
| `id` | ID District. | `1101010` |
| `regency_id` | ID regency. | `1101` |
| `name` | District name. | `TEUPAH SELATAN` |

| Relationship name | Model |
|--|--|
| `villages` | [`Lushi\Models\Village`](#lushimodelsvillage) |

## Model relationships

Implementing an Eloquent relationship between a model in your app and a Lushi model is very simple. There are a couple of approaches you could take.

### Using inheritance

The simplest option is to create a new model in your app, and let it extend the Lushi model. Your new app model will now behave like the original Lushi model, except you can register new methods and customise it to your liking:

```php
<?php

namespace App\Models;

use Lushi\Models\Province as LushiProvince;

class Province extends LushiProvince
{
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
```

See our section on [model customisation](#column-customisation) for more customisation possibilities that are made available if you utilise this method.

## Column customisation

Lushi allows you to customise the column names on any provided model.

Create a new model within your app and let it extend the Lushi model that you would like to customise:

```php
<?php

namespace App\Models;

use Lushi\Models\Province as LushiProvince;

class Province extends LushiProvince
{
    protected $map = [
        'id' => 'province_code',
    ];
}
```

In this example, the `App\Models\Province`, extending the `Lushi\Models\Province` model, has the `province_code` column remapped to `id`:

```php
use App\Models\Province;

Province::find(11)->province_code;
```

## Contributing

If you have fixture data to contribute to the library, please open a pull request!

For reference, check out the existing models.
