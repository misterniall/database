<?php namespace Database\Query;

class InfileClause
{
    /**
     * @var string
     */
    public $type;

    /**
     * @var bool
     */
    public $local = false;

    /**
     * @var array
     */
    public $rules = array();

    /**
     * @var array
     */
    public $columns;

    /**
     * @var string
     */
    public $file;

    /**
     * @var string
     */
    public $escapedBy;

    /**
     * @var string
     */
    public $enclosedBy;

    /**
     * @var bool
     */
    public $optionallyEnclosedBy;

    /**
     * @var string
     */
    public $fieldsTerminatedBy;

    /**
     * @var string
     */
    public $linesTerminatedBy;

    /**
     * @var string
     */
    public $linesStartingBy;

    /**
     * Create a new infile clause instance.

     * @param $file
     * @param array $columns
     */
    public function __construct($file, array $columns)
    {
        if($file instanceof \SplFileInfo)
        {
            $file = $file->getPathname();
        }

        $this->file = $file;

        $this->columns = $columns;
    }

    /**
     * @param $character
     * @return $this
     */
    public function escapedBy($character)
    {
        $this->escapedBy = $character;

        return $this;
    }

    /**
     * @param $character
     * @param bool $optionally
     * @return $this
     */
    public function enclosedBy($character, $optionally = false)
    {
        $this->optionallyEnclosedBy = $optionally;

        $this->enclosedBy = $character;

        return $this;
    }

    /**
     * @param $character
     * @return $this
     */
    public function fieldsTerminatedBy($character)
    {
        $this->fieldsTerminatedBy = $character;

        return $this;
    }

    /**
     * @param $character
     * @return $this
     */
    public function linesStartingBy($character)
    {
        $this->linesStartingBy = $character;

        return $this;
    }

    /**
     * @param $character
     * @return $this
     */
    public function linesTerminatedBy($character)
    {
        $this->linesTerminatedBy = $character;

        return $this;
    }

    /**
     * Perform a load data infile, ignoring rows with a duplicate key
     *
     * @return $this
     */
    public function ignore()
    {
        $this->type = 'ignore';

        return $this;
    }

    /**
     * Perform a load data infile, replacing rows with a duplicate key
     *
     * @return $this
     */
    public function replace()
    {
        $this->type = 'replace';

        return $this;
    }

    /**
     * Perform a load data infile, replacing rows with a duplicate key
     *
     * @return $this
     */
    public function local()
    {
        $this->local = true;

        return $this;
    }

    /**
     * @param array $rules
     * @return $this
     */
    public function rules(array $rules)
    {
        $this->rules = $rules;

        return $this;
    }
}