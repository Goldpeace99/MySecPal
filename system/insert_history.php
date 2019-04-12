<?php 

$user = $_POST["user"];
$search = $_POST["search"];
$result = $_POST["result"];
$service = $_POST["service"];

if(isset($user))
{
    $data = file_get_contents("../database/history.json");
    $json = json_decode($data, true);
    
    if(is_array($json))
    {
        foreach ($json as $key => $entry)
        {
            if($entry['username'] == $user)
            {
                if(($json[$key]['historyIndex'] % 10 + 1) == 1)
                {
                    $json[$key]['history1']['search1'] = $search;
                    $json[$key]['history1']['result1'] = $result;
                    $json[$key]['history1']['service1'] = $service;
                }
                if(($json[$key]['historyIndex'] % 10 + 1) == 2)
                {
                    $json[$key]['history2']['search2'] = $search;
                    $json[$key]['history2']['result2'] = $result;
                    $json[$key]['history2']['service2'] = $service;
                }
                if(($json[$key]['historyIndex'] % 10 + 1) == 3)
                {
                    $json[$key]['history3']['search3'] = $search;
                    $json[$key]['history3']['result3'] = $result;
                    $json[$key]['history3']['service3'] = $service;
                }
                if(($json[$key]['historyIndex'] % 10 + 1) == 4)
                {
                    $json[$key]['history4']['search4'] = $search;
                    $json[$key]['history4']['result4'] = $result;
                    $json[$key]['history4']['service4'] = $service;
                }
                if(($json[$key]['historyIndex'] % 10 + 1) == 5)
                {
                    $json[$key]['history5']['search5'] = $search;
                    $json[$key]['history5']['result5'] = $result;
                    $json[$key]['history5']['service5'] = $service;
                }
                if(($json[$key]['historyIndex'] % 10 + 1) == 6)
                {
                    $json[$key]['history6']['search6'] = $search;
                    $json[$key]['history6']['result6'] = $result;
                    $json[$key]['history6']['service6'] = $service;
                }
                if(($json[$key]['historyIndex'] % 10 + 1) == 7)
                {
                    $json[$key]['history7']['search7'] = $search;
                    $json[$key]['history7']['result7'] = $result;
                    $json[$key]['history7']['service7'] = $service;
                }
                if(($json[$key]['historyIndex'] % 10 + 1) == 8)
                {
                    $json[$key]['history8']['search8'] = $search;
                    $json[$key]['history8']['result8'] = $result;
                    $json[$key]['history8']['service8'] = $service;
                }
                if(($json[$key]['historyIndex'] % 10 + 1) == 9)
                {
                    $json[$key]['history9']['search9'] = $search;
                    $json[$key]['history9']['result9'] = $result;
                    $json[$key]['history9']['service9'] = $service;
                }
                if(($json[$key]['historyIndex'] % 10 + 1) == 10)
                {
                    $json[$key]['history10']['search10'] = $search;
                    $json[$key]['history10']['result10'] = $result;
                    $json[$key]['history10']['service10'] = $service;
                }
                $json[$key]['historyIndex'] += 1;
            }
        }
    }
    
    $json_new = json_encode($json);
    file_put_contents("../database/history.json", $json_new);
}

?>