<?php
use Illuminate\Database\Seeder;
use App\User;
use App\State;
use App\Location;
use App\Domicilio;
use App\Province;
use App\Cliente;
use App\Proveedor;
use App\Liquidacion;
use App\Concepto;
use App\Detalleliquidacion;
use App\Compra;
use App\Tipo;
use App\Stock;
use App\Producto;
use App\Linea_compra;
use App\Venta;
use App\Cuenta_corriente;
use App\Pago;
use App\Pago_cc;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        State::truncate();
        Province::truncate();
        Location::truncate();
        Domicilio::truncate();
        Cliente::truncate();
        Proveedor::truncate();
        Liquidacion::truncate();
        Concepto::truncate();
        DetalleLiquidacion::truncate();
        Compra::truncate();
        Tipo::truncate();
        Stock::truncate();
        Producto::truncate();
        Linea_compra::truncate();
        Venta::truncate();
        Cuenta_corriente::truncate();
        Pago::truncate();
        Pago_cc::truncate();


        $cantidadUsuarios = 10;
        $cantidadStates  = 10;
        $cantidadProvincias = 80;
        $cantidadCiudades = 300;
        $cantidadDomicilios = 750;
        $cantidadClientes = 700;
        $cantidadProveedores = 25;
        $cantidadLiquidaciones = 150;

        factory(State::class, $cantidadStates)->create();
        factory(Province::class, $cantidadProvincias)->create();
        factory(Location::class, $cantidadCiudades)->create();
        factory(Domicilio::class, $cantidadDomicilios)->create();
        factory(User::class, $cantidadUsuarios)->create();
        factory(Cliente::class, $cantidadClientes)->create();
        factory(Proveedor::class, $cantidadProveedores)->create();
        factory(Liquidacion::class, $cantidadLiquidaciones)->create();



//        $this->call(Liquidacion::class);
//        $this->call(Concepto::class);
//        $this->call(DetalleLiquidacion::class);
//        $this->call(Compra::class);
        $this->call(Tipo_seeder::class);
        $this->call(Stockseeder::class);
        $this->call(Productoseeder::class);
        $this->call(LineaCompraseeder::class);
        $this->call(Ventaseeder::class);
        $this->call(cuenta_corrienteseeder::class);
        $this->call(Pagoseeder::class);
        $this->call(Pago_ccseeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}