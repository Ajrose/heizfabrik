<?php

namespace HookKonfigurator\Model\Base;

use \Exception;
use \PDO;
use HookKonfigurator\Model\MontageConstraints as ChildMontageConstraints;
use HookKonfigurator\Model\MontageConstraintsQuery as ChildMontageConstraintsQuery;
use HookKonfigurator\Model\MontageQuery as ChildMontageQuery;
use HookKonfigurator\Model\Product as ChildProduct;
use HookKonfigurator\Model\ProductHeizungMontage as ChildProductHeizungMontage;
use HookKonfigurator\Model\ProductHeizungMontageQuery as ChildProductHeizungMontageQuery;
use HookKonfigurator\Model\ProductQuery as ChildProductQuery;
use HookKonfigurator\Model\SetMontage as ChildSetMontage;
use HookKonfigurator\Model\SetMontageQuery as ChildSetMontageQuery;
use HookKonfigurator\Model\Map\MontageTableMap;
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

abstract class Montage implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\HookKonfigurator\\Model\\Map\\MontageTableMap';


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
     * The value for the name field.
     * Note: this column has a database default value of: 'montage'
     * @var        string
     */
    protected $name;

    /**
     * The value for the description field.
     * @var        string
     */
    protected $description;

    /**
     * The value for the type field.
     * Note: this column has a database default value of: 'montage'
     * @var        string
     */
    protected $type;

    /**
     * The value for the quantity field.
     * Note: this column has a database default value of: '0.000000'
     * @var        string
     */
    protected $quantity;

    /**
     * The value for the unit field.
     * Note: this column has a database default value of: 'piece'
     * @var        string
     */
    protected $unit;

    /**
     * The value for the extra_quantity_price field.
     * @var        string
     */
    protected $extra_quantity_price;

    /**
     * The value for the duration field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $duration;

    /**
     * @var        Product
     */
    protected $aProduct;

    /**
     * @var        ChildMontageConstraints one-to-one related ChildMontageConstraints object
     */
    protected $singleMontageConstraints;

    /**
     * @var        ChildProductHeizungMontage one-to-one related ChildProductHeizungMontage object
     */
    protected $singleProductHeizungMontage;

    /**
     * @var        ChildSetMontage one-to-one related ChildSetMontage object
     */
    protected $singleSetMontage;

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
        $this->name = 'montage';
        $this->type = 'montage';
        $this->quantity = '0.000000';
        $this->unit = 'piece';
        $this->duration = 0;
    }

    /**
     * Initializes internal state of HookKonfigurator\Model\Base\Montage object.
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
     * Compares this with another <code>Montage</code> instance.  If
     * <code>obj</code> is an instance of <code>Montage</code>, delegates to
     * <code>equals(Montage)</code>.  Otherwise, returns <code>false</code>.
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
     * @return Montage The current object, for fluid interface
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
     * @return Montage The current object, for fluid interface
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
     * Get the [name] column value.
     *
     * @return   string
     */
    public function getName()
    {

        return $this->name;
    }

    /**
     * Get the [description] column value.
     *
     * @return   string
     */
    public function getDescription()
    {

        return $this->description;
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
     * Get the [quantity] column value.
     *
     * @return   string
     */
    public function getQuantity()
    {

        return $this->quantity;
    }

    /**
     * Get the [unit] column value.
     *
     * @return   string
     */
    public function getUnit()
    {

        return $this->unit;
    }

    /**
     * Get the [extra_quantity_price] column value.
     *
     * @return   string
     */
    public function getExtraQuantityPrice()
    {

        return $this->extra_quantity_price;
    }

    /**
     * Get the [duration] column value.
     *
     * @return   int
     */
    public function getDuration()
    {

        return $this->duration;
    }

    /**
     * Set the value of [id] column.
     *
     * @param      int $v new value
     * @return   \HookKonfigurator\Model\Montage The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[MontageTableMap::ID] = true;
        }

        if ($this->aProduct !== null && $this->aProduct->getId() !== $v) {
            $this->aProduct = null;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [name] column.
     *
     * @param      string $v new value
     * @return   \HookKonfigurator\Model\Montage The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[MontageTableMap::NAME] = true;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [description] column.
     *
     * @param      string $v new value
     * @return   \HookKonfigurator\Model\Montage The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[MontageTableMap::DESCRIPTION] = true;
        }


        return $this;
    } // setDescription()

    /**
     * Set the value of [type] column.
     *
     * @param      string $v new value
     * @return   \HookKonfigurator\Model\Montage The current object (for fluent API support)
     */
    public function setType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->type !== $v) {
            $this->type = $v;
            $this->modifiedColumns[MontageTableMap::TYPE] = true;
        }


        return $this;
    } // setType()

    /**
     * Set the value of [quantity] column.
     *
     * @param      string $v new value
     * @return   \HookKonfigurator\Model\Montage The current object (for fluent API support)
     */
    public function setQuantity($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->quantity !== $v) {
            $this->quantity = $v;
            $this->modifiedColumns[MontageTableMap::QUANTITY] = true;
        }


        return $this;
    } // setQuantity()

    /**
     * Set the value of [unit] column.
     *
     * @param      string $v new value
     * @return   \HookKonfigurator\Model\Montage The current object (for fluent API support)
     */
    public function setUnit($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->unit !== $v) {
            $this->unit = $v;
            $this->modifiedColumns[MontageTableMap::UNIT] = true;
        }


        return $this;
    } // setUnit()

    /**
     * Set the value of [extra_quantity_price] column.
     *
     * @param      string $v new value
     * @return   \HookKonfigurator\Model\Montage The current object (for fluent API support)
     */
    public function setExtraQuantityPrice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->extra_quantity_price !== $v) {
            $this->extra_quantity_price = $v;
            $this->modifiedColumns[MontageTableMap::EXTRA_QUANTITY_PRICE] = true;
        }


        return $this;
    } // setExtraQuantityPrice()

    /**
     * Set the value of [duration] column.
     *
     * @param      int $v new value
     * @return   \HookKonfigurator\Model\Montage The current object (for fluent API support)
     */
    public function setDuration($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->duration !== $v) {
            $this->duration = $v;
            $this->modifiedColumns[MontageTableMap::DURATION] = true;
        }


        return $this;
    } // setDuration()

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
            if ($this->name !== 'montage') {
                return false;
            }

            if ($this->type !== 'montage') {
                return false;
            }

            if ($this->quantity !== '0.000000') {
                return false;
            }

            if ($this->unit !== 'piece') {
                return false;
            }

            if ($this->duration !== 0) {
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


            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : MontageTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : MontageTableMap::translateFieldName('Name', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : MontageTableMap::translateFieldName('Description', TableMap::TYPE_PHPNAME, $indexType)];
            $this->description = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : MontageTableMap::translateFieldName('Type', TableMap::TYPE_PHPNAME, $indexType)];
            $this->type = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : MontageTableMap::translateFieldName('Quantity', TableMap::TYPE_PHPNAME, $indexType)];
            $this->quantity = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : MontageTableMap::translateFieldName('Unit', TableMap::TYPE_PHPNAME, $indexType)];
            $this->unit = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : MontageTableMap::translateFieldName('ExtraQuantityPrice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->extra_quantity_price = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : MontageTableMap::translateFieldName('Duration', TableMap::TYPE_PHPNAME, $indexType)];
            $this->duration = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 8; // 8 = MontageTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating \HookKonfigurator\Model\Montage object", 0, $e);
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
        if ($this->aProduct !== null && $this->id !== $this->aProduct->getId()) {
            $this->aProduct = null;
        }
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
            $con = Propel::getServiceContainer()->getReadConnection(MontageTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildMontageQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aProduct = null;
            $this->singleMontageConstraints = null;

            $this->singleProductHeizungMontage = null;

            $this->singleSetMontage = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Montage::setDeleted()
     * @see Montage::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(MontageTableMap::DATABASE_NAME);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ChildMontageQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(MontageTableMap::DATABASE_NAME);
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
                MontageTableMap::addInstanceToPool($this);
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

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aProduct !== null) {
                if ($this->aProduct->isModified() || $this->aProduct->isNew()) {
                    $affectedRows += $this->aProduct->save($con);
                }
                $this->setProduct($this->aProduct);
            }

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

            if ($this->singleMontageConstraints !== null) {
                if (!$this->singleMontageConstraints->isDeleted() && ($this->singleMontageConstraints->isNew() || $this->singleMontageConstraints->isModified())) {
                    $affectedRows += $this->singleMontageConstraints->save($con);
                }
            }

            if ($this->singleProductHeizungMontage !== null) {
                if (!$this->singleProductHeizungMontage->isDeleted() && ($this->singleProductHeizungMontage->isNew() || $this->singleProductHeizungMontage->isModified())) {
                    $affectedRows += $this->singleProductHeizungMontage->save($con);
                }
            }

            if ($this->singleSetMontage !== null) {
                if (!$this->singleSetMontage->isDeleted() && ($this->singleSetMontage->isNew() || $this->singleSetMontage->isModified())) {
                    $affectedRows += $this->singleSetMontage->save($con);
                }
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


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(MontageTableMap::ID)) {
            $modifiedColumns[':p' . $index++]  = 'ID';
        }
        if ($this->isColumnModified(MontageTableMap::NAME)) {
            $modifiedColumns[':p' . $index++]  = 'NAME';
        }
        if ($this->isColumnModified(MontageTableMap::DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = 'DESCRIPTION';
        }
        if ($this->isColumnModified(MontageTableMap::TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'TYPE';
        }
        if ($this->isColumnModified(MontageTableMap::QUANTITY)) {
            $modifiedColumns[':p' . $index++]  = 'QUANTITY';
        }
        if ($this->isColumnModified(MontageTableMap::UNIT)) {
            $modifiedColumns[':p' . $index++]  = 'UNIT';
        }
        if ($this->isColumnModified(MontageTableMap::EXTRA_QUANTITY_PRICE)) {
            $modifiedColumns[':p' . $index++]  = 'EXTRA_QUANTITY_PRICE';
        }
        if ($this->isColumnModified(MontageTableMap::DURATION)) {
            $modifiedColumns[':p' . $index++]  = 'DURATION';
        }

        $sql = sprintf(
            'INSERT INTO montage (%s) VALUES (%s)',
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
                    case 'NAME':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case 'DESCRIPTION':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case 'TYPE':
                        $stmt->bindValue($identifier, $this->type, PDO::PARAM_STR);
                        break;
                    case 'QUANTITY':
                        $stmt->bindValue($identifier, $this->quantity, PDO::PARAM_STR);
                        break;
                    case 'UNIT':
                        $stmt->bindValue($identifier, $this->unit, PDO::PARAM_STR);
                        break;
                    case 'EXTRA_QUANTITY_PRICE':
                        $stmt->bindValue($identifier, $this->extra_quantity_price, PDO::PARAM_STR);
                        break;
                    case 'DURATION':
                        $stmt->bindValue($identifier, $this->duration, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

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
        $pos = MontageTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getName();
                break;
            case 2:
                return $this->getDescription();
                break;
            case 3:
                return $this->getType();
                break;
            case 4:
                return $this->getQuantity();
                break;
            case 5:
                return $this->getUnit();
                break;
            case 6:
                return $this->getExtraQuantityPrice();
                break;
            case 7:
                return $this->getDuration();
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
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['Montage'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Montage'][$this->getPrimaryKey()] = true;
        $keys = MontageTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getDescription(),
            $keys[3] => $this->getType(),
            $keys[4] => $this->getQuantity(),
            $keys[5] => $this->getUnit(),
            $keys[6] => $this->getExtraQuantityPrice(),
            $keys[7] => $this->getDuration(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aProduct) {
                $result['Product'] = $this->aProduct->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->singleMontageConstraints) {
                $result['MontageConstraints'] = $this->singleMontageConstraints->toArray($keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true);
            }
            if (null !== $this->singleProductHeizungMontage) {
                $result['ProductHeizungMontage'] = $this->singleProductHeizungMontage->toArray($keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true);
            }
            if (null !== $this->singleSetMontage) {
                $result['SetMontage'] = $this->singleSetMontage->toArray($keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true);
            }
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
        $pos = MontageTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

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
                $this->setName($value);
                break;
            case 2:
                $this->setDescription($value);
                break;
            case 3:
                $this->setType($value);
                break;
            case 4:
                $this->setQuantity($value);
                break;
            case 5:
                $this->setUnit($value);
                break;
            case 6:
                $this->setExtraQuantityPrice($value);
                break;
            case 7:
                $this->setDuration($value);
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
        $keys = MontageTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setDescription($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setType($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setQuantity($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setUnit($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setExtraQuantityPrice($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setDuration($arr[$keys[7]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(MontageTableMap::DATABASE_NAME);

        if ($this->isColumnModified(MontageTableMap::ID)) $criteria->add(MontageTableMap::ID, $this->id);
        if ($this->isColumnModified(MontageTableMap::NAME)) $criteria->add(MontageTableMap::NAME, $this->name);
        if ($this->isColumnModified(MontageTableMap::DESCRIPTION)) $criteria->add(MontageTableMap::DESCRIPTION, $this->description);
        if ($this->isColumnModified(MontageTableMap::TYPE)) $criteria->add(MontageTableMap::TYPE, $this->type);
        if ($this->isColumnModified(MontageTableMap::QUANTITY)) $criteria->add(MontageTableMap::QUANTITY, $this->quantity);
        if ($this->isColumnModified(MontageTableMap::UNIT)) $criteria->add(MontageTableMap::UNIT, $this->unit);
        if ($this->isColumnModified(MontageTableMap::EXTRA_QUANTITY_PRICE)) $criteria->add(MontageTableMap::EXTRA_QUANTITY_PRICE, $this->extra_quantity_price);
        if ($this->isColumnModified(MontageTableMap::DURATION)) $criteria->add(MontageTableMap::DURATION, $this->duration);

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
        $criteria = new Criteria(MontageTableMap::DATABASE_NAME);
        $criteria->add(MontageTableMap::ID, $this->id);

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
     * @param      object $copyObj An object of \HookKonfigurator\Model\Montage (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setId($this->getId());
        $copyObj->setName($this->getName());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setType($this->getType());
        $copyObj->setQuantity($this->getQuantity());
        $copyObj->setUnit($this->getUnit());
        $copyObj->setExtraQuantityPrice($this->getExtraQuantityPrice());
        $copyObj->setDuration($this->getDuration());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            $relObj = $this->getMontageConstraints();
            if ($relObj) {
                $copyObj->setMontageConstraints($relObj->copy($deepCopy));
            }

            $relObj = $this->getProductHeizungMontage();
            if ($relObj) {
                $copyObj->setProductHeizungMontage($relObj->copy($deepCopy));
            }

            $relObj = $this->getSetMontage();
            if ($relObj) {
                $copyObj->setSetMontage($relObj->copy($deepCopy));
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
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
     * @return                 \HookKonfigurator\Model\Montage Clone of current object.
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
     * Declares an association between this object and a ChildProduct object.
     *
     * @param                  ChildProduct $v
     * @return                 \HookKonfigurator\Model\Montage The current object (for fluent API support)
     * @throws PropelException
     */
    public function setProduct(ChildProduct $v = null)
    {
        if ($v === null) {
            $this->setId(NULL);
        } else {
            $this->setId($v->getId());
        }

        $this->aProduct = $v;

        // Add binding for other direction of this 1:1 relationship.
        if ($v !== null) {
            $v->setMontage($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildProduct object
     *
     * @param      ConnectionInterface $con Optional Connection object.
     * @return                 ChildProduct The associated ChildProduct object.
     * @throws PropelException
     */
    public function getProduct(ConnectionInterface $con = null)
    {
        if ($this->aProduct === null && ($this->id !== null)) {
            $this->aProduct = ChildProductQuery::create()->findPk($this->id, $con);
            // Because this foreign key represents a one-to-one relationship, we will create a bi-directional association.
            $this->aProduct->setMontage($this);
        }

        return $this->aProduct;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
    }

    /**
     * Gets a single ChildMontageConstraints object, which is related to this object by a one-to-one relationship.
     *
     * @param      ConnectionInterface $con optional connection object
     * @return                 ChildMontageConstraints
     * @throws PropelException
     */
    public function getMontageConstraints(ConnectionInterface $con = null)
    {

        if ($this->singleMontageConstraints === null && !$this->isNew()) {
            $this->singleMontageConstraints = ChildMontageConstraintsQuery::create()->findPk($this->getPrimaryKey(), $con);
        }

        return $this->singleMontageConstraints;
    }

    /**
     * Sets a single ChildMontageConstraints object as related to this object by a one-to-one relationship.
     *
     * @param                  ChildMontageConstraints $v ChildMontageConstraints
     * @return                 \HookKonfigurator\Model\Montage The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMontageConstraints(ChildMontageConstraints $v = null)
    {
        $this->singleMontageConstraints = $v;

        // Make sure that that the passed-in ChildMontageConstraints isn't already associated with this object
        if ($v !== null && $v->getMontage(null, false) === null) {
            $v->setMontage($this);
        }

        return $this;
    }

    /**
     * Gets a single ChildProductHeizungMontage object, which is related to this object by a one-to-one relationship.
     *
     * @param      ConnectionInterface $con optional connection object
     * @return                 ChildProductHeizungMontage
     * @throws PropelException
     */
    public function getProductHeizungMontage(ConnectionInterface $con = null)
    {

        if ($this->singleProductHeizungMontage === null && !$this->isNew()) {
            $this->singleProductHeizungMontage = ChildProductHeizungMontageQuery::create()->findPk($this->getPrimaryKey(), $con);
        }

        return $this->singleProductHeizungMontage;
    }

    /**
     * Sets a single ChildProductHeizungMontage object as related to this object by a one-to-one relationship.
     *
     * @param                  ChildProductHeizungMontage $v ChildProductHeizungMontage
     * @return                 \HookKonfigurator\Model\Montage The current object (for fluent API support)
     * @throws PropelException
     */
    public function setProductHeizungMontage(ChildProductHeizungMontage $v = null)
    {
        $this->singleProductHeizungMontage = $v;

        // Make sure that that the passed-in ChildProductHeizungMontage isn't already associated with this object
        if ($v !== null && $v->getMontage(null, false) === null) {
            $v->setMontage($this);
        }

        return $this;
    }

    /**
     * Gets a single ChildSetMontage object, which is related to this object by a one-to-one relationship.
     *
     * @param      ConnectionInterface $con optional connection object
     * @return                 ChildSetMontage
     * @throws PropelException
     */
    public function getSetMontage(ConnectionInterface $con = null)
    {

        if ($this->singleSetMontage === null && !$this->isNew()) {
            $this->singleSetMontage = ChildSetMontageQuery::create()->findPk($this->getPrimaryKey(), $con);
        }

        return $this->singleSetMontage;
    }

    /**
     * Sets a single ChildSetMontage object as related to this object by a one-to-one relationship.
     *
     * @param                  ChildSetMontage $v ChildSetMontage
     * @return                 \HookKonfigurator\Model\Montage The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSetMontage(ChildSetMontage $v = null)
    {
        $this->singleSetMontage = $v;

        // Make sure that that the passed-in ChildSetMontage isn't already associated with this object
        if ($v !== null && $v->getMontage(null, false) === null) {
            $v->setMontage($this);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->name = null;
        $this->description = null;
        $this->type = null;
        $this->quantity = null;
        $this->unit = null;
        $this->extra_quantity_price = null;
        $this->duration = null;
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
            if ($this->singleMontageConstraints) {
                $this->singleMontageConstraints->clearAllReferences($deep);
            }
            if ($this->singleProductHeizungMontage) {
                $this->singleProductHeizungMontage->clearAllReferences($deep);
            }
            if ($this->singleSetMontage) {
                $this->singleSetMontage->clearAllReferences($deep);
            }
        } // if ($deep)

        $this->singleMontageConstraints = null;
        $this->singleProductHeizungMontage = null;
        $this->singleSetMontage = null;
        $this->aProduct = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(MontageTableMap::DEFAULT_STRING_FORMAT);
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
