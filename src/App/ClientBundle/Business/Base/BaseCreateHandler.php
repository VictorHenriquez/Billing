<?phpnamespace App\ClientBundle\Business\Base;use App\AdminBundle\Business as AdminBusiness;abstract class BaseCreateHandler extends AdminBusiness\Base\BaseCreateHandler{    public function getUserId()    {        $userSession = $this->container->get('app_admin.helper.user')->getUserSession();        return $userSession->getId();    }}