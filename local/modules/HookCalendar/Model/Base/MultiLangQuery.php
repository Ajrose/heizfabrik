<?php

namespace HookCalendar\Model\Base;

use \Exception;
use \PDO;
use HookCalendar\Model\MultiLang as ChildMultiLang;
use HookCalendar\Model\MultiLangQuery as ChildMultiLangQuery;
use HookCalendar\Model\Map\MultiLangTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'multi_lang' table.
 *
 *
 *
 * @method     ChildMultiLangQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildMultiLangQuery orderByForeignId($order = Criteria::ASC) Order by the foreign_id column
 * @method     ChildMultiLangQuery orderByModel($order = Criteria::ASC) Order by the model column
 * @method     ChildMultiLangQuery orderByLocale($order = Criteria::ASC) Order by the locale column
 * @method     ChildMultiLangQuery orderByField($order = Criteria::ASC) Order by the field column
 * @method     ChildMultiLangQuery orderByContent($order = Criteria::ASC) Order by the content column
 * @method     ChildMultiLangQuery orderBySource($order = Criteria::ASC) Order by the source column
 *
 * @method     ChildMultiLangQuery groupById() Group by the id column
 * @method     ChildMultiLangQuery groupByForeignId() Group by the foreign_id column
 * @method     ChildMultiLangQuery groupByModel() Group by the model column
 * @method     ChildMultiLangQuery groupByLocale() Group by the locale column
 * @method     ChildMultiLangQuery groupByField() Group by the field column
 * @method     ChildMultiLangQuery groupByContent() Group by the content column
 * @method     ChildMultiLangQuery groupBySource() Group by the source column
 *
 * @method     ChildMultiLangQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMultiLangQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMultiLangQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMultiLang findOne(ConnectionInterface $con = null) Return the first ChildMultiLang matching the query
 * @method     ChildMultiLang findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMultiLang matching the query, or a new ChildMultiLang object populated from the query conditions when no match is found
 *
 * @method     ChildMultiLang findOneById(int $id) Return the first ChildMultiLang filtered by the id column
 * @method     ChildMultiLang findOneByForeignId(int $foreign_id) Return the first ChildMultiLang filtered by the foreign_id column
 * @method     ChildMultiLang findOneByModel(string $model) Return the first ChildMultiLang filtered by the model column
 * @method     ChildMultiLang findOneByLocale(int $locale) Return the first ChildMultiLang filtered by the locale column
 * @method     ChildMultiLang findOneByField(string $field) Return the first ChildMultiLang filtered by the field column
 * @method     ChildMultiLang findOneByContent(string $content) Return the first ChildMultiLang filtered by the content column
 * @method     ChildMultiLang findOneBySource(string $source) Return the first ChildMultiLang filtered by the source column
 *
 * @method     array findById(int $id) Return ChildMultiLang objects filtered by the id column
 * @method     array findByForeignId(int $foreign_id) Return ChildMultiLang objects filtered by the foreign_id column
 * @method     array findByModel(string $model) Return ChildMultiLang objects filtered by the model column
 * @method     array findByLocale(int $locale) Return ChildMultiLang objects filtered by the locale column
 * @method     array findByField(string $field) Return ChildMultiLang objects filtered by the field column
 * @method     array findByContent(string $content) Return ChildMultiLang objects filtered by the content column
 * @method     array findBySource(string $source) Return ChildMultiLang objects filtered by the source column
 *
 */
