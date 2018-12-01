<?php
use Illuminate\Database\Seeder;
use App\User;
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
        $cantidadUsuarios = 10;
        factory(User::class, $cantidadUsuarios)->create();
        $this->call(StateSeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(DomicilioTableSeeder::class);
        $this->call(ClienteTableSeeder::class);
        $this->call(Liquidacion::class);
        $this->call(Concepto::class);
        $this->call(DetalleLiquidacion::class);
        $this->call(Proveedor::class);
        $this->call(Compra::class);
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