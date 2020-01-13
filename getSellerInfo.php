<?php
    $SellerId = $_GET["sellerId"];
    $SiteName = $_GET["paisCombo"];
    $Fichero = "log.txt"; //nombre del fichero donde se guardan los informes. 
    $fecha = date("Y-m-d;H:i:s"); //fecha y hora (por lo general del servidor) 
    $log = "[REGISTRO A FECHA: $fecha PARA SELLER ID: $SellerId EN SITE: $SiteName A CONTINUACIÓN TODOS LOS REGISTROS ENCONTRADOS] \r\n";
    $fp = fopen($Fichero, "a" );
    fwrite($fp, $log);
    $url = 'https://api.mercadolibre.com/sites/'.$SiteName.'/search?seller_id='.$SellerId;
    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
$response = json_decode($response, true); //because of true, it's in an array
$length = count($response['results']);
for ($i=0; $i < $length; $i++) { 
    $ID = $response['results'][$i]['id'];
    $Nombre = $response['results'][$i]['title'];
    $IDCategoria = $response['results'][$i]['category_id'];
    $Categoria = null;
    $urlCategoria = 'https://api.mercadolibre.com/categories/'.$IDCategoria;
    $curlCategoria= curl_init();
    curl_setopt_array($curlCategoria, array(
        CURLOPT_URL => $urlCategoria,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "cache-control: no-cache"
        ),
      ));
      $responseCategoria = curl_exec($curlCategoria);
      $err = curl_error($curlCategoria);
      curl_close($curlCategoria);
      $responseCategoria = json_decode($responseCategoria, true);
      $Categoria = $responseCategoria['name'];
      $logString =  "--ID de item: $ID Nombre: $Nombre ID de categoria: $IDCategoria Categoria: $Categoria-- \r\n";
      fwrite($fp, $logString);
}
fwrite($fp, "[END LOG] \r\n");
fclose($fp);
echo "Loggeado, revisar archivo log.txt en la ruta del sitio web";
?>