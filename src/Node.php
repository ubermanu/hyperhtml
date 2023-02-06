<?php

namespace Ubermanu\Hyperhtml;

interface Node
{
    /**
     * @return string
     */
    public function render(): string;
}
