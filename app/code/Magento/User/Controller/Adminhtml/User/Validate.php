<?php
/**
 *
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\User\Controller\Adminhtml\User;

class Validate extends \Magento\User\Controller\Adminhtml\User
{
    /**
     * AJAX customer validation action
     *
     * @return void
     */
    public function execute()
    {
        $response = new \Magento\Framework\Object();
        $response->setError(0);
        $errors = null;
        $userId = (int)$this->getRequest()->getParam('user_id');
        $data = $this->getRequest()->getPost();
        try {
            /** @var $model \Magento\User\Model\User */
            $model = $this->_userFactory->create()->load($userId);
            $model->setData($this->_getAdminUserData($data));
            $errors = $model->validate();
        } catch (\Magento\Framework\Model\Exception $exception) {
            /* @var $error Error */
            foreach ($exception->getMessages(\Magento\Framework\Message\MessageInterface::TYPE_ERROR) as $error) {
                $errors[] = $error->getText();
            }
        }

        if ($errors !== true && !empty($errors)) {
            foreach ($errors as $error) {
                $this->messageManager->addError($error);
            }
            $response->setError(1);
            $this->_view->getLayout()->initMessages();
            $response->setHtmlMessage($this->_view->getLayout()->getMessagesBlock()->getGroupedHtml());
        }

        $this->getResponse()->representJson($response->toJson());
    }
}
