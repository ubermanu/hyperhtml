<?php

namespace Ubermanu\Hyperhtml;

class SelectorParser
{
    /**
     * Parse a string to output a Selector object.
     *
     * @param string $str
     * @return array
     */
    public function parse(string $str): array
    {
        $result = [];

        $result['tag'] = $this->parseTag($str);
        $result['classes'] = $this->parseClasses($str);
        $result['id'] = $this->parseId($str);
        $result['attributes'] = $this->parseAttributes($str);

        return $result;
    }

    /**
     * Parse a string to output a tag.
     *
     * @param string $str
     * @return string
     */
    protected function parseTag(string $str): string
    {
        $matches = [];
        preg_match('/^([a-z]+)/', $str, $matches);

        return $matches[1] ?? 'div';
    }

    /**
     * Parse a string to output an array of classes.
     *
     * @param string $str
     * @return string[]
     */
    protected function parseClasses(string $str): array
    {
        $matches = [];
        preg_match_all('/\.([a-z0-9_-]+)/', $str, $matches);

        return $matches[1] ?? [];
    }

    /**
     * Parse a string to output an id.
     *
     * @param string $str
     * @return string
     */
    protected function parseId(string $str): string
    {
        $matches = [];
        preg_match('/#([a-z0-9_-]+)/', $str, $matches);

        return $matches[1] ?? '';
    }

    /**
     * Parse a string to output an array of attributes.
     *
     * @param string $str
     * @return array
     */
    protected function parseAttributes(string $str): array
    {
        $matches = [];
        preg_match_all('/\[([a-z0-9_-]+)(?:=([a-z0-9_-]+))?\]/', $str, $matches);

        $attributes = [];

        foreach ($matches[1] as $key => $name) {
            $attributes[$name] = $matches[2][$key] ?? '';
        }

        return $attributes;
    }
}
