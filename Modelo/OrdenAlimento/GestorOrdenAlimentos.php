<?php
include_once ("..\ServiciosExternos\ProxyAlimentos\ProxyAlimentos.php");
include_once ("..\ServiciosInternos\FabricaAlimentos\FabricaAbstractaAlimento.php");
include_once ("..\ServiciosInternos\FabricaAlimentos\FCPalomitasChicas.php");
include_once ("..\ServiciosInternos\FabricaAlimentos\FCPalomitasMedianas.php");
include_once ("..\ServiciosInternos\FabricaAlimentos\FCPalomitasGrandes.php");
include_once ("..\ServiciosInternos\FabricaAlimentos\FCHotDogChico.php");
include_once ("..\ServiciosInternos\FabricaAlimentos\FCHotDogJumbo.php");
include_once ("..\ServiciosInternos\FabricaAlimentos\FCNachosChicos.php");
include_once ("..\ServiciosInternos\FabricaAlimentos\FCNachosGrandes.php");
include_once ("..\ServiciosInternos\FabricaAlimentos\FCRefrescoGrande.php");
include_once ("..\ServiciosInternos\FabricaAlimentos\FCRefrescoMediano.php");
include_once ("..\ServiciosInternos\FabricaAlimentos\FCRefrescoChico.php");
include_once ("..\ServiciosInternos\FabricaAlimentos\FCPonPons.php");
include_once ("..\ServiciosInternos\FabricaAlimentos\FCCornetto.php");
include_once ("..\ServiciosInternos\FabricaAlimentos\FCMilkyWay.php");
include_once ("..\ServiciosInternos\FabricaAlimentos\FCMagnum.php");

include_once ("..\ServiciosExternos\ProxyCombos\ProxyCombos.php");
include_once ("..\ServiciosInternos\FabricaCombos\FabricaAbstractaCombo.php");
include_once ("..\ServiciosInternos\FabricaCombos\FabricaConcretaComboBasico.php");
include_once ("..\ServiciosInternos\FabricaCombos\FabricaConcretaComboCuates.php");
include_once ("..\ServiciosInternos\FabricaCombos\FabricaConcretaComboFamiliar.php");
include_once ("..\ServiciosInternos\FabricaCombos\FabricaConcretaComboJumbo.php");
include_once ("..\ServiciosInternos\FabricaCombos\FabricaConcretaComboPareja.php");
include_once ("MenuAlimentos.php");
include_once ("MenuCombo.php");
include_once ("OrdenAlimento.php");
include_once ("ICombo.php");
class GestorOrdenAlimentos{
    public Menu $menuAlimentos;
    public Menu $menuCombos;
    public OrdenAlimento $carrito;
    public FabricaAbstractaCombo $fabrica;
    public FabricaAbstractaAlimento $fabricaAlimento;
    public ICombo $combo;
    public IAlimento $alimento;

    public function __construct() {
        $this->menuCombos=new ProxyCombos();
        $this->menuAlimentos=new ProxyAlimentos();
        $this->carrito=new OrdenAlimento();
    }
    public function mostrarCombos(){
        $this->menuCombos= $this->menuCombos->leer();
        return $this->menuCombos->mostrar();
    }

    public function mostrarAlimentos(){
        $this->menuAlimentos= $this->menuAlimentos->leer();
        $this->menuAlimentos->mostrar();
    }

    public function mostrarCarrito(){
        $this->carrito= $this->carrito->cargarCarrito();
        $this->carrito=$this->carrito->mostrar();
        //var_dump($this->carrito->getProductos());
        return $this;
    }

    public function anadirCombo($producto){
        switch ($producto) {
            case 1:
                $this->fabrica=new FabricaConcretaComboBasico();
                $this->combo=$this->fabrica->crearCombo();
                break;
            case 2:
                $this->fabrica=new FabricaConcretaComboCuates();
                $this->combo=$this->fabrica->crearCombo();
                break;
            case 3:
                $this->fabrica=new FabricaConcretaComboFamiliar();
                $this->combo=$this->fabrica->crearCombo();
                break;;
            case 4:
                $this->fabrica=new FabricaConcretaComboJumbo();
                $this->combo=$this->fabrica->crearCombo();
                break;
            case 5:
                $this->fabrica=new FabricaConcretaComboPareja();
                $this->combo=$this->fabrica->crearCombo();
                break;
        }
        $this->menuCombos->agregar($this->combo);
        return $this;
    }
    public function anadirAlimento($producto){
        switch ($producto) {
            case 1:
                $this->fabricaAlimento=new FCPalomitasChicas();
                $this->alimento=$this->fabricaAlimento->crearAlimento();
                break;
            case 2:
                $this->fabricaAlimento=new FCPalomitasMedianas();
                $this->alimento=$this->fabricaAlimento->crearAlimento();
                break;
            case 3:
                $this->fabricaAlimento=new FCPalomitasGrandes();
                $this->alimento=$this->fabricaAlimento->crearAlimento();
                break;;
            case 4:
                $this->fabricaAlimento=new FCHotDogChico();
                $this->alimento=$this->fabricaAlimento->crearAlimento();
                break;
            case 5:
                $this->fabricaAlimento=new FCHotDogJumbo();
                $this->alimento=$this->fabricaAlimento->crearAlimento();
                break;
            case 6:
                $this->fabricaAlimento=new FCNachosChicos();
                $this->alimento=$this->fabricaAlimento->crearAlimento();
                break;
            case 7:
                $this->fabricaAlimento=new FCNachosGrandes();
                $this->alimento=$this->fabricaAlimento->crearAlimento();
                break;
            case 8:
                $this->fabricaAlimento=new FCRefrescoGrande();
                $this->alimento=$this->fabricaAlimento->crearAlimento();
                break;;
            case 9:
                $this->fabricaAlimento=new FCRefrescoMediano();
                $this->alimento=$this->fabricaAlimento->crearAlimento();
                break;
            case 10:
                $this->fabricaAlimento=new FCRefrescoChico();
                $this->alimento=$this->fabricaAlimento->crearAlimento();
                break;
            case 11:
                $this->fabricaAlimento=new FCPonPons();
                $this->alimento=$this->fabricaAlimento->crearAlimento();
                break;
            case 12:
                $this->fabricaAlimento=new FCCornetto();
                $this->alimento=$this->fabricaAlimento->crearAlimento();
                break;;
            case 13:
                $this->fabricaAlimento=new FCMilkyWay();
                $this->alimento=$this->fabricaAlimento->crearAlimento();
                break;
            case 14:
                $this->fabricaAlimento=new FCMagnum();
                $this->alimento=$this->fabricaAlimento->crearAlimento();
                break;
        }
        $this->menuAlimentos->agregar($this->alimento);
        return $this;
    }

    public function eliminarCarrito($id){
        $this->carrito->eliminarCarrito($id);
    }
}