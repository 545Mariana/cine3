<?php
namespace Modelo\Pago;

class PagoPaypal
{
    public function enviarPago(int $cantidad): string
    {
        return "Pago de $cantidad usando paypal.";
    }
}
?>