abstract class MultiLangQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \HookCalendar\Model\Base\MultiLangQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'thelia', $modelName = '\\HookCalendar\\Model\\MultiLang', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMultiLangQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMultiLangQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof \HookCalendar\Model\MultiLangQuery) {
            return $criteria;
        }
        $query = new \HookCalendar\Model\MultiLangQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildMultiLang|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MultiLangTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MultiLangTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return   ChildMultiLang A model object, or null if the key is not found
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID, FOREIGN_ID, MODEL, LOCALE, FIELD, CONTENT, SOURCE FROM multi_lang WHERE ID = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            $obj = new ChildMultiLang();
            $obj->hydrate($row);
            MultiLangTableMap::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildMultiLang|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return ChildMultiLangQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MultiLangTableMap::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ChildMultiLangQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MultiLangTableMap::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildMultiLangQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(MultiLangTableMap::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(MultiLangTableMap::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MultiLangTableMap::ID, $id, $comparison);
    }

    /**
     * Filter the query on the foreign_id column
     *
     * Example usage:
     * <code>
     * $query->filterByForeignId(1234); // WHERE foreign_id = 1234
     * $query->filterByForeignId(array(12, 34)); // WHERE foreign_id IN (12, 34)
     * $query->filterByForeignId(array('min' => 12)); // WHERE foreign_id > 12
     * </code>
     *
     * @param     mixed $foreignId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildMultiLangQuery The current query, for fluid interface
     */
    public function filterByForeignId($foreignId = null, $comparison = null)
    {
        if (is_array($foreignId)) {
            $useMinMax = false;
            if (isset($foreignId['min'])) {
                $this->addUsingAlias(MultiLangTableMap::FOREIGN_ID, $foreignId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($foreignId['max'])) {
                $this->addUsingAlias(MultiLangTableMap::FOREIGN_ID, $foreignId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MultiLangTableMap::FOREIGN_ID, $foreignId, $comparison);
    }

    /**
     * Filter the query on the model column
     *
     * Example usage:
     * <code>
     * $query->filterByModel('fooValue');   // WHERE model = 'fooValue'
     * $query->filterByModel('%fooValue%'); // WHERE model LIKE '%fooValue%'
     * </code>
     *
     * @param     string $model The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildMultiLangQuery The current query, for fluid interface
     */
    public function filterByModel($model = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($model)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $model)) {
                $model = str_replace('*', '%', $model);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MultiLangTableMap::MODEL, $model, $comparison);
    }

    /**
     * Filter the query on the locale column
     *
     * Example usage:
     * <code>
     * $query->filterByLocale(1234); // WHERE locale = 1234
     * $query->filterByLocale(array(12, 34)); // WHERE locale IN (12, 34)
     * $query->filterByLocale(array('min' => 12)); // WHERE locale > 12
     * </code>
     *
     * @param     mixed $locale The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildMultiLangQuery The current query, for fluid interface
     */
    public function filterByLocale($locale = null, $comparison = null)
    {
        if (is_array($locale)) {
            $useMinMax = false;
            if (isset($locale['min'])) {
                $this->addUsingAlias(MultiLangTableMap::LOCALE, $locale['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locale['max'])) {
                $this->addUsingAlias(MultiLangTableMap::LOCALE, $locale['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MultiLangTableMap::LOCALE, $locale, $comparison);
    }

    /**
     * Filter the query on the field column
     *
     * Example usage:
     * <code>
     * $query->filterByField('fooValue');   // WHERE field = 'fooValue'
     * $query->filterByField('%fooValue%'); // WHERE field LIKE '%fooValue%'
     * </code>
     *
     * @param     string $field The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildMultiLangQuery The current query, for fluid interface
     */
    public function filterByField($field = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($field)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $field)) {
                $field = str_replace('*', '%', $field);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MultiLangTableMap::FIELD, $field, $comparison);
    }

    /**
     * Filter the query on the content column
     *
     * Example usage:
     * <code>
     * $query->filterByContent('fooValue');   // WHERE content = 'fooValue'
     * $query->filterByContent('%fooValue%'); // WHERE content LIKE '%fooValue%'
     * </code>
     *
     * @param     string $content The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildMultiLangQuery The current query, for fluid interface
     */
    public function filterByContent($content = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($content)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $content)) {
                $content = str_replace('*', '%', $content);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MultiLangTableMap::CONTENT, $content, $comparison);
    }

    /**
     * Filter the query on the source column
     *
     * Example usage:
     * <code>
     * $query->filterBySource('fooValue');   // WHERE source = 'fooValue'
     * $query->filterBySource('%fooValue%'); // WHERE source LIKE '%fooValue%'
     * </code>
     *
     * @param     string $source The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildMultiLangQuery The current query, for fluid interface
     */
    public function filterBySource($source = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($source)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $source)) {
                $source = str_replace('*', '%', $source);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MultiLangTableMap::SOURCE, $source, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildMultiLang $multiLang Object to remove from the list of results
     *
     * @return ChildMultiLangQuery The current query, for fluid interface
     */
    public function prune($multiLang = null)
    {
        if ($multiLang) {
            $this->addUsingAlias(MultiLangTableMap::ID, $multiLang->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the multi_lang table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MultiLangTableMap::DATABASE_NAME);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MultiLangTableMap::clearInstancePool();
            MultiLangTableMap::clearRelatedInstancePool();

            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $affectedRows;
    }

    /**
     * Performs a DELETE on the database, given a ChildMultiLang or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ChildMultiLang object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
     public function delete(ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MultiLangTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MultiLangTableMap::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();


        MultiLangTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MultiLangTableMap::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

} // MultiLangQuery
