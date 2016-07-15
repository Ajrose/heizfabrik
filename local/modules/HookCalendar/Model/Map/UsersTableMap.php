<?php

namespace HookCalendar\Model\Map;

use HookCalendar\Model\Users;
use HookCalendar\Model\UsersQuery;
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
 * This class defines the structure of the 'users' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class UsersTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;
    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'HookCalendar.Model.Map.UsersTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'thelia';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'users';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\HookCalendar\\Model\\Users';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'HookCalendar.Model.Users';

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
    const ID = 'users.ID';

    /**
     * the column name for the ROLE_ID field
     */
    const ROLE_ID = 'users.ROLE_ID';

    /**
     * the column name for the EMAIL field
     */
    const EMAIL = 'users.EMAIL';

    /**
     * the column name for the PASSWORD field
     */
    const PASSWORD = 'users.PASSWORD';

    /**
     * the column name for the NAME field
     */
    const NAME = 'users.NAME';

    /**
     * the column name for the PHONE field
     */
    const PHONE = 'users.PHONE';

    /**
     * the column name for the CREATED field
     */
    const CREATED = 'users.CREATED';

    /**
     * the column name for the LAST_LOGIN field
     */
    const LAST_LOGIN = 'users.LAST_LOGIN';

    /**
     * the column name for the STATUS field
     */
    const STATUS = 'users.STATUS';

    /**
     * the column name for the IS_NOTIFY field
     */
    const IS_NOTIFY = 'users.IS_NOTIFY';

    /**
     * the column name for the IP field
     */
    const IP = 'users.IP';

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
        self::TYPE_PHPNAME       => array('Id', 'RoleId', 'Email', 'Password', 'Name', 'Phone', 'Created', 'LastLogin', 'Status', 'IsNotify', 'Ip', ),
        self::TYPE_STUDLYPHPNAME => array('id', 'roleId', 'email', 'password', 'name', 'phone', 'created', 'lastLogin', 'status', 'isNotify', 'ip', ),
        self::TYPE_COLNAME       => array(UsersTableMap::ID, UsersTableMap::ROLE_ID, UsersTableMap::EMAIL, UsersTableMap::PASSWORD, UsersTableMap::NAME, UsersTableMap::PHONE, UsersTableMap::CREATED, UsersTableMap::LAST_LOGIN, UsersTableMap::STATUS, UsersTableMap::IS_NOTIFY, UsersTableMap::IP, ),
        self::TYPE_RAW_COLNAME   => array('ID', 'ROLE_ID', 'EMAIL', 'PASSWORD', 'NAME', 'PHONE', 'CREATED', 'LAST_LOGIN', 'STATUS', 'IS_NOTIFY', 'IP', ),
        self::TYPE_FIELDNAME     => array('id', 'role_id', 'email', 'password', 'name', 'phone', 'created', 'last_login', 'status', 'is_notify', 'ip', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'RoleId' => 1, 'Email' => 2, 'Password' => 3, 'Name' => 4, 'Phone' => 5, 'Created' => 6, 'LastLogin' => 7, 'Status' => 8, 'IsNotify' => 9, 'Ip' => 10, ),
        self::TYPE_STUDLYPHPNAME => array('id' => 0, 'roleId' => 1, 'email' => 2, 'password' => 3, 'name' => 4, 'phone' => 5, 'created' => 6, 'lastLogin' => 7, 'status' => 8, 'isNotify' => 9, 'ip' => 10, ),
        self::TYPE_COLNAME       => array(UsersTableMap::ID => 0, UsersTableMap::ROLE_ID => 1, UsersTableMap::EMAIL => 2, UsersTableMap::PASSWORD => 3, UsersTableMap::NAME => 4, UsersTableMap::PHONE => 5, UsersTableMap::CREATED => 6, UsersTableMap::LAST_LOGIN => 7, UsersTableMap::STATUS => 8, UsersTableMap::IS_NOTIFY => 9, UsersTableMap::IP => 10, ),
        self::TYPE_RAW_COLNAME   => array('ID' => 0, 'ROLE_ID' => 1, 'EMAIL' => 2, 'PASSWORD' => 3, 'NAME' => 4, 'PHONE' => 5, 'CREATED' => 6, 'LAST_LOGIN' => 7, 'STATUS' => 8, 'IS_NOTIFY' => 9, 'IP' => 10, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'role_id' => 1, 'email' => 2, 'password' => 3, 'name' => 4, 'phone' => 5, 'created' => 6, 'last_login' => 7, 'status' => 8, 'is_notify' => 9, 'ip' => 10, ),
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
        $this->setName('users');
        $this->setPhpName('Users');
        $this->setClassName('\\HookCalendar\\Model\\Users');
        $this->setPackage('HookCalendar.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('ROLE_ID', 'RoleId', 'INTEGER', true, 10, null);
        $this->addColumn('EMAIL', 'Email', 'VARCHAR', false, 255, null);
        $this->addColumn('PASSWORD', 'Password', 'BLOB', false, null, null);
        $this->addColumn('NAME', 'Name', 'VARCHAR', false, 255, null);
        $this->addColumn('PHONE', 'Phone', 'VARCHAR', false, 255, null);
        $this->addColumn('CREATED', 'Created', 'TIMESTAMP', true, null, null);
        $this->addColumn('LAST_LOGIN', 'LastLogin', 'TIMESTAMP', false, null, null);
        $this->addColumn('STATUS', 'Status', 'CHAR', true, null, 'T');
        $this->addColumn('IS_NOTIFY', 'IsNotify', 'CHAR', true, null, 'T');
        $this->addColumn('IP', 'Ip', 'VARCHAR', false, 15, null);
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
        return $withPrefix ? UsersTableMap::CLASS_DEFAULT : UsersTableMap::OM_CLASS;
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
     * @return array (Users object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = UsersTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = UsersTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + UsersTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = UsersTableMap::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            UsersTableMap::addInstanceToPool($obj, $key);
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
            $key = UsersTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = UsersTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                UsersTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(UsersTableMap::ID);
            $criteria->addSelectColumn(UsersTableMap::ROLE_ID);
            $criteria->addSelectColumn(UsersTableMap::EMAIL);
            $criteria->addSelectColumn(UsersTableMap::PASSWORD);
            $criteria->addSelectColumn(UsersTableMap::NAME);
            $criteria->addSelectColumn(UsersTableMap::PHONE);
            $criteria->addSelectColumn(UsersTableMap::CREATED);
            $criteria->addSelectColumn(UsersTableMap::LAST_LOGIN);
            $criteria->addSelectColumn(UsersTableMap::STATUS);
            $criteria->addSelectColumn(UsersTableMap::IS_NOTIFY);
            $criteria->addSelectColumn(UsersTableMap::IP);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.ROLE_ID');
            $criteria->addSelectColumn($alias . '.EMAIL');
            $criteria->addSelectColumn($alias . '.PASSWORD');
            $criteria->addSelectColumn($alias . '.NAME');
            $criteria->addSelectColumn($alias . '.PHONE');
            $criteria->addSelectColumn($alias . '.CREATED');
            $criteria->addSelectColumn($alias . '.LAST_LOGIN');
            $criteria->addSelectColumn($alias . '.STATUS');
            $criteria->addSelectColumn($alias . '.IS_NOTIFY');
            $criteria->addSelectColumn($alias . '.IP');
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
        return Propel::getServiceContainer()->getDatabaseMap(UsersTableMap::DATABASE_NAME)->getTable(UsersTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getServiceContainer()->getDatabaseMap(UsersTableMap::DATABASE_NAME);
      if (!$dbMap->hasTable(UsersTableMap::TABLE_NAME)) {
        $dbMap->addTableObject(new UsersTableMap());
      }
    }

    /**
     * Performs a DELETE on the database, given a Users or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Users object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(UsersTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \HookCalendar\Model\Users) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(UsersTableMap::DATABASE_NAME);
            $criteria->add(UsersTableMap::ID, (array) $values, Criteria::IN);
        }

        $query = UsersQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) { UsersTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) { UsersTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the users table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return UsersQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Users or Criteria object.
     *
     * @param mixed               $criteria Criteria or Users object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UsersTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Users object
        }

        if ($criteria->containsKey(UsersTableMap::ID) && $criteria->keyContainsValue(UsersTableMap::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.UsersTableMap::ID.')');
        }


        // Set the correct dbName
        $query = UsersQuery::create()->mergeWith($criteria);

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

} // UsersTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
UsersTableMap::buildTableMap();
