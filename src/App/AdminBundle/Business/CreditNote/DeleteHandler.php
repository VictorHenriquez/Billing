<?php
namespace App\AdminBundle\Business\CreditNote;

use App\AdminBundle\Business\Base\BaseDeleteHandler;
use App\ClientBundle\Entity;

class DeleteHandler extends BaseDeleteHandler
{
    public function execute()
    {
        $model = $this->getModel();
        $this->helperDoctrine->deleteOneById('AppClientBundle:ClientCreditNote', $model['id']);
    }
}
