<?phpnamespace App\AdminBundle\Business\AutomationGroup;use App\AdminBundle\Business\Base\BaseDeleteHandler;use App\ClientBundle\Entity;class DeleteHandler extends BaseDeleteHandler{    public function execute()    {        $model = $this->getModel();        $this->helperDoctrine->deleteList('AppClientBundle:AutomationGroupField', 'idAutomationGroup', $model['id']);        $this->helperDoctrine->deleteOneById('AppClientBundle:AutomationGroup', $model['id']);    }}