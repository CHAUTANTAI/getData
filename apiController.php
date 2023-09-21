<?php 
function getDataFromAIP()
{
    $xml=file_get_contents("https://portal.vietcombank.com.vn/Usercontrols/TVPortal.TyGia/pXML.aspx") or die("Lỗi");
    $xmlData = NULL;
    $p = xml_parser_create();
    xml_parse_into_struct($p,$xml , $xmlData);
    //free to $p
    xml_parser_free($p);
    
    $mydate = $xmlData['1']['value'];
    $data = array();
    
    if($xmlData){
        foreach($xmlData as $v)
            if(isset($v['attributes']))
                {$data[] = $v['attributes'];}
    }
    $result = array("date"=>$mydate, "data" =>$data);
    return $result;
}

?>