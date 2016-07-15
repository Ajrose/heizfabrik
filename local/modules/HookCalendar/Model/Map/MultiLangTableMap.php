<?php

namespace HookCalendar\Model\Map;

use HookCalendar\Model\MultiLang;
use HookCalendar\Model\MultiLangQuery;
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
 * This class defines the structure of the 'multi_lang' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class MultiLangTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;
    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'HookCalendar.Model.Map.MultiLangTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'thelia';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'multi_lang';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\HookCalendar\\Model\\MultiLang';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'HookCalendar.Model.MultiLang';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 7;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 7;

    /**
     * the column name for the ID field
     */
    const ID = 'multi_lang.ID';

    /**
     * the column name for the FOREIGN_ID field
     */
    const FOREIGN_ID = 'multi_lang.FOREIGN_ID';

    /**
     * the column name for the MODEL field
     */
    const MODEL = 'multi_lang.MODEL';

    /**
     * the column name for the LOCALE field
     */
    const LOCALE = 'multi_lang.LOCALE';

    /**
     * the column name for the FIELD field
     */
    const FIELD = 'multi_lang.FIELD';

    /**
     * the column name for the CONTENT field
     */
    const CONTENT = 'multi_lang.CONTENT';

    /**
     * the column name for the SOURCE field
     */
    const SOURCE = 'multi_lang.SOURCE';

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
        self::TYPE_PHPNAME       => array('Id', 'ForeignId', 'Model', 'Locale', 'Field', 'Content', 'Source', ),
        self::TYPE_STUDLYPHPNAME => array('id', 'foreignId', 'model', 'locale', 'field', 'content', 'source', ),
        self::TYPE_COLNAME       => array(MultiLangTableMap::ID, MultiLangTableMap::FOREIGN_ID, MultiLangTableMap::MODEL, MultiLangTableMap::LOCALE, MultiLangTableMap::FIELD, MultiLangTableMap::CONTENT, MultiLangTableMap::SOURCE, ),
        self::TYPE_RAW_COLNAME   => array('ID', 'FOREIGN_ID', 'MODEL', 'LOCALE', 'FIELD', 'CONTENT', 'SOURCE', ),
        self::TYPE_FIELDNAME     => array('id', 'foreign_id', 'model', 'locale', 'field', 'content', 'source', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'ForeignId' => 1, 'Model' => 2, 'Locale' => 3, 'Field' => 4, 'Content' => 5, 'Source' => 6, ),
        self::TYPE_STUDLYPHPNAME => array('id' => 0, 'foreignId' => 1, 'model' => 2, 'locale' => 3, 'field' => 4, 'content' => 5, 'source' => 6, ),
        self::TYPE_COLNAME       => array(MultiLangTableMap::ID => 0, MultiLangTableMap::FOREIGN_ID => 1, MultiLangTableMap::MODEL => 2, MultiLangTableMap::LOCALE => 3, MultiLangTableMap::FIELD => 4, MultiLangTableMap::CONTENT => 5, MultiLangTableMap::SOURCE => 6, ),
        self::TYPE_RAW_COLNAME   => array('ID' => 0, 'FOREIGN_ID' => 1, 'MODEL' => 2, 'LOCALE' => 3, 'FIELD' => 4, 'CONTENT' => 5, 'SOURCE' => 6, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'foreign_id' => 1, 'model' => 2, 'locale' => 3, 'field' => 4, 'content' => 5, 'source' => 6, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
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
        $this->setName('multi_lang');
        $this->setPhpName('MultiLang');
        $this->setClassName('\\HookCalendar\\Model\\MultiLang');
        $this->setPackage('HookCalendar.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('FOREIGN_ID', 'ForeignId', 'INTEGER', false, 10, null);
        $this->addColumn('MODEL', 'Model', 'VARCHAR', false, 50, null);
        $this->addColumn('LOCALE', 'Locale', 'TINYINT', false, 3, null);
        $this->addColumn('FIELD', 'Field', 'VARCHAR', false, 50, null);
        $this->addColumn('CONTENT', 'Content', 'LONGVARCHAR', false, null, null);
        $this->addColumn('SOURCE', 'Source', 'CHAR', false, null, 'script');
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
        return $withPrefix ? MultiLangTableMap::CLASS_DEFAULT : MultiLangTableMap::OM_CLASS;
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
     * @return array (MultiLang object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = MultiLangTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = MultiLangTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + MultiLangTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = MultiLangTableMap::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            MultiLangTableMap::addInstanceToPool($obj, $key);
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
            $key = MultiLangTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = MultiLangTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                MultiLangTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(MultiLangTableMap::ID);
            $criteria->addSelectColumn(MultiLangTableMap::FOREIGN_ID);
            $criteria->addSelectColumn(MultiLangTableMap::MODEL);
            $criteria->addSelectColumn(MultiLangTableMap::LOCALE);
            $criteria->addSelectColumn(MultiLangTableMap::FIELD);
            $criteria->addSelectColumn(MultiLangTableMap::CONTENT);
            $criteria->addSelectColumn(MultiLangTableMap::SOURCE);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.FOREIGN_ID');
            $criteria->addSelectColumn($alias . '.MODEL');
            $criteria->addSelectColumn($alias . '.LOCALE');
            $criteria->addSelectColumn($alias . '.FIELD');
            $criteria->addSelectColumn($alias . '.CONTENT');
            $criteria->addSelectColumn($alias . '.SOURCE');
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
        return Propel::getServiceContainer()->getDatabaseMap(MultiLangTableMap::DATABASE_NAME)->getTable(MultiLangTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getServiceContainer()->getDatabaseMap(MultiLangTableMap::DATABASE_NAME);
      if (!$dbMap->hasTable(MultiLangTableMap::TABLE_NAME)) {
        $dbMap->addTableObject(new MultiLangTableMap());
      }
    }

    /**
     * Performs a DELETE on the database, given a MultiLang or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or MultiLang object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(MultiLangTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \HookCalendar\Model\MultiLang) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(MultiLangTableMap::DATABASE_NAME);
            $criteria->add(MultiLangTableMap::ID, (array) $values, Criteria::IN);
        }

        $query = MultiLangQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) { MultiLangTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) { MultiLangTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the multi_lang table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return MultiLangQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a MultiLang or Criteria object.
     *
     * @param mixed               $criteria Criteria or MultiLang object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MultiLangTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from MultiLang object
        }

        if ($criteria->containsKey(MultiLangTableMap::ID) && $criteria->keyContainsValue(MultiLangTableMap::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.MultiLangTableMap::ID.')');
        }


        // Set the correct dbName
        $query = MultiLangQuery::create()->mergeWith($criteria);

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

} // MultiLangTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
MultiLangTableMap::buildTableMap();
