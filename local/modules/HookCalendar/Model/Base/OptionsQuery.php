<?php

namespace HookCalendar\Model\Base;

use \Exception;
use \PDO;
use HookCalendar\Model\Options as ChildOptions;
use HookCalendar\Model\OptionsQuery as ChildOptionsQuery;
use HookCalendar\Model\Map\OptionsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'options' table.
 *
 *
 *
 * @method     ChildOptionsQuery orderByForeignId($order = Criteria::ASC) Order by the foreign_id column
 * @method     ChildOptionsQuery orderByKey($order = Criteria::ASC) Order by the key column
 * @method     ChildOptionsQuery orderByTabId($order = Criteria::ASC) Order by the tab_id column
 * @method     ChildOptionsQuery orderByValue($order = Criteria::ASC) Order by the value column
 * @method     ChildOptionsQuery orderByLabel($order = Criteria::ASC) Order by the label column
 * @method     ChildOptionsQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildOptionsQuery orderByOrder($order = Criteria::ASC) Order by the order column
 * @method     ChildOptionsQuery orderByIsVisible($order = Criteria::ASC) Order by the is_visible column
 * @method     ChildOptionsQuery orderByStyle($order = Criteria::ASC) Order by the style column
 *
 * @method     ChildOptionsQuery groupByForeignId() Group by the foreign_id column
 * @method     ChildOptionsQuery groupByKey() Group by the key column
 * @method     ChildOptionsQuery groupByTabId() Group by the tab_id column
 * @method     ChildOptionsQuery groupByValue() Group by the value column
 * @method     ChildOptionsQuery groupByLabel() Group by the label column
 * @method     ChildOptionsQuery groupByType() Group by the type column
 * @method     ChildOptionsQuery groupByOrder() Group by the order column
 * @method     ChildOptionsQuery groupByIsVisible() Group by the is_visible column
 * @method     ChildOptionsQuery groupByStyle() Group by the style column
 *
 * @method     ChildOptionsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOptionsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOptionsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOptions findOne(ConnectionInterface $con = null) Return the first ChildOptions matching the query
 * @method     ChildOptions findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOptions matching the query, or a new ChildOptions object populated from the query conditions when no match is found
 *
 * @method     ChildOptions findOneByForeignId(int $foreign_id) Return the first ChildOptions filtered by the foreign_id column
 * @method     ChildOptions findOneByKey(string $key) Return the first ChildOptions filtered by the key column
 * @method     ChildOptions findOneByTabId(int $tab_id) Return the first ChildOptions filtered by the tab_id column
 * @method     ChildOptions findOneByValue(string $value) Return the first ChildOptions filtered by the value column
 * @method     ChildOptions findOneByLabel(string $label) Return the first ChildOptions filtered by the label column
 * @method     ChildOptions findOneByType(string $type) Return the first ChildOptions filtered by the type column
 * @method     ChildOptions findOneByOrder(int $order) Return the first ChildOptions filtered by the order column
 * @method     ChildOptions findOneByIsVisible(boolean $is_visible) Return the first ChildOptions filtered by the is_visible column
 * @method     ChildOptions findOneByStyle(string $style) Return the first ChildOptions filtered by the style column
 *
 * @method     array findByForeignId(int $foreign_id) Return ChildOptions objects filtered by the foreign_id column
 * @method     array findByKey(string $key) Return ChildOptions objects filtered by the key column
 * @method     array findByTabId(int $tab_id) Return ChildOptions objects filtered by the tab_id column
 * @method     array findByValue(string $value) Return ChildOptions objects filtered by the value column
 * @method     array findByLabel(string $label) Return ChildOptions objects filtered by the label column
 * @method     array findByType(string $type) Return ChildOptions objects filtered by the type column
 * @method     array findByOrder(int $order) Return ChildOptions objects filtered by the order column
 * @method     array findByIsVisible(boolean $is_visible) Return ChildOptions objects filtered by the is_visible column
 * @method     array findByStyle(string $style) Return ChildOptions objects filtered by the style column
 *
 */
