<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Categoria; 
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MaquitecController; // <-- 1. Importamos el controlador nuevo

// 2. Ruta principal conectada al controlador para evitar errores de variables no definidas en la vista
Route::get('/', [MaquitecController::class, 'index']);

Route::get('/nosotros', function () {
    return view('nosotros');
});

// ==========================================
// RUTA PÚBLICA DE CATEGORÍAS (Detalle por ID)
// ==========================================
Route::get('/categorias/{id}', [CategoriaController::class, 'show'])
    ->whereNumber('id')
    ->name('categorias.show');

// ==========================================
// RUTA DE PRODUCTOS (Conectada a la Base de Datos)
// ==========================================
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');

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

// ==========================================
// RUTA DE CIERRE DE SESIÓN
// ==========================================
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

Route::get('/perfil', function () {
    return view('perfil');
})->middleware('auth')->name('profile');

Route::get('/admin/dashboard', function () {
    abort_unless(
        Auth::user()->rol === 'Administrador' || Auth::user()->email === 'ventas@maquitec.com',
        403
    );

    return view('admin-dashboard');
})->middleware('auth')->name('admin.dashboard');


// ==========================================
// RUTAS DE GESTIÓN DE USUARIOS (Solo Administradores)
// ==========================================
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/usuarios', [UserController::class, 'index'])->name('admin.usuarios.index');
    Route::get('/admin/usuarios/{id}/edit', [UserController::class, 'edit'])->name('admin.usuarios.edit');
    Route::put('/admin/usuarios/{id}', [UserController::class, 'update'])->name('admin.usuarios.update');
    Route::delete('/admin/usuarios/{id}', [UserController::class, 'destroy'])->name('admin.usuarios.destroy');
});

// ==========================================
// RUTAS DE GESTIÓN DE PRODUCTOS (Solo Administradores)
// ==========================================
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/productos', [ProductoController::class, 'adminIndex'])->name('admin.productos.index');
    Route::get('/admin/productos/crear', [ProductoController::class, 'create'])->name('admin.productos.create');
    Route::post('/admin/productos', [ProductoController::class, 'store'])->name('admin.productos.store');
    Route::get('/admin/productos/{id}/edit', [ProductoController::class, 'edit'])->name('admin.productos.edit');
    Route::put('/admin/productos/{id}', [ProductoController::class, 'update'])->name('admin.productos.update');
    Route::delete('/admin/productos/{id}', [ProductoController::class, 'destroy'])->name('admin.productos.destroy');
});

// ==========================================
// RUTAS DE GESTIÓN DE CATEGORÍAS (Solo Administradores)
// ==========================================
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/categorias', [CategoriaController::class, 'index'])->name('admin.categorias.index');
    Route::get('/admin/categorias/crear', [CategoriaController::class, 'create'])->name('admin.categorias.create');
    Route::post('/admin/categorias', [CategoriaController::class, 'store'])->name('admin.categorias.store');
    Route::get('/admin/categorias/{id}/edit', [CategoriaController::class, 'edit'])->name('admin.categorias.edit');
    Route::put('/admin/categorias/{id}', [CategoriaController::class, 'update'])->name('admin.categorias.update');
    Route::delete('/admin/categorias/{id}', [CategoriaController::class, 'destroy'])->name('admin.categorias.destroy');
});


// ==========================================
// RUTAS DE AUTENTICACIÓN (Solo para invitados)
// ==========================================
Route::middleware(['guest'])->group(function () {
    
    // Vistas de Autenticación (GET)
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');

    // Procesar Registro (POST)
    Route::post('/register', function (Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => 'Cliente', 
            'telefono' => $request->telefono ?? null,
            'direccion' => $request->direccion ?? null,
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect('/')->with('success', '¡Bienvenido a MAQUITEC I.S.A.C.!');
    });

    // Procesar Login (POST)
    Route::post('/login', function (Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/'); 
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->withInput();
    });
});