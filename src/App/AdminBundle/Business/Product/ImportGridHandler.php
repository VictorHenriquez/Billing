<?phpnamespace App\AdminBundle\Business\Product;use App\AdminBundle\Business\Base\BaseGridHandler;class ImportGridHandler extends BaseGridHandler{    function buildBaseQuery($query, $baseObject = 'p', $filter)    {    }    public function getResultArray()    {        $array = array();        $file = $this->container->get('request')->get('file', '');        $tempFolder = $this->container->getParameter('temp_upload_dir');        if (!file_exists($tempFolder . '/' . $file)) {            $array[] = array(                'message' => "Error! Can't find the attachment"            );            return $array;        }        @ini_set('max_execution_time', '120');        $r = Utils::parseCsv($this->container, $tempFolder . '/' . $file);        if (!empty($r['errors'])) {            return array(                'message' => implode('<br/>', $r['errors'])            );        }        return $r['result'];    }    public function getTotalMatched()    {        return 0;    }}