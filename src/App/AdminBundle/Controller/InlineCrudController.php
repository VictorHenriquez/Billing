<?phpnamespace App\AdminBundle\Controller;use Symfony\Component\HttpFoundation\Response;class InlineCrudController extends CrudController{    public function postList(&$data, $action)    {        $data['grid']['config'] = array(            'toolbar'  => '["create"]',            'editable' => 'inline'        );    }    public function createAction()    {        $data = array();        $this->executeFunction('preProcess', $data, 'create');        $this->executeFunction('preCreate', $data, 'create');        $handler = $this->get($this->configuration['create_handler']);        $handler->execute();        $this->executeFunction('postCreate', $data, 'create');        $this->executeFunction('postProcess', $data, 'create');        $helperCommon = $this->get('app_admin.helper.common');        $result = $helperCommon->copyEntityToArray($handler->newEntity);        $callback = $this->getRequest()->query->get('callback', '');        $resp = new Response($callback . '(' . json_encode(array($result)) . ')');        $resp->headers->set('Content-Type', 'application/x-javascript; charset=utf-8');        return $resp;    }    public function editAction()    {        $data = array();        $this->executeFunction('preProcess', $data, 'edit');        $this->executeFunction('preEdit', $data, 'edit');        $handler = $this->get($this->configuration['edit_handler']);        $handler->execute();        $this->executeFunction('postEdit', $data, 'edit');        $this->executeFunction('postProcess', $data, 'edit');        $helperCommon = $this->get('app_admin.helper.common');        $result = $helperCommon->copyEntityToArray($handler->entity);        $callback = $this->getRequest()->query->get('callback', '');        $resp = new Response($callback . '(' . json_encode(array($result)) . ')');        $resp->headers->set('Content-Type', 'application/x-javascript; charset=utf-8');        return $resp;    }    public function deleteAction()    {        $data = array();        $this->executeFunction('preProcess', $data, 'delete');        $this->executeFunction('preDelete', $data, 'delete');        $models = $this->getRequest()->query->get('models');        $callback = $this->getRequest()->query->get('callback');        $handler = $this->get($this->configuration['delete_handler']);        $handler->execute();        $this->executeFunction('postDelete', $data, 'delete');        $this->executeFunction('postProcess', $data, 'delete');        return new Response($callback . '(' . $models . ')');    }}