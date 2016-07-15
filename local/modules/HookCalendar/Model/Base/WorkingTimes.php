<?php

namespace HookCalendar\Model\Base;

use \DateTime;
use \Exception;
use \PDO;
use HookCalendar\Model\WorkingTimesQuery as ChildWorkingTimesQuery;
use HookCalendar\Model\Map\WorkingTimesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

abstract class WorkingTimes implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\HookCalendar\\Model\\Map\\WorkingTimesTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the id field.
     * @var        int
     */
    protected $id;

    /**
     * The value for the foreign_id field.
     * @var        int
     */
    protected $foreign_id;

    /**
     * The value for the type field.
     * @var        string
     */
    protected $type;

    /**
     * The value for the monday_from field.
     * @var        string
     */
    protected $monday_from;

    /**
     * The value for the monday_to field.
     * @var        string
     */
    protected $monday_to;

    /**
     * The value for the monday_lunch_from field.
     * @var        string
     */
    protected $monday_lunch_from;

    /**
     * The value for the monday_lunch_to field.
     * @var        string
     */
    protected $monday_lunch_to;

    /**
     * The value for the monday_dayoff field.
     * Note: this column has a database default value of: 'F'
     * @var        string
     */
    protected $monday_dayoff;

    /**
     * The value for the tuesday_from field.
     * @var        string
     */
    protected $tuesday_from;

    /**
     * The value for the tuesday_to field.
     * @var        string
     */
    protected $tuesday_to;

    /**
     * The value for the tuesday_lunch_from field.
     * @var        string
     */
    protected $tuesday_lunch_from;

    /**
     * The value for the tuesday_lunch_to field.
     * @var        string
     */
    protected $tuesday_lunch_to;

    /**
     * The value for the tuesday_dayoff field.
     * Note: this column has a database default value of: 'F'
     * @var        string
     */
    protected $tuesday_dayoff;

    /**
     * The value for the wednesday_from field.
     * @var        string
     */
    protected $wednesday_from;

    /**
     * The value for the wednesday_to field.
     * @var        string
     */
    protected $wednesday_to;

    /**
     * The value for the wednesday_lunch_from field.
     * @var        string
     */
    protected $wednesday_lunch_from;

    /**
     * The value for the wednesday_lunch_to field.
     * @var        string
     */
    protected $wednesday_lunch_to;

    /**
     * The value for the wednesday_dayoff field.
     * Note: this column has a database default value of: 'F'
     * @var        string
     */
    protected $wednesday_dayoff;

    /**
     * The value for the thursday_from field.
     * @var        string
     */
    protected $thursday_from;

    /**
     * The value for the thursday_to field.
     * @var        string
     */
    protected $thursday_to;

    /**
     * The value for the thursday_lunch_from field.
     * @var        string
     */
    protected $thursday_lunch_from;

    /**
     * The value for the thursday_lunch_to field.
     * @var        string
     */
    protected $thursday_lunch_to;

    /**
     * The value for the thursday_dayoff field.
     * Note: this column has a database default value of: 'F'
     * @var        string
     */
    protected $thursday_dayoff;

    /**
     * The value for the friday_from field.
     * @var        string
     */
    protected $friday_from;

    /**
     * The value for the friday_to field.
     * @var        string
     */
    protected $friday_to;

    /**
     * The value for the friday_lunch_from field.
     * @var        string
     */
    protected $friday_lunch_from;

    /**
     * The value for the friday_lunch_to field.
     * @var        string
     */
    protected $friday_lunch_to;

    /**
     * The value for the friday_dayoff field.
     * Note: this column has a database default value of: 'F'
     * @var        string
     */
    protected $friday_dayoff;

    /**
     * The value for the saturday_from field.
     * @var        string
     */
    protected $saturday_from;

    /**
     * The value for the saturday_to field.
     * @var        string
     */
    protected $saturday_to;

    /**
     * The value for the saturday_lunch_from field.
     * @var        string
     */
    protected $saturday_lunch_from;

    /**
     * The value for the saturday_lunch_to field.
     * @var        string
     */
    protected $saturday_lunch_to;

    /**
     * The value for the saturday_dayoff field.
     * Note: this column has a database default value of: 'F'
     * @var        string
     */
    protected $saturday_dayoff;

    /**
     * The value for the sunday_from field.
     * @var        string
     */
    protected $sunday_from;

    /**
     * The value for the sunday_to field.
     * @var        string
     */
    protected $sunday_to;

    /**
     * The value for the sunday_lunch_from field.
     * @var        string
     */
    protected $sunday_lunch_from;

    /**
     * The value for the sunday_lunch_to field.
     * @var        string
     */
    protected $sunday_lunch_to;

    /**
     * The value for the sunday_dayoff field.
     * Note: this column has a database default value of: 'F'
     * @var        string
     */
    protected $sunday_dayoff;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->monday_dayoff = 'F';
        $this->tuesday_dayoff = 'F';
        $this->wednesday_dayoff = 'F';
        $this->thursday_dayoff = 'F';
        $this->friday_dayoff = 'F';
        $this->saturday_dayoff = 'F';
        $this->sunday_dayoff = 'F';
    }

    /**
     * Initializes internal state of HookCalendar\Model\Base\WorkingTimes object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (Boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (Boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>WorkingTimes</code> instance.  If
     * <code>obj</code> is an instance of <code>WorkingTimes</code>, delegates to
     * <code>equals(WorkingTimes)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        $thisclazz = get_class($this);
        if (!is_object($obj) || !($obj instanceof $thisclazz)) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey()
            || null === $obj->getPrimaryKey())  {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        if (null !== $this->getPrimaryKey()) {
            return crc32(serialize($this->getPrimaryKey()));
        }

        return crc32(serialize(clone $this));
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return WorkingTimes The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     *
     * @return WorkingTimes The current object, for fluid interface
     */
    public function importFrom($parser, $data)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), TableMap::TYPE_PHPNAME);

        return $this;
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        return array_keys(get_object_vars($this));
    }

    /**
     * Get the [id] column value.
     *
     * @return   int
     */
    public function getId()
    {

        return $this->id;
    }

    /**
     * Get the [foreign_id] column value.
     *
     * @return   int
     */
    public function getForeignId()
    {

        return $this->foreign_id;
    }

    /**
     * Get the [type] column value.
     *
     * @return   string
     */
    public function getType()
    {

        return $this->type;
    }

    /**
     * Get the [optionally formatted] temporal [monday_from] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw \DateTime object will be returned.
     *
     * @return mixed Formatted date/time value as string or \DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getMondayFrom($format = NULL)
    {
        if ($format === null) {
            return $this->monday_from;
        } else {
            return $this->monday_from instanceof \DateTime ? $this->monday_from->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [monday_to] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw \DateTime object will be returned.
     *
     * @return mixed Formatted date/time value as string or \DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getMondayTo($format = NULL)
    {
        if ($format === null) {
            return $this->monday_to;
        } else {
            return $this->monday_to instanceof \DateTime ? $this->monday_to->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [monday_lunch_from] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw \DateTime object will be returned.
     *
     * @return mixed Formatted date/time value as string or \DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getMondayLunchFrom($format = NULL)
    {
        if ($format === null) {
            return $this->monday_lunch_from;
        } else {
            return $this->monday_lunch_from instanceof \DateTime ? $this->monday_lunch_from->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [monday_lunch_to] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw \DateTime object will be returned.
     *
     * @return mixed Formatted date/time value as string or \DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getMondayLunchTo($format = NULL)
    {
        if ($format === null) {
            return $this->monday_lunch_to;
        } else {
            return $this->monday_lunch_to instanceof \DateTime ? $this->monday_lunch_to->format($format) : null;
        }
    }

    /**
     * Get the [monday_dayoff] column value.
     *
     * @return   string
     */
    public function getMondayDayoff()
    {

        return $this->monday_dayoff;
    }

    /**
     * Get the [optionally formatted] temporal [tuesday_from] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw \DateTime object will be returned.
     *
     * @return mixed Formatted date/time value as string or \DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTuesdayFrom($format = NULL)
    {
        if ($format === null) {
            return $this->tuesday_from;
        } else {
            return $this->tuesday_from instanceof \DateTime ? $this->tuesday_from->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [tuesday_to] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw \DateTime object will be returned.
     *
     * @return mixed Formatted date/time value as string or \DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTuesdayTo($format = NULL)
    {
        if ($format === null) {
            return $this->tuesday_to;
        } else {
            return $this->tuesday_to instanceof \DateTime ? $this->tuesday_to->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [tuesday_lunch_from] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw \DateTime object will be returned.
     *
     * @return mixed Formatted date/time value as string or \DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTuesdayLunchFrom($format = NULL)
    {
        if ($format === null) {
            return $this->tuesday_lunch_from;
        } else {
            return $this->tuesday_lunch_from instanceof \DateTime ? $this->tuesday_lunch_from->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [tuesday_lunch_to] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw \DateTime object will be returned.
     *
     * @return mixed Formatted date/time value as string or \DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTuesdayLunchTo($format = NULL)
    {
        if ($format === null) {
            return $this->tuesday_lunch_to;
        } else {
            return $this->tuesday_lunch_to instanceof \DateTime ? $this->tuesday_lunch_to->format($format) : null;
        }
    }

    /**
     * Get the [tuesday_dayoff] column value.
     *
     * @return   string
     */
    public function getTuesdayDayoff()
    {

        return $this->tuesday_dayoff;
    }

    /**
     * Get the [optionally formatted] temporal [wednesday_from] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw \DateTime object will be returned.
     *
     * @return mixed Formatted date/time value as string or \DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getWednesdayFrom($format = NULL)
    {
        if ($format === null) {
            return $this->wednesday_from;
        } else {
            return $this->wednesday_from instanceof \DateTime ? $this->wednesday_from->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [wednesday_to] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw \DateTime object will be returned.
     *
     * @return mixed Formatted date/time value as string or \DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getWednesdayTo($format = NULL)
    {
        if ($format === null) {
            return $this->wednesday_to;
        } else {
            return $this->wednesday_to instanceof \DateTime ? $this->wednesday_to->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [wednesday_lunch_from] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw \DateTime object will be returned.
     *
     * @return mixed Formatted date/time value as string or \DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getWednesdayLunchFrom($format = NULL)
    {
        if ($format === null) {
            return $this->wednesday_lunch_from;
        } else {
            return $this->wednesday_lunch_from instanceof \DateTime ? $this->wednesday_lunch_from->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [wednesday_lunch_to] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw \DateTime object will be returned.
     *
     * @return mixed Formatted date/time value as string or \DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getWednesdayLunchTo($format = NULL)
    {
        if ($format === null) {
            return $this->wednesday_lunch_to;
        } else {
            return $this->wednesday_lunch_to instanceof \DateTime ? $this->wednesday_lunch_to->format($format) : null;
        }
    }

    /**
     * Get the [wednesday_dayoff] column value.
     *
     * @return   string
     */
    public function getWednesdayDayoff()
    {

        return $this->wednesday_dayoff;
    }

    /**
     * Get the [optionally formatted] temporal [thursday_from] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw \DateTime object will be returned.
     *
     * @return mixed Formatted date/time value as string or \DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getThursdayFrom($format = NULL)
    {
        if ($format === null) {
            return $this->thursday_from;
        } else {
            return $this->thursday_from instanceof \DateTime ? $this->thursday_from->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [thursday_to] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw \DateTime object will be returned.
     *
     * @return mixed Formatted date/time value as string or \DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getThursdayTo($format = NULL)
    {
        if ($format === null) {
            return $this->thursday_to;
        } else {
            return $this->thursday_to instanceof \DateTime ? $this->thursday_to->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [thursday_lunch_from] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw \DateTime object will be returned.
     *
     * @return mixed Formatted date/time value as string or \DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getThursdayLunchFrom($format = NULL)
    {
        if ($format === null) {
            return $this->thursday_lunch_from;
        } else {
            return $this->thursday_lunch_from instanceof \DateTime ? $this->thursday_lunch_from->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [thursday_lunch_to] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw \DateTime object will be returned.
     *
     * @return mixed Formatted date/time value as string or \DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getThursdayLunchTo($format = NULL)
    {
        if ($format === null) {
            return $this->thursday_lunch_to;
        } else {
            return $this->thursday_lunch_to instanceof \DateTime ? $this->thursday_lunch_to->format($format) : null;
        }
    }

    /**
     * Get the [thursday_dayoff] column value.
     *
     * @return   string
     */
    public function getThursdayDayoff()
    {

        return $this->thursday_dayoff;
    }

    /**
     * Get the [optionally formatted] temporal [friday_from] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw \DateTime object will be returned.
     *
     * @return mixed Formatted date/time value as string or \DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getFridayFrom($format = NULL)
    {
        if ($format === null) {
            return $this->friday_from;
        } else {
            return $this->friday_from instanceof \DateTime ? $this->friday_from->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [friday_to] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw \DateTime object will be returned.
     *
     * @return mixed Formatted date/time value as string or \DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getFridayTo($format = NULL)
    {
        if ($format === null) {
            return $this->friday_to;
        } else {
            return $this->friday_to instanceof \DateTime ? $this->friday_to->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [friday_lunch_from] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw \DateTime object will be returned.
     *
     * @return mixed Formatted date/time value as string or \DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getFridayLunchFrom($format = NULL)
    {
        if ($format === null) {
            return $this->friday_lunch_from;
        } else {
            return $this->friday_lunch_from instanceof \DateTime ? $this->friday_lunch_from->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [friday_lunch_to] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw \DateTime object will be returned.
     *
     * @return mixed Formatted date/time value as string or \DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getFridayLunchTo($format = NULL)
    {
        if ($format === null) {
            return $this->friday_lunch_to;
        } else {
            return $this->friday_lunch_to instanceof \DateTime ? $this->friday_lunch_to->format($format) : null;
        }
    }

    /**
     * Get the [friday_dayoff] column value.
     *
     * @return   string
     */
    public function getFridayDayoff()
    {

        return $this->friday_dayoff;
    }

    /**
     * Get the [optionally formatted] temporal [saturday_from] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw \DateTime object will be returned.
     *
     * @return mixed Formatted date/time value as string or \DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getSaturdayFrom($format = NULL)
    {
        if ($format === null) {
            return $this->saturday_from;
        } else {
            return $this->saturday_from instanceof \DateTime ? $this->saturday_from->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [saturday_to] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw \DateTime object will be returned.
     *
     * @return mixed Formatted date/time value as string or \DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getSaturdayTo($format = NULL)
    {
        if ($format === null) {
            return $this->saturday_to;
        } else {
            return $this->saturday_to instanceof \DateTime ? $this->saturday_to->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [saturday_lunch_from] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw \DateTime object will be returned.
     *
     * @return mixed Formatted date/time value as string or \DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getSaturdayLunchFrom($format = NULL)
    {
        if ($format === null) {
            return $this->saturday_lunch_from;
        } else {
            return $this->saturday_lunch_from instanceof \DateTime ? $this->saturday_lunch_from->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [saturday_lunch_to] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw \DateTime object will be returned.
     *
     * @return mixed Formatted date/time value as string or \DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getSaturdayLunchTo($format = NULL)
    {
        if ($format === null) {
            return $this->saturday_lunch_to;
        } else {
            return $this->saturday_lunch_to instanceof \DateTime ? $this->saturday_lunch_to->format($format) : null;
        }
    }

    /**
     * Get the [saturday_dayoff] column value.
     *
     * @return   string
     */
    public function getSaturdayDayoff()
    {

        return $this->saturday_dayoff;
    }

    /**
     * Get the [optionally formatted] temporal [sunday_from] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw \DateTime object will be returned.
     *
     * @return mixed Formatted date/time value as string or \DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getSundayFrom($format = NULL)
    {
        if ($format === null) {
            return $this->sunday_from;
        } else {
            return $this->sunday_from instanceof \DateTime ? $this->sunday_from->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [sunday_to] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw \DateTime object will be returned.
     *
     * @return mixed Formatted date/time value as string or \DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getSundayTo($format = NULL)
    {
        if ($format === null) {
            return $this->sunday_to;
        } else {
            return $this->sunday_to instanceof \DateTime ? $this->sunday_to->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [sunday_lunch_from] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw \DateTime object will be returned.
     *
     * @return mixed Formatted date/time value as string or \DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getSundayLunchFrom($format = NULL)
    {
        if ($format === null) {
            return $this->sunday_lunch_from;
        } else {
            return $this->sunday_lunch_from instanceof \DateTime ? $this->sunday_lunch_from->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [sunday_lunch_to] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw \DateTime object will be returned.
     *
     * @return mixed Formatted date/time value as string or \DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getSundayLunchTo($format = NULL)
    {
        if ($format === null) {
            return $this->sunday_lunch_to;
        } else {
            return $this->sunday_lunch_to instanceof \DateTime ? $this->sunday_lunch_to->format($format) : null;
        }
    }

    /**
     * Get the [sunday_dayoff] column value.
     *
     * @return   string
     */
    public function getSundayDayoff()
    {

        return $this->sunday_dayoff;
    }

    /**
     * Set the value of [id] column.
     *
     * @param      int $v new value
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[WorkingTimesTableMap::ID] = true;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [foreign_id] column.
     *
     * @param      int $v new value
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setForeignId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->foreign_id !== $v) {
            $this->foreign_id = $v;
            $this->modifiedColumns[WorkingTimesTableMap::FOREIGN_ID] = true;
        }


        return $this;
    } // setForeignId()

    /**
     * Set the value of [type] column.
     *
     * @param      string $v new value
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->type !== $v) {
            $this->type = $v;
            $this->modifiedColumns[WorkingTimesTableMap::TYPE] = true;
        }


        return $this;
    } // setType()

    /**
     * Sets the value of [monday_from] column to a normalized version of the date/time value specified.
     *
     * @param      mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setMondayFrom($v)
    {
        $dt = PropelDateTime::newInstance($v, null, '\DateTime');
        if ($this->monday_from !== null || $dt !== null) {
            if ($dt !== $this->monday_from) {
                $this->monday_from = $dt;
                $this->modifiedColumns[WorkingTimesTableMap::MONDAY_FROM] = true;
            }
        } // if either are not null


        return $this;
    } // setMondayFrom()

    /**
     * Sets the value of [monday_to] column to a normalized version of the date/time value specified.
     *
     * @param      mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setMondayTo($v)
    {
        $dt = PropelDateTime::newInstance($v, null, '\DateTime');
        if ($this->monday_to !== null || $dt !== null) {
            if ($dt !== $this->monday_to) {
                $this->monday_to = $dt;
                $this->modifiedColumns[WorkingTimesTableMap::MONDAY_TO] = true;
            }
        } // if either are not null


        return $this;
    } // setMondayTo()

    /**
     * Sets the value of [monday_lunch_from] column to a normalized version of the date/time value specified.
     *
     * @param      mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setMondayLunchFrom($v)
    {
        $dt = PropelDateTime::newInstance($v, null, '\DateTime');
        if ($this->monday_lunch_from !== null || $dt !== null) {
            if ($dt !== $this->monday_lunch_from) {
                $this->monday_lunch_from = $dt;
                $this->modifiedColumns[WorkingTimesTableMap::MONDAY_LUNCH_FROM] = true;
            }
        } // if either are not null


        return $this;
    } // setMondayLunchFrom()

    /**
     * Sets the value of [monday_lunch_to] column to a normalized version of the date/time value specified.
     *
     * @param      mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setMondayLunchTo($v)
    {
        $dt = PropelDateTime::newInstance($v, null, '\DateTime');
        if ($this->monday_lunch_to !== null || $dt !== null) {
            if ($dt !== $this->monday_lunch_to) {
                $this->monday_lunch_to = $dt;
                $this->modifiedColumns[WorkingTimesTableMap::MONDAY_LUNCH_TO] = true;
            }
        } // if either are not null


        return $this;
    } // setMondayLunchTo()

    /**
     * Set the value of [monday_dayoff] column.
     *
     * @param      string $v new value
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setMondayDayoff($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->monday_dayoff !== $v) {
            $this->monday_dayoff = $v;
            $this->modifiedColumns[WorkingTimesTableMap::MONDAY_DAYOFF] = true;
        }


        return $this;
    } // setMondayDayoff()

    /**
     * Sets the value of [tuesday_from] column to a normalized version of the date/time value specified.
     *
     * @param      mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setTuesdayFrom($v)
    {
        $dt = PropelDateTime::newInstance($v, null, '\DateTime');
        if ($this->tuesday_from !== null || $dt !== null) {
            if ($dt !== $this->tuesday_from) {
                $this->tuesday_from = $dt;
                $this->modifiedColumns[WorkingTimesTableMap::TUESDAY_FROM] = true;
            }
        } // if either are not null


        return $this;
    } // setTuesdayFrom()

    /**
     * Sets the value of [tuesday_to] column to a normalized version of the date/time value specified.
     *
     * @param      mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setTuesdayTo($v)
    {
        $dt = PropelDateTime::newInstance($v, null, '\DateTime');
        if ($this->tuesday_to !== null || $dt !== null) {
            if ($dt !== $this->tuesday_to) {
                $this->tuesday_to = $dt;
                $this->modifiedColumns[WorkingTimesTableMap::TUESDAY_TO] = true;
            }
        } // if either are not null


        return $this;
    } // setTuesdayTo()

    /**
     * Sets the value of [tuesday_lunch_from] column to a normalized version of the date/time value specified.
     *
     * @param      mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setTuesdayLunchFrom($v)
    {
        $dt = PropelDateTime::newInstance($v, null, '\DateTime');
        if ($this->tuesday_lunch_from !== null || $dt !== null) {
            if ($dt !== $this->tuesday_lunch_from) {
                $this->tuesday_lunch_from = $dt;
                $this->modifiedColumns[WorkingTimesTableMap::TUESDAY_LUNCH_FROM] = true;
            }
        } // if either are not null


        return $this;
    } // setTuesdayLunchFrom()

    /**
     * Sets the value of [tuesday_lunch_to] column to a normalized version of the date/time value specified.
     *
     * @param      mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setTuesdayLunchTo($v)
    {
        $dt = PropelDateTime::newInstance($v, null, '\DateTime');
        if ($this->tuesday_lunch_to !== null || $dt !== null) {
            if ($dt !== $this->tuesday_lunch_to) {
                $this->tuesday_lunch_to = $dt;
                $this->modifiedColumns[WorkingTimesTableMap::TUESDAY_LUNCH_TO] = true;
            }
        } // if either are not null


        return $this;
    } // setTuesdayLunchTo()

    /**
     * Set the value of [tuesday_dayoff] column.
     *
     * @param      string $v new value
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setTuesdayDayoff($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tuesday_dayoff !== $v) {
            $this->tuesday_dayoff = $v;
            $this->modifiedColumns[WorkingTimesTableMap::TUESDAY_DAYOFF] = true;
        }


        return $this;
    } // setTuesdayDayoff()

    /**
     * Sets the value of [wednesday_from] column to a normalized version of the date/time value specified.
     *
     * @param      mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setWednesdayFrom($v)
    {
        $dt = PropelDateTime::newInstance($v, null, '\DateTime');
        if ($this->wednesday_from !== null || $dt !== null) {
            if ($dt !== $this->wednesday_from) {
                $this->wednesday_from = $dt;
                $this->modifiedColumns[WorkingTimesTableMap::WEDNESDAY_FROM] = true;
            }
        } // if either are not null


        return $this;
    } // setWednesdayFrom()

    /**
     * Sets the value of [wednesday_to] column to a normalized version of the date/time value specified.
     *
     * @param      mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setWednesdayTo($v)
    {
        $dt = PropelDateTime::newInstance($v, null, '\DateTime');
        if ($this->wednesday_to !== null || $dt !== null) {
            if ($dt !== $this->wednesday_to) {
                $this->wednesday_to = $dt;
                $this->modifiedColumns[WorkingTimesTableMap::WEDNESDAY_TO] = true;
            }
        } // if either are not null


        return $this;
    } // setWednesdayTo()

    /**
     * Sets the value of [wednesday_lunch_from] column to a normalized version of the date/time value specified.
     *
     * @param      mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setWednesdayLunchFrom($v)
    {
        $dt = PropelDateTime::newInstance($v, null, '\DateTime');
        if ($this->wednesday_lunch_from !== null || $dt !== null) {
            if ($dt !== $this->wednesday_lunch_from) {
                $this->wednesday_lunch_from = $dt;
                $this->modifiedColumns[WorkingTimesTableMap::WEDNESDAY_LUNCH_FROM] = true;
            }
        } // if either are not null


        return $this;
    } // setWednesdayLunchFrom()

    /**
     * Sets the value of [wednesday_lunch_to] column to a normalized version of the date/time value specified.
     *
     * @param      mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setWednesdayLunchTo($v)
    {
        $dt = PropelDateTime::newInstance($v, null, '\DateTime');
        if ($this->wednesday_lunch_to !== null || $dt !== null) {
            if ($dt !== $this->wednesday_lunch_to) {
                $this->wednesday_lunch_to = $dt;
                $this->modifiedColumns[WorkingTimesTableMap::WEDNESDAY_LUNCH_TO] = true;
            }
        } // if either are not null


        return $this;
    } // setWednesdayLunchTo()

    /**
     * Set the value of [wednesday_dayoff] column.
     *
     * @param      string $v new value
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setWednesdayDayoff($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->wednesday_dayoff !== $v) {
            $this->wednesday_dayoff = $v;
            $this->modifiedColumns[WorkingTimesTableMap::WEDNESDAY_DAYOFF] = true;
        }


        return $this;
    } // setWednesdayDayoff()

    /**
     * Sets the value of [thursday_from] column to a normalized version of the date/time value specified.
     *
     * @param      mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setThursdayFrom($v)
    {
        $dt = PropelDateTime::newInstance($v, null, '\DateTime');
        if ($this->thursday_from !== null || $dt !== null) {
            if ($dt !== $this->thursday_from) {
                $this->thursday_from = $dt;
                $this->modifiedColumns[WorkingTimesTableMap::THURSDAY_FROM] = true;
            }
        } // if either are not null


        return $this;
    } // setThursdayFrom()

    /**
     * Sets the value of [thursday_to] column to a normalized version of the date/time value specified.
     *
     * @param      mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setThursdayTo($v)
    {
        $dt = PropelDateTime::newInstance($v, null, '\DateTime');
        if ($this->thursday_to !== null || $dt !== null) {
            if ($dt !== $this->thursday_to) {
                $this->thursday_to = $dt;
                $this->modifiedColumns[WorkingTimesTableMap::THURSDAY_TO] = true;
            }
        } // if either are not null


        return $this;
    } // setThursdayTo()

    /**
     * Sets the value of [thursday_lunch_from] column to a normalized version of the date/time value specified.
     *
     * @param      mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setThursdayLunchFrom($v)
    {
        $dt = PropelDateTime::newInstance($v, null, '\DateTime');
        if ($this->thursday_lunch_from !== null || $dt !== null) {
            if ($dt !== $this->thursday_lunch_from) {
                $this->thursday_lunch_from = $dt;
                $this->modifiedColumns[WorkingTimesTableMap::THURSDAY_LUNCH_FROM] = true;
            }
        } // if either are not null


        return $this;
    } // setThursdayLunchFrom()

    /**
     * Sets the value of [thursday_lunch_to] column to a normalized version of the date/time value specified.
     *
     * @param      mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setThursdayLunchTo($v)
    {
        $dt = PropelDateTime::newInstance($v, null, '\DateTime');
        if ($this->thursday_lunch_to !== null || $dt !== null) {
            if ($dt !== $this->thursday_lunch_to) {
                $this->thursday_lunch_to = $dt;
                $this->modifiedColumns[WorkingTimesTableMap::THURSDAY_LUNCH_TO] = true;
            }
        } // if either are not null


        return $this;
    } // setThursdayLunchTo()

    /**
     * Set the value of [thursday_dayoff] column.
     *
     * @param      string $v new value
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setThursdayDayoff($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->thursday_dayoff !== $v) {
            $this->thursday_dayoff = $v;
            $this->modifiedColumns[WorkingTimesTableMap::THURSDAY_DAYOFF] = true;
        }


        return $this;
    } // setThursdayDayoff()

    /**
     * Sets the value of [friday_from] column to a normalized version of the date/time value specified.
     *
     * @param      mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setFridayFrom($v)
    {
        $dt = PropelDateTime::newInstance($v, null, '\DateTime');
        if ($this->friday_from !== null || $dt !== null) {
            if ($dt !== $this->friday_from) {
                $this->friday_from = $dt;
                $this->modifiedColumns[WorkingTimesTableMap::FRIDAY_FROM] = true;
            }
        } // if either are not null


        return $this;
    } // setFridayFrom()

    /**
     * Sets the value of [friday_to] column to a normalized version of the date/time value specified.
     *
     * @param      mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setFridayTo($v)
    {
        $dt = PropelDateTime::newInstance($v, null, '\DateTime');
        if ($this->friday_to !== null || $dt !== null) {
            if ($dt !== $this->friday_to) {
                $this->friday_to = $dt;
                $this->modifiedColumns[WorkingTimesTableMap::FRIDAY_TO] = true;
            }
        } // if either are not null


        return $this;
    } // setFridayTo()

    /**
     * Sets the value of [friday_lunch_from] column to a normalized version of the date/time value specified.
     *
     * @param      mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setFridayLunchFrom($v)
    {
        $dt = PropelDateTime::newInstance($v, null, '\DateTime');
        if ($this->friday_lunch_from !== null || $dt !== null) {
            if ($dt !== $this->friday_lunch_from) {
                $this->friday_lunch_from = $dt;
                $this->modifiedColumns[WorkingTimesTableMap::FRIDAY_LUNCH_FROM] = true;
            }
        } // if either are not null


        return $this;
    } // setFridayLunchFrom()

    /**
     * Sets the value of [friday_lunch_to] column to a normalized version of the date/time value specified.
     *
     * @param      mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setFridayLunchTo($v)
    {
        $dt = PropelDateTime::newInstance($v, null, '\DateTime');
        if ($this->friday_lunch_to !== null || $dt !== null) {
            if ($dt !== $this->friday_lunch_to) {
                $this->friday_lunch_to = $dt;
                $this->modifiedColumns[WorkingTimesTableMap::FRIDAY_LUNCH_TO] = true;
            }
        } // if either are not null


        return $this;
    } // setFridayLunchTo()

    /**
     * Set the value of [friday_dayoff] column.
     *
     * @param      string $v new value
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setFridayDayoff($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->friday_dayoff !== $v) {
            $this->friday_dayoff = $v;
            $this->modifiedColumns[WorkingTimesTableMap::FRIDAY_DAYOFF] = true;
        }


        return $this;
    } // setFridayDayoff()

    /**
     * Sets the value of [saturday_from] column to a normalized version of the date/time value specified.
     *
     * @param      mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setSaturdayFrom($v)
    {
        $dt = PropelDateTime::newInstance($v, null, '\DateTime');
        if ($this->saturday_from !== null || $dt !== null) {
            if ($dt !== $this->saturday_from) {
                $this->saturday_from = $dt;
                $this->modifiedColumns[WorkingTimesTableMap::SATURDAY_FROM] = true;
            }
        } // if either are not null


        return $this;
    } // setSaturdayFrom()

    /**
     * Sets the value of [saturday_to] column to a normalized version of the date/time value specified.
     *
     * @param      mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setSaturdayTo($v)
    {
        $dt = PropelDateTime::newInstance($v, null, '\DateTime');
        if ($this->saturday_to !== null || $dt !== null) {
            if ($dt !== $this->saturday_to) {
                $this->saturday_to = $dt;
                $this->modifiedColumns[WorkingTimesTableMap::SATURDAY_TO] = true;
            }
        } // if either are not null


        return $this;
    } // setSaturdayTo()

    /**
     * Sets the value of [saturday_lunch_from] column to a normalized version of the date/time value specified.
     *
     * @param      mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setSaturdayLunchFrom($v)
    {
        $dt = PropelDateTime::newInstance($v, null, '\DateTime');
        if ($this->saturday_lunch_from !== null || $dt !== null) {
            if ($dt !== $this->saturday_lunch_from) {
                $this->saturday_lunch_from = $dt;
                $this->modifiedColumns[WorkingTimesTableMap::SATURDAY_LUNCH_FROM] = true;
            }
        } // if either are not null


        return $this;
    } // setSaturdayLunchFrom()

    /**
     * Sets the value of [saturday_lunch_to] column to a normalized version of the date/time value specified.
     *
     * @param      mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setSaturdayLunchTo($v)
    {
        $dt = PropelDateTime::newInstance($v, null, '\DateTime');
        if ($this->saturday_lunch_to !== null || $dt !== null) {
            if ($dt !== $this->saturday_lunch_to) {
                $this->saturday_lunch_to = $dt;
                $this->modifiedColumns[WorkingTimesTableMap::SATURDAY_LUNCH_TO] = true;
            }
        } // if either are not null


        return $this;
    } // setSaturdayLunchTo()

    /**
     * Set the value of [saturday_dayoff] column.
     *
     * @param      string $v new value
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setSaturdayDayoff($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->saturday_dayoff !== $v) {
            $this->saturday_dayoff = $v;
            $this->modifiedColumns[WorkingTimesTableMap::SATURDAY_DAYOFF] = true;
        }


        return $this;
    } // setSaturdayDayoff()

    /**
     * Sets the value of [sunday_from] column to a normalized version of the date/time value specified.
     *
     * @param      mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setSundayFrom($v)
    {
        $dt = PropelDateTime::newInstance($v, null, '\DateTime');
        if ($this->sunday_from !== null || $dt !== null) {
            if ($dt !== $this->sunday_from) {
                $this->sunday_from = $dt;
                $this->modifiedColumns[WorkingTimesTableMap::SUNDAY_FROM] = true;
            }
        } // if either are not null


        return $this;
    } // setSundayFrom()

    /**
     * Sets the value of [sunday_to] column to a normalized version of the date/time value specified.
     *
     * @param      mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setSundayTo($v)
    {
        $dt = PropelDateTime::newInstance($v, null, '\DateTime');
        if ($this->sunday_to !== null || $dt !== null) {
            if ($dt !== $this->sunday_to) {
                $this->sunday_to = $dt;
                $this->modifiedColumns[WorkingTimesTableMap::SUNDAY_TO] = true;
            }
        } // if either are not null


        return $this;
    } // setSundayTo()

    /**
     * Sets the value of [sunday_lunch_from] column to a normalized version of the date/time value specified.
     *
     * @param      mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setSundayLunchFrom($v)
    {
        $dt = PropelDateTime::newInstance($v, null, '\DateTime');
        if ($this->sunday_lunch_from !== null || $dt !== null) {
            if ($dt !== $this->sunday_lunch_from) {
                $this->sunday_lunch_from = $dt;
                $this->modifiedColumns[WorkingTimesTableMap::SUNDAY_LUNCH_FROM] = true;
            }
        } // if either are not null


        return $this;
    } // setSundayLunchFrom()

    /**
     * Sets the value of [sunday_lunch_to] column to a normalized version of the date/time value specified.
     *
     * @param      mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setSundayLunchTo($v)
    {
        $dt = PropelDateTime::newInstance($v, null, '\DateTime');
        if ($this->sunday_lunch_to !== null || $dt !== null) {
            if ($dt !== $this->sunday_lunch_to) {
                $this->sunday_lunch_to = $dt;
                $this->modifiedColumns[WorkingTimesTableMap::SUNDAY_LUNCH_TO] = true;
            }
        } // if either are not null


        return $this;
    } // setSundayLunchTo()

    /**
     * Set the value of [sunday_dayoff] column.
     *
     * @param      string $v new value
     * @return   \HookCalendar\Model\WorkingTimes The current object (for fluent API support)
     */
    public function setSundayDayoff($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sunday_dayoff !== $v) {
            $this->sunday_dayoff = $v;
            $this->modifiedColumns[WorkingTimesTableMap::SUNDAY_DAYOFF] = true;
        }


        return $this;
    } // setSundayDayoff()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->monday_dayoff !== 'F') {
                return false;
            }

            if ($this->tuesday_dayoff !== 'F') {
                return false;
            }

            if ($this->wednesday_dayoff !== 'F') {
                return false;
            }

            if ($this->thursday_dayoff !== 'F') {
                return false;
            }

            if ($this->friday_dayoff !== 'F') {
                return false;
            }

            if ($this->saturday_dayoff !== 'F') {
                return false;
            }

            if ($this->sunday_dayoff !== 'F') {
                return false;
            }

        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {


            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : WorkingTimesTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : WorkingTimesTableMap::translateFieldName('ForeignId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->foreign_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : WorkingTimesTableMap::translateFieldName('Type', TableMap::TYPE_PHPNAME, $indexType)];
            $this->type = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : WorkingTimesTableMap::translateFieldName('MondayFrom', TableMap::TYPE_PHPNAME, $indexType)];
            $this->monday_from = (null !== $col) ? PropelDateTime::newInstance($col, null, '\DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : WorkingTimesTableMap::translateFieldName('MondayTo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->monday_to = (null !== $col) ? PropelDateTime::newInstance($col, null, '\DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : WorkingTimesTableMap::translateFieldName('MondayLunchFrom', TableMap::TYPE_PHPNAME, $indexType)];
            $this->monday_lunch_from = (null !== $col) ? PropelDateTime::newInstance($col, null, '\DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : WorkingTimesTableMap::translateFieldName('MondayLunchTo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->monday_lunch_to = (null !== $col) ? PropelDateTime::newInstance($col, null, '\DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : WorkingTimesTableMap::translateFieldName('MondayDayoff', TableMap::TYPE_PHPNAME, $indexType)];
            $this->monday_dayoff = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : WorkingTimesTableMap::translateFieldName('TuesdayFrom', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tuesday_from = (null !== $col) ? PropelDateTime::newInstance($col, null, '\DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : WorkingTimesTableMap::translateFieldName('TuesdayTo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tuesday_to = (null !== $col) ? PropelDateTime::newInstance($col, null, '\DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : WorkingTimesTableMap::translateFieldName('TuesdayLunchFrom', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tuesday_lunch_from = (null !== $col) ? PropelDateTime::newInstance($col, null, '\DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : WorkingTimesTableMap::translateFieldName('TuesdayLunchTo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tuesday_lunch_to = (null !== $col) ? PropelDateTime::newInstance($col, null, '\DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : WorkingTimesTableMap::translateFieldName('TuesdayDayoff', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tuesday_dayoff = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : WorkingTimesTableMap::translateFieldName('WednesdayFrom', TableMap::TYPE_PHPNAME, $indexType)];
            $this->wednesday_from = (null !== $col) ? PropelDateTime::newInstance($col, null, '\DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : WorkingTimesTableMap::translateFieldName('WednesdayTo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->wednesday_to = (null !== $col) ? PropelDateTime::newInstance($col, null, '\DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : WorkingTimesTableMap::translateFieldName('WednesdayLunchFrom', TableMap::TYPE_PHPNAME, $indexType)];
            $this->wednesday_lunch_from = (null !== $col) ? PropelDateTime::newInstance($col, null, '\DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : WorkingTimesTableMap::translateFieldName('WednesdayLunchTo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->wednesday_lunch_to = (null !== $col) ? PropelDateTime::newInstance($col, null, '\DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : WorkingTimesTableMap::translateFieldName('WednesdayDayoff', TableMap::TYPE_PHPNAME, $indexType)];
            $this->wednesday_dayoff = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : WorkingTimesTableMap::translateFieldName('ThursdayFrom', TableMap::TYPE_PHPNAME, $indexType)];
            $this->thursday_from = (null !== $col) ? PropelDateTime::newInstance($col, null, '\DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : WorkingTimesTableMap::translateFieldName('ThursdayTo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->thursday_to = (null !== $col) ? PropelDateTime::newInstance($col, null, '\DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : WorkingTimesTableMap::translateFieldName('ThursdayLunchFrom', TableMap::TYPE_PHPNAME, $indexType)];
            $this->thursday_lunch_from = (null !== $col) ? PropelDateTime::newInstance($col, null, '\DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : WorkingTimesTableMap::translateFieldName('ThursdayLunchTo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->thursday_lunch_to = (null !== $col) ? PropelDateTime::newInstance($col, null, '\DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : WorkingTimesTableMap::translateFieldName('ThursdayDayoff', TableMap::TYPE_PHPNAME, $indexType)];
            $this->thursday_dayoff = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : WorkingTimesTableMap::translateFieldName('FridayFrom', TableMap::TYPE_PHPNAME, $indexType)];
            $this->friday_from = (null !== $col) ? PropelDateTime::newInstance($col, null, '\DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : WorkingTimesTableMap::translateFieldName('FridayTo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->friday_to = (null !== $col) ? PropelDateTime::newInstance($col, null, '\DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : WorkingTimesTableMap::translateFieldName('FridayLunchFrom', TableMap::TYPE_PHPNAME, $indexType)];
            $this->friday_lunch_from = (null !== $col) ? PropelDateTime::newInstance($col, null, '\DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : WorkingTimesTableMap::translateFieldName('FridayLunchTo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->friday_lunch_to = (null !== $col) ? PropelDateTime::newInstance($col, null, '\DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : WorkingTimesTableMap::translateFieldName('FridayDayoff', TableMap::TYPE_PHPNAME, $indexType)];
            $this->friday_dayoff = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 28 + $startcol : WorkingTimesTableMap::translateFieldName('SaturdayFrom', TableMap::TYPE_PHPNAME, $indexType)];
            $this->saturday_from = (null !== $col) ? PropelDateTime::newInstance($col, null, '\DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 29 + $startcol : WorkingTimesTableMap::translateFieldName('SaturdayTo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->saturday_to = (null !== $col) ? PropelDateTime::newInstance($col, null, '\DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 30 + $startcol : WorkingTimesTableMap::translateFieldName('SaturdayLunchFrom', TableMap::TYPE_PHPNAME, $indexType)];
            $this->saturday_lunch_from = (null !== $col) ? PropelDateTime::newInstance($col, null, '\DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 31 + $startcol : WorkingTimesTableMap::translateFieldName('SaturdayLunchTo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->saturday_lunch_to = (null !== $col) ? PropelDateTime::newInstance($col, null, '\DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 32 + $startcol : WorkingTimesTableMap::translateFieldName('SaturdayDayoff', TableMap::TYPE_PHPNAME, $indexType)];
            $this->saturday_dayoff = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 33 + $startcol : WorkingTimesTableMap::translateFieldName('SundayFrom', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sunday_from = (null !== $col) ? PropelDateTime::newInstance($col, null, '\DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 34 + $startcol : WorkingTimesTableMap::translateFieldName('SundayTo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sunday_to = (null !== $col) ? PropelDateTime::newInstance($col, null, '\DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 35 + $startcol : WorkingTimesTableMap::translateFieldName('SundayLunchFrom', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sunday_lunch_from = (null !== $col) ? PropelDateTime::newInstance($col, null, '\DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 36 + $startcol : WorkingTimesTableMap::translateFieldName('SundayLunchTo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sunday_lunch_to = (null !== $col) ? PropelDateTime::newInstance($col, null, '\DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 37 + $startcol : WorkingTimesTableMap::translateFieldName('SundayDayoff', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sunday_dayoff = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 38; // 38 = WorkingTimesTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating \HookCalendar\Model\WorkingTimes object", 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(WorkingTimesTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildWorkingTimesQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see WorkingTimes::setDeleted()
     * @see WorkingTimes::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(WorkingTimesTableMap::DATABASE_NAME);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ChildWorkingTimesQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(WorkingTimesTableMap::DATABASE_NAME);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                WorkingTimesTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[WorkingTimesTableMap::ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . WorkingTimesTableMap::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(WorkingTimesTableMap::ID)) {
            $modifiedColumns[':p' . $index++]  = 'ID';
        }
        if ($this->isColumnModified(WorkingTimesTableMap::FOREIGN_ID)) {
            $modifiedColumns[':p' . $index++]  = 'FOREIGN_ID';
        }
        if ($this->isColumnModified(WorkingTimesTableMap::TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'TYPE';
        }
        if ($this->isColumnModified(WorkingTimesTableMap::MONDAY_FROM)) {
            $modifiedColumns[':p' . $index++]  = 'MONDAY_FROM';
        }
        if ($this->isColumnModified(WorkingTimesTableMap::MONDAY_TO)) {
            $modifiedColumns[':p' . $index++]  = 'MONDAY_TO';
        }
        if ($this->isColumnModified(WorkingTimesTableMap::MONDAY_LUNCH_FROM)) {
            $modifiedColumns[':p' . $index++]  = 'MONDAY_LUNCH_FROM';
        }
        if ($this->isColumnModified(WorkingTimesTableMap::MONDAY_LUNCH_TO)) {
            $modifiedColumns[':p' . $index++]  = 'MONDAY_LUNCH_TO';
        }
        if ($this->isColumnModified(WorkingTimesTableMap::MONDAY_DAYOFF)) {
            $modifiedColumns[':p' . $index++]  = 'MONDAY_DAYOFF';
        }
        if ($this->isColumnModified(WorkingTimesTableMap::TUESDAY_FROM)) {
            $modifiedColumns[':p' . $index++]  = 'TUESDAY_FROM';
        }
        if ($this->isColumnModified(WorkingTimesTableMap::TUESDAY_TO)) {
            $modifiedColumns[':p' . $index++]  = 'TUESDAY_TO';
        }
        if ($this->isColumnModified(WorkingTimesTableMap::TUESDAY_LUNCH_FROM)) {
            $modifiedColumns[':p' . $index++]  = 'TUESDAY_LUNCH_FROM';
        }
        if ($this->isColumnModified(WorkingTimesTableMap::TUESDAY_LUNCH_TO)) {
            $modifiedColumns[':p' . $index++]  = 'TUESDAY_LUNCH_TO';
        }
        if ($this->isColumnModified(WorkingTimesTableMap::TUESDAY_DAYOFF)) {
            $modifiedColumns[':p' . $index++]  = 'TUESDAY_DAYOFF';
        }
        if ($this->isColumnModified(WorkingTimesTableMap::WEDNESDAY_FROM)) {
            $modifiedColumns[':p' . $index++]  = 'WEDNESDAY_FROM';
        }
        if ($this->isColumnModified(WorkingTimesTableMap::WEDNESDAY_TO)) {
            $modifiedColumns[':p' . $index++]  = 'WEDNESDAY_TO';
        }
        if ($this->isColumnModified(WorkingTimesTableMap::WEDNESDAY_LUNCH_FROM)) {
            $modifiedColumns[':p' . $index++]  = 'WEDNESDAY_LUNCH_FROM';
        }
        if ($this->isColumnModified(WorkingTimesTableMap::WEDNESDAY_LUNCH_TO)) {
            $modifiedColumns[':p' . $index++]  = 'WEDNESDAY_LUNCH_TO';
        }
        if ($this->isColumnModified(WorkingTimesTableMap::WEDNESDAY_DAYOFF)) {
            $modifiedColumns[':p' . $index++]  = 'WEDNESDAY_DAYOFF';
        }
        if ($this->isColumnModified(WorkingTimesTableMap::THURSDAY_FROM)) {
            $modifiedColumns[':p' . $index++]  = 'THURSDAY_FROM';
        }
        if ($this->isColumnModified(WorkingTimesTableMap::THURSDAY_TO)) {
            $modifiedColumns[':p' . $index++]  = 'THURSDAY_TO';
        }
        if ($this->isColumnModified(WorkingTimesTableMap::THURSDAY_LUNCH_FROM)) {
            $modifiedColumns[':p' . $index++]  = 'THURSDAY_LUNCH_FROM';
        }
        if ($this->isColumnModified(WorkingTimesTableMap::THURSDAY_LUNCH_TO)) {
            $modifiedColumns[':p' . $index++]  = 'THURSDAY_LUNCH_TO';
        }
        if ($this->isColumnModified(WorkingTimesTableMap::THURSDAY_DAYOFF)) {
            $modifiedColumns[':p' . $index++]  = 'THURSDAY_DAYOFF';
        }
        if ($this->isColumnModified(WorkingTimesTableMap::FRIDAY_FROM)) {
            $modifiedColumns[':p' . $index++]  = 'FRIDAY_FROM';
        }
        if ($this->isColumnModified(WorkingTimesTableMap::FRIDAY_TO)) {
            $modifiedColumns[':p' . $index++]  = 'FRIDAY_TO';
        }
        if ($this->isColumnModified(WorkingTimesTableMap::FRIDAY_LUNCH_FROM)) {
            $modifiedColumns[':p' . $index++]  = 'FRIDAY_LUNCH_FROM';
        }
        if ($this->isColumnModified(WorkingTimesTableMap::FRIDAY_LUNCH_TO)) {
            $modifiedColumns[':p' . $index++]  = 'FRIDAY_LUNCH_TO';
        }
        if ($this->isColumnModified(WorkingTimesTableMap::FRIDAY_DAYOFF)) {
            $modifiedColumns[':p' . $index++]  = 'FRIDAY_DAYOFF';
        }
        if ($this->isColumnModified(WorkingTimesTableMap::SATURDAY_FROM)) {
            $modifiedColumns[':p' . $index++]  = 'SATURDAY_FROM';
        }
        if ($this->isColumnModified(WorkingTimesTableMap::SATURDAY_TO)) {
            $modifiedColumns[':p' . $index++]  = 'SATURDAY_TO';
        }
        if ($this->isColumnModified(WorkingTimesTableMap::SATURDAY_LUNCH_FROM)) {
            $modifiedColumns[':p' . $index++]  = 'SATURDAY_LUNCH_FROM';
        }
        if ($this->isColumnModified(WorkingTimesTableMap::SATURDAY_LUNCH_TO)) {
            $modifiedColumns[':p' . $index++]  = 'SATURDAY_LUNCH_TO';
        }
        if ($this->isColumnModified(WorkingTimesTableMap::SATURDAY_DAYOFF)) {
            $modifiedColumns[':p' . $index++]  = 'SATURDAY_DAYOFF';
        }
        if ($this->isColumnModified(WorkingTimesTableMap::SUNDAY_FROM)) {
            $modifiedColumns[':p' . $index++]  = 'SUNDAY_FROM';
        }
        if ($this->isColumnModified(WorkingTimesTableMap::SUNDAY_TO)) {
            $modifiedColumns[':p' . $index++]  = 'SUNDAY_TO';
        }
        if ($this->isColumnModified(WorkingTimesTableMap::SUNDAY_LUNCH_FROM)) {
            $modifiedColumns[':p' . $index++]  = 'SUNDAY_LUNCH_FROM';
        }
        if ($this->isColumnModified(WorkingTimesTableMap::SUNDAY_LUNCH_TO)) {
            $modifiedColumns[':p' . $index++]  = 'SUNDAY_LUNCH_TO';
        }
        if ($this->isColumnModified(WorkingTimesTableMap::SUNDAY_DAYOFF)) {
            $modifiedColumns[':p' . $index++]  = 'SUNDAY_DAYOFF';
        }

        $sql = sprintf(
            'INSERT INTO working_times (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'ID':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'FOREIGN_ID':
                        $stmt->bindValue($identifier, $this->foreign_id, PDO::PARAM_INT);
                        break;
                    case 'TYPE':
                        $stmt->bindValue($identifier, $this->type, PDO::PARAM_STR);
                        break;
                    case 'MONDAY_FROM':
                        $stmt->bindValue($identifier, $this->monday_from ? $this->monday_from->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'MONDAY_TO':
                        $stmt->bindValue($identifier, $this->monday_to ? $this->monday_to->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'MONDAY_LUNCH_FROM':
                        $stmt->bindValue($identifier, $this->monday_lunch_from ? $this->monday_lunch_from->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'MONDAY_LUNCH_TO':
                        $stmt->bindValue($identifier, $this->monday_lunch_to ? $this->monday_lunch_to->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'MONDAY_DAYOFF':
                        $stmt->bindValue($identifier, $this->monday_dayoff, PDO::PARAM_STR);
                        break;
                    case 'TUESDAY_FROM':
                        $stmt->bindValue($identifier, $this->tuesday_from ? $this->tuesday_from->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'TUESDAY_TO':
                        $stmt->bindValue($identifier, $this->tuesday_to ? $this->tuesday_to->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'TUESDAY_LUNCH_FROM':
                        $stmt->bindValue($identifier, $this->tuesday_lunch_from ? $this->tuesday_lunch_from->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'TUESDAY_LUNCH_TO':
                        $stmt->bindValue($identifier, $this->tuesday_lunch_to ? $this->tuesday_lunch_to->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'TUESDAY_DAYOFF':
                        $stmt->bindValue($identifier, $this->tuesday_dayoff, PDO::PARAM_STR);
                        break;
                    case 'WEDNESDAY_FROM':
                        $stmt->bindValue($identifier, $this->wednesday_from ? $this->wednesday_from->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'WEDNESDAY_TO':
                        $stmt->bindValue($identifier, $this->wednesday_to ? $this->wednesday_to->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'WEDNESDAY_LUNCH_FROM':
                        $stmt->bindValue($identifier, $this->wednesday_lunch_from ? $this->wednesday_lunch_from->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'WEDNESDAY_LUNCH_TO':
                        $stmt->bindValue($identifier, $this->wednesday_lunch_to ? $this->wednesday_lunch_to->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'WEDNESDAY_DAYOFF':
                        $stmt->bindValue($identifier, $this->wednesday_dayoff, PDO::PARAM_STR);
                        break;
                    case 'THURSDAY_FROM':
                        $stmt->bindValue($identifier, $this->thursday_from ? $this->thursday_from->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'THURSDAY_TO':
                        $stmt->bindValue($identifier, $this->thursday_to ? $this->thursday_to->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'THURSDAY_LUNCH_FROM':
                        $stmt->bindValue($identifier, $this->thursday_lunch_from ? $this->thursday_lunch_from->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'THURSDAY_LUNCH_TO':
                        $stmt->bindValue($identifier, $this->thursday_lunch_to ? $this->thursday_lunch_to->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'THURSDAY_DAYOFF':
                        $stmt->bindValue($identifier, $this->thursday_dayoff, PDO::PARAM_STR);
                        break;
                    case 'FRIDAY_FROM':
                        $stmt->bindValue($identifier, $this->friday_from ? $this->friday_from->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'FRIDAY_TO':
                        $stmt->bindValue($identifier, $this->friday_to ? $this->friday_to->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'FRIDAY_LUNCH_FROM':
                        $stmt->bindValue($identifier, $this->friday_lunch_from ? $this->friday_lunch_from->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'FRIDAY_LUNCH_TO':
                        $stmt->bindValue($identifier, $this->friday_lunch_to ? $this->friday_lunch_to->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'FRIDAY_DAYOFF':
                        $stmt->bindValue($identifier, $this->friday_dayoff, PDO::PARAM_STR);
                        break;
                    case 'SATURDAY_FROM':
                        $stmt->bindValue($identifier, $this->saturday_from ? $this->saturday_from->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'SATURDAY_TO':
                        $stmt->bindValue($identifier, $this->saturday_to ? $this->saturday_to->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'SATURDAY_LUNCH_FROM':
                        $stmt->bindValue($identifier, $this->saturday_lunch_from ? $this->saturday_lunch_from->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'SATURDAY_LUNCH_TO':
                        $stmt->bindValue($identifier, $this->saturday_lunch_to ? $this->saturday_lunch_to->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'SATURDAY_DAYOFF':
                        $stmt->bindValue($identifier, $this->saturday_dayoff, PDO::PARAM_STR);
                        break;
                    case 'SUNDAY_FROM':
                        $stmt->bindValue($identifier, $this->sunday_from ? $this->sunday_from->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'SUNDAY_TO':
                        $stmt->bindValue($identifier, $this->sunday_to ? $this->sunday_to->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'SUNDAY_LUNCH_FROM':
                        $stmt->bindValue($identifier, $this->sunday_lunch_from ? $this->sunday_lunch_from->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'SUNDAY_LUNCH_TO':
                        $stmt->bindValue($identifier, $this->sunday_lunch_to ? $this->sunday_lunch_to->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'SUNDAY_DAYOFF':
                        $stmt->bindValue($identifier, $this->sunday_dayoff, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = WorkingTimesTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getForeignId();
                break;
            case 2:
                return $this->getType();
                break;
            case 3:
                return $this->getMondayFrom();
                break;
            case 4:
                return $this->getMondayTo();
                break;
            case 5:
                return $this->getMondayLunchFrom();
                break;
            case 6:
                return $this->getMondayLunchTo();
                break;
            case 7:
                return $this->getMondayDayoff();
                break;
            case 8:
                return $this->getTuesdayFrom();
                break;
            case 9:
                return $this->getTuesdayTo();
                break;
            case 10:
                return $this->getTuesdayLunchFrom();
                break;
            case 11:
                return $this->getTuesdayLunchTo();
                break;
            case 12:
                return $this->getTuesdayDayoff();
                break;
            case 13:
                return $this->getWednesdayFrom();
                break;
            case 14:
                return $this->getWednesdayTo();
                break;
            case 15:
                return $this->getWednesdayLunchFrom();
                break;
            case 16:
                return $this->getWednesdayLunchTo();
                break;
            case 17:
                return $this->getWednesdayDayoff();
                break;
            case 18:
                return $this->getThursdayFrom();
                break;
            case 19:
                return $this->getThursdayTo();
                break;
            case 20:
                return $this->getThursdayLunchFrom();
                break;
            case 21:
                return $this->getThursdayLunchTo();
                break;
            case 22:
                return $this->getThursdayDayoff();
                break;
            case 23:
                return $this->getFridayFrom();
                break;
            case 24:
                return $this->getFridayTo();
                break;
            case 25:
                return $this->getFridayLunchFrom();
                break;
            case 26:
                return $this->getFridayLunchTo();
                break;
            case 27:
                return $this->getFridayDayoff();
                break;
            case 28:
                return $this->getSaturdayFrom();
                break;
            case 29:
                return $this->getSaturdayTo();
                break;
            case 30:
                return $this->getSaturdayLunchFrom();
                break;
            case 31:
                return $this->getSaturdayLunchTo();
                break;
            case 32:
                return $this->getSaturdayDayoff();
                break;
            case 33:
                return $this->getSundayFrom();
                break;
            case 34:
                return $this->getSundayTo();
                break;
            case 35:
                return $this->getSundayLunchFrom();
                break;
            case 36:
                return $this->getSundayLunchTo();
                break;
            case 37:
                return $this->getSundayDayoff();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {
        if (isset($alreadyDumpedObjects['WorkingTimes'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['WorkingTimes'][$this->getPrimaryKey()] = true;
        $keys = WorkingTimesTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getForeignId(),
            $keys[2] => $this->getType(),
            $keys[3] => $this->getMondayFrom(),
            $keys[4] => $this->getMondayTo(),
            $keys[5] => $this->getMondayLunchFrom(),
            $keys[6] => $this->getMondayLunchTo(),
            $keys[7] => $this->getMondayDayoff(),
            $keys[8] => $this->getTuesdayFrom(),
            $keys[9] => $this->getTuesdayTo(),
            $keys[10] => $this->getTuesdayLunchFrom(),
            $keys[11] => $this->getTuesdayLunchTo(),
            $keys[12] => $this->getTuesdayDayoff(),
            $keys[13] => $this->getWednesdayFrom(),
            $keys[14] => $this->getWednesdayTo(),
            $keys[15] => $this->getWednesdayLunchFrom(),
            $keys[16] => $this->getWednesdayLunchTo(),
            $keys[17] => $this->getWednesdayDayoff(),
            $keys[18] => $this->getThursdayFrom(),
            $keys[19] => $this->getThursdayTo(),
            $keys[20] => $this->getThursdayLunchFrom(),
            $keys[21] => $this->getThursdayLunchTo(),
            $keys[22] => $this->getThursdayDayoff(),
            $keys[23] => $this->getFridayFrom(),
            $keys[24] => $this->getFridayTo(),
            $keys[25] => $this->getFridayLunchFrom(),
            $keys[26] => $this->getFridayLunchTo(),
            $keys[27] => $this->getFridayDayoff(),
            $keys[28] => $this->getSaturdayFrom(),
            $keys[29] => $this->getSaturdayTo(),
            $keys[30] => $this->getSaturdayLunchFrom(),
            $keys[31] => $this->getSaturdayLunchTo(),
            $keys[32] => $this->getSaturdayDayoff(),
            $keys[33] => $this->getSundayFrom(),
            $keys[34] => $this->getSundayTo(),
            $keys[35] => $this->getSundayLunchFrom(),
            $keys[36] => $this->getSundayLunchTo(),
            $keys[37] => $this->getSundayDayoff(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }


        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param      string $name
     * @param      mixed  $value field value
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return void
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = WorkingTimesTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @param      mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setForeignId($value);
                break;
            case 2:
                $this->setType($value);
                break;
            case 3:
                $this->setMondayFrom($value);
                break;
            case 4:
                $this->setMondayTo($value);
                break;
            case 5:
                $this->setMondayLunchFrom($value);
                break;
            case 6:
                $this->setMondayLunchTo($value);
                break;
            case 7:
                $this->setMondayDayoff($value);
                break;
            case 8:
                $this->setTuesdayFrom($value);
                break;
            case 9:
                $this->setTuesdayTo($value);
                break;
            case 10:
                $this->setTuesdayLunchFrom($value);
                break;
            case 11:
                $this->setTuesdayLunchTo($value);
                break;
            case 12:
                $this->setTuesdayDayoff($value);
                break;
            case 13:
                $this->setWednesdayFrom($value);
                break;
            case 14:
                $this->setWednesdayTo($value);
                break;
            case 15:
                $this->setWednesdayLunchFrom($value);
                break;
            case 16:
                $this->setWednesdayLunchTo($value);
                break;
            case 17:
                $this->setWednesdayDayoff($value);
                break;
            case 18:
                $this->setThursdayFrom($value);
                break;
            case 19:
                $this->setThursdayTo($value);
                break;
            case 20:
                $this->setThursdayLunchFrom($value);
                break;
            case 21:
                $this->setThursdayLunchTo($value);
                break;
            case 22:
                $this->setThursdayDayoff($value);
                break;
            case 23:
                $this->setFridayFrom($value);
                break;
            case 24:
                $this->setFridayTo($value);
                break;
            case 25:
                $this->setFridayLunchFrom($value);
                break;
            case 26:
                $this->setFridayLunchTo($value);
                break;
            case 27:
                $this->setFridayDayoff($value);
                break;
            case 28:
                $this->setSaturdayFrom($value);
                break;
            case 29:
                $this->setSaturdayTo($value);
                break;
            case 30:
                $this->setSaturdayLunchFrom($value);
                break;
            case 31:
                $this->setSaturdayLunchTo($value);
                break;
            case 32:
                $this->setSaturdayDayoff($value);
                break;
            case 33:
                $this->setSundayFrom($value);
                break;
            case 34:
                $this->setSundayTo($value);
                break;
            case 35:
                $this->setSundayLunchFrom($value);
                break;
            case 36:
                $this->setSundayLunchTo($value);
                break;
            case 37:
                $this->setSundayDayoff($value);
                break;
        } // switch()
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = WorkingTimesTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setForeignId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setType($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setMondayFrom($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setMondayTo($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setMondayLunchFrom($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setMondayLunchTo($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setMondayDayoff($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setTuesdayFrom($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setTuesdayTo($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setTuesdayLunchFrom($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setTuesdayLunchTo($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setTuesdayDayoff($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setWednesdayFrom($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setWednesdayTo($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setWednesdayLunchFrom($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setWednesdayLunchTo($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setWednesdayDayoff($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setThursdayFrom($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setThursdayTo($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setThursdayLunchFrom($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setThursdayLunchTo($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setThursdayDayoff($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setFridayFrom($arr[$keys[23]]);
        if (array_key_exists($keys[24], $arr)) $this->setFridayTo($arr[$keys[24]]);
        if (array_key_exists($keys[25], $arr)) $this->setFridayLunchFrom($arr[$keys[25]]);
        if (array_key_exists($keys[26], $arr)) $this->setFridayLunchTo($arr[$keys[26]]);
        if (array_key_exists($keys[27], $arr)) $this->setFridayDayoff($arr[$keys[27]]);
        if (array_key_exists($keys[28], $arr)) $this->setSaturdayFrom($arr[$keys[28]]);
        if (array_key_exists($keys[29], $arr)) $this->setSaturdayTo($arr[$keys[29]]);
        if (array_key_exists($keys[30], $arr)) $this->setSaturdayLunchFrom($arr[$keys[30]]);
        if (array_key_exists($keys[31], $arr)) $this->setSaturdayLunchTo($arr[$keys[31]]);
        if (array_key_exists($keys[32], $arr)) $this->setSaturdayDayoff($arr[$keys[32]]);
        if (array_key_exists($keys[33], $arr)) $this->setSundayFrom($arr[$keys[33]]);
        if (array_key_exists($keys[34], $arr)) $this->setSundayTo($arr[$keys[34]]);
        if (array_key_exists($keys[35], $arr)) $this->setSundayLunchFrom($arr[$keys[35]]);
        if (array_key_exists($keys[36], $arr)) $this->setSundayLunchTo($arr[$keys[36]]);
        if (array_key_exists($keys[37], $arr)) $this->setSundayDayoff($arr[$keys[37]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(WorkingTimesTableMap::DATABASE_NAME);

        if ($this->isColumnModified(WorkingTimesTableMap::ID)) $criteria->add(WorkingTimesTableMap::ID, $this->id);
        if ($this->isColumnModified(WorkingTimesTableMap::FOREIGN_ID)) $criteria->add(WorkingTimesTableMap::FOREIGN_ID, $this->foreign_id);
        if ($this->isColumnModified(WorkingTimesTableMap::TYPE)) $criteria->add(WorkingTimesTableMap::TYPE, $this->type);
        if ($this->isColumnModified(WorkingTimesTableMap::MONDAY_FROM)) $criteria->add(WorkingTimesTableMap::MONDAY_FROM, $this->monday_from);
        if ($this->isColumnModified(WorkingTimesTableMap::MONDAY_TO)) $criteria->add(WorkingTimesTableMap::MONDAY_TO, $this->monday_to);
        if ($this->isColumnModified(WorkingTimesTableMap::MONDAY_LUNCH_FROM)) $criteria->add(WorkingTimesTableMap::MONDAY_LUNCH_FROM, $this->monday_lunch_from);
        if ($this->isColumnModified(WorkingTimesTableMap::MONDAY_LUNCH_TO)) $criteria->add(WorkingTimesTableMap::MONDAY_LUNCH_TO, $this->monday_lunch_to);
        if ($this->isColumnModified(WorkingTimesTableMap::MONDAY_DAYOFF)) $criteria->add(WorkingTimesTableMap::MONDAY_DAYOFF, $this->monday_dayoff);
        if ($this->isColumnModified(WorkingTimesTableMap::TUESDAY_FROM)) $criteria->add(WorkingTimesTableMap::TUESDAY_FROM, $this->tuesday_from);
        if ($this->isColumnModified(WorkingTimesTableMap::TUESDAY_TO)) $criteria->add(WorkingTimesTableMap::TUESDAY_TO, $this->tuesday_to);
        if ($this->isColumnModified(WorkingTimesTableMap::TUESDAY_LUNCH_FROM)) $criteria->add(WorkingTimesTableMap::TUESDAY_LUNCH_FROM, $this->tuesday_lunch_from);
        if ($this->isColumnModified(WorkingTimesTableMap::TUESDAY_LUNCH_TO)) $criteria->add(WorkingTimesTableMap::TUESDAY_LUNCH_TO, $this->tuesday_lunch_to);
        if ($this->isColumnModified(WorkingTimesTableMap::TUESDAY_DAYOFF)) $criteria->add(WorkingTimesTableMap::TUESDAY_DAYOFF, $this->tuesday_dayoff);
        if ($this->isColumnModified(WorkingTimesTableMap::WEDNESDAY_FROM)) $criteria->add(WorkingTimesTableMap::WEDNESDAY_FROM, $this->wednesday_from);
        if ($this->isColumnModified(WorkingTimesTableMap::WEDNESDAY_TO)) $criteria->add(WorkingTimesTableMap::WEDNESDAY_TO, $this->wednesday_to);
        if ($this->isColumnModified(WorkingTimesTableMap::WEDNESDAY_LUNCH_FROM)) $criteria->add(WorkingTimesTableMap::WEDNESDAY_LUNCH_FROM, $this->wednesday_lunch_from);
        if ($this->isColumnModified(WorkingTimesTableMap::WEDNESDAY_LUNCH_TO)) $criteria->add(WorkingTimesTableMap::WEDNESDAY_LUNCH_TO, $this->wednesday_lunch_to);
        if ($this->isColumnModified(WorkingTimesTableMap::WEDNESDAY_DAYOFF)) $criteria->add(WorkingTimesTableMap::WEDNESDAY_DAYOFF, $this->wednesday_dayoff);
        if ($this->isColumnModified(WorkingTimesTableMap::THURSDAY_FROM)) $criteria->add(WorkingTimesTableMap::THURSDAY_FROM, $this->thursday_from);
        if ($this->isColumnModified(WorkingTimesTableMap::THURSDAY_TO)) $criteria->add(WorkingTimesTableMap::THURSDAY_TO, $this->thursday_to);
        if ($this->isColumnModified(WorkingTimesTableMap::THURSDAY_LUNCH_FROM)) $criteria->add(WorkingTimesTableMap::THURSDAY_LUNCH_FROM, $this->thursday_lunch_from);
        if ($this->isColumnModified(WorkingTimesTableMap::THURSDAY_LUNCH_TO)) $criteria->add(WorkingTimesTableMap::THURSDAY_LUNCH_TO, $this->thursday_lunch_to);
        if ($this->isColumnModified(WorkingTimesTableMap::THURSDAY_DAYOFF)) $criteria->add(WorkingTimesTableMap::THURSDAY_DAYOFF, $this->thursday_dayoff);
        if ($this->isColumnModified(WorkingTimesTableMap::FRIDAY_FROM)) $criteria->add(WorkingTimesTableMap::FRIDAY_FROM, $this->friday_from);
        if ($this->isColumnModified(WorkingTimesTableMap::FRIDAY_TO)) $criteria->add(WorkingTimesTableMap::FRIDAY_TO, $this->friday_to);
        if ($this->isColumnModified(WorkingTimesTableMap::FRIDAY_LUNCH_FROM)) $criteria->add(WorkingTimesTableMap::FRIDAY_LUNCH_FROM, $this->friday_lunch_from);
        if ($this->isColumnModified(WorkingTimesTableMap::FRIDAY_LUNCH_TO)) $criteria->add(WorkingTimesTableMap::FRIDAY_LUNCH_TO, $this->friday_lunch_to);
        if ($this->isColumnModified(WorkingTimesTableMap::FRIDAY_DAYOFF)) $criteria->add(WorkingTimesTableMap::FRIDAY_DAYOFF, $this->friday_dayoff);
        if ($this->isColumnModified(WorkingTimesTableMap::SATURDAY_FROM)) $criteria->add(WorkingTimesTableMap::SATURDAY_FROM, $this->saturday_from);
        if ($this->isColumnModified(WorkingTimesTableMap::SATURDAY_TO)) $criteria->add(WorkingTimesTableMap::SATURDAY_TO, $this->saturday_to);
        if ($this->isColumnModified(WorkingTimesTableMap::SATURDAY_LUNCH_FROM)) $criteria->add(WorkingTimesTableMap::SATURDAY_LUNCH_FROM, $this->saturday_lunch_from);
        if ($this->isColumnModified(WorkingTimesTableMap::SATURDAY_LUNCH_TO)) $criteria->add(WorkingTimesTableMap::SATURDAY_LUNCH_TO, $this->saturday_lunch_to);
        if ($this->isColumnModified(WorkingTimesTableMap::SATURDAY_DAYOFF)) $criteria->add(WorkingTimesTableMap::SATURDAY_DAYOFF, $this->saturday_dayoff);
        if ($this->isColumnModified(WorkingTimesTableMap::SUNDAY_FROM)) $criteria->add(WorkingTimesTableMap::SUNDAY_FROM, $this->sunday_from);
        if ($this->isColumnModified(WorkingTimesTableMap::SUNDAY_TO)) $criteria->add(WorkingTimesTableMap::SUNDAY_TO, $this->sunday_to);
        if ($this->isColumnModified(WorkingTimesTableMap::SUNDAY_LUNCH_FROM)) $criteria->add(WorkingTimesTableMap::SUNDAY_LUNCH_FROM, $this->sunday_lunch_from);
        if ($this->isColumnModified(WorkingTimesTableMap::SUNDAY_LUNCH_TO)) $criteria->add(WorkingTimesTableMap::SUNDAY_LUNCH_TO, $this->sunday_lunch_to);
        if ($this->isColumnModified(WorkingTimesTableMap::SUNDAY_DAYOFF)) $criteria->add(WorkingTimesTableMap::SUNDAY_DAYOFF, $this->sunday_dayoff);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(WorkingTimesTableMap::DATABASE_NAME);
        $criteria->add(WorkingTimesTableMap::ID, $this->id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return   int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \HookCalendar\Model\WorkingTimes (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setForeignId($this->getForeignId());
        $copyObj->setType($this->getType());
        $copyObj->setMondayFrom($this->getMondayFrom());
        $copyObj->setMondayTo($this->getMondayTo());
        $copyObj->setMondayLunchFrom($this->getMondayLunchFrom());
        $copyObj->setMondayLunchTo($this->getMondayLunchTo());
        $copyObj->setMondayDayoff($this->getMondayDayoff());
        $copyObj->setTuesdayFrom($this->getTuesdayFrom());
        $copyObj->setTuesdayTo($this->getTuesdayTo());
        $copyObj->setTuesdayLunchFrom($this->getTuesdayLunchFrom());
        $copyObj->setTuesdayLunchTo($this->getTuesdayLunchTo());
        $copyObj->setTuesdayDayoff($this->getTuesdayDayoff());
        $copyObj->setWednesdayFrom($this->getWednesdayFrom());
        $copyObj->setWednesdayTo($this->getWednesdayTo());
        $copyObj->setWednesdayLunchFrom($this->getWednesdayLunchFrom());
        $copyObj->setWednesdayLunchTo($this->getWednesdayLunchTo());
        $copyObj->setWednesdayDayoff($this->getWednesdayDayoff());
        $copyObj->setThursdayFrom($this->getThursdayFrom());
        $copyObj->setThursdayTo($this->getThursdayTo());
        $copyObj->setThursdayLunchFrom($this->getThursdayLunchFrom());
        $copyObj->setThursdayLunchTo($this->getThursdayLunchTo());
        $copyObj->setThursdayDayoff($this->getThursdayDayoff());
        $copyObj->setFridayFrom($this->getFridayFrom());
        $copyObj->setFridayTo($this->getFridayTo());
        $copyObj->setFridayLunchFrom($this->getFridayLunchFrom());
        $copyObj->setFridayLunchTo($this->getFridayLunchTo());
        $copyObj->setFridayDayoff($this->getFridayDayoff());
        $copyObj->setSaturdayFrom($this->getSaturdayFrom());
        $copyObj->setSaturdayTo($this->getSaturdayTo());
        $copyObj->setSaturdayLunchFrom($this->getSaturdayLunchFrom());
        $copyObj->setSaturdayLunchTo($this->getSaturdayLunchTo());
        $copyObj->setSaturdayDayoff($this->getSaturdayDayoff());
        $copyObj->setSundayFrom($this->getSundayFrom());
        $copyObj->setSundayTo($this->getSundayTo());
        $copyObj->setSundayLunchFrom($this->getSundayLunchFrom());
        $copyObj->setSundayLunchTo($this->getSundayLunchTo());
        $copyObj->setSundayDayoff($this->getSundayDayoff());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return                 \HookCalendar\Model\WorkingTimes Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->foreign_id = null;
        $this->type = null;
        $this->monday_from = null;
        $this->monday_to = null;
        $this->monday_lunch_from = null;
        $this->monday_lunch_to = null;
        $this->monday_dayoff = null;
        $this->tuesday_from = null;
        $this->tuesday_to = null;
        $this->tuesday_lunch_from = null;
        $this->tuesday_lunch_to = null;
        $this->tuesday_dayoff = null;
        $this->wednesday_from = null;
        $this->wednesday_to = null;
        $this->wednesday_lunch_from = null;
        $this->wednesday_lunch_to = null;
        $this->wednesday_dayoff = null;
        $this->thursday_from = null;
        $this->thursday_to = null;
        $this->thursday_lunch_from = null;
        $this->thursday_lunch_to = null;
        $this->thursday_dayoff = null;
        $this->friday_from = null;
        $this->friday_to = null;
        $this->friday_lunch_from = null;
        $this->friday_lunch_to = null;
        $this->friday_dayoff = null;
        $this->saturday_from = null;
        $this->saturday_to = null;
        $this->saturday_lunch_from = null;
        $this->saturday_lunch_to = null;
        $this->saturday_dayoff = null;
        $this->sunday_from = null;
        $this->sunday_to = null;
        $this->sunday_lunch_from = null;
        $this->sunday_lunch_to = null;
        $this->sunday_dayoff = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volume/high-memory operations.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
        } // if ($deep)

    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(WorkingTimesTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {

    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
