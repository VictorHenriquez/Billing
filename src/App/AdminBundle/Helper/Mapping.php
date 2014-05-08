<?phpnamespace App\AdminBundle\Helper;class Mapping{    protected $container;    protected $mapping = array();    protected $mappingCache = array();    public function __construct($container)    {        $this->container = $container;        $this->mappingCache = array();    }    public function setMapping($key, $handler = '', $options = array())    {        $this->mapping[$key] = array(            'handler' => $handler,            'options' => $options        );    }    public function getMapping($key)    {        if (isset($this->mappingCache[$key])) {            return $this->mappingCache[$key];        }        if (isset($this->mapping[$key])) {            $handler = $this->mapping[$key]['handler'];            $options = $this->mapping[$key]['options'];            if (isset($this->handlers[$handler])) {                $handlerFunc = $this->handlers[$handler];                $mapping = $this->$handlerFunc($options);                $this->mappingCache[$key] = $mapping;                return $mapping;            }        }        return array();    }    public function getMappingTitle($key, $value)    {        $mapping = $this->getMapping($key);        return isset($mapping[$value]) ? $mapping[$value] : '';    }    // HANDLERS    protected $handlers = array(        'doctrine' => 'handleMappingDoctrine',        'static'   => 'handleMappingStatic'    );    public function handleMappingDoctrine($options)    {        $key = isset($options['key']) ? $options['key'] : 'id';        $value = isset($options['value']) ? $options['value'] : 'name';        $em = $this->container->get('doctrine')->getEntityManager();        $query = $em->createQueryBuilder();        $query->select('p')            ->from($options['repository'], 'p');        if (isset($options['query_filter']) && is_callable($options['query_filter'])) {            call_user_func($options['query_filter'], $query);        }        $result = $query->getQuery()->getResult();        $mapping = array();        foreach ($result as $row) {            $keyMethod = 'get' . ucfirst($key);            $valueMethod = 'get' . ucfirst($value);            if (isset($options['titleFunction'])) {                $valueData = call_user_func($options['titleFunction'], $this->container, $row);            } else {                $valueData = $row->$valueMethod();            }            $mapping[$row->$keyMethod()] = $valueData;        }        return $mapping;    }    public function handleMappingStatic($options)    {        $function = $options['function'];        $mapping = array();        if (is_callable($function)) {            $mapping = call_user_func($function);        }        return $mapping;    }}