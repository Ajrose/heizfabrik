<?php

namespace HookCalendar\Model\Base;

use \Exception;
use \PDO;
use HookCalendar\Model\Services as ChildServices;
use HookCalendar\Model\ServicesQuery as ChildServicesQuery;
use HookCalendar\Model\Map\ServicesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'services' table.
 *
 *
 *
 * @method     ChildServicesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildServicesQuery orderByCalendarId($order = Criteria::ASC) Order by the calendar_id column
 * @method     ChildServicesQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildServicesQuery orderByLength($order = Criteria::ASC) Order by the length column
 * @method     ChildServicesQuery orderByBefore($order = Criteria::ASC) Order by the before column
 * @method     ChildServicesQuery orderByAfter($order = Criteria::ASC) Order by the after column
 * @method     ChildServicesQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildServicesQuery orderByImage($order = Criteria::ASC) Order by the image column
 * @method     ChildServicesQuery orderByIsActive($order = Criteria::ASC) Order by the is_active column
 *
 * @method     ChildServicesQuery groupById() Group by the id column
 * @method     ChildServicesQuery groupByCalendarId() Group by the calendar_id column
 * @method     ChildServicesQuery groupByPrice() Group by the price column
 * @method     ChildServicesQuery groupByLength() Group by the length column
 * @method     ChildServicesQuery groupByBefore() Group by the before column
 * @method     ChildServicesQuery groupByAfter() Group by the after column
 * @method     ChildServicesQuery groupByTotal() Group by the total column
 * @method     ChildServicesQuery groupByImage() Group by the image column
 * @method     ChildServicesQuery groupByIsActive() Group by the is_active column
 *
 * @method     ChildServicesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildServicesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildServicesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildServices findOne(ConnectionInterface $con = null) Return the first ChildServices matching the query
 * @method     ChildServices findOneOrCreate(ConnectionInterface $con = null) Return the first ChildServices matching the query, or a new ChildServices object populated from the query conditions when no match is found
 *
 * @method     ChildServices findOneById(int $id) Return the first ChildServices filtered by the id column
 * @method     ChildServices findOneByCalendarId(int $calendar_id) Return the first ChildServices filtered by the calendar_id column
 * @method     ChildServices findOneByPrice(string $price) Return the first ChildServices filtered by the price column
 * @method     ChildServices findOneByLength(int $length) Return the first ChildServices filtered by the length column
 * @method     ChildServices findOneByBefore(int $before) Return the first ChildServices filtered by the before column
 * @method     ChildServices findOneByAfter(int $after) Return the first ChildServices filtered by the after column
 * @method     ChildServices findOneByTotal(int $total) Return the first ChildServices filtered by the total column
 * @method     ChildServices findOneByImage(string $image) Return the first ChildServices filtered by the image column
 * @method     ChildServices findOneByIsActive(boolean $is_active) Return the first ChildServices filtered by the is_active column
 *
 * @method     array findById(int $id) Return ChildServices objects filtered by the id column
 * @method     array findByCalendarId(int $calendar_id) Return ChildServices objects filtered by the calendar_id column
 * @method     array findByPrice(string $price) Return ChildServices objects filtered by the price column
 * @method     array findByLength(int $length) Return ChildServices objects filtered by the length column
 * @method     array findByBefore(int $before) Return ChildServices objects filtered by the before column
 * @method     array findByAfter(int $after) Return ChildServices objects filtered by the after column
 * @method     array findByTotal(int $total) Return ChildServices objects filtered by the total column
 * @method     array findByImage(string $image) Return ChildServices objects filtered by the image column
 * @method     array findByIsActive(boolean $is_active) Return ChildServices objects filtered by the is_active column
 *
 */
