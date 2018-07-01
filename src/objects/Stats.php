<?php
namespace Keepa\objects;

/**
 * Contains statistic values.
 * Only set if the stats parameter was used in the Product Request. Part of the {@link Product}
 */
class Stats
{

    /**
     * Contains the prices / ranks of the product of the time we last updated it.
     * <p>Uses {@link Product.CSVType} indexing.</p>
     * The price is an integer of the respective Amazon locale's smallest currency unit (e.g. euro cents or yen).
     * If no offer was available in the given interval (e.g. out of stock) the price has the value -1.
     * @var int[]|null
     */
    public $current = null;

    /**
     * Contains the weighted mean for the interval specified in the product request's stats parameter.<br>
     * <p>Uses {@link Product.CSVType} indexing.</p>
     * If no offer was available in the given interval or there is insufficient data it has the value -1.
     * @var int[]|null
     */
    public $avg = null;

    /**
     * Contains the weighted mean for the last 30 days.<br>
     * <p>Uses {@link Product.CSVType} indexing.</p>
     * If no offer was available in the given interval or there is insufficient data it has the value -1.
     * @var int[]|null
     */
    public $avg30 = null;


    /**
     * Contains the weighted mean for the last 90 days.<br>
     * <p>Uses {@link Product.CSVType} indexing.</p>
     * If no offer was available in the given interval or there is insufficient data it has the value -1.
     * @var int[]|null
     */
    public $avg90 = null;

    /**
     * Contains the weighted mean for the last 180 days.<br>
     * <p>Uses {@link Product.CSVType} indexing.</p>
     * If no offer was available in the given interval or there is insufficient data it has the value -1.
     * @var int[]|null
     */
    public $avg180 = null;

    /**
     * @var int[]|null
     */
    public $atIntervalStart = null;

    /**
     * Contains the lowest prices registered for this product. <br>
     * First dimension uses {@link Product.CSVType} indexing <br>
     * Second dimension is either null, if there is no data available for the price type, or
     * an array of the size 2 with the first value being the time of the extreme point (in Keepa time minutes) and the second one the respective extreme value.
     * <br>
     * Use {@link KeepaTime#keepaMinuteToUnixInMillis(int)} (long)} to get an uncompressed timestamp (Unix epoch time).
     * @var mixed int[][]
     */
    public $min = null;

    /**
     * Contains the lowest prices registered in the interval specified in the product request's stats parameter.<br>
     * First dimension uses {@link Product.CSVType} indexing <br>
     * Second dimension is either null, if there is no data available for the price type, or
     * an array of the size 2 with the first value being the time of the extreme point (in Keepa time minutes) and the second one the respective extreme value.
     * <br>
     * Use {@link KeepaTime#keepaMinuteToUnixInMillis(int)} (long)} to get an uncompressed timestamp (Unix epoch time).
     * @var mixed int[][]
     */
    public $minInInterval = null;

    /**
     * Contains the highest prices registered for this product. <br>
     * First dimension uses {@link Product.CSVType} indexing <br>
     * Second dimension is either null, if there is no data available for the price type, or
     * an array of the size 2 with the first value being the time of the extreme point (in Keepa time minutes) and the second one the respective extreme value.<br>
     * Use {@link KeepaTime#keepaMinuteToUnixInMillis(int)} (long)} to get an uncompressed timestamp (Unix epoch time).
     * @var mixed int[][]
     */
    public $max = null;

    /**
     * Contains the highest prices registered in the interval specified in the product request's stats parameter.<br>
     * First dimension uses {@link Product.CSVType} indexing <br>
     * Second dimension is either null, if there is no data available for the price type, or
     * an array of the size 2 with the first value being the time of the extreme point (in Keepa time minutes) and the second one the respective extreme value.<br>
     * Use {@link KeepaTime#keepaMinuteToUnixInMillis(int)} (long)} to get an uncompressed timestamp (Unix epoch time).
     * @var mixed int[][]
     */
    public $maxInInterval = null;

    /**
     * Contains the out of stock percentage in the interval specified in the product request's stats parameter.<br>
     * <p>Uses {@link Product.CSVType} indexing.</p>
     * It has the value -1 if there is insufficient data or the CSVType  is not a price.<br>
     * <p>Examples: 0 = never was out of stock, 100 = was out of stock 100% of the time, 25 = was out of stock 25% of the time</p>
     * @var mixed int[][]
     */
    public $outOfStockPercentageInInterval = null;

    /**
     * @var mixed int[][]
     */
    public $outOfStockPercentage90 = null;

    /**
     * the total count of offers this product has (all conditions combined). The offer count per condition can be found in the current field.
     * @var int|null
     */
    public $totalOfferCount = 0;

    /**
     * @var int|null
     */
    public $retrievedOfferCount = 0;

    /**
     * @var int|null
     */
    public $tradeInPrice = -1;

    /**
     * Active offer product list price
     * @var int|null
     */
    public $buyBoxPrice = 0;

    /**
     * Active offer product shipping price
     * @var int|null
     */
    public $buyBoxShipping = 0;

    /**
     * To be used to compare offer lastSeen parameter
     * @var int|null
     */
    public $lastOffersUpdate = 0;

    /**
     * Contains the total stock available per item condition (of the retrieved offers) for 3rd party FBA
     * @var int[]|null
     */
    public $stockPerCondition3rdFBA = null;

    /**
     * Contains the total stock available per item condition (of the retrieved offers) for FBM
     * @var int[]|null
     */
    public $stockPerConditionFBM = null;

    /**
     * stockAmazon: the stock of Amazon, if Amazon has an offer. Max. reported stock is 10. Otherwise -2.
     * @var int|null
     */
    public $stockAmazon = 0;

    /**
     * stockBuyBox: the stock of buy box offer. Max. reported stock is 10. If the boy box is empty/unqualified: -2.
     * @var int|null
     */
    public $stockBuyBox = 0;

    /**
     * buyBoxIsUnqualified: whether or not a seller won the buy box. If there are only sellers with bad offers none qualifies for the buy box.
     * @var bool|null
     */
    public $buyBoxIsUnqualified = false;

    /**
     * buyBoxIsShippable: whether or not the buy box is listed as being shippable.
     * @var bool|null
     */
    public $buyBoxIsShippable = false;

    /**
     * buyBoxIsPreorder: if the buy box is a pre-order
     * @var bool|null
     */
    public $buyBoxIsPreorder = false;

    /**
     * buyBoxIsFBA: whether or not the buy box is fulfilled by Amazon
     * @var bool|null
     */
    public $buyBoxIsFBA = false;

    /**
     * buyBoxIsAmazon: if Amazon is the seller in the buy box
     * @var bool|null
     */
    public $buyBoxIsAmazon = false;

    /**
     * buyBoxIsMAP: if the buy box price is hidden on Amazon due to MAP restrictions (minimum advertised price)
     * @var bool|null
     */
    public $buyBoxIsMAP = false;

    /**
     * isAddonItem: if the product is an add-on item (add-on Items ship with orders that include $25 or more of items shipped by Amazon)
     * @var bool|null
     */
    public $isAddonItem = false;

    /**
     * @var mixed|null
     */
    public $lightningDealInfo = null;
}
