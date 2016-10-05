<?php

namespace Calen\Persist\Entry;

class EntryManager
{
    private function createEntry(&$data, $key)
    {
        if (!is_array($data)) {
            $data = [];
        }
        $data[$key] = [];
    }

    private function parseKey($key)
    {
        return explode('.', $key);
    }

    public function findTree($data, $parts, $value)
    {
        if (!count($parts)) {
            return $value;
        }
        $newKey = array_shift($parts);
        if (!isset($data[$newKey])) {
            $this->createEntry($data, $newKey);
        }

        $data[$newKey] = $this->findTree($data[$newKey], $parts, $value);

        return $data;
    }

    public function changeEntry(&$dt, $key, $value)
    {
        $data = $dt;
        $keyParts = $this->parseKey($key);
        $data = $this->findTree($data, $keyParts, $value);
        $dt = $data;
    }

    public function deleteEntry(&$data, $key)
    {
        $keyParts = $this->parseKey($key);
        foreach ($keyParts as $index => $part) {
            if (!isset($data[$key])) {
                return;
            }

            $data = $data[$key];

            if ($index === count($keyParts) - 1) {
                unset($data[$part]);
            }
        }
    }

    public function getEntry(&$data, $key)
    {
        $keyParts = $this->parseKey($key);
        foreach ($keyParts as $index => $part) {
            if (!isset($data[$part])) {
                return null;
            }
            $data = $data[$part];

            if ($index === count($keyParts) - 1) {
                return $data;
            }
        }
        return null;
    }
}