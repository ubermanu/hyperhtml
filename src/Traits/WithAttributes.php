<?php

namespace Ubermanu\Hyperhtml\Traits;

trait WithAttributes
{
    /**
     * @var array
     */
    protected array $attributes = [];

    /**
     * @param array $attributes
     * @return $this
     */
    public function setAttributes(array $attributes): self
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * @param array $attributes
     * @return $this
     */
    public function addAttributes(array $attributes): self
    {
        $this->attributes = array_merge($this->attributes, $attributes);
        return $this;
    }

    /**
     * @param string $name
     * @param mixed $value
     * @return $this
     */
    public function setAttribute(string $name, mixed $value): self
    {
        $this->attributes[$name] = $value;
        return $this;
    }

    /**
     * @param string $name
     * @return string|null
     */
    public function getAttribute(string $name): ?string
    {
        return $this->attributes[$name] ?? null;
    }

    /**
     * @return string
     */
    protected function renderAttributes(): string
    {
        $html = '';

        foreach ($this->getAttributes() as $key => $value) {
            if (is_bool($value)) {
                if ($value) {
                    $html .= " {$key}";
                }
            } elseif (is_string($value) && !empty($value)) {
                $value = \htmlspecialchars($value);
                $html .= " {$key}=\"{$value}\"";
            }
        }

        return $html;
    }
}
