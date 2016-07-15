<?php

namespace HookCalendar\Model\Map;

use HookCalendar\Model\Services;
use HookCalendar\Model\ServicesQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'services' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ServicesTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;
    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'HookCalendar.Model.Map.ServicesTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'thelia';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'services';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\HookCalendar\\Model\\Services';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'HookCalendar.Model.Services';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the ID field
     */
    const ID = 'services.ID';

    /**
     * the column name for the CALENDAR_ID field
     */
    const CALENDAR_ID = 'services.CALENDAR_ID';

    /**
     * the column name for the PRICE field
     */
    const PRICE = 'services.PRICE';

    /**
     * the column name for the LENGTH field
     */
    const LENGTH = 'services.LENGTH';

    /**
     * the column name for the BEFORE field
     */
    const BEFORE = 'services.BEFORE';

    /**
     * the column name for the AFTER field
     */
    const AFTER = 'services.AFTER';

    /**
     * the column name for the TOTAL field
     */
    const TOTAL = 'services.TOTAL';

    /**
     * the column name for the IMAGE field
     */
    const IMAGE = 'services.IMAGE';

    /**
     * the column name for the IS_ACTIVE field
     */
    const IS_ACTIVE = 'services.IS_ACTIVE';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'CalendarId', 'Price', 'Length', 'Before', 'After', 'Total', 'Image', 'IsActive', ),
        self::TYPE_STUDLYPHPNAME => array('id', 'calendarId', 'price', 'length', 'before', 'after', 'total', 'image', 'isActive', ),
        self::TYPE_COLNAME       => array(ServicesTableMap::ID, ServicesTableMap::CALENDAR_ID, ServicesTableMap::PRICE, ServicesTableMap::LENGTH, ServicesTableMap::BEFORE, ServicesTableMap::AFTER, ServicesTableMap::TOTAL, ServicesTableMap::IMAGE, ServicesTableMap::IS_ACTIVE, ),
        self::TYPE_RAW_COLNAME   => array('ID', 'CALENDAR_ID', 'PRICE', 'LENGTH', 'BEFORE', 'AFTER', 'TOTAL', 'IMAGE', 'IS_ACTIVE', ),
        self::TYPE_FIELDNAME     => array('id', 'calendar_id', 'price', 'length', 'before', 'after', 'total', 'image', 'is_active', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'CalendarId' => 1, 'Price' => 2, 'Length' => 3, 'Before' => 4, 'After' => 5, 'Total' => 6, 'Image' => 7, 'IsActive' => 8, ),
        self::TYPE_STUDLYPHPNAME => array('id' => 0, 'calendarId' => 1, 'price' => 2, 'length' => 3, 'before' => 4, 'after' => 5, 'total' => 6, 'image' => 7, 'isActive' => 8, ),
        self::TYPE_COLNAME       => array(ServicesTableMap::ID => 0, ServicesTableMap::CALENDAR_ID => 1, ServicesTableMap::PRICE => 2, ServicesTableMap::LENGTH => 3, ServicesTableMap::BEFORE => 4, ServicesTableMap::AFTER => 5, ServicesTableMap::TOTAL => 6, ServicesTableMap::IMAGE => 7, ServicesTableMap::IS_ACTIVE => 8, ),
        self::TYPE_RAW_COLNAME   => array('ID' => 0, 'CALENDAR_ID' => 1, 'PRICE' => 2, 'LENGTH' => 3, 'BEFORE' => 4, 'AFTER' => 5, 'TOTAL' => 6, 'IMAGE' => 7, 'IS_ACTIVE' => 8, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'calendar_id' => 1, 'price' => 2, 'length' => 3, 'before' => 4, 'after' => 5, 'total' => 6, 'image' => 7, 'is_active' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('services');
        $this->setPhpName('Services');
        $this->setClassName('\\HookCalendar\\Model\\Services');
        $this->setPackage('HookCalendar.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('CALENDAR_ID', 'CalendarId', 'INTEGER', false, 10, null);
        $this->addColumn('PRICE', 'Price', 'DECIMAL', false, 9, null);
        $this->addColumn('LENGTH', 'Length', 'SMALLINT', false, 5, null);
        $this->addColumn('BEFORE', 'Before', 'SMALLINT', false, 5, null);
        $this->addColumn('AFTER', 'After', 'SMALLINT', false, 5, null);
        $this->addColumn('TOTAL', 'Total', 'SMALLINT', false, 5, null);
        $this->addColumn('IMAGE', 'Image', 'VARCHAR', false, 255, null);
        $this->addColumn('IS_ACTIVE', 'IsActive', 'BOOLEAN', false, 1, true);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {

            return (int) $row[
                            $indexType == TableMap::TYPE_NUM
                            ? 0 + $offset
                            : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
                        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? ServicesTableMap::CLASS_DEFAULT : ServicesTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     * @return array (Services object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ServicesTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ServicesTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ServicesTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ServicesTableMap::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ServicesTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = ServicesTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ServicesTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ServicesTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(ServicesTableMap::ID);
            $criteria->addSelectColumn(ServicesTableMap::CALENDAR_ID);
            $criteria->addSelectColumn(ServicesTableMap::PRICE);
            $criteria->addSelectColumn(ServicesTableMap::LENGTH);
            $criteria->addSelectColumn(ServicesTableMap::BEFORE);
            $criteria->addSelectColumn(ServicesTableMap::AFTER);
            $criteria->addSelectColumn(ServicesTableMap::TOTAL);
            $criteria->addSelectColumn(ServicesTableMap::IMAGE);
            $criteria->addSelectColumn(ServicesTableMap::IS_ACTIVE);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.CALENDAR_ID');
            $criteria->addSelectColumn($alias . '.PRICE');
            $criteria->addSelectColumn($alias . '.LENGTH');
            $criteria->addSelectColumn($alias . '.BEFORE');
            $criteria->addSelectColumn($alias . '.AFTER');
            $criteria->addSelectColumn($alias . '.TOTAL');
            $criteria->addSelectColumn($alias . '.IMAGE');
            $criteria->addSelectColumn($alias . '.IS_ACTIVE');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(ServicesTableMap::DATABASE_NAME)->getTable(ServicesTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getServiceContainer()->getDatabaseMap(ServicesTableMap::DATABASE_NAME);
      if (!$dbMap->hasTable(ServicesTableMap::TABLE_NAME)) {
        $dbMap->addTableObject(new ServicesTableMap());
      }
    }

    /**
     * Performs a DELETE on the database, given a Services or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Services object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ServicesTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \HookCalendar\Model\Services) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ServicesTableMap::DATABASE_NAME);
            $criteria->add(ServicesTableMap::ID, (array) $values, Criteria::IN);
        }

        $query = ServicesQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) { ServicesTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) { ServicesTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the services table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ServicesQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Services or Criteria object.
     *
     * @param mixed               $criteria Criteria or Services object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ServicesTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Services object
        }

        if ($criteria->containsKey(ServicesTableMap::ID) && $criteria->keyContainsValue(ServicesTableMap::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ServicesTableMap::ID.')');
        }


        // Set the correct dbName
        $query = ServicesQuery::create()->mergeWith($criteria);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = $query->doInsert($con);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

} // ServicesTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ServicesTableMap::buildTableMap();
