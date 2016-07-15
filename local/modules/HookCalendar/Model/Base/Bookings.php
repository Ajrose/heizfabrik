<?php

namespace HookCalendar\Model\Base;

use \DateTime;
use \Exception;
use \PDO;
use HookCalendar\Model\BookingsQuery as ChildBookingsQuery;
use HookCalendar\Model\Map\BookingsTableMap;
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

abstract class Bookings implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\HookCalendar\\Model\\Map\\BookingsTableMap';


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
     * The value for the uuid field.
     * @var        string
     */
    protected $uuid;

    /**
     * The value for the calendar_id field.
     * @var        int
     */
    protected $calendar_id;

    /**
     * The value for the booking_price field.
     * @var        string
     */
    protected $booking_price;

    /**
     * The value for the booking_total field.
     * @var        string
     */
    protected $booking_total;

    /**
     * The value for the booking_deposit field.
     * @var        string
     */
    protected $booking_deposit;

    /**
     * The value for the booking_tax field.
     * @var        string
     */
    protected $booking_tax;

    /**
     * The value for the booking_status field.
     * @var        string
     */
    protected $booking_status;

    /**
     * The value for the payment_method field.
     * @var        string
     */
    protected $payment_method;

    /**
     * The value for the c_name field.
     * @var        string
     */
    protected $c_name;

    /**
     * The value for the c_email field.
     * @var        string
     */
    protected $c_email;

    /**
     * The value for the c_phone field.
     * @var        string
     */
    protected $c_phone;

    /**
     * The value for the c_country_id field.
     * @var        int
     */
    protected $c_country_id;

    /**
     * The value for the c_city field.
     * @var        string
     */
    protected $c_city;

    /**
     * The value for the c_state field.
     * @var        string
     */
    protected $c_state;

    /**
     * The value for the c_zip field.
     * @var        string
     */
    protected $c_zip;

    /**
     * The value for the c_address_1 field.
     * @var        string
     */
    protected $c_address_1;

    /**
     * The value for the c_address_2 field.
     * @var        string
     */
    protected $c_address_2;

    /**
     * The value for the c_notes field.
     * @var        string
     */
    protected $c_notes;

    /**
     * The value for the cc_type field.
     * @var        string
     */
    protected $cc_type;

    /**
     * The value for the cc_num field.
     * @var        string
     */
    protected $cc_num;

    /**
     * The value for the cc_exp_year field.
     * @var        int
     */
    protected $cc_exp_year;

    /**
     * The value for the cc_exp_month field.
     * @var        string
     */
    protected $cc_exp_month;

    /**
     * The value for the cc_code field.
     * @var        string
     */
    protected $cc_code;

    /**
     * The value for the txn_id field.
     * @var        string
     */
    protected $txn_id;

    /**
     * The value for the processed_on field.
     * @var        string
     */
    protected $processed_on;

    /**
     * The value for the created field.
     * @var        string
     */
    protected $created;

    /**
     * The value for the modified field.
     * @var        string
     */
    protected $modified;

    /**
     * The value for the locale_id field.
     * @var        int
     */
    protected $locale_id;

    /**
     * The value for the ip field.
     * @var        string
     */
    protected $ip;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of HookCalendar\Model\Base\Bookings object.
     */
    public function __construct()
    {
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
     * Compares this with another <code>Bookings</code> instance.  If
     * <code>obj</code> is an instance of <code>Bookings</code>, delegates to
     * <code>equals(Bookings)</code>.  Otherwise, returns <code>false</code>.
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
     * @return Bookings The current object, for fluid interface
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
     * @return Bookings The current object, for fluid interface
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
     * Get the [uuid] column value.
     *
     * @return   string
     */
    public function getUuid()
    {

        return $this->uuid;
    }

    /**
     * Get the [calendar_id] column value.
     *
     * @return   int
     */
    public function getCalendarId()
    {

        return $this->calendar_id;
    }

    /**
     * Get the [booking_price] column value.
     *
     * @return   string
     */
    public function getBookingPrice()
    {

        return $this->booking_price;
    }

    /**
     * Get the [booking_total] column value.
     *
     * @return   string
     */
    public function getBookingTotal()
    {

        return $this->booking_total;
    }

    /**
     * Get the [booking_deposit] column value.
     *
     * @return   string
     */
    public function getBookingDeposit()
    {

        return $this->booking_deposit;
    }

    /**
     * Get the [booking_tax] column value.
     *
     * @return   string
     */
    public function getBookingTax()
    {

        return $this->booking_tax;
    }

    /**
     * Get the [booking_status] column value.
     *
     * @return   string
     */
    public function getBookingStatus()
    {

        return $this->booking_status;
    }

    /**
     * Get the [payment_method] column value.
     *
     * @return   string
     */
    public function getPaymentMethod()
    {

        return $this->payment_method;
    }

    /**
     * Get the [c_name] column value.
     *
     * @return   string
     */
    public function getCName()
    {

        return $this->c_name;
    }

    /**
     * Get the [c_email] column value.
     *
     * @return   string
     */
    public function getCEmail()
    {

        return $this->c_email;
    }

    /**
     * Get the [c_phone] column value.
     *
     * @return   string
     */
    public function getCPhone()
    {

        return $this->c_phone;
    }

    /**
     * Get the [c_country_id] column value.
     *
     * @return   int
     */
    public function getCCountryId()
    {

        return $this->c_country_id;
    }

    /**
     * Get the [c_city] column value.
     *
     * @return   string
     */
    public function getCCity()
    {

        return $this->c_city;
    }

    /**
     * Get the [c_state] column value.
     *
     * @return   string
     */
    public function getCState()
    {

        return $this->c_state;
    }

    /**
     * Get the [c_zip] column value.
     *
     * @return   string
     */
    public function getCZip()
    {

        return $this->c_zip;
    }

    /**
     * Get the [c_address_1] column value.
     *
     * @return   string
     */
    public function getCAddress1()
    {

        return $this->c_address_1;
    }

    /**
     * Get the [c_address_2] column value.
     *
     * @return   string
     */
    public function getCAddress2()
    {

        return $this->c_address_2;
    }

    /**
     * Get the [c_notes] column value.
     *
     * @return   string
     */
    public function getCNotes()
    {

        return $this->c_notes;
    }

    /**
     * Get the [cc_type] column value.
     *
     * @return   string
     */
    public function getCcType()
    {

        return $this->cc_type;
    }

    /**
     * Get the [cc_num] column value.
     *
     * @return   string
     */
    public function getCcNum()
    {

        return $this->cc_num;
    }

    /**
     * Get the [cc_exp_year] column value.
     *
     * @return   int
     */
    public function getCcExpYear()
    {

        return $this->cc_exp_year;
    }

    /**
     * Get the [cc_exp_month] column value.
     *
     * @return   string
     */
    public function getCcExpMonth()
    {

        return $this->cc_exp_month;
    }

    /**
     * Get the [cc_code] column value.
     *
     * @return   string
     */
    public function getCcCode()
    {

        return $this->cc_code;
    }

    /**
     * Get the [txn_id] column value.
     *
     * @return   string
     */
    public function getTxnId()
    {

        return $this->txn_id;
    }

    /**
     * Get the [optionally formatted] temporal [processed_on] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw \DateTime object will be returned.
     *
     * @return mixed Formatted date/time value as string or \DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getProcessedOn($format = NULL)
    {
        if ($format === null) {
            return $this->processed_on;
        } else {
            return $this->processed_on instanceof \DateTime ? $this->processed_on->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [created] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw \DateTime object will be returned.
     *
     * @return mixed Formatted date/time value as string or \DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreated($format = NULL)
    {
        if ($format === null) {
            return $this->created;
        } else {
            return $this->created instanceof \DateTime ? $this->created->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [modified] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw \DateTime object will be returned.
     *
     * @return mixed Formatted date/time value as string or \DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getModified($format = NULL)
    {
        if ($format === null) {
            return $this->modified;
        } else {
            return $this->modified instanceof \DateTime ? $this->modified->format($format) : null;
        }
    }

    /**
     * Get the [locale_id] column value.
     *
     * @return   int
     */
    public function getLocaleId()
    {

        return $this->locale_id;
    }

    /**
     * Get the [ip] column value.
     *
     * @return   string
     */
    public function getIp()
    {

        return $this->ip;
    }

    /**
     * Set the value of [id] column.
     *
     * @param      int $v new value
     * @return   \HookCalendar\Model\Bookings The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[BookingsTableMap::ID] = true;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [uuid] column.
     *
     * @param      string $v new value
     * @return   \HookCalendar\Model\Bookings The current object (for fluent API support)
     */
    public function setUuid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->uuid !== $v) {
            $this->uuid = $v;
            $this->modifiedColumns[BookingsTableMap::UUID] = true;
        }


        return $this;
    } // setUuid()

    /**
     * Set the value of [calendar_id] column.
     *
     * @param      int $v new value
     * @return   \HookCalendar\Model\Bookings The current object (for fluent API support)
     */
    public function setCalendarId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->calendar_id !== $v) {
            $this->calendar_id = $v;
            $this->modifiedColumns[BookingsTableMap::CALENDAR_ID] = true;
        }


        return $this;
    } // setCalendarId()

    /**
     * Set the value of [booking_price] column.
     *
     * @param      string $v new value
     * @return   \HookCalendar\Model\Bookings The current object (for fluent API support)
     */
    public function setBookingPrice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->booking_price !== $v) {
            $this->booking_price = $v;
            $this->modifiedColumns[BookingsTableMap::BOOKING_PRICE] = true;
        }


        return $this;
    } // setBookingPrice()

    /**
     * Set the value of [booking_total] column.
     *
     * @param      string $v new value
     * @return   \HookCalendar\Model\Bookings The current object (for fluent API support)
     */
    public function setBookingTotal($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->booking_total !== $v) {
            $this->booking_total = $v;
            $this->modifiedColumns[BookingsTableMap::BOOKING_TOTAL] = true;
        }


        return $this;
    } // setBookingTotal()

    /**
     * Set the value of [booking_deposit] column.
     *
     * @param      string $v new value
     * @return   \HookCalendar\Model\Bookings The current object (for fluent API support)
     */
    public function setBookingDeposit($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->booking_deposit !== $v) {
            $this->booking_deposit = $v;
            $this->modifiedColumns[BookingsTableMap::BOOKING_DEPOSIT] = true;
        }


        return $this;
    } // setBookingDeposit()

    /**
     * Set the value of [booking_tax] column.
     *
     * @param      string $v new value
     * @return   \HookCalendar\Model\Bookings The current object (for fluent API support)
     */
    public function setBookingTax($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->booking_tax !== $v) {
            $this->booking_tax = $v;
            $this->modifiedColumns[BookingsTableMap::BOOKING_TAX] = true;
        }


        return $this;
    } // setBookingTax()

    /**
     * Set the value of [booking_status] column.
     *
     * @param      string $v new value
     * @return   \HookCalendar\Model\Bookings The current object (for fluent API support)
     */
    public function setBookingStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->booking_status !== $v) {
            $this->booking_status = $v;
            $this->modifiedColumns[BookingsTableMap::BOOKING_STATUS] = true;
        }


        return $this;
    } // setBookingStatus()

    /**
     * Set the value of [payment_method] column.
     *
     * @param      string $v new value
     * @return   \HookCalendar\Model\Bookings The current object (for fluent API support)
     */
    public function setPaymentMethod($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->payment_method !== $v) {
            $this->payment_method = $v;
            $this->modifiedColumns[BookingsTableMap::PAYMENT_METHOD] = true;
        }


        return $this;
    } // setPaymentMethod()

    /**
     * Set the value of [c_name] column.
     *
     * @param      string $v new value
     * @return   \HookCalendar\Model\Bookings The current object (for fluent API support)
     */
    public function setCName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->c_name !== $v) {
            $this->c_name = $v;
            $this->modifiedColumns[BookingsTableMap::C_NAME] = true;
        }


        return $this;
    } // setCName()

    /**
     * Set the value of [c_email] column.
     *
     * @param      string $v new value
     * @return   \HookCalendar\Model\Bookings The current object (for fluent API support)
     */
    public function setCEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->c_email !== $v) {
            $this->c_email = $v;
            $this->modifiedColumns[BookingsTableMap::C_EMAIL] = true;
        }


        return $this;
    } // setCEmail()

    /**
     * Set the value of [c_phone] column.
     *
     * @param      string $v new value
     * @return   \HookCalendar\Model\Bookings The current object (for fluent API support)
     */
    public function setCPhone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->c_phone !== $v) {
            $this->c_phone = $v;
            $this->modifiedColumns[BookingsTableMap::C_PHONE] = true;
        }


        return $this;
    } // setCPhone()

    /**
     * Set the value of [c_country_id] column.
     *
     * @param      int $v new value
     * @return   \HookCalendar\Model\Bookings The current object (for fluent API support)
     */
    public function setCCountryId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->c_country_id !== $v) {
            $this->c_country_id = $v;
            $this->modifiedColumns[BookingsTableMap::C_COUNTRY_ID] = true;
        }


        return $this;
    } // setCCountryId()

    /**
     * Set the value of [c_city] column.
     *
     * @param      string $v new value
     * @return   \HookCalendar\Model\Bookings The current object (for fluent API support)
     */
    public function setCCity($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->c_city !== $v) {
            $this->c_city = $v;
            $this->modifiedColumns[BookingsTableMap::C_CITY] = true;
        }


        return $this;
    } // setCCity()

    /**
     * Set the value of [c_state] column.
     *
     * @param      string $v new value
     * @return   \HookCalendar\Model\Bookings The current object (for fluent API support)
     */
    public function setCState($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->c_state !== $v) {
            $this->c_state = $v;
            $this->modifiedColumns[BookingsTableMap::C_STATE] = true;
        }


        return $this;
    } // setCState()

    /**
     * Set the value of [c_zip] column.
     *
     * @param      string $v new value
     * @return   \HookCalendar\Model\Bookings The current object (for fluent API support)
     */
    public function setCZip($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->c_zip !== $v) {
            $this->c_zip = $v;
            $this->modifiedColumns[BookingsTableMap::C_ZIP] = true;
        }


        return $this;
    } // setCZip()

    /**
     * Set the value of [c_address_1] column.
     *
     * @param      string $v new value
     * @return   \HookCalendar\Model\Bookings The current object (for fluent API support)
     */
    public function setCAddress1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->c_address_1 !== $v) {
            $this->c_address_1 = $v;
            $this->modifiedColumns[BookingsTableMap::C_ADDRESS_1] = true;
        }


        return $this;
    } // setCAddress1()

    /**
     * Set the value of [c_address_2] column.
     *
     * @param      string $v new value
     * @return   \HookCalendar\Model\Bookings The current object (for fluent API support)
     */
    public function setCAddress2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->c_address_2 !== $v) {
            $this->c_address_2 = $v;
            $this->modifiedColumns[BookingsTableMap::C_ADDRESS_2] = true;
        }


        return $this;
    } // setCAddress2()

    /**
     * Set the value of [c_notes] column.
     *
     * @param      string $v new value
     * @return   \HookCalendar\Model\Bookings The current object (for fluent API support)
     */
    public function setCNotes($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->c_notes !== $v) {
            $this->c_notes = $v;
            $this->modifiedColumns[BookingsTableMap::C_NOTES] = true;
        }


        return $this;
    } // setCNotes()

    /**
     * Set the value of [cc_type] column.
     *
     * @param      string $v new value
     * @return   \HookCalendar\Model\Bookings The current object (for fluent API support)
     */
    public function setCcType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cc_type !== $v) {
            $this->cc_type = $v;
            $this->modifiedColumns[BookingsTableMap::CC_TYPE] = true;
        }


        return $this;
    } // setCcType()

    /**
     * Set the value of [cc_num] column.
     *
     * @param      string $v new value
     * @return   \HookCalendar\Model\Bookings The current object (for fluent API support)
     */
    public function setCcNum($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cc_num !== $v) {
            $this->cc_num = $v;
            $this->modifiedColumns[BookingsTableMap::CC_NUM] = true;
        }


        return $this;
    } // setCcNum()

    /**
     * Set the value of [cc_exp_year] column.
     *
     * @param      int $v new value
     * @return   \HookCalendar\Model\Bookings The current object (for fluent API support)
     */
    public function setCcExpYear($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->cc_exp_year !== $v) {
            $this->cc_exp_year = $v;
            $this->modifiedColumns[BookingsTableMap::CC_EXP_YEAR] = true;
        }


        return $this;
    } // setCcExpYear()

    /**
     * Set the value of [cc_exp_month] column.
     *
     * @param      string $v new value
     * @return   \HookCalendar\Model\Bookings The current object (for fluent API support)
     */
    public function setCcExpMonth($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cc_exp_month !== $v) {
            $this->cc_exp_month = $v;
            $this->modifiedColumns[BookingsTableMap::CC_EXP_MONTH] = true;
        }


        return $this;
    } // setCcExpMonth()

    /**
     * Set the value of [cc_code] column.
     *
     * @param      string $v new value
     * @return   \HookCalendar\Model\Bookings The current object (for fluent API support)
     */
    public function setCcCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cc_code !== $v) {
            $this->cc_code = $v;
            $this->modifiedColumns[BookingsTableMap::CC_CODE] = true;
        }


        return $this;
    } // setCcCode()

    /**
     * Set the value of [txn_id] column.
     *
     * @param      string $v new value
     * @return   \HookCalendar\Model\Bookings The current object (for fluent API support)
     */
    public function setTxnId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txn_id !== $v) {
            $this->txn_id = $v;
            $this->modifiedColumns[BookingsTableMap::TXN_ID] = true;
        }


        return $this;
    } // setTxnId()

    /**
     * Sets the value of [processed_on] column to a normalized version of the date/time value specified.
     *
     * @param      mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return   \HookCalendar\Model\Bookings The current object (for fluent API support)
     */
    public function setProcessedOn($v)
    {
        $dt = PropelDateTime::newInstance($v, null, '\DateTime');
        if ($this->processed_on !== null || $dt !== null) {
            if ($dt !== $this->processed_on) {
                $this->processed_on = $dt;
                $this->modifiedColumns[BookingsTableMap::PROCESSED_ON] = true;
            }
        } // if either are not null


        return $this;
    } // setProcessedOn()

    /**
     * Sets the value of [created] column to a normalized version of the date/time value specified.
     *
     * @param      mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return   \HookCalendar\Model\Bookings The current object (for fluent API support)
     */
    public function setCreated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, '\DateTime');
        if ($this->created !== null || $dt !== null) {
            if ($dt !== $this->created) {
                $this->created = $dt;
                $this->modifiedColumns[BookingsTableMap::CREATED] = true;
            }
        } // if either are not null


        return $this;
    } // setCreated()

    /**
     * Sets the value of [modified] column to a normalized version of the date/time value specified.
     *
     * @param      mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return   \HookCalendar\Model\Bookings The current object (for fluent API support)
     */
    public function setModified($v)
    {
        $dt = PropelDateTime::newInstance($v, null, '\DateTime');
        if ($this->modified !== null || $dt !== null) {
            if ($dt !== $this->modified) {
                $this->modified = $dt;
                $this->modifiedColumns[BookingsTableMap::MODIFIED] = true;
            }
        } // if either are not null


        return $this;
    } // setModified()

    /**
     * Set the value of [locale_id] column.
     *
     * @param      int $v new value
     * @return   \HookCalendar\Model\Bookings The current object (for fluent API support)
     */
    public function setLocaleId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->locale_id !== $v) {
            $this->locale_id = $v;
            $this->modifiedColumns[BookingsTableMap::LOCALE_ID] = true;
        }


        return $this;
    } // setLocaleId()

    /**
     * Set the value of [ip] column.
     *
     * @param      string $v new value
     * @return   \HookCalendar\Model\Bookings The current object (for fluent API support)
     */
    public function setIp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ip !== $v) {
            $this->ip = $v;
            $this->modifiedColumns[BookingsTableMap::IP] = true;
        }


        return $this;
    } // setIp()

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


            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : BookingsTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : BookingsTableMap::translateFieldName('Uuid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uuid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : BookingsTableMap::translateFieldName('CalendarId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->calendar_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : BookingsTableMap::translateFieldName('BookingPrice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->booking_price = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : BookingsTableMap::translateFieldName('BookingTotal', TableMap::TYPE_PHPNAME, $indexType)];
            $this->booking_total = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : BookingsTableMap::translateFieldName('BookingDeposit', TableMap::TYPE_PHPNAME, $indexType)];
            $this->booking_deposit = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : BookingsTableMap::translateFieldName('BookingTax', TableMap::TYPE_PHPNAME, $indexType)];
            $this->booking_tax = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : BookingsTableMap::translateFieldName('BookingStatus', TableMap::TYPE_PHPNAME, $indexType)];
            $this->booking_status = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : BookingsTableMap::translateFieldName('PaymentMethod', TableMap::TYPE_PHPNAME, $indexType)];
            $this->payment_method = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : BookingsTableMap::translateFieldName('CName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->c_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : BookingsTableMap::translateFieldName('CEmail', TableMap::TYPE_PHPNAME, $indexType)];
            $this->c_email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : BookingsTableMap::translateFieldName('CPhone', TableMap::TYPE_PHPNAME, $indexType)];
            $this->c_phone = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : BookingsTableMap::translateFieldName('CCountryId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->c_country_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : BookingsTableMap::translateFieldName('CCity', TableMap::TYPE_PHPNAME, $indexType)];
            $this->c_city = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : BookingsTableMap::translateFieldName('CState', TableMap::TYPE_PHPNAME, $indexType)];
            $this->c_state = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : BookingsTableMap::translateFieldName('CZip', TableMap::TYPE_PHPNAME, $indexType)];
            $this->c_zip = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : BookingsTableMap::translateFieldName('CAddress1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->c_address_1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : BookingsTableMap::translateFieldName('CAddress2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->c_address_2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : BookingsTableMap::translateFieldName('CNotes', TableMap::TYPE_PHPNAME, $indexType)];
            $this->c_notes = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : BookingsTableMap::translateFieldName('CcType', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cc_type = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : BookingsTableMap::translateFieldName('CcNum', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cc_num = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : BookingsTableMap::translateFieldName('CcExpYear', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cc_exp_year = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : BookingsTableMap::translateFieldName('CcExpMonth', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cc_exp_month = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : BookingsTableMap::translateFieldName('CcCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cc_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : BookingsTableMap::translateFieldName('TxnId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txn_id = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : BookingsTableMap::translateFieldName('ProcessedOn', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->processed_on = (null !== $col) ? PropelDateTime::newInstance($col, null, '\DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : BookingsTableMap::translateFieldName('Created', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->created = (null !== $col) ? PropelDateTime::newInstance($col, null, '\DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : BookingsTableMap::translateFieldName('Modified', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->modified = (null !== $col) ? PropelDateTime::newInstance($col, null, '\DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 28 + $startcol : BookingsTableMap::translateFieldName('LocaleId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->locale_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 29 + $startcol : BookingsTableMap::translateFieldName('Ip', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ip = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 30; // 30 = BookingsTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating \HookCalendar\Model\Bookings object", 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(BookingsTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildBookingsQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see Bookings::setDeleted()
     * @see Bookings::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(BookingsTableMap::DATABASE_NAME);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ChildBookingsQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(BookingsTableMap::DATABASE_NAME);
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
                BookingsTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[BookingsTableMap::ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . BookingsTableMap::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(BookingsTableMap::ID)) {
            $modifiedColumns[':p' . $index++]  = 'ID';
        }
        if ($this->isColumnModified(BookingsTableMap::UUID)) {
            $modifiedColumns[':p' . $index++]  = 'UUID';
        }
        if ($this->isColumnModified(BookingsTableMap::CALENDAR_ID)) {
            $modifiedColumns[':p' . $index++]  = 'CALENDAR_ID';
        }
        if ($this->isColumnModified(BookingsTableMap::BOOKING_PRICE)) {
            $modifiedColumns[':p' . $index++]  = 'BOOKING_PRICE';
        }
        if ($this->isColumnModified(BookingsTableMap::BOOKING_TOTAL)) {
            $modifiedColumns[':p' . $index++]  = 'BOOKING_TOTAL';
        }
        if ($this->isColumnModified(BookingsTableMap::BOOKING_DEPOSIT)) {
            $modifiedColumns[':p' . $index++]  = 'BOOKING_DEPOSIT';
        }
        if ($this->isColumnModified(BookingsTableMap::BOOKING_TAX)) {
            $modifiedColumns[':p' . $index++]  = 'BOOKING_TAX';
        }
        if ($this->isColumnModified(BookingsTableMap::BOOKING_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'BOOKING_STATUS';
        }
        if ($this->isColumnModified(BookingsTableMap::PAYMENT_METHOD)) {
            $modifiedColumns[':p' . $index++]  = 'PAYMENT_METHOD';
        }
        if ($this->isColumnModified(BookingsTableMap::C_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'C_NAME';
        }
        if ($this->isColumnModified(BookingsTableMap::C_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'C_EMAIL';
        }
        if ($this->isColumnModified(BookingsTableMap::C_PHONE)) {
            $modifiedColumns[':p' . $index++]  = 'C_PHONE';
        }
        if ($this->isColumnModified(BookingsTableMap::C_COUNTRY_ID)) {
            $modifiedColumns[':p' . $index++]  = 'C_COUNTRY_ID';
        }
        if ($this->isColumnModified(BookingsTableMap::C_CITY)) {
            $modifiedColumns[':p' . $index++]  = 'C_CITY';
        }
        if ($this->isColumnModified(BookingsTableMap::C_STATE)) {
            $modifiedColumns[':p' . $index++]  = 'C_STATE';
        }
        if ($this->isColumnModified(BookingsTableMap::C_ZIP)) {
            $modifiedColumns[':p' . $index++]  = 'C_ZIP';
        }
        if ($this->isColumnModified(BookingsTableMap::C_ADDRESS_1)) {
            $modifiedColumns[':p' . $index++]  = 'C_ADDRESS_1';
        }
        if ($this->isColumnModified(BookingsTableMap::C_ADDRESS_2)) {
            $modifiedColumns[':p' . $index++]  = 'C_ADDRESS_2';
        }
        if ($this->isColumnModified(BookingsTableMap::C_NOTES)) {
            $modifiedColumns[':p' . $index++]  = 'C_NOTES';
        }
        if ($this->isColumnModified(BookingsTableMap::CC_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'CC_TYPE';
        }
        if ($this->isColumnModified(BookingsTableMap::CC_NUM)) {
            $modifiedColumns[':p' . $index++]  = 'CC_NUM';
        }
        if ($this->isColumnModified(BookingsTableMap::CC_EXP_YEAR)) {
            $modifiedColumns[':p' . $index++]  = 'CC_EXP_YEAR';
        }
        if ($this->isColumnModified(BookingsTableMap::CC_EXP_MONTH)) {
            $modifiedColumns[':p' . $index++]  = 'CC_EXP_MONTH';
        }
        if ($this->isColumnModified(BookingsTableMap::CC_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'CC_CODE';
        }
        if ($this->isColumnModified(BookingsTableMap::TXN_ID)) {
            $modifiedColumns[':p' . $index++]  = 'TXN_ID';
        }
        if ($this->isColumnModified(BookingsTableMap::PROCESSED_ON)) {
            $modifiedColumns[':p' . $index++]  = 'PROCESSED_ON';
        }
        if ($this->isColumnModified(BookingsTableMap::CREATED)) {
            $modifiedColumns[':p' . $index++]  = 'CREATED';
        }
        if ($this->isColumnModified(BookingsTableMap::MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = 'MODIFIED';
        }
        if ($this->isColumnModified(BookingsTableMap::LOCALE_ID)) {
            $modifiedColumns[':p' . $index++]  = 'LOCALE_ID';
        }
        if ($this->isColumnModified(BookingsTableMap::IP)) {
            $modifiedColumns[':p' . $index++]  = 'IP';
        }

        $sql = sprintf(
            'INSERT INTO bookings (%s) VALUES (%s)',
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
                    case 'UUID':
                        $stmt->bindValue($identifier, $this->uuid, PDO::PARAM_STR);
                        break;
                    case 'CALENDAR_ID':
                        $stmt->bindValue($identifier, $this->calendar_id, PDO::PARAM_INT);
                        break;
                    case 'BOOKING_PRICE':
                        $stmt->bindValue($identifier, $this->booking_price, PDO::PARAM_STR);
                        break;
                    case 'BOOKING_TOTAL':
                        $stmt->bindValue($identifier, $this->booking_total, PDO::PARAM_STR);
                        break;
                    case 'BOOKING_DEPOSIT':
                        $stmt->bindValue($identifier, $this->booking_deposit, PDO::PARAM_STR);
                        break;
                    case 'BOOKING_TAX':
                        $stmt->bindValue($identifier, $this->booking_tax, PDO::PARAM_STR);
                        break;
                    case 'BOOKING_STATUS':
                        $stmt->bindValue($identifier, $this->booking_status, PDO::PARAM_STR);
                        break;
                    case 'PAYMENT_METHOD':
                        $stmt->bindValue($identifier, $this->payment_method, PDO::PARAM_STR);
                        break;
                    case 'C_NAME':
                        $stmt->bindValue($identifier, $this->c_name, PDO::PARAM_STR);
                        break;
                    case 'C_EMAIL':
                        $stmt->bindValue($identifier, $this->c_email, PDO::PARAM_STR);
                        break;
                    case 'C_PHONE':
                        $stmt->bindValue($identifier, $this->c_phone, PDO::PARAM_STR);
                        break;
                    case 'C_COUNTRY_ID':
                        $stmt->bindValue($identifier, $this->c_country_id, PDO::PARAM_INT);
                        break;
                    case 'C_CITY':
                        $stmt->bindValue($identifier, $this->c_city, PDO::PARAM_STR);
                        break;
                    case 'C_STATE':
                        $stmt->bindValue($identifier, $this->c_state, PDO::PARAM_STR);
                        break;
                    case 'C_ZIP':
                        $stmt->bindValue($identifier, $this->c_zip, PDO::PARAM_STR);
                        break;
                    case 'C_ADDRESS_1':
                        $stmt->bindValue($identifier, $this->c_address_1, PDO::PARAM_STR);
                        break;
                    case 'C_ADDRESS_2':
                        $stmt->bindValue($identifier, $this->c_address_2, PDO::PARAM_STR);
                        break;
                    case 'C_NOTES':
                        $stmt->bindValue($identifier, $this->c_notes, PDO::PARAM_STR);
                        break;
                    case 'CC_TYPE':
                        $stmt->bindValue($identifier, $this->cc_type, PDO::PARAM_STR);
                        break;
                    case 'CC_NUM':
                        $stmt->bindValue($identifier, $this->cc_num, PDO::PARAM_STR);
                        break;
                    case 'CC_EXP_YEAR':
                        $stmt->bindValue($identifier, $this->cc_exp_year, PDO::PARAM_INT);
                        break;
                    case 'CC_EXP_MONTH':
                        $stmt->bindValue($identifier, $this->cc_exp_month, PDO::PARAM_STR);
                        break;
                    case 'CC_CODE':
                        $stmt->bindValue($identifier, $this->cc_code, PDO::PARAM_STR);
                        break;
                    case 'TXN_ID':
                        $stmt->bindValue($identifier, $this->txn_id, PDO::PARAM_STR);
                        break;
                    case 'PROCESSED_ON':
                        $stmt->bindValue($identifier, $this->processed_on ? $this->processed_on->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'CREATED':
                        $stmt->bindValue($identifier, $this->created ? $this->created->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'MODIFIED':
                        $stmt->bindValue($identifier, $this->modified ? $this->modified->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'LOCALE_ID':
                        $stmt->bindValue($identifier, $this->locale_id, PDO::PARAM_INT);
                        break;
                    case 'IP':
                        $stmt->bindValue($identifier, $this->ip, PDO::PARAM_STR);
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
        $pos = BookingsTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getUuid();
                break;
            case 2:
                return $this->getCalendarId();
                break;
            case 3:
                return $this->getBookingPrice();
                break;
            case 4:
                return $this->getBookingTotal();
                break;
            case 5:
                return $this->getBookingDeposit();
                break;
            case 6:
                return $this->getBookingTax();
                break;
            case 7:
                return $this->getBookingStatus();
                break;
            case 8:
                return $this->getPaymentMethod();
                break;
            case 9:
                return $this->getCName();
                break;
            case 10:
                return $this->getCEmail();
                break;
            case 11:
                return $this->getCPhone();
                break;
            case 12:
                return $this->getCCountryId();
                break;
            case 13:
                return $this->getCCity();
                break;
            case 14:
                return $this->getCState();
                break;
            case 15:
                return $this->getCZip();
                break;
            case 16:
                return $this->getCAddress1();
                break;
            case 17:
                return $this->getCAddress2();
                break;
            case 18:
                return $this->getCNotes();
                break;
            case 19:
                return $this->getCcType();
                break;
            case 20:
                return $this->getCcNum();
                break;
            case 21:
                return $this->getCcExpYear();
                break;
            case 22:
                return $this->getCcExpMonth();
                break;
            case 23:
                return $this->getCcCode();
                break;
            case 24:
                return $this->getTxnId();
                break;
            case 25:
                return $this->getProcessedOn();
                break;
            case 26:
                return $this->getCreated();
                break;
            case 27:
                return $this->getModified();
                break;
            case 28:
                return $this->getLocaleId();
                break;
            case 29:
                return $this->getIp();
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
        if (isset($alreadyDumpedObjects['Bookings'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Bookings'][$this->getPrimaryKey()] = true;
        $keys = BookingsTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getUuid(),
            $keys[2] => $this->getCalendarId(),
            $keys[3] => $this->getBookingPrice(),
            $keys[4] => $this->getBookingTotal(),
            $keys[5] => $this->getBookingDeposit(),
            $keys[6] => $this->getBookingTax(),
            $keys[7] => $this->getBookingStatus(),
            $keys[8] => $this->getPaymentMethod(),
            $keys[9] => $this->getCName(),
            $keys[10] => $this->getCEmail(),
            $keys[11] => $this->getCPhone(),
            $keys[12] => $this->getCCountryId(),
            $keys[13] => $this->getCCity(),
            $keys[14] => $this->getCState(),
            $keys[15] => $this->getCZip(),
            $keys[16] => $this->getCAddress1(),
            $keys[17] => $this->getCAddress2(),
            $keys[18] => $this->getCNotes(),
            $keys[19] => $this->getCcType(),
            $keys[20] => $this->getCcNum(),
            $keys[21] => $this->getCcExpYear(),
            $keys[22] => $this->getCcExpMonth(),
            $keys[23] => $this->getCcCode(),
            $keys[24] => $this->getTxnId(),
            $keys[25] => $this->getProcessedOn(),
            $keys[26] => $this->getCreated(),
            $keys[27] => $this->getModified(),
            $keys[28] => $this->getLocaleId(),
            $keys[29] => $this->getIp(),
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
        $pos = BookingsTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

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
                $this->setUuid($value);
                break;
            case 2:
                $this->setCalendarId($value);
                break;
            case 3:
                $this->setBookingPrice($value);
                break;
            case 4:
                $this->setBookingTotal($value);
                break;
            case 5:
                $this->setBookingDeposit($value);
                break;
            case 6:
                $this->setBookingTax($value);
                break;
            case 7:
                $this->setBookingStatus($value);
                break;
            case 8:
                $this->setPaymentMethod($value);
                break;
            case 9:
                $this->setCName($value);
                break;
            case 10:
                $this->setCEmail($value);
                break;
            case 11:
                $this->setCPhone($value);
                break;
            case 12:
                $this->setCCountryId($value);
                break;
            case 13:
                $this->setCCity($value);
                break;
            case 14:
                $this->setCState($value);
                break;
            case 15:
                $this->setCZip($value);
                break;
            case 16:
                $this->setCAddress1($value);
                break;
            case 17:
                $this->setCAddress2($value);
                break;
            case 18:
                $this->setCNotes($value);
                break;
            case 19:
                $this->setCcType($value);
                break;
            case 20:
                $this->setCcNum($value);
                break;
            case 21:
                $this->setCcExpYear($value);
                break;
            case 22:
                $this->setCcExpMonth($value);
                break;
            case 23:
                $this->setCcCode($value);
                break;
            case 24:
                $this->setTxnId($value);
                break;
            case 25:
                $this->setProcessedOn($value);
                break;
            case 26:
                $this->setCreated($value);
                break;
            case 27:
                $this->setModified($value);
                break;
            case 28:
                $this->setLocaleId($value);
                break;
            case 29:
                $this->setIp($value);
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
        $keys = BookingsTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setUuid($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCalendarId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setBookingPrice($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setBookingTotal($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setBookingDeposit($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setBookingTax($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setBookingStatus($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setPaymentMethod($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setCName($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setCEmail($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setCPhone($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setCCountryId($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setCCity($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setCState($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setCZip($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setCAddress1($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setCAddress2($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setCNotes($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setCcType($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setCcNum($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setCcExpYear($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setCcExpMonth($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setCcCode($arr[$keys[23]]);
        if (array_key_exists($keys[24], $arr)) $this->setTxnId($arr[$keys[24]]);
        if (array_key_exists($keys[25], $arr)) $this->setProcessedOn($arr[$keys[25]]);
        if (array_key_exists($keys[26], $arr)) $this->setCreated($arr[$keys[26]]);
        if (array_key_exists($keys[27], $arr)) $this->setModified($arr[$keys[27]]);
        if (array_key_exists($keys[28], $arr)) $this->setLocaleId($arr[$keys[28]]);
        if (array_key_exists($keys[29], $arr)) $this->setIp($arr[$keys[29]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(BookingsTableMap::DATABASE_NAME);

        if ($this->isColumnModified(BookingsTableMap::ID)) $criteria->add(BookingsTableMap::ID, $this->id);
        if ($this->isColumnModified(BookingsTableMap::UUID)) $criteria->add(BookingsTableMap::UUID, $this->uuid);
        if ($this->isColumnModified(BookingsTableMap::CALENDAR_ID)) $criteria->add(BookingsTableMap::CALENDAR_ID, $this->calendar_id);
        if ($this->isColumnModified(BookingsTableMap::BOOKING_PRICE)) $criteria->add(BookingsTableMap::BOOKING_PRICE, $this->booking_price);
        if ($this->isColumnModified(BookingsTableMap::BOOKING_TOTAL)) $criteria->add(BookingsTableMap::BOOKING_TOTAL, $this->booking_total);
        if ($this->isColumnModified(BookingsTableMap::BOOKING_DEPOSIT)) $criteria->add(BookingsTableMap::BOOKING_DEPOSIT, $this->booking_deposit);
        if ($this->isColumnModified(BookingsTableMap::BOOKING_TAX)) $criteria->add(BookingsTableMap::BOOKING_TAX, $this->booking_tax);
        if ($this->isColumnModified(BookingsTableMap::BOOKING_STATUS)) $criteria->add(BookingsTableMap::BOOKING_STATUS, $this->booking_status);
        if ($this->isColumnModified(BookingsTableMap::PAYMENT_METHOD)) $criteria->add(BookingsTableMap::PAYMENT_METHOD, $this->payment_method);
        if ($this->isColumnModified(BookingsTableMap::C_NAME)) $criteria->add(BookingsTableMap::C_NAME, $this->c_name);
        if ($this->isColumnModified(BookingsTableMap::C_EMAIL)) $criteria->add(BookingsTableMap::C_EMAIL, $this->c_email);
        if ($this->isColumnModified(BookingsTableMap::C_PHONE)) $criteria->add(BookingsTableMap::C_PHONE, $this->c_phone);
        if ($this->isColumnModified(BookingsTableMap::C_COUNTRY_ID)) $criteria->add(BookingsTableMap::C_COUNTRY_ID, $this->c_country_id);
        if ($this->isColumnModified(BookingsTableMap::C_CITY)) $criteria->add(BookingsTableMap::C_CITY, $this->c_city);
        if ($this->isColumnModified(BookingsTableMap::C_STATE)) $criteria->add(BookingsTableMap::C_STATE, $this->c_state);
        if ($this->isColumnModified(BookingsTableMap::C_ZIP)) $criteria->add(BookingsTableMap::C_ZIP, $this->c_zip);
        if ($this->isColumnModified(BookingsTableMap::C_ADDRESS_1)) $criteria->add(BookingsTableMap::C_ADDRESS_1, $this->c_address_1);
        if ($this->isColumnModified(BookingsTableMap::C_ADDRESS_2)) $criteria->add(BookingsTableMap::C_ADDRESS_2, $this->c_address_2);
        if ($this->isColumnModified(BookingsTableMap::C_NOTES)) $criteria->add(BookingsTableMap::C_NOTES, $this->c_notes);
        if ($this->isColumnModified(BookingsTableMap::CC_TYPE)) $criteria->add(BookingsTableMap::CC_TYPE, $this->cc_type);
        if ($this->isColumnModified(BookingsTableMap::CC_NUM)) $criteria->add(BookingsTableMap::CC_NUM, $this->cc_num);
        if ($this->isColumnModified(BookingsTableMap::CC_EXP_YEAR)) $criteria->add(BookingsTableMap::CC_EXP_YEAR, $this->cc_exp_year);
        if ($this->isColumnModified(BookingsTableMap::CC_EXP_MONTH)) $criteria->add(BookingsTableMap::CC_EXP_MONTH, $this->cc_exp_month);
        if ($this->isColumnModified(BookingsTableMap::CC_CODE)) $criteria->add(BookingsTableMap::CC_CODE, $this->cc_code);
        if ($this->isColumnModified(BookingsTableMap::TXN_ID)) $criteria->add(BookingsTableMap::TXN_ID, $this->txn_id);
        if ($this->isColumnModified(BookingsTableMap::PROCESSED_ON)) $criteria->add(BookingsTableMap::PROCESSED_ON, $this->processed_on);
        if ($this->isColumnModified(BookingsTableMap::CREATED)) $criteria->add(BookingsTableMap::CREATED, $this->created);
        if ($this->isColumnModified(BookingsTableMap::MODIFIED)) $criteria->add(BookingsTableMap::MODIFIED, $this->modified);
        if ($this->isColumnModified(BookingsTableMap::LOCALE_ID)) $criteria->add(BookingsTableMap::LOCALE_ID, $this->locale_id);
        if ($this->isColumnModified(BookingsTableMap::IP)) $criteria->add(BookingsTableMap::IP, $this->ip);

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
        $criteria = new Criteria(BookingsTableMap::DATABASE_NAME);
        $criteria->add(BookingsTableMap::ID, $this->id);

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
     * @param      object $copyObj An object of \HookCalendar\Model\Bookings (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setUuid($this->getUuid());
        $copyObj->setCalendarId($this->getCalendarId());
        $copyObj->setBookingPrice($this->getBookingPrice());
        $copyObj->setBookingTotal($this->getBookingTotal());
        $copyObj->setBookingDeposit($this->getBookingDeposit());
        $copyObj->setBookingTax($this->getBookingTax());
        $copyObj->setBookingStatus($this->getBookingStatus());
        $copyObj->setPaymentMethod($this->getPaymentMethod());
        $copyObj->setCName($this->getCName());
        $copyObj->setCEmail($this->getCEmail());
        $copyObj->setCPhone($this->getCPhone());
        $copyObj->setCCountryId($this->getCCountryId());
        $copyObj->setCCity($this->getCCity());
        $copyObj->setCState($this->getCState());
        $copyObj->setCZip($this->getCZip());
        $copyObj->setCAddress1($this->getCAddress1());
        $copyObj->setCAddress2($this->getCAddress2());
        $copyObj->setCNotes($this->getCNotes());
        $copyObj->setCcType($this->getCcType());
        $copyObj->setCcNum($this->getCcNum());
        $copyObj->setCcExpYear($this->getCcExpYear());
        $copyObj->setCcExpMonth($this->getCcExpMonth());
        $copyObj->setCcCode($this->getCcCode());
        $copyObj->setTxnId($this->getTxnId());
        $copyObj->setProcessedOn($this->getProcessedOn());
        $copyObj->setCreated($this->getCreated());
        $copyObj->setModified($this->getModified());
        $copyObj->setLocaleId($this->getLocaleId());
        $copyObj->setIp($this->getIp());
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
     * @return                 \HookCalendar\Model\Bookings Clone of current object.
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
        $this->uuid = null;
        $this->calendar_id = null;
        $this->booking_price = null;
        $this->booking_total = null;
        $this->booking_deposit = null;
        $this->booking_tax = null;
        $this->booking_status = null;
        $this->payment_method = null;
        $this->c_name = null;
        $this->c_email = null;
        $this->c_phone = null;
        $this->c_country_id = null;
        $this->c_city = null;
        $this->c_state = null;
        $this->c_zip = null;
        $this->c_address_1 = null;
        $this->c_address_2 = null;
        $this->c_notes = null;
        $this->cc_type = null;
        $this->cc_num = null;
        $this->cc_exp_year = null;
        $this->cc_exp_month = null;
        $this->cc_code = null;
        $this->txn_id = null;
        $this->processed_on = null;
        $this->created = null;
        $this->modified = null;
        $this->locale_id = null;
        $this->ip = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
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
        return (string) $this->exportTo(BookingsTableMap::DEFAULT_STRING_FORMAT);
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
