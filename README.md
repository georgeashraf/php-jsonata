# PHP-Jsonata [ WIP]

## Implementing subset of jsonata functionality in php

[Incomplete] implementation of a simple json query and transformation language based on jsonata syntax

## Supported Operations (so Far)

1. dot operator (`.`)

## Example usage

```sh
$schema = "$";
$data = '{"key": "val"}';
$result = new Pjson($schema, $data);
echo $result // '{"key": "val"}'
```

How to Run

```sh
run "php main.php"
```

## License

MIT