abstract class OptionsQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \HookCalendar\Model\Base\OptionsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'thelia', $modelName = '\\HookCalendar\\Model\\Options', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOptionsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOptionsQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof \HookCalendar\Model\OptionsQuery) {
            return $criteria;
        }
        $query = new \HookCalendar\Model\OptionsQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$foreign_id, $key] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildOptions|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = OptionsTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OptionsTableMap::DATABASE_NAME);
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
     * @return   ChildOptions A model object, or null if the key is not found
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT FOREIGN_ID, KEY, TAB_ID, VALUE, LABEL, TYPE, ORDER, IS_VISIBLE, STYLE FROM options WHERE FOREIGN_ID = :p0 AND KEY = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            $obj = new ChildOptions();
            $obj->hydrate($row);
            OptionsTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ChildOptions|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
     * @return ChildOptionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(OptionsTableMap::FOREIGN_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(OptionsTableMap::KEY, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ChildOptionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(OptionsTableMap::FOREIGN_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(OptionsTableMap::KEY, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @return ChildOptionsQuery The current query, for fluid interface
     */
    public function filterByForeignId($foreignId = null, $comparison = null)
    {
        if (is_array($foreignId)) {
            $useMinMax = false;
            if (isset($foreignId['min'])) {
                $this->addUsingAlias(OptionsTableMap::FOREIGN_ID, $foreignId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($foreignId['max'])) {
                $this->addUsingAlias(OptionsTableMap::FOREIGN_ID, $foreignId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OptionsTableMap::FOREIGN_ID, $foreignId, $comparison);
    }

    /**
     * Filter the query on the key column
     *
     * Example usage:
     * <code>
     * $query->filterByKey('fooValue');   // WHERE key = 'fooValue'
     * $query->filterByKey('%fooValue%'); // WHERE key LIKE '%fooValue%'
     * </code>
     *
     * @param     string $key The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildOptionsQuery The current query, for fluid interface
     */
    public function filterByKey($key = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($key)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $key)) {
                $key = str_replace('*', '%', $key);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OptionsTableMap::KEY, $key, $comparison);
    }

    /**
     * Filter the query on the tab_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTabId(1234); // WHERE tab_id = 1234
     * $query->filterByTabId(array(12, 34)); // WHERE tab_id IN (12, 34)
     * $query->filterByTabId(array('min' => 12)); // WHERE tab_id > 12
     * </code>
     *
     * @param     mixed $tabId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildOptionsQuery The current query, for fluid interface
     */
    public function filterByTabId($tabId = null, $comparison = null)
    {
        if (is_array($tabId)) {
            $useMinMax = false;
            if (isset($tabId['min'])) {
                $this->addUsingAlias(OptionsTableMap::TAB_ID, $tabId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tabId['max'])) {
                $this->addUsingAlias(OptionsTableMap::TAB_ID, $tabId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OptionsTableMap::TAB_ID, $tabId, $comparison);
    }

    /**
     * Filter the query on the value column
     *
     * Example usage:
     * <code>
     * $query->filterByValue('fooValue');   // WHERE value = 'fooValue'
     * $query->filterByValue('%fooValue%'); // WHERE value LIKE '%fooValue%'
     * </code>
     *
     * @param     string $value The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildOptionsQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($value)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $value)) {
                $value = str_replace('*', '%', $value);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OptionsTableMap::VALUE, $value, $comparison);
    }

    /**
     * Filter the query on the label column
     *
     * Example usage:
     * <code>
     * $query->filterByLabel('fooValue');   // WHERE label = 'fooValue'
     * $query->filterByLabel('%fooValue%'); // WHERE label LIKE '%fooValue%'
     * </code>
     *
     * @param     string $label The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildOptionsQuery The current query, for fluid interface
     */
    public function filterByLabel($label = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($label)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $label)) {
                $label = str_replace('*', '%', $label);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OptionsTableMap::LABEL, $label, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
     * $query->filterByType('%fooValue%'); // WHERE type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $type The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildOptionsQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $type)) {
                $type = str_replace('*', '%', $type);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OptionsTableMap::TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the order column
     *
     * Example usage:
     * <code>
     * $query->filterByOrder(1234); // WHERE order = 1234
     * $query->filterByOrder(array(12, 34)); // WHERE order IN (12, 34)
     * $query->filterByOrder(array('min' => 12)); // WHERE order > 12
     * </code>
     *
     * @param     mixed $order The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildOptionsQuery The current query, for fluid interface
     */
    public function filterByOrder($order = null, $comparison = null)
    {
        if (is_array($order)) {
            $useMinMax = false;
            if (isset($order['min'])) {
                $this->addUsingAlias(OptionsTableMap::ORDER, $order['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($order['max'])) {
                $this->addUsingAlias(OptionsTableMap::ORDER, $order['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OptionsTableMap::ORDER, $order, $comparison);
    }

    /**
     * Filter the query on the is_visible column
     *
     * Example usage:
     * <code>
     * $query->filterByIsVisible(true); // WHERE is_visible = true
     * $query->filterByIsVisible('yes'); // WHERE is_visible = true
     * </code>
     *
     * @param     boolean|string $isVisible The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildOptionsQuery The current query, for fluid interface
     */
    public function filterByIsVisible($isVisible = null, $comparison = null)
    {
        if (is_string($isVisible)) {
            $is_visible = in_array(strtolower($isVisible), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OptionsTableMap::IS_VISIBLE, $isVisible, $comparison);
    }

    /**
     * Filter the query on the style column
     *
     * Example usage:
     * <code>
     * $query->filterByStyle('fooValue');   // WHERE style = 'fooValue'
     * $query->filterByStyle('%fooValue%'); // WHERE style LIKE '%fooValue%'
     * </code>
     *
     * @param     string $style The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildOptionsQuery The current query, for fluid interface
     */
    public function filterByStyle($style = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($style)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $style)) {
                $style = str_replace('*', '%', $style);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OptionsTableMap::STYLE, $style, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOptions $options Object to remove from the list of results
     *
     * @return ChildOptionsQuery The current query, for fluid interface
     */
    public function prune($options = null)
    {
        if ($options) {
            $this->addCond('pruneCond0', $this->getAliasedColName(OptionsTableMap::FOREIGN_ID), $options->getForeignId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(OptionsTableMap::KEY), $options->getKey(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the options table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OptionsTableMap::DATABASE_NAME);
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
            OptionsTableMap::clearInstancePool();
            OptionsTableMap::clearRelatedInstancePool();

            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $affectedRows;
    }

    /**
     * Performs a DELETE on the database, given a ChildOptions or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ChildOptions object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OptionsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OptionsTableMap::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();


        OptionsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OptionsTableMap::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

} // OptionsQuery
