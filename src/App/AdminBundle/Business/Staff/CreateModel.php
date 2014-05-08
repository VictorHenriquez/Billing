<?phpnamespace App\AdminBundle\Business\Staff;use Symfony\Component\Validator\ExecutionContext;class CreateModel{    public $container;    public $firstname;    public $lastname;    public $email;    public $password;    public $hourly;    public $hasAdmin = 1;    public $permissionGroup;    public function isValid(ExecutionContext $context)    {        $helperDoctrine = $this->container->get('app_admin.helper.doctrine');        if ($helperDoctrine->isNotExist('AppUserBundle:User', 'email', $this->email) === false) {            $context->addViolationAtSubPath('email', "Email '" . $this->email . "' already exists");        }    }}