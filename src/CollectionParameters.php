<?php

namespace Xenus;

class CollectionParameters
{
    /**
     * The collection's properties
     * @var array
     */
    private $properties = null;

    /**
     * The collection's connection
     * @var Connection
     */
    private $connection = null;

    public function __construct(Connection $connection, array $properties = [])
    {
        $this->connection = $connection;
        $this->properties = $properties;
    }

    /**
     * Get the connection
     *
     * @return Connection
     */
    public function getCollectionConnection()
    {
        return $this->connection;
    }

    /**
     * Determine if the given proeprty exists
     *
     * @param  string $property
     *
     * @return bool
     */
    public function have(string $property) {
        if (isset($this->properties[$property])) {
            return true;
        }

        return false;
    }

    /**
     * Get the collection's options
     *
     * @return Array
     */
    public function getCollectionOptions()
    {
        return array_merge([
            'typeMap' => ['root' => $this->properties['document'] ?? Document::class, 'array' => 'array', 'document' => 'array']
        ], $this->properties['options'] ?? []);
    }

    /**
     * Get the collection's name
     *
     * @return String|null
     */
    public function getCollectionName()
    {
        return $this->properties['name'] ?? null;
    }
}