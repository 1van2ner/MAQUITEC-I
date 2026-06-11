<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('maquitec');
});

Route::get('/nosotros', function () {
    return view('nosotros');
});

Route::get('/productos', function () {
    return view('productos');
});

Route::get('/productos/cotizar/{producto}', function ($producto) {
    $items = [
        'montacargas' => [
            'title' => 'Montacargas y carretillas',
            'description' => 'Soluciones resistentes para movilizar carga en bodegas, talleres y líneas de producción.',
            'image' => 'img/img_maquitec1.jpg',
        ],
        'reposapies' => [
            'title' => 'Reposapiés y equipos de apoyo',
            'description' => 'Productos que complementan la operación segura y eficiente del personal y la maquinaria.',
            'image' => 'img/img_maquitec2.jpg',
        ],
        'componentes' => [
            'title' => 'Componentes y repuestos',
            'description' => 'Disponemos de piezas clave para mantenimiento y reposición de equipos industriales.',
            'image' => 'img/img_maquitec3.jpg',
        ],
        'accesorios' => [
            'title' => 'Accesorios especializados',
            'description' => 'Herramientas y accesorios para soluciones a medida de cada cliente.',
            'image' => 'img/img_maquitec4.jpg',
        ],
    ];

    if (!isset($items[$producto])) {
        return redirect('/productos');
    }

    return view('producto-cotizar', [
        'slug' => $producto,
        'productTitle' => $items[$producto]['title'],
        'productDescription' => $items[$producto]['description'],
        'productImage' => $items[$producto]['image'],
    ]);
});

Route::post('/productos/cotizar', function (Request $request) {
    return back()->with('message', 'Gracias. Hemos recibido tu solicitud de cotización y te responderemos pronto.');
});

Route::get('/servicios', function () {
    return view('servicios');
});

Route::get('/contacto', function () {
    return view('contacto');
});