abstract class ServicesQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \HookCalendar\Model\Base\ServicesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'thelia', $modelName = '\\HookCalendar\\Model\\Services', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildServicesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildServicesQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof \HookCalendar\Model\ServicesQuery) {
            return $criteria;
        }
        $query = new \HookCalendar\Model\ServicesQuery();
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
     * @return ChildServices|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ServicesTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ServicesTableMap::DATABASE_NAME);
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
     * @return   ChildServices A model object, or null if the key is not found
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID, CALENDAR_ID, PRICE, LENGTH, BEFORE, AFTER, TOTAL, IMAGE, IS_ACTIVE FROM services WHERE ID = :p0';
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
            $obj = new ChildServices();
            $obj->hydrate($row);
            ServicesTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildServices|array|mixed the result, formatted by the current formatter
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
     * @return ChildServicesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ServicesTableMap::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ChildServicesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ServicesTableMap::ID, $keys, Criteria::IN);
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
     * @return ChildServicesQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ServicesTableMap::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ServicesTableMap::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ServicesTableMap::ID, $id, $comparison);
    }

    /**
     * Filter the query on the calendar_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCalendarId(1234); // WHERE calendar_id = 1234
     * $query->filterByCalendarId(array(12, 34)); // WHERE calendar_id IN (12, 34)
     * $query->filterByCalendarId(array('min' => 12)); // WHERE calendar_id > 12
     * </code>
     *
     * @param     mixed $calendarId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildServicesQuery The current query, for fluid interface
     */
    public function filterByCalendarId($calendarId = null, $comparison = null)
    {
        if (is_array($calendarId)) {
            $useMinMax = false;
            if (isset($calendarId['min'])) {
                $this->addUsingAlias(ServicesTableMap::CALENDAR_ID, $calendarId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($calendarId['max'])) {
                $this->addUsingAlias(ServicesTableMap::CALENDAR_ID, $calendarId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ServicesTableMap::CALENDAR_ID, $calendarId, $comparison);
    }

    /**
     * Filter the query on the price column
     *
     * Example usage:
     * <code>
     * $query->filterByPrice(1234); // WHERE price = 1234
     * $query->filterByPrice(array(12, 34)); // WHERE price IN (12, 34)
     * $query->filterByPrice(array('min' => 12)); // WHERE price > 12
     * </code>
     *
     * @param     mixed $price The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildServicesQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(ServicesTableMap::PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(ServicesTableMap::PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ServicesTableMap::PRICE, $price, $comparison);
    }

    /**
     * Filter the query on the length column
     *
     * Example usage:
     * <code>
     * $query->filterByLength(1234); // WHERE length = 1234
     * $query->filterByLength(array(12, 34)); // WHERE length IN (12, 34)
     * $query->filterByLength(array('min' => 12)); // WHERE length > 12
     * </code>
     *
     * @param     mixed $length The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildServicesQuery The current query, for fluid interface
     */
    public function filterByLength($length = null, $comparison = null)
    {
        if (is_array($length)) {
            $useMinMax = false;
            if (isset($length['min'])) {
                $this->addUsingAlias(ServicesTableMap::LENGTH, $length['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($length['max'])) {
                $this->addUsingAlias(ServicesTableMap::LENGTH, $length['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ServicesTableMap::LENGTH, $length, $comparison);
    }

    /**
     * Filter the query on the before column
     *
     * Example usage:
     * <code>
     * $query->filterByBefore(1234); // WHERE before = 1234
     * $query->filterByBefore(array(12, 34)); // WHERE before IN (12, 34)
     * $query->filterByBefore(array('min' => 12)); // WHERE before > 12
     * </code>
     *
     * @param     mixed $before The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildServicesQuery The current query, for fluid interface
     */
    public function filterByBefore($before = null, $comparison = null)
    {
        if (is_array($before)) {
            $useMinMax = false;
            if (isset($before['min'])) {
                $this->addUsingAlias(ServicesTableMap::BEFORE, $before['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($before['max'])) {
                $this->addUsingAlias(ServicesTableMap::BEFORE, $before['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ServicesTableMap::BEFORE, $before, $comparison);
    }

    /**
     * Filter the query on the after column
     *
     * Example usage:
     * <code>
     * $query->filterByAfter(1234); // WHERE after = 1234
     * $query->filterByAfter(array(12, 34)); // WHERE after IN (12, 34)
     * $query->filterByAfter(array('min' => 12)); // WHERE after > 12
     * </code>
     *
     * @param     mixed $after The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildServicesQuery The current query, for fluid interface
     */
    public function filterByAfter($after = null, $comparison = null)
    {
        if (is_array($after)) {
            $useMinMax = false;
            if (isset($after['min'])) {
                $this->addUsingAlias(ServicesTableMap::AFTER, $after['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($after['max'])) {
                $this->addUsingAlias(ServicesTableMap::AFTER, $after['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ServicesTableMap::AFTER, $after, $comparison);
    }

    /**
     * Filter the query on the total column
     *
     * Example usage:
     * <code>
     * $query->filterByTotal(1234); // WHERE total = 1234
     * $query->filterByTotal(array(12, 34)); // WHERE total IN (12, 34)
     * $query->filterByTotal(array('min' => 12)); // WHERE total > 12
     * </code>
     *
     * @param     mixed $total The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildServicesQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(ServicesTableMap::TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(ServicesTableMap::TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ServicesTableMap::TOTAL, $total, $comparison);
    }

    /**
     * Filter the query on the image column
     *
     * Example usage:
     * <code>
     * $query->filterByImage('fooValue');   // WHERE image = 'fooValue'
     * $query->filterByImage('%fooValue%'); // WHERE image LIKE '%fooValue%'
     * </code>
     *
     * @param     string $image The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildServicesQuery The current query, for fluid interface
     */
    public function filterByImage($image = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($image)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $image)) {
                $image = str_replace('*', '%', $image);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ServicesTableMap::IMAGE, $image, $comparison);
    }

    /**
     * Filter the query on the is_active column
     *
     * Example usage:
     * <code>
     * $query->filterByIsActive(true); // WHERE is_active = true
     * $query->filterByIsActive('yes'); // WHERE is_active = true
     * </code>
     *
     * @param     boolean|string $isActive The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildServicesQuery The current query, for fluid interface
     */
    public function filterByIsActive($isActive = null, $comparison = null)
    {
        if (is_string($isActive)) {
            $is_active = in_array(strtolower($isActive), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ServicesTableMap::IS_ACTIVE, $isActive, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildServices $services Object to remove from the list of results
     *
     * @return ChildServicesQuery The current query, for fluid interface
     */
    public function prune($services = null)
    {
        if ($services) {
            $this->addUsingAlias(ServicesTableMap::ID, $services->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the services table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ServicesTableMap::DATABASE_NAME);
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
            ServicesTableMap::clearInstancePool();
            ServicesTableMap::clearRelatedInstancePool();

            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $affectedRows;
    }

    /**
     * Performs a DELETE on the database, given a ChildServices or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ChildServices object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ServicesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ServicesTableMap::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();


        ServicesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ServicesTableMap::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

} // ServicesQuery
