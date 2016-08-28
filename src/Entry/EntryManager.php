<?php

namespace Calen\Persist\Entry;

class EntryManager
{
    private function createEntry(&$data, $key)
    {
        $data[$key] = [];
    }

    private function parseKey($key)
    {
        return explode('.', $key);
    }

    public function changeEntry(&$dt, $key, $value)
    {
        $data = $dt;
        $keyParts = $this->parseKey($key);
        foreach ($keyParts as $index => $part) {
            if (!isset($data[$part])) {
                $this->createEntry($data, $part);
            }

            $data = $data[$part];

            if ($index === count($keyParts) - 1) {
                $data[$part] = $value;
            }
        }
        dd($data);
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
            if (!isset($data[$key])) {
                return null;
            }
            $data = $data[$key];

            if ($index === count($keyParts) - 1) {
                return $data;
            }
        }
        return null;
    }
}