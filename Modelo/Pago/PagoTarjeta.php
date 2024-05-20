<?php
namespace Modelo\Pago;

interface PagoTarjeta
{
    public function pagar(int $cantidad): string;
}
?>
