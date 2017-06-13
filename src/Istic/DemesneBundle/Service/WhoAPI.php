<?PHP
namespace Istic\DemesneBundle\Service;

class WhoAPI
{
    function __construct($apikey){
        $this->apikey = $apikey;
    }

    public function GET($url, $params){
        $client = new \GuzzleHttp\Client();
        $extra = array();
        if ($params){
            $extra['query'] = $params;
        }
        var_dump($extra);
        $res = $client->request('GET', $url, $extra);

        if($res->getStatusCode() != 200){
            throw Exception("Error ".$res->getStatusCode()." happened");
        }

        return json_decode($res->getBody());
    }

    public function call($domain, $request){
        // $apikey = $this->container->getParameter('whoapi_key');
        $url = "http://api.whoapi.com/";
        $params = array(
            'domain' => $domain, 
            'r' => $request, 
            'apikey' => $this->apikey
        );
        return $this->GET($url, $params);
    }

    public function checkDomain($domain)
    {
        return $this->call($domain, 'whois');

    }
}