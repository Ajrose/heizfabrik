<?php

namespace HookCalendar\Model\Map;

use HookCalendar\Model\Employees;
use HookCalendar\Model\EmployeesQuery;
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
 * This class defines the structure of the 'employees' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class EmployeesTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;
    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'HookCalendar.Model.Map.EmployeesTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'thelia';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'employees';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\HookCalendar\\Model\\Employees';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'HookCalendar.Model.Employees';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 11;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 11;

    /**
     * the column name for the ID field
     */
    const ID = 'employees.ID';

    /**
     * the column name for the CALENDAR_ID field
     */
    const CALENDAR_ID = 'employees.CALENDAR_ID';

    /**
     * the column name for the EMAIL field
     */
    const EMAIL = 'employees.EMAIL';

    /**
     * the column name for the PASSWORD field
     */
    const PASSWORD = 'employees.PASSWORD';

    /**
     * the column name for the PHONE field
     */
    const PHONE = 'employees.PHONE';

    /**
     * the column name for the NOTES field
     */
    const NOTES = 'employees.NOTES';

    /**
     * the column name for the AVATAR field
     */
    const AVATAR = 'employees.AVATAR';

    /**
     * the column name for the LAST_LOGIN field
     */
    const LAST_LOGIN = 'employees.LAST_LOGIN';

    /**
     * the column name for the IS_SUBSCRIBED field
     */
    const IS_SUBSCRIBED = 'employees.IS_SUBSCRIBED';

    /**
     * the column name for the IS_SUBSCRIBED_SMS field
     */
    const IS_SUBSCRIBED_SMS = 'employees.IS_SUBSCRIBED_SMS';

    /**
     * the column name for the IS_ACTIVE field
     */
    const IS_ACTIVE = 'employees.IS_ACTIVE';

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
        self::TYPE_PHPNAME       => array('Id', 'CalendarId', 'Email', 'Password', 'Phone', 'Notes', 'Avatar', 'LastLogin', 'IsSubscribed', 'IsSubscribedSms', 'IsActive', ),
        self::TYPE_STUDLYPHPNAME => array('id', 'calendarId', 'email', 'password', 'phone', 'notes', 'avatar', 'lastLogin', 'isSubscribed', 'isSubscribedSms', 'isActive', ),
        self::TYPE_COLNAME       => array(EmployeesTableMap::ID, EmployeesTableMap::CALENDAR_ID, EmployeesTableMap::EMAIL, EmployeesTableMap::PASSWORD, EmployeesTableMap::PHONE, EmployeesTableMap::NOTES, EmployeesTableMap::AVATAR, EmployeesTableMap::LAST_LOGIN, EmployeesTableMap::IS_SUBSCRIBED, EmployeesTableMap::IS_SUBSCRIBED_SMS, EmployeesTableMap::IS_ACTIVE, ),
        self::TYPE_RAW_COLNAME   => array('ID', 'CALENDAR_ID', 'EMAIL', 'PASSWORD', 'PHONE', 'NOTES', 'AVATAR', 'LAST_LOGIN', 'IS_SUBSCRIBED', 'IS_SUBSCRIBED_SMS', 'IS_ACTIVE', ),
        self::TYPE_FIELDNAME     => array('id', 'calendar_id', 'email', 'password', 'phone', 'notes', 'avatar', 'last_login', 'is_subscribed', 'is_subscribed_sms', 'is_active', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'CalendarId' => 1, 'Email' => 2, 'Password' => 3, 'Phone' => 4, 'Notes' => 5, 'Avatar' => 6, 'LastLogin' => 7, 'IsSubscribed' => 8, 'IsSubscribedSms' => 9, 'IsActive' => 10, ),
        self::TYPE_STUDLYPHPNAME => array('id' => 0, 'calendarId' => 1, 'email' => 2, 'password' => 3, 'phone' => 4, 'notes' => 5, 'avatar' => 6, 'lastLogin' => 7, 'isSubscribed' => 8, 'isSubscribedSms' => 9, 'isActive' => 10, ),
        self::TYPE_COLNAME       => array(EmployeesTableMap::ID => 0, EmployeesTableMap::CALENDAR_ID => 1, EmployeesTableMap::EMAIL => 2, EmployeesTableMap::PASSWORD => 3, EmployeesTableMap::PHONE => 4, EmployeesTableMap::NOTES => 5, EmployeesTableMap::AVATAR => 6, EmployeesTableMap::LAST_LOGIN => 7, EmployeesTableMap::IS_SUBSCRIBED => 8, EmployeesTableMap::IS_SUBSCRIBED_SMS => 9, EmployeesTableMap::IS_ACTIVE => 10, ),
        self::TYPE_RAW_COLNAME   => array('ID' => 0, 'CALENDAR_ID' => 1, 'EMAIL' => 2, 'PASSWORD' => 3, 'PHONE' => 4, 'NOTES' => 5, 'AVATAR' => 6, 'LAST_LOGIN' => 7, 'IS_SUBSCRIBED' => 8, 'IS_SUBSCRIBED_SMS' => 9, 'IS_ACTIVE' => 10, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'calendar_id' => 1, 'email' => 2, 'password' => 3, 'phone' => 4, 'notes' => 5, 'avatar' => 6, 'last_login' => 7, 'is_subscribed' => 8, 'is_subscribed_sms' => 9, 'is_active' => 10, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
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
        $this->setName('employees');
        $this->setPhpName('Employees');
        $this->setClassName('\\HookCalendar\\Model\\Employees');
        $this->setPackage('HookCalendar.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('CALENDAR_ID', 'CalendarId', 'INTEGER', false, 10, null);
        $this->addColumn('EMAIL', 'Email', 'VARCHAR', false, 255, null);
        $this->addColumn('PASSWORD', 'Password', 'BLOB', false, null, null);
        $this->addColumn('PHONE', 'Phone', 'VARCHAR', false, 255, null);
        $this->addColumn('NOTES', 'Notes', 'LONGVARCHAR', false, null, null);
        $this->addColumn('AVATAR', 'Avatar', 'VARCHAR', false, 255, null);
        $this->addColumn('LAST_LOGIN', 'LastLogin', 'TIMESTAMP', false, null, null);
        $this->addColumn('IS_SUBSCRIBED', 'IsSubscribed', 'BOOLEAN', false, 1, false);
        $this->addColumn('IS_SUBSCRIBED_SMS', 'IsSubscribedSms', 'BOOLEAN', false, 1, false);
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
        return $withPrefix ? EmployeesTableMap::CLASS_DEFAULT : EmployeesTableMap::OM_CLASS;
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
     * @return array (Employees object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = EmployeesTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = EmployeesTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + EmployeesTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = EmployeesTableMap::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            EmployeesTableMap::addInstanceToPool($obj, $key);
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
            $key = EmployeesTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = EmployeesTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                EmployeesTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(EmployeesTableMap::ID);
            $criteria->addSelectColumn(EmployeesTableMap::CALENDAR_ID);
            $criteria->addSelectColumn(EmployeesTableMap::EMAIL);
            $criteria->addSelectColumn(EmployeesTableMap::PASSWORD);
            $criteria->addSelectColumn(EmployeesTableMap::PHONE);
            $criteria->addSelectColumn(EmployeesTableMap::NOTES);
            $criteria->addSelectColumn(EmployeesTableMap::AVATAR);
            $criteria->addSelectColumn(EmployeesTableMap::LAST_LOGIN);
            $criteria->addSelectColumn(EmployeesTableMap::IS_SUBSCRIBED);
            $criteria->addSelectColumn(EmployeesTableMap::IS_SUBSCRIBED_SMS);
            $criteria->addSelectColumn(EmployeesTableMap::IS_ACTIVE);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.CALENDAR_ID');
            $criteria->addSelectColumn($alias . '.EMAIL');
            $criteria->addSelectColumn($alias . '.PASSWORD');
            $criteria->addSelectColumn($alias . '.PHONE');
            $criteria->addSelectColumn($alias . '.NOTES');
            $criteria->addSelectColumn($alias . '.AVATAR');
            $criteria->addSelectColumn($alias . '.LAST_LOGIN');
            $criteria->addSelectColumn($alias . '.IS_SUBSCRIBED');
            $criteria->addSelectColumn($alias . '.IS_SUBSCRIBED_SMS');
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
        return Propel::getServiceContainer()->getDatabaseMap(EmployeesTableMap::DATABASE_NAME)->getTable(EmployeesTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getServiceContainer()->getDatabaseMap(EmployeesTableMap::DATABASE_NAME);
      if (!$dbMap->hasTable(EmployeesTableMap::TABLE_NAME)) {
        $dbMap->addTableObject(new EmployeesTableMap());
      }
    }

    /**
     * Performs a DELETE on the database, given a Employees or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Employees object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(EmployeesTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \HookCalendar\Model\Employees) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(EmployeesTableMap::DATABASE_NAME);
            $criteria->add(EmployeesTableMap::ID, (array) $values, Criteria::IN);
        }

        $query = EmployeesQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) { EmployeesTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) { EmployeesTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the employees table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return EmployeesQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Employees or Criteria object.
     *
     * @param mixed               $criteria Criteria or Employees object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EmployeesTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Employees object
        }

        if ($criteria->containsKey(EmployeesTableMap::ID) && $criteria->keyContainsValue(EmployeesTableMap::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.EmployeesTableMap::ID.')');
        }


        // Set the correct dbName
        $query = EmployeesQuery::create()->mergeWith($criteria);

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

} // EmployeesTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
EmployeesTableMap::buildTableMap();
