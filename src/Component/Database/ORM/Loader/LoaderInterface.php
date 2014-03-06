<?php

namespace Pagekit\Component\Database\ORM\Loader;

interface LoaderInterface
{
    /**
     * Loads the metadata config for a given class.
     *
     * @param  \ReflectionClass $class
     * @param  array            $config
     * @return array
     */
    public function load(\ReflectionClass $class, array $config = array());

    /**
     * A transient class is NOT annotated with either @Entity or @MappedSuperclass.
     *
     * @param  \ReflectionClass $class
     * @return bool
     */
    public function isTransient(\ReflectionClass $class);
}
