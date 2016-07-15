<?php

namespace HookCalendar\Model\Base;

use \Exception;
use \PDO;
use HookCalendar\Model\BookingsServices as ChildBookingsServices;
use HookCalendar\Model\BookingsServicesQuery as ChildBookingsServicesQuery;
use HookCalendar\Model\Map\BookingsServicesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'bookings_services' table.
 *
 *
 *
 * @method     ChildBookingsServicesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildBookingsServicesQuery orderByTmpHash($order = Criteria::ASC) Order by the tmp_hash column
 * @method     ChildBookingsServicesQuery orderByBookingId($order = Criteria::ASC) Order by the booking_id column
 * @method     ChildBookingsServicesQuery orderByServiceId($order = Criteria::ASC) Order by the service_id column
 * @method     ChildBookingsServicesQuery orderByEmployeeId($order = Criteria::ASC) Order by the employee_id column
 * @method     ChildBookingsServicesQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildBookingsServicesQuery orderByStart($order = Criteria::ASC) Order by the start column
 * @method     ChildBookingsServicesQuery orderByStartTs($order = Criteria::ASC) Order by the start_ts column
 * @method     ChildBookingsServicesQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildBookingsServicesQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildBookingsServicesQuery orderByReminderEmail($order = Criteria::ASC) Order by the reminder_email column
 * @method     ChildBookingsServicesQuery orderByReminderSms($order = Criteria::ASC) Order by the reminder_sms column
 *
 * @method     ChildBookingsServicesQuery groupById() Group by the id column
 * @method     ChildBookingsServicesQuery groupByTmpHash() Group by the tmp_hash column
 * @method     ChildBookingsServicesQuery groupByBookingId() Group by the booking_id column
 * @method     ChildBookingsServicesQuery groupByServiceId() Group by the service_id column
 * @method     ChildBookingsServicesQuery groupByEmployeeId() Group by the employee_id column
 * @method     ChildBookingsServicesQuery groupByDate() Group by the date column
 * @method     ChildBookingsServicesQuery groupByStart() Group by the start column
 * @method     ChildBookingsServicesQuery groupByStartTs() Group by the start_ts column
 * @method     ChildBookingsServicesQuery groupByTotal() Group by the total column
 * @method     ChildBookingsServicesQuery groupByPrice() Group by the price column
 * @method     ChildBookingsServicesQuery groupByReminderEmail() Group by the reminder_email column
 * @method     ChildBookingsServicesQuery groupByReminderSms() Group by the reminder_sms column
 *
 * @method     ChildBookingsServicesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildBookingsServicesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildBookingsServicesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildBookingsServices findOne(ConnectionInterface $con = null) Return the first ChildBookingsServices matching the query
 * @method     ChildBookingsServices findOneOrCreate(ConnectionInterface $con = null) Return the first ChildBookingsServices matching the query, or a new ChildBookingsServices object populated from the query conditions when no match is found
 *
 * @method     ChildBookingsServices findOneById(int $id) Return the first ChildBookingsServices filtered by the id column
 * @method     ChildBookingsServices findOneByTmpHash(string $tmp_hash) Return the first ChildBookingsServices filtered by the tmp_hash column
 * @method     ChildBookingsServices findOneByBookingId(int $booking_id) Return the first ChildBookingsServices filtered by the booking_id column
 * @method     ChildBookingsServices findOneByServiceId(int $service_id) Return the first ChildBookingsServices filtered by the service_id column
 * @method     ChildBookingsServices findOneByEmployeeId(int $employee_id) Return the first ChildBookingsServices filtered by the employee_id column
 * @method     ChildBookingsServices findOneByDate(string $date) Return the first ChildBookingsServices filtered by the date column
 * @method     ChildBookingsServices findOneByStart(string $start) Return the first ChildBookingsServices filtered by the start column
 * @method     ChildBookingsServices findOneByStartTs(int $start_ts) Return the first ChildBookingsServices filtered by the start_ts column
 * @method     ChildBookingsServices findOneByTotal(int $total) Return the first ChildBookingsServices filtered by the total column
 * @method     ChildBookingsServices findOneByPrice(string $price) Return the first ChildBookingsServices filtered by the price column
 * @method     ChildBookingsServices findOneByReminderEmail(boolean $reminder_email) Return the first ChildBookingsServices filtered by the reminder_email column
 * @method     ChildBookingsServices findOneByReminderSms(boolean $reminder_sms) Return the first ChildBookingsServices filtered by the reminder_sms column
 *
 * @method     array findById(int $id) Return ChildBookingsServices objects filtered by the id column
 * @method     array findByTmpHash(string $tmp_hash) Return ChildBookingsServices objects filtered by the tmp_hash column
 * @method     array findByBookingId(int $booking_id) Return ChildBookingsServices objects filtered by the booking_id column
 * @method     array findByServiceId(int $service_id) Return ChildBookingsServices objects filtered by the service_id column
 * @method     array findByEmployeeId(int $employee_id) Return ChildBookingsServices objects filtered by the employee_id column
 * @method     array findByDate(string $date) Return ChildBookingsServices objects filtered by the date column
 * @method     array findByStart(string $start) Return ChildBookingsServices objects filtered by the start column
 * @method     array findByStartTs(int $start_ts) Return ChildBookingsServices objects filtered by the start_ts column
 * @method     array findByTotal(int $total) Return ChildBookingsServices objects filtered by the total column
 * @method     array findByPrice(string $price) Return ChildBookingsServices objects filtered by the price column
 * @method     array findByReminderEmail(boolean $reminder_email) Return ChildBookingsServices objects filtered by the reminder_email column
 * @method     array findByReminderSms(boolean $reminder_sms) Return ChildBookingsServices objects filtered by the reminder_sms column
 *
 */
