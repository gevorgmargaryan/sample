<?php

namespace SimpleMath;

interface VectorInterface
{
    /**
     * Adds the given vector.
     *
     * @param VectorInterface $vector
     * @return VectorInterface
     */
    public function add(VectorInterface $vector): VectorInterface;
}
