<?php

namespace HookKonfigurator\Model\Base;

use \Exception;
use \PDO;
use HookKonfigurator\Model\SetProducts as ChildSetProducts;
use HookKonfigurator\Model\SetProductsQuery as ChildSetProductsQuery;
use HookKonfigurator\Model\Map\SetProductsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'set_products' table.
 *
 *
 *
 * @method     ChildSetProductsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildSetProductsQuery orderBySetId($order = Criteria::ASC) Order by the set_id column
 * @method     ChildSetProductsQuery orderByProductId($order = Criteria::ASC) Order by the product_id column
 * @method     ChildSetProductsQuery orderByNumberOfProducts($order = Criteria::ASC) Order by the number_of_products column
 *
 * @method     ChildSetProductsQuery groupById() Group by the id column
 * @method     ChildSetProductsQuery groupBySetId() Group by the set_id column
 * @method     ChildSetProductsQuery groupByProductId() Group by the product_id column
 * @method     ChildSetProductsQuery groupByNumberOfProducts() Group by the number_of_products column
 *
 * @method     ChildSetProductsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSetProductsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSetProductsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSetProductsQuery leftJoinProductHeizung($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProductHeizung relation
 * @method     ChildSetProductsQuery rightJoinProductHeizung($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProductHeizung relation
 * @method     ChildSetProductsQuery innerJoinProductHeizung($relationAlias = null) Adds a INNER JOIN clause to the query using the ProductHeizung relation
 *
 * @method     ChildSetProductsQuery leftJoinSets($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sets relation
 * @method     ChildSetProductsQuery rightJoinSets($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sets relation
 * @method     ChildSetProductsQuery innerJoinSets($relationAlias = null) Adds a INNER JOIN clause to the query using the Sets relation
 *
 * @method     ChildSetProducts findOne(ConnectionInterface $con = null) Return the first ChildSetProducts matching the query
 * @method     ChildSetProducts findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSetProducts matching the query, or a new ChildSetProducts object populated from the query conditions when no match is found
 *
 * @method     ChildSetProducts findOneById(int $id) Return the first ChildSetProducts filtered by the id column
 * @method     ChildSetProducts findOneBySetId(int $set_id) Return the first ChildSetProducts filtered by the set_id column
 * @method     ChildSetProducts findOneByProductId(int $product_id) Return the first ChildSetProducts filtered by the product_id column
 * @method     ChildSetProducts findOneByNumberOfProducts(int $number_of_products) Return the first ChildSetProducts filtered by the number_of_products column
 *
 * @method     array findById(int $id) Return ChildSetProducts objects filtered by the id column
 * @method     array findBySetId(int $set_id) Return ChildSetProducts objects filtered by the set_id column
 * @method     array findByProductId(int $product_id) Return ChildSetProducts objects filtered by the product_id column
 * @method     array findByNumberOfProducts(int $number_of_products) Return ChildSetProducts objects filtered by the number_of_products column
 *
 */
abstract class SetProductsQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \HookKonfigurator\Model\Base\SetProductsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\HookKonfigurator\\Model\\SetProducts', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSetProductsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSetProductsQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof \HookKonfigurator\Model\SetProductsQuery) {
            return $criteria;
        }
        $query = new \HookKonfigurator\Model\SetProductsQuery();
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
     * @return ChildSetProducts|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SetProductsTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SetProductsTableMap::DATABASE_NAME);
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
     * @return   ChildSetProducts A model object, or null if the key is not found
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID, SET_ID, PRODUCT_ID, NUMBER_OF_PRODUCTS FROM set_products WHERE ID = :p0';
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
            $obj = new ChildSetProducts();
            $obj->hydrate($row);
            SetProductsTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSetProducts|array|mixed the result, formatted by the current formatter
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
     * @return ChildSetProductsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SetProductsTableMap::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ChildSetProductsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SetProductsTableMap::ID, $keys, Criteria::IN);
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
     * @see       filterByProductHeizung()
     *
     * @see       filterBySets()
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSetProductsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(SetProductsTableMap::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(SetProductsTableMap::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SetProductsTableMap::ID, $id, $comparison);
    }

    /**
     * Filter the query on the set_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySetId(1234); // WHERE set_id = 1234
     * $query->filterBySetId(array(12, 34)); // WHERE set_id IN (12, 34)
     * $query->filterBySetId(array('min' => 12)); // WHERE set_id > 12
     * </code>
     *
     * @param     mixed $setId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSetProductsQuery The current query, for fluid interface
     */
    public function filterBySetId($setId = null, $comparison = null)
    {
        if (is_array($setId)) {
            $useMinMax = false;
            if (isset($setId['min'])) {
                $this->addUsingAlias(SetProductsTableMap::SET_ID, $setId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($setId['max'])) {
                $this->addUsingAlias(SetProductsTableMap::SET_ID, $setId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SetProductsTableMap::SET_ID, $setId, $comparison);
    }

    /**
     * Filter the query on the product_id column
     *
     * Example usage:
     * <code>
     * $query->filterByProductId(1234); // WHERE product_id = 1234
     * $query->filterByProductId(array(12, 34)); // WHERE product_id IN (12, 34)
     * $query->filterByProductId(array('min' => 12)); // WHERE product_id > 12
     * </code>
     *
     * @param     mixed $productId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSetProductsQuery The current query, for fluid interface
     */
    public function filterByProductId($productId = null, $comparison = null)
    {
        if (is_array($productId)) {
            $useMinMax = false;
            if (isset($productId['min'])) {
                $this->addUsingAlias(SetProductsTableMap::PRODUCT_ID, $productId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productId['max'])) {
                $this->addUsingAlias(SetProductsTableMap::PRODUCT_ID, $productId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SetProductsTableMap::PRODUCT_ID, $productId, $comparison);
    }

    /**
     * Filter the query on the number_of_products column
     *
     * Example usage:
     * <code>
     * $query->filterByNumberOfProducts(1234); // WHERE number_of_products = 1234
     * $query->filterByNumberOfProducts(array(12, 34)); // WHERE number_of_products IN (12, 34)
     * $query->filterByNumberOfProducts(array('min' => 12)); // WHERE number_of_products > 12
     * </code>
     *
     * @param     mixed $numberOfProducts The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSetProductsQuery The current query, for fluid interface
     */
    public function filterByNumberOfProducts($numberOfProducts = null, $comparison = null)
    {
        if (is_array($numberOfProducts)) {
            $useMinMax = false;
            if (isset($numberOfProducts['min'])) {
                $this->addUsingAlias(SetProductsTableMap::NUMBER_OF_PRODUCTS, $numberOfProducts['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($numberOfProducts['max'])) {
                $this->addUsingAlias(SetProductsTableMap::NUMBER_OF_PRODUCTS, $numberOfProducts['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SetProductsTableMap::NUMBER_OF_PRODUCTS, $numberOfProducts, $comparison);
    }

    /**
     * Filter the query by a related \HookKonfigurator\Model\ProductHeizung object
     *
     * @param \HookKonfigurator\Model\ProductHeizung|ObjectCollection $productHeizung The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSetProductsQuery The current query, for fluid interface
     */
    public function filterByProductHeizung($productHeizung, $comparison = null)
    {
        if ($productHeizung instanceof \HookKonfigurator\Model\ProductHeizung) {
            return $this
                ->addUsingAlias(SetProductsTableMap::ID, $productHeizung->getProductId(), $comparison);
        } elseif ($productHeizung instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SetProductsTableMap::ID, $productHeizung->toKeyValue('PrimaryKey', 'ProductId'), $comparison);
        } else {
            throw new PropelException('filterByProductHeizung() only accepts arguments of type \HookKonfigurator\Model\ProductHeizung or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ProductHeizung relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildSetProductsQuery The current query, for fluid interface
     */
    public function joinProductHeizung($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ProductHeizung');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'ProductHeizung');
        }

        return $this;
    }

    /**
     * Use the ProductHeizung relation ProductHeizung object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \HookKonfigurator\Model\ProductHeizungQuery A secondary query class using the current class as primary query
     */
    public function useProductHeizungQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductHeizung($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ProductHeizung', '\HookKonfigurator\Model\ProductHeizungQuery');
    }

    /**
     * Filter the query by a related \HookKonfigurator\Model\Sets object
     *
     * @param \HookKonfigurator\Model\Sets|ObjectCollection $sets The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSetProductsQuery The current query, for fluid interface
     */
    public function filterBySets($sets, $comparison = null)
    {
        if ($sets instanceof \HookKonfigurator\Model\Sets) {
            return $this
                ->addUsingAlias(SetProductsTableMap::ID, $sets->getProductId(), $comparison);
        } elseif ($sets instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SetProductsTableMap::ID, $sets->toKeyValue('PrimaryKey', 'ProductId'), $comparison);
        } else {
            throw new PropelException('filterBySets() only accepts arguments of type \HookKonfigurator\Model\Sets or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Sets relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildSetProductsQuery The current query, for fluid interface
     */
    public function joinSets($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Sets');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Sets');
        }

        return $this;
    }

    /**
     * Use the Sets relation Sets object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \HookKonfigurator\Model\SetsQuery A secondary query class using the current class as primary query
     */
    public function useSetsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSets($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Sets', '\HookKonfigurator\Model\SetsQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSetProducts $setProducts Object to remove from the list of results
     *
     * @return ChildSetProductsQuery The current query, for fluid interface
     */
    public function prune($setProducts = null)
    {
        if ($setProducts) {
            $this->addUsingAlias(SetProductsTableMap::ID, $setProducts->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the set_products table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SetProductsTableMap::DATABASE_NAME);
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
            SetProductsTableMap::clearInstancePool();
            SetProductsTableMap::clearRelatedInstancePool();

            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $affectedRows;
    }

    /**
     * Performs a DELETE on the database, given a ChildSetProducts or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ChildSetProducts object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SetProductsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SetProductsTableMap::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();


        SetProductsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SetProductsTableMap::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

} // SetProductsQuery
