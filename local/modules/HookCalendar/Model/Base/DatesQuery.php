<?php

namespace HookCalendar\Model\Base;

use \Exception;
use \PDO;
use HookCalendar\Model\Dates as ChildDates;
use HookCalendar\Model\DatesQuery as ChildDatesQuery;
use HookCalendar\Model\Map\DatesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'dates' table.
 *
 *
 *
 * @method     ChildDatesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildDatesQuery orderByForeignId($order = Criteria::ASC) Order by the foreign_id column
 * @method     ChildDatesQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildDatesQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildDatesQuery orderByStartTime($order = Criteria::ASC) Order by the start_time column
 * @method     ChildDatesQuery orderByEndTime($order = Criteria::ASC) Order by the end_time column
 * @method     ChildDatesQuery orderByStartLunch($order = Criteria::ASC) Order by the start_lunch column
 * @method     ChildDatesQuery orderByEndLunch($order = Criteria::ASC) Order by the end_lunch column
 * @method     ChildDatesQuery orderByIsDayoff($order = Criteria::ASC) Order by the is_dayoff column
 *
 * @method     ChildDatesQuery groupById() Group by the id column
 * @method     ChildDatesQuery groupByForeignId() Group by the foreign_id column
 * @method     ChildDatesQuery groupByType() Group by the type column
 * @method     ChildDatesQuery groupByDate() Group by the date column
 * @method     ChildDatesQuery groupByStartTime() Group by the start_time column
 * @method     ChildDatesQuery groupByEndTime() Group by the end_time column
 * @method     ChildDatesQuery groupByStartLunch() Group by the start_lunch column
 * @method     ChildDatesQuery groupByEndLunch() Group by the end_lunch column
 * @method     ChildDatesQuery groupByIsDayoff() Group by the is_dayoff column
 *
 * @method     ChildDatesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDatesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDatesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDates findOne(ConnectionInterface $con = null) Return the first ChildDates matching the query
 * @method     ChildDates findOneOrCreate(ConnectionInterface $con = null) Return the first ChildDates matching the query, or a new ChildDates object populated from the query conditions when no match is found
 *
 * @method     ChildDates findOneById(int $id) Return the first ChildDates filtered by the id column
 * @method     ChildDates findOneByForeignId(int $foreign_id) Return the first ChildDates filtered by the foreign_id column
 * @method     ChildDates findOneByType(string $type) Return the first ChildDates filtered by the type column
 * @method     ChildDates findOneByDate(string $date) Return the first ChildDates filtered by the date column
 * @method     ChildDates findOneByStartTime(string $start_time) Return the first ChildDates filtered by the start_time column
 * @method     ChildDates findOneByEndTime(string $end_time) Return the first ChildDates filtered by the end_time column
 * @method     ChildDates findOneByStartLunch(string $start_lunch) Return the first ChildDates filtered by the start_lunch column
 * @method     ChildDates findOneByEndLunch(string $end_lunch) Return the first ChildDates filtered by the end_lunch column
 * @method     ChildDates findOneByIsDayoff(string $is_dayoff) Return the first ChildDates filtered by the is_dayoff column
 *
 * @method     array findById(int $id) Return ChildDates objects filtered by the id column
 * @method     array findByForeignId(int $foreign_id) Return ChildDates objects filtered by the foreign_id column
 * @method     array findByType(string $type) Return ChildDates objects filtered by the type column
 * @method     array findByDate(string $date) Return ChildDates objects filtered by the date column
 * @method     array findByStartTime(string $start_time) Return ChildDates objects filtered by the start_time column
 * @method     array findByEndTime(string $end_time) Return ChildDates objects filtered by the end_time column
 * @method     array findByStartLunch(string $start_lunch) Return ChildDates objects filtered by the start_lunch column
 * @method     array findByEndLunch(string $end_lunch) Return ChildDates objects filtered by the end_lunch column
 * @method     array findByIsDayoff(string $is_dayoff) Return ChildDates objects filtered by the is_dayoff column
 *
 */
