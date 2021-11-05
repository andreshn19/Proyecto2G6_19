<?php
// Case según método elegido
require_once("../Config/Conexion.php");
require_once("../Models/Ma_pedidos.php");
$ma_pedidos=new  Ma_pedidos();
$body=json_decode(file_get_contents("php://input"),true);
switch ($_GET["op"]){

    case "Getpedidos":
        $datos=$ma_pedidos->get_pedidos();
        echo json_encode($datos);
    break;

    case "GetPedido":
        $datos=$ma_pedidos->get_Pedido($body["id"]);
        echo json_encode($datos);
    break;

    case "InsertPedidos":
      $datos=$ma_pedidos->insert_pedido($body["ID"],$body["ID_SOCIO"],$body["FECHA_PEDIDO"],
      $body["DETALLE"],$body["SUB_TOTAL"],$body["TOTAL_ISV"],$body["TOTAL"],$body["FECHA_ENTREGA"],$body["ESTADO"]);
      echo json_encode("Pedidos Insertados");
    break;

    case "EliminarPedidos":
        $datos=$ma_pedidos->Delete_pedido($body["ID"]);
        echo json_encode("Pedidos Eliminados");
      break;

      case "UpdatePedidos":
        $datos=$ma_pedidos->Update_pedido($body["ID"],$body["ID_SOCIO"],$body["FECHA_PEDIDO"],
        $body["DETALLE"],$body["SUB_TOTAL"],$body["TOTAL_ISV"],$body["TOTAL"],$body["FECHA_ENTREGA"],$body["ESTADO"]);
        echo json_encode("Pedidos Actualizados");
      break;
}
?>