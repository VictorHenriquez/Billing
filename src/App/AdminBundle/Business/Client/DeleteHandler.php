<?phpnamespace App\AdminBundle\Business\Client;use App\AdminBundle\Business\Base\BaseDeleteHandler;use App\ClientBundle\Entity;class DeleteHandler extends BaseDeleteHandler{    public function execute()    {        $model = $this->getModel();        $em = $this->container->get('doctrine')->getEntityManager();        $user = $em->getRepository('AppUserBundle:User')->findOneById($model['id']);        $em->remove($user);        $em->flush();    }}