abstract class DatesQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \HookCalendar\Model\Base\DatesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'thelia', $modelName = '\\HookCalendar\\Model\\Dates', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDatesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDatesQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof \HookCalendar\Model\DatesQuery) {
            return $criteria;
        }
        $query = new \HookCalendar\Model\DatesQuery();
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
     * @return ChildDates|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DatesTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(DatesTableMap::DATABASE_NAME);
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
     * @return   ChildDates A model object, or null if the key is not found
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID, FOREIGN_ID, TYPE, DATE, START_TIME, END_TIME, START_LUNCH, END_LUNCH, IS_DAYOFF FROM dates WHERE ID = :p0';
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
            $obj = new ChildDates();
            $obj->hydrate($row);
            DatesTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildDates|array|mixed the result, formatted by the current formatter
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
     * @return ChildDatesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DatesTableMap::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ChildDatesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DatesTableMap::ID, $keys, Criteria::IN);
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
     * @return ChildDatesQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(DatesTableMap::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(DatesTableMap::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DatesTableMap::ID, $id, $comparison);
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
     * @return ChildDatesQuery The current query, for fluid interface
     */
    public function filterByForeignId($foreignId = null, $comparison = null)
    {
        if (is_array($foreignId)) {
            $useMinMax = false;
            if (isset($foreignId['min'])) {
                $this->addUsingAlias(DatesTableMap::FOREIGN_ID, $foreignId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($foreignId['max'])) {
                $this->addUsingAlias(DatesTableMap::FOREIGN_ID, $foreignId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DatesTableMap::FOREIGN_ID, $foreignId, $comparison);
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
     * @return ChildDatesQuery The current query, for fluid interface
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

        return $this->addUsingAlias(DatesTableMap::TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate('2011-03-14'); // WHERE date = '2011-03-14'
     * $query->filterByDate('now'); // WHERE date = '2011-03-14'
     * $query->filterByDate(array('max' => 'yesterday')); // WHERE date > '2011-03-13'
     * </code>
     *
     * @param     mixed $date The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildDatesQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(DatesTableMap::DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(DatesTableMap::DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DatesTableMap::DATE, $date, $comparison);
    }

    /**
     * Filter the query on the start_time column
     *
     * Example usage:
     * <code>
     * $query->filterByStartTime('2011-03-14'); // WHERE start_time = '2011-03-14'
     * $query->filterByStartTime('now'); // WHERE start_time = '2011-03-14'
     * $query->filterByStartTime(array('max' => 'yesterday')); // WHERE start_time > '2011-03-13'
     * </code>
     *
     * @param     mixed $startTime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildDatesQuery The current query, for fluid interface
     */
    public function filterByStartTime($startTime = null, $comparison = null)
    {
        if (is_array($startTime)) {
            $useMinMax = false;
            if (isset($startTime['min'])) {
                $this->addUsingAlias(DatesTableMap::START_TIME, $startTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($startTime['max'])) {
                $this->addUsingAlias(DatesTableMap::START_TIME, $startTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DatesTableMap::START_TIME, $startTime, $comparison);
    }

    /**
     * Filter the query on the end_time column
     *
     * Example usage:
     * <code>
     * $query->filterByEndTime('2011-03-14'); // WHERE end_time = '2011-03-14'
     * $query->filterByEndTime('now'); // WHERE end_time = '2011-03-14'
     * $query->filterByEndTime(array('max' => 'yesterday')); // WHERE end_time > '2011-03-13'
     * </code>
     *
     * @param     mixed $endTime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildDatesQuery The current query, for fluid interface
     */
    public function filterByEndTime($endTime = null, $comparison = null)
    {
        if (is_array($endTime)) {
            $useMinMax = false;
            if (isset($endTime['min'])) {
                $this->addUsingAlias(DatesTableMap::END_TIME, $endTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($endTime['max'])) {
                $this->addUsingAlias(DatesTableMap::END_TIME, $endTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DatesTableMap::END_TIME, $endTime, $comparison);
    }

    /**
     * Filter the query on the start_lunch column
     *
     * Example usage:
     * <code>
     * $query->filterByStartLunch('2011-03-14'); // WHERE start_lunch = '2011-03-14'
     * $query->filterByStartLunch('now'); // WHERE start_lunch = '2011-03-14'
     * $query->filterByStartLunch(array('max' => 'yesterday')); // WHERE start_lunch > '2011-03-13'
     * </code>
     *
     * @param     mixed $startLunch The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildDatesQuery The current query, for fluid interface
     */
    public function filterByStartLunch($startLunch = null, $comparison = null)
    {
        if (is_array($startLunch)) {
            $useMinMax = false;
            if (isset($startLunch['min'])) {
                $this->addUsingAlias(DatesTableMap::START_LUNCH, $startLunch['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($startLunch['max'])) {
                $this->addUsingAlias(DatesTableMap::START_LUNCH, $startLunch['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DatesTableMap::START_LUNCH, $startLunch, $comparison);
    }

    /**
     * Filter the query on the end_lunch column
     *
     * Example usage:
     * <code>
     * $query->filterByEndLunch('2011-03-14'); // WHERE end_lunch = '2011-03-14'
     * $query->filterByEndLunch('now'); // WHERE end_lunch = '2011-03-14'
     * $query->filterByEndLunch(array('max' => 'yesterday')); // WHERE end_lunch > '2011-03-13'
     * </code>
     *
     * @param     mixed $endLunch The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildDatesQuery The current query, for fluid interface
     */
    public function filterByEndLunch($endLunch = null, $comparison = null)
    {
        if (is_array($endLunch)) {
            $useMinMax = false;
            if (isset($endLunch['min'])) {
                $this->addUsingAlias(DatesTableMap::END_LUNCH, $endLunch['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($endLunch['max'])) {
                $this->addUsingAlias(DatesTableMap::END_LUNCH, $endLunch['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DatesTableMap::END_LUNCH, $endLunch, $comparison);
    }

    /**
     * Filter the query on the is_dayoff column
     *
     * Example usage:
     * <code>
     * $query->filterByIsDayoff('fooValue');   // WHERE is_dayoff = 'fooValue'
     * $query->filterByIsDayoff('%fooValue%'); // WHERE is_dayoff LIKE '%fooValue%'
     * </code>
     *
     * @param     string $isDayoff The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildDatesQuery The current query, for fluid interface
     */
    public function filterByIsDayoff($isDayoff = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($isDayoff)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $isDayoff)) {
                $isDayoff = str_replace('*', '%', $isDayoff);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DatesTableMap::IS_DAYOFF, $isDayoff, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildDates $dates Object to remove from the list of results
     *
     * @return ChildDatesQuery The current query, for fluid interface
     */
    public function prune($dates = null)
    {
        if ($dates) {
            $this->addUsingAlias(DatesTableMap::ID, $dates->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the dates table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DatesTableMap::DATABASE_NAME);
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
            DatesTableMap::clearInstancePool();
            DatesTableMap::clearRelatedInstancePool();

            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $affectedRows;
    }

    /**
     * Performs a DELETE on the database, given a ChildDates or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ChildDates object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(DatesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DatesTableMap::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();


        DatesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            DatesTableMap::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

} // DatesQuery
