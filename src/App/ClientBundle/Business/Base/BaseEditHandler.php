<?phpnamespace App\ClientBundle\Business\Base;use App\AdminBundle\Business as AdminBusiness;abstract class BaseEditHandler extends AdminBusiness\Base\BaseEditHandler{    public function getUserId()    {        $userSession = $this->container->get('app_admin.helper.user')->getUserSession();        return $userSession->getId();    }}