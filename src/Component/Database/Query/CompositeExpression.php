<?php

namespace Pagekit\Component\Database\Query;

class CompositeExpression implements \Countable
{
    /**
     * Constant that represents an AND composite expression.
     */
    const TYPE_AND = 'AND';

    /**
     * Constant that represents an OR composite expression.
     */
    const TYPE_OR  = 'OR';

    /**
     * The instance type of composite expression.
     *
     * @var string
     */
    protected $type;

    /**
     * Each expression part of the composite expression.
     *
     * @var array
     */
    protected $parts = array();

    /**
     * Constructor.
     *
     * @param string $type
     * @param array  $parts
     */
    public function __construct($type, array $parts = array())
    {
        $this->type = $type;
        $this->addMultiple($parts);
    }

    /**
     * Returns the type of this composite expression (AND/OR).
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Adds an expression to composite expression.
     *
     * @param  mixed $part
     * @return CompositeExpression
     */
    public function add($part)
    {
        if (!empty($part) || ($part instanceof self && $part->count() > 0)) {
            $this->parts[] = $part;
        }

        return $this;
    }

    /**
     * Adds multiple parts to composite expression.
     *
     * @param  array $parts
     * @return CompositeExpression
     */
    public function addMultiple(array $parts = array())
    {
        foreach ((array) $parts as $part) {
            $this->add($part);
        }

        return $this;
    }

    /**
     * Retrieves the amount of expressions on composite expression.
     *
     * @return integer
     */
    public function count()
    {
        return count($this->parts);
    }

    /**
     * Retrieves the string representation of this composite expression.
     *
     * @return string
     */
    public function __toString()
    {
        if (count($this->parts) === 1) {
            return (string) $this->parts[0];
        }

        return '(' . implode(') ' . $this->type . ' (', $this->parts) . ')';
    }
}
