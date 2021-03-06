<?php

use App\Option;
use Illuminate\Database\Seeder;

class OptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        Option::create([
            "nombre"=>"Admin",
            "descripcion"=>"Opciones de administración",
            "icono_l"=>"fa-folder",
            "orden"=>"1",
        ]);

        //2
        Option::create([
            "padre"=>"1",
            "nombre"=>"Usuarios",
            "ruta"=>"admin/user",
            "descripcion"=>"Administración de usuarios",
            "orden"=>"1",
            "icono_r"=>""
        ]);

        //3
        Option::create([
            "padre"=>"1",
            "nombre"=>"Opciones",
            "ruta"=>"admin/option",
            "descripcion"=>"Administración de las opciones del menu",
            "orden"=>"2",
            "icono_r"=>""
        ]);

        //4
        Option::create([
            "padre"=>"1",
            "nombre"=>"Roles",
            "ruta"=>"admin/rols",
            "descripcion"=>"Administración de los roles de los usuarios",
            "orden"=>"3",
            "icono_r"=>""
        ]);

        //5
        Option::create([
            "nombre"=>"Inventario",
            "descripcion"=>"",
            "icono_l"=>"fa-th",
            "orden"=>"1",
        ]);

        //6
        Option::create([
            "padre"=>"5",
            "nombre"=>"Categorías",
            "ruta"=>"inventario/icategorias",
            "descripcion"=>"Administración de las categorías de los articulos",
            "orden"=>"1",
            "icono_r"=>""
        ]);

        //7
        Option::create([
            "padre"=>"5",
            "nombre"=>"Artículos",
            "ruta"=>"inventario/items",
            "descripcion"=>"Administración de los artículos",
            "orden"=>"2",
            "icono_r"=>""
        ]);

        //8
        Option::create([
            "padre"=>"5",
            "nombre"=>"Unidades de medida",
            "ruta"=>"inventario/unimeds",
            "descripcion"=>"Administración de las unidades de medida",
            "orden"=>"3",
            "icono_r"=>""
        ]);

        //9
        Option::create([
            "padre"=>"5",
            "nombre"=>"Estados de articulos",
            "ruta"=>"inventario/iestados",
            "descripcion"=>"Administración de las unidades de medida",
            "orden"=>"3",
            "icono_r"=>""
        ]);

        //10
        Option::create([
            "nombre"=>"Compras",
            "descripcion"=>"",
            "icono_l"=>"fa-shopping-cart",
            "orden"=>"1",
        ]);

        //11
        Option::create([
            "padre"=>"10",
            "nombre"=>"Compras",
            "ruta"=>"compras/compras",
            "descripcion"=>"Ingresos de artículos a inventario",
            "orden"=>"2",
            "icono_r"=>""
        ]);

        //12
        Option::create([
            "padre"=>"10",
            "nombre"=>"Proveedores",
            "ruta"=>"compras/proveedores",
            "descripcion"=>"Administración de proveedores",
            "orden"=>"1",
            "icono_r"=>""
        ]);

        //13
        Option::create([
            "padre"=>"10",
            "nombre"=>"Estados",
            "ruta"=>"compras/cestados",
            "descripcion"=>"Administración de estados de las compras",
            "orden"=>"1",
            "icono_r"=>""
        ]);

        //14
        Option::create([
            "padre"=>"10",
            "nombre"=>"Tipo de comprobantes",
            "ruta"=>"compras/tcomprobantes",
            "descripcion"=>"",
            "orden"=>"1",
            "icono_r"=>""
        ]);


        //15
        Option::create([
            "nombre"=>"Ventas",
            "descripcion"=>"",
            "icono_l"=>"fa-laptop",
            "orden"=>"1",
        ]);

        //16
        Option::create([
            "padre"=>"15",
            "nombre"=>"Ventas",
            "ruta"=>"ventas/ventas",
            "descripcion"=>"",
            "orden"=>"2",
            "icono_r"=>""
        ]);

        //17
        Option::create([
            "padre"=>"15",
            "nombre"=>"Estados",
            "ruta"=>"ventas/vestados",
            "descripcion"=>"",
            "orden"=>"2",
            "icono_r"=>""
        ]);

        //18
        Option::create([
            "padre"=>"15",
            "nombre"=>"Clientes",
            "ruta"=>"ventas/clientes",
            "descripcion"=>"",
            "orden"=>"3",
            "icono_r"=>""
        ]);

        //19
        Option::create([
            "nombre"=>"Medicamentos",
            "descripcion"=>"",
            "icono_l"=>"fa-ambulance",
            "orden"=>"1",
        ]);

        //20
        Option::create([
            "padre"=>"19",
            "nombre"=>"Laboratorios",
            "ruta"=>"medicamentos/laboratorios",
            "descripcion"=>"",
            "orden"=>"1",
            "icono_r"=>""
        ]);

        //21
        Option::create([
            "padre"=>"19",
            "nombre"=>"Categorías",
            "ruta"=>"medicamentos/fcategorias",
            "descripcion"=>"",
            "orden"=>"2",
            "icono_r"=>""
        ]);

        //22
        Option::create([
            "padre"=>"19",
            "nombre"=>"Farmacos",
            "ruta"=>"medicamentos/farmacos",
            "descripcion"=>"",
            "orden"=>"3",
            "icono_r"=>""
        ]);

        //23
        Option::create([
            "padre"=>"19",
            "nombre"=>"Medicamentos",
            "ruta"=>"medicamentos/medicamentos",
            "descripcion"=>"",
            "orden"=>"4",
            "icono_r"=>""
        ]);

        Option::create([
            "nombre"=>"Ayuda",
            "descripcion"=>"Manual de usuario y tutoriales",
            "icono_l"=>"fa-plus-square",
            "icono_r"=>"",
            "orden"=>"2",
        ]);

        Option::create([
            "nombre"=>"Acerca De...",
            "descripcion"=>"",
            "icono_l"=>"fa-info-circle",
            "icono_r"=>"",
            "orden"=>"2",
        ]);
    }
}
