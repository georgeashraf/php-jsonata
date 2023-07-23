<?php

function resolveData(array $data, string $key): array | bool
{
    if ($key === "$") {
        return $data;
    }

    // will search first level only
    if (array_key_exists($key, $data)) {
        return is_array($data[$key]) ? $data[$key] : [$data[$key]];
    }
    return false;
}

function getDataSet(string $name): array
{
    $filePath = "./tests/datasets/" . $name;
    $json = file_get_contents($filePath);
    if (!$json) {
        throw new ErrorException('Cant get dataset');
    }
    return json_decode($json, true);
}
