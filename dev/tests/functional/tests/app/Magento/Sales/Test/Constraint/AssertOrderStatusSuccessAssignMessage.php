<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

namespace Magento\Sales\Test\Constraint;

use Magento\Sales\Test\Page\Adminhtml\OrderStatusIndex;
use Mtf\Constraint\AbstractConstraint;

/**
 * Class AssertOrderStatusSuccessAssignMessage
 * Assert that after assigning order status success message appears
 */
class AssertOrderStatusSuccessAssignMessage extends AbstractConstraint
{
    /* tags */
    const SEVERITY = 'low';
    /* end tags */

    /**
     * OrderStatus assigning success message
     */
    const SUCCESS_MESSAGE = 'You have assigned the order status.';

    /**
     * Assert that success message is displayed after order status assigning
     *
     * @param OrderStatusIndex $orderStatusIndexPage
     * @return void
     */
    public function processAssert(OrderStatusIndex $orderStatusIndexPage)
    {
        \PHPUnit_Framework_Assert::assertEquals(
            self::SUCCESS_MESSAGE,
            $orderStatusIndexPage->getMessagesBlock()->getSuccessMessages()
        );
    }

    /**
     * Returns a string representation of the object
     *
     * @return string
     */
    public function toString()
    {
        return 'Order status success assign message is present.';
    }
}
