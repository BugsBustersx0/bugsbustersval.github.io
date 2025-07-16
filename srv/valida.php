<?php

require_once __DIR__ . "/../lib/php/BAD_REQUEST.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/ProblemDetails.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/../lib/php/devuelveProblemDetails.php";
require_once __DIR__ . "/../lib/php/devuelveErrorInterno.php";

try {

 $saludo = recuperaTexto("saludo");
 $nombre = recuperaTexto("nombre");

 if (
  $saludo === false
  || $saludo === ""
 )
  throw new ProblemDetails(
   status: BAD_REQUEST,
   title: "Falta el saludo.",
   type: "/error/faltasaludo.html"
  );

 if (
  $nombre === false
  || $nombre === ""
 )
  throw new ProblemDetails(
   status: BAD_REQUEST,
   title: "Falta el nombre.",
   type: "/error/faltanombre.html"
  );

 $resultado =
  "{$saludo} {$nombre}.";

 devuelveJson($resultado);
} catch (ProblemDetails $details) {

 devuelveProblemDetails($details);
} catch (Throwable $error) {

 devuelveErrorInterno($error);
}