abstract class BookingsServicesQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \HookCalendar\Model\Base\BookingsServicesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'thelia', $modelName = '\\HookCalendar\\Model\\BookingsServices', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBookingsServicesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBookingsServicesQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof \HookCalendar\Model\BookingsServicesQuery) {
            return $criteria;
        }
        $query = new \HookCalendar\Model\BookingsServicesQuery();
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
     * @return ChildBookingsServices|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BookingsServicesTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(BookingsServicesTableMap::DATABASE_NAME);
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
     * @return   ChildBookingsServices A model object, or null if the key is not found
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID, TMP_HASH, BOOKING_ID, SERVICE_ID, EMPLOYEE_ID, DATE, START, START_TS, TOTAL, PRICE, REMINDER_EMAIL, REMINDER_SMS FROM bookings_services WHERE ID = :p0';
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
            $obj = new ChildBookingsServices();
            $obj->hydrate($row);
            BookingsServicesTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildBookingsServices|array|mixed the result, formatted by the current formatter
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
     * @return ChildBookingsServicesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BookingsServicesTableMap::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ChildBookingsServicesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BookingsServicesTableMap::ID, $keys, Criteria::IN);
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
     * @return ChildBookingsServicesQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(BookingsServicesTableMap::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(BookingsServicesTableMap::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingsServicesTableMap::ID, $id, $comparison);
    }

    /**
     * Filter the query on the tmp_hash column
     *
     * Example usage:
     * <code>
     * $query->filterByTmpHash('fooValue');   // WHERE tmp_hash = 'fooValue'
     * $query->filterByTmpHash('%fooValue%'); // WHERE tmp_hash LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tmpHash The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsServicesQuery The current query, for fluid interface
     */
    public function filterByTmpHash($tmpHash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tmpHash)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tmpHash)) {
                $tmpHash = str_replace('*', '%', $tmpHash);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BookingsServicesTableMap::TMP_HASH, $tmpHash, $comparison);
    }

    /**
     * Filter the query on the booking_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBookingId(1234); // WHERE booking_id = 1234
     * $query->filterByBookingId(array(12, 34)); // WHERE booking_id IN (12, 34)
     * $query->filterByBookingId(array('min' => 12)); // WHERE booking_id > 12
     * </code>
     *
     * @param     mixed $bookingId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsServicesQuery The current query, for fluid interface
     */
    public function filterByBookingId($bookingId = null, $comparison = null)
    {
        if (is_array($bookingId)) {
            $useMinMax = false;
            if (isset($bookingId['min'])) {
                $this->addUsingAlias(BookingsServicesTableMap::BOOKING_ID, $bookingId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bookingId['max'])) {
                $this->addUsingAlias(BookingsServicesTableMap::BOOKING_ID, $bookingId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingsServicesTableMap::BOOKING_ID, $bookingId, $comparison);
    }

    /**
     * Filter the query on the service_id column
     *
     * Example usage:
     * <code>
     * $query->filterByServiceId(1234); // WHERE service_id = 1234
     * $query->filterByServiceId(array(12, 34)); // WHERE service_id IN (12, 34)
     * $query->filterByServiceId(array('min' => 12)); // WHERE service_id > 12
     * </code>
     *
     * @param     mixed $serviceId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsServicesQuery The current query, for fluid interface
     */
    public function filterByServiceId($serviceId = null, $comparison = null)
    {
        if (is_array($serviceId)) {
            $useMinMax = false;
            if (isset($serviceId['min'])) {
                $this->addUsingAlias(BookingsServicesTableMap::SERVICE_ID, $serviceId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($serviceId['max'])) {
                $this->addUsingAlias(BookingsServicesTableMap::SERVICE_ID, $serviceId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingsServicesTableMap::SERVICE_ID, $serviceId, $comparison);
    }

    /**
     * Filter the query on the employee_id column
     *
     * Example usage:
     * <code>
     * $query->filterByEmployeeId(1234); // WHERE employee_id = 1234
     * $query->filterByEmployeeId(array(12, 34)); // WHERE employee_id IN (12, 34)
     * $query->filterByEmployeeId(array('min' => 12)); // WHERE employee_id > 12
     * </code>
     *
     * @param     mixed $employeeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsServicesQuery The current query, for fluid interface
     */
    public function filterByEmployeeId($employeeId = null, $comparison = null)
    {
        if (is_array($employeeId)) {
            $useMinMax = false;
            if (isset($employeeId['min'])) {
                $this->addUsingAlias(BookingsServicesTableMap::EMPLOYEE_ID, $employeeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($employeeId['max'])) {
                $this->addUsingAlias(BookingsServicesTableMap::EMPLOYEE_ID, $employeeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingsServicesTableMap::EMPLOYEE_ID, $employeeId, $comparison);
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
     * @return ChildBookingsServicesQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(BookingsServicesTableMap::DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(BookingsServicesTableMap::DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingsServicesTableMap::DATE, $date, $comparison);
    }

    /**
     * Filter the query on the start column
     *
     * Example usage:
     * <code>
     * $query->filterByStart('2011-03-14'); // WHERE start = '2011-03-14'
     * $query->filterByStart('now'); // WHERE start = '2011-03-14'
     * $query->filterByStart(array('max' => 'yesterday')); // WHERE start > '2011-03-13'
     * </code>
     *
     * @param     mixed $start The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsServicesQuery The current query, for fluid interface
     */
    public function filterByStart($start = null, $comparison = null)
    {
        if (is_array($start)) {
            $useMinMax = false;
            if (isset($start['min'])) {
                $this->addUsingAlias(BookingsServicesTableMap::START, $start['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($start['max'])) {
                $this->addUsingAlias(BookingsServicesTableMap::START, $start['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingsServicesTableMap::START, $start, $comparison);
    }

    /**
     * Filter the query on the start_ts column
     *
     * Example usage:
     * <code>
     * $query->filterByStartTs(1234); // WHERE start_ts = 1234
     * $query->filterByStartTs(array(12, 34)); // WHERE start_ts IN (12, 34)
     * $query->filterByStartTs(array('min' => 12)); // WHERE start_ts > 12
     * </code>
     *
     * @param     mixed $startTs The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsServicesQuery The current query, for fluid interface
     */
    public function filterByStartTs($startTs = null, $comparison = null)
    {
        if (is_array($startTs)) {
            $useMinMax = false;
            if (isset($startTs['min'])) {
                $this->addUsingAlias(BookingsServicesTableMap::START_TS, $startTs['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($startTs['max'])) {
                $this->addUsingAlias(BookingsServicesTableMap::START_TS, $startTs['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingsServicesTableMap::START_TS, $startTs, $comparison);
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
     * @return ChildBookingsServicesQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(BookingsServicesTableMap::TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(BookingsServicesTableMap::TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingsServicesTableMap::TOTAL, $total, $comparison);
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
     * @return ChildBookingsServicesQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(BookingsServicesTableMap::PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(BookingsServicesTableMap::PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingsServicesTableMap::PRICE, $price, $comparison);
    }

    /**
     * Filter the query on the reminder_email column
     *
     * Example usage:
     * <code>
     * $query->filterByReminderEmail(true); // WHERE reminder_email = true
     * $query->filterByReminderEmail('yes'); // WHERE reminder_email = true
     * </code>
     *
     * @param     boolean|string $reminderEmail The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsServicesQuery The current query, for fluid interface
     */
    public function filterByReminderEmail($reminderEmail = null, $comparison = null)
    {
        if (is_string($reminderEmail)) {
            $reminder_email = in_array(strtolower($reminderEmail), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(BookingsServicesTableMap::REMINDER_EMAIL, $reminderEmail, $comparison);
    }

    /**
     * Filter the query on the reminder_sms column
     *
     * Example usage:
     * <code>
     * $query->filterByReminderSms(true); // WHERE reminder_sms = true
     * $query->filterByReminderSms('yes'); // WHERE reminder_sms = true
     * </code>
     *
     * @param     boolean|string $reminderSms The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsServicesQuery The current query, for fluid interface
     */
    public function filterByReminderSms($reminderSms = null, $comparison = null)
    {
        if (is_string($reminderSms)) {
            $reminder_sms = in_array(strtolower($reminderSms), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(BookingsServicesTableMap::REMINDER_SMS, $reminderSms, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildBookingsServices $bookingsServices Object to remove from the list of results
     *
     * @return ChildBookingsServicesQuery The current query, for fluid interface
     */
    public function prune($bookingsServices = null)
    {
        if ($bookingsServices) {
            $this->addUsingAlias(BookingsServicesTableMap::ID, $bookingsServices->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the bookings_services table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BookingsServicesTableMap::DATABASE_NAME);
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
            BookingsServicesTableMap::clearInstancePool();
            BookingsServicesTableMap::clearRelatedInstancePool();

            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $affectedRows;
    }

    /**
     * Performs a DELETE on the database, given a ChildBookingsServices or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ChildBookingsServices object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(BookingsServicesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(BookingsServicesTableMap::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();


        BookingsServicesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            BookingsServicesTableMap::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

} // BookingsServicesQuery
