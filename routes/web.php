<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Categoria;
use Illuminate\Support\Facades\URL;
use App\Models\Producto;
use App\Models\Banner;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MaquitecController; // <-- 1. Importamos el controlador nuevo
use App\Http\Controllers\BannerController; // <-- AÃ±ade esto arriba con los demÃ¡s controladores
use App\Models\Interaccion;
use Carbon\Carbon;

// 2. Ruta principal conectada al controlador para evitar errores de variables no definidas en la vista
Route::get('/', [MaquitecController::class, 'index']);

Route::get('/nosotros', function () {
    return view('nosotros');
});

// ==========================================
// RUTA PÃšBLICA DE CATEGORÃAS (Detalle por ID)
// ==========================================
Route::get('/categorias/{id}', [CategoriaController::class, 'show'])
    ->whereNumber('id')
    ->name('categorias.show');

// ==========================================
// RUTA DE PRODUCTOS (Conectada a la Base de Datos)
// ==========================================
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');

Route::get('/productos/cotizar/{producto}', function ($producto) {
    $productoEncontrado = \App\Models\Producto::where('slug', $producto)->first();

    if (!$productoEncontrado) {
        return redirect('/productos');
    }

    $productImages = $productoEncontrado->gallery_images;
    $productImage = $productImages[0] ?? 'img/img_maquitec1.jpg';

    return view('producto-cotizar', [
        'slug' => $productoEncontrado->slug,
        'productTitle' => $productoEncontrado->nombre,
        'productDescription' => $productoEncontrado->descripcion,
        'productImage' => $productImage,
        'productImages' => $productImages ?: [$productImage],
    ]);
});

Route::post('/productos/cotizar', function (Request $request) {
    $validated = $request->validate([
        'product' => ['required', 'exists:productos,slug'],
        'name' => ['required', 'string', 'max:255'],
        'company' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255'],
        'phone' => ['required', 'string', 'max:50'],
        'message' => ['required', 'string', 'max:5000'],
    ]);

    if (in_array(config('mail.default'), ['log', 'array'], true)) {
        return back()->withInput()->withErrors([
            'quote' => 'El correo no estÃ¡ configurado para envÃ­o. Configura SMTP en el archivo .env e intÃ©ntalo nuevamente.',
        ]);
    }

    $product = Producto::with('categoria')->where('slug', $validated['product'])->firstOrFail();
    $quote = array_merge($validated, [
        'product_name' => $product->nombre,
        'product_description' => $product->descripcion,
        'product_image' => $product->imagen,
        'category_name' => $product->categoria?->nombre,
    ]);

    try {
        Mail::to(config('mail.quote_to'))->send(new \App\Mail\QuoteRequestReceived($quote));
    } catch (\Throwable $exception) {
        report($exception);

        return back()->withInput()->withErrors([
            'quote' => 'No se pudo enviar la solicitud. Revisa la configuraciÃ³n del correo e intÃ©ntalo nuevamente.',
        ]);
    }

    Interaccion::create([
        'tipo' => 'producto',
        'item' => $product->nombre,
        'canal' => 'cotizacion',
        'accion' => 'consulta_real',
        'ip' => $request->ip(),
        'user_id' => Auth::id(),
    ]);

    return back()->with('message', 'Tu solicitud fue enviada correctamente. Nos pondremos en contacto contigo pronto.');
})->middleware('throttle:5,1');

Route::post('/interacciones/registrar', function (Request $request) {
    $validated = $request->validate([
        'tipo' => ['required', 'in:producto,servicio'],
        'item' => ['required', 'string', 'max:255'],
        'canal' => ['required', 'in:cotizacion,whatsapp'],
    ]);

    Interaccion::create([
        ...$validated,
        'accion' => 'consulta_real',
        'ip' => $request->ip(),
        'user_id' => Auth::id(),
    ]);

    return response()->json(['ok' => true]);
})->middleware('throttle:30,1')->name('interacciones.registrar');

Route::get('/servicios', function () {
    return view('servicios');
});

Route::get('/politica-de-cookies', function () {
    return view('legal', [
        'pageTitle' => 'PolÃ­tica de Cookies',
        'pageType' => 'cookies',
    ]);
})->name('cookies.policy');

Route::get('/politica-de-privacidad', function () {
    return view('legal', [
        'pageTitle' => 'PolÃ­tica de Privacidad',
        'pageType' => 'privacy',
    ]);
})->name('privacy.policy');

Route::get('/aviso-legal', function () {
    return view('legal', [
        'pageTitle' => 'Aviso Legal',
        'pageType' => 'legal',
    ]);
})->name('legal.notice');

Route::get('/politica-de-seguridad', function () {
    return view('legal', [
        'pageTitle' => 'PolÃ­tica de Seguridad',
        'pageType' => 'security',
    ]);
})->name('security.policy');

Route::get('/terminos-y-condiciones', function () {
    return view('legal', [
        'pageTitle' => 'TÃ©rminos y Condiciones de Uso',
        'pageType' => 'terms',
    ]);
})->name('terms');

Route::get('/libro-de-reclamaciones', function () {
    return view('libro-reclamaciones');
})->name('complaints.index');

Route::post('/libro-de-reclamaciones', function (Request $request) {
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'document_type' => ['required', 'in:DNI,CE,RUC,Pasaporte'],
        'document_number' => ['required', 'string', 'max:20'],
        'email' => ['required', 'email', 'max:255'],
        'phone' => ['required', 'string', 'max:50'],
        'address' => ['nullable', 'string', 'max:255'],
        'claim_type' => ['required', 'in:Reclamo,Queja'],
        'product' => ['nullable', 'string', 'max:255'],
        'order_number' => ['nullable', 'string', 'max:100'],
        'purchase_date' => ['nullable', 'date'],
        'detail' => ['required', 'string', 'max:5000'],
        'customer_request' => ['nullable', 'string', 'max:3000'],
        'consent' => ['accepted'],
    ]);

    if (in_array(config('mail.default'), ['log', 'array'], true)) {
        return back()->withInput()->withErrors([
            'email' => 'El correo no estÃ¡ configurado para envÃ­o. Configura SMTP en el archivo .env e intÃ©ntalo nuevamente.',
        ]);
    }

    $claim = array_merge($validated, [
        'code' => 'MQT-' . now()->format('Ymd') . '-' . strtoupper(substr(bin2hex(random_bytes(4)), 0, 8)),
        'received_at' => now()->format('d/m/Y H:i'),
    ]);

    try {
        Mail::to(config('mail.quote_to'))->send(new \App\Mail\ComplaintReceived($claim));
    } catch (\Throwable $exception) {
        report($exception);

        return back()->withInput()->withErrors([
            'email' => 'No se pudo enviar el libro de reclamaciones. IntÃ©ntalo nuevamente o comunÃ­cate con nosotros.',
        ]);
    }

    return back()->with('message', "Tu {$claim['claim_type']} fue registrado correctamente con el cÃ³digo {$claim['code']}.");
})->middleware('throttle:5,1')->name('complaints.store');

Route::get('/aviso-de-seguridad', function () {
    return response("Contact: mailto:maquitec.servicios0601@gmail.com\nExpires: 2027-10-27T00:00:00.000Z\nPreferred-Languages: es, en\nCanonical: ".config('app.url')."/.well-known/security.txt\n", 200, ['Content-Type' => 'text/plain; charset=UTF-8']);
});

Route::get('/.well-known/security.txt', function () {
    return redirect('/aviso-de-seguridad', 308);
});

Route::get('/sitemap.xml', function () {
    $urls = collect(['/','/nosotros','/productos','/servicios','/politica-de-cookies','/politica-de-privacidad','/politica-de-seguridad','/terminos-y-condiciones','/libro-de-reclamaciones'])
        ->map(fn ($path) => '<url><loc>'.e(url($path)).'</loc><changefreq>weekly</changefreq><priority>'.($path === '/' ? '1.0' : '0.7').'</priority></url>')
        ->implode('');

    foreach (Producto::where('estado', 'Disponible')->get(['slug', 'updated_at']) as $producto) {
        $urls .= '<url><loc>'.e(url('/productos/cotizar/'.$producto->slug)).'</loc><lastmod>'.$producto->updated_at?->toW3cString().'</lastmod><changefreq>monthly</changefreq><priority>0.6</priority></url>';
    }

    return response('<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'.$urls.'</urlset>', 200, ['Content-Type' => 'application/xml; charset=UTF-8']);
});

Route::get('/contacto', function () {
    return view('contacto');
});

// ==========================================
// RUTA DE CIERRE DE SESIÃ“N
// ==========================================
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

Route::get('/forgot-password', function (Request $request) {
    return view('auth.forgot-password', [
        'email' => old('email', Auth::check() ? Auth::user()->email : $request->query('email')),
    ]);
})->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate([
        'email' => ['required', 'email', 'max:255'],
    ]);

    $email = Auth::check()
        ? Auth::user()->email
        : $request->string('email')->toString();
    
    try {
        $status = Password::sendResetLink(['email' => $email]);
    } catch (Throwable $exception) {
        report($exception);
        return back()->withErrors([
            'email' => 'No se pudo enviar el correo de recuperaciÃ³n. Verifica la configuraciÃ³n del servidor de correo.',
        ])->withInput(['email' => $email]);
    }

    if ($status === Password::RESET_LINK_SENT) {
        return back()->with(
            'status',
            "Enlace seguro enviado al correo registrado: {$email}"
        );
    }

    return back()->withErrors([
        'email' => 'No existe una cuenta registrada con ese correo.',
    ])->withInput(['email' => $email]);
})->middleware(['throttle:6,1'])->name('password.email');

Route::post('/perfil/password/email', function (Request $request) {
    $email = $request->user()->email;
    try {
        $status = Password::sendResetLink(['email' => $email]);
    } catch (Throwable $exception) {
        report($exception);
        return back()->withErrors([
            'email' => 'No se pudo enviar el correo de recuperaciÃ³n. Verifica la configuraciÃ³n SMTP del servidor.',
        ]);
    }

    if ($status !== Password::RESET_LINK_SENT) {
        return back()->withErrors([
            'email' => 'El enlace no pudo generarse. Espera un momento e intÃ©ntalo nuevamente.',
        ]);
    }

    return back()->with(
        'status',
        "Enlace de recuperaciÃ³n enviado al correo registrado: {$email}"
    );
})->middleware(['auth', 'throttle:6,1'])->name('password.email.authenticated');

Route::get('/reset-password/{token}', function (Request $request, string $token) {
    return view('auth.reset-password', [
        'token' => $token,
        'email' => old('email', $request->query('email')),
    ]);
})->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => ['required', 'string'],
        'email' => ['required', 'email', 'max:255'],
        'password' => ['required', 'string', 'min:8', 'confirmed', 'different:email'],
    ], [
        'password.confirmed' => 'La confirmaciÃ³n de la contraseÃ±a no coincide.',
        'password.min' => 'La contraseÃ±a debe tener al menos 8 caracteres.',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password),
            ])->save();

            $user->setRememberToken(Str::random(60));
            $user->save();
        }
    );

    if ($status === Password::PASSWORD_RESET) {
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return redirect()->route('login')->with(
            'status',
            'Tu contraseÃ±a fue restablecida correctamente. Ya puedes iniciar sesiÃ³n.'
        );
    }

    return back()->withErrors([
        'email' => 'El enlace expirÃ³ o la solicitud no es vÃ¡lida. Solicita uno nuevo.',
    ])->withInput($request->only('email'));
})->middleware(['throttle:6,1'])->name('password.update');

Route::get('/perfil', function () {
    return view('perfil');
})->middleware('auth')->name('profile');

Route::put('/perfil/password', function (Request $request) {
    try {
        $status = Password::sendResetLink(['email' => $request->user()->email]);
    } catch (Throwable $exception) {
        report($exception);
        return back()->withErrors([
            'email' => 'No se pudo enviar el correo de recuperaciÃ³n. Verifica la configuraciÃ³n SMTP del servidor.',
        ]);
    }

    if ($status !== Password::RESET_LINK_SENT) {
        return back()->withErrors([
            'email' => 'No se pudo enviar el enlace. IntÃ©ntalo nuevamente.',
        ]);
    }

    return back()->with(
        'status',
        'Enlace de autenticaciÃ³n enviado al correo registrado: '.$request->user()->email
    );
})->middleware('auth')->name('password.update.custom');

Route::get('/email/verify', function (Request $request) {
    return view('auth.verify-email', [
        'email' => $request->session()->get('verification_email'),
    ]);
})->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (Request $request, string $id, string $hash) {
    $user = User::findOrFail($id);
    $validHash = hash_equals(sha1($user->getEmailForVerification()), $hash);

    abort_unless(URL::hasValidSignature($request) && $validHash, 403);

    if (! $user->hasVerifiedEmail()) {
        $user->markEmailAsVerified();
    }

    return redirect()->route('login')->with('status', 'Tu correo fue verificado. Ya puedes iniciar sesiÃ³n.');
})->middleware('throttle:6,1')->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $email = $request->session()->get('verification_email');
    $user = $email ? User::where('email', $email)->first() : null;

    if (! $user || $user->hasVerifiedEmail()) {
        return redirect()->route('login')->withErrors([
            'email' => 'No hay una cuenta pendiente de verificaciÃ³n en esta sesiÃ³n. Inicia sesiÃ³n o regÃ­strate nuevamente.',
        ]);
    }

    try {
        $user->sendEmailVerificationNotification();
    } catch (\Throwable $exception) {
        report($exception);

        return redirect()->route('verification.notice')
            ->with('verification_email', $user->email)
            ->with('verification_error', 'No se pudo enviar el correo. IntÃ©ntalo nuevamente mÃ¡s tarde.');
    }

    return redirect()->route('verification.notice')
        ->with('verification_email', $user->email)
        ->with('status', 'Te enviamos un nuevo enlace de verificaciÃ³n.');
})->middleware('throttle:6,1')->name('verification.send');

Route::get('/admin/dashboard', function (Request $request) {
    abort_unless(
        Auth::user()->rol === 'Administrador' || Auth::user()->email === 'ventas@maquitec.com',
        403
    );

    $totalProductos = Producto::count();
    $totalCategorias = Categoria::count();
    $totalBanners = Banner::count();
    $totalUsuarios = User::count();
    $totalInteracciones = Interaccion::count();

    $filtradas = Interaccion::query();
    $ahoraLima = Carbon::now('America/Lima');
    $semanaActual = $ahoraLima->copy()->startOfWeek(Carbon::MONDAY)->startOfDay();

    if ($request->filled('desde')) {
        try {
            $desdeLima = Carbon::createFromFormat('Y-m-d', $request->desde, 'America/Lima')->startOfDay();
            $filtradas->where('created_at', '>=', $desdeLima->copy()->timezone('UTC'));
        } catch (\Throwable $exception) {
        }
    }
    if ($request->filled('hasta')) {
        try {
            $hastaLima = Carbon::createFromFormat('Y-m-d', $request->hasta, 'America/Lima')->endOfDay();
            $filtradas->where('created_at', '<=', $hastaLima->copy()->timezone('UTC'));
        } catch (\Throwable $exception) {
        }
    }
    if ($request->filled('semana')) {
        try {
            $inicioSemana = Carbon::createFromFormat('Y-m-d', $request->semana, 'America/Lima')->startOfDay();
            $finSemana = $inicioSemana->copy()->endOfWeek(Carbon::SUNDAY)->endOfDay();
            $filtradas->where('created_at', '>=', $inicioSemana->copy()->timezone('UTC'));
            $filtradas->where('created_at', '<=', $finSemana->copy()->timezone('UTC'));
        } catch (\Throwable $exception) {
            // Ignorar una semana invÃ¡lida y mantener el dashboard accesible.
        }
    } else {
        $finSemanaActual = $semanaActual->copy()->endOfWeek(Carbon::SUNDAY)->endOfDay();
        $filtradas->where('created_at', '>=', $semanaActual->copy()->timezone('UTC'));
        $filtradas->where('created_at', '<=', $finSemanaActual->copy()->timezone('UTC'));
    }
    if ($request->filled('tipo')) {
        $filtradas->where('tipo', $request->tipo);
    }
    if ($request->filled('item')) {
        $filtradas->where('item', 'like', '%' . trim($request->item) . '%');
    }
    if ($request->filled('canal')) {
        $filtradas->where('canal', $request->canal);
    }

    $resumenItems = (clone $filtradas)
        ->selectRaw('tipo, item, COUNT(*) as total')
        ->groupBy('tipo', 'item')
        ->orderByDesc('total')
        ->get();

    $topProductos = $resumenItems->where('tipo', 'producto')->take(10)->values();
    $topServicios = $resumenItems->where('tipo', 'servicio')->take(10)->values();
    $itemsDisponibles = Interaccion::query()
        ->select('tipo', 'item')
        ->distinct()
        ->orderBy('tipo')
        ->orderBy('item')
        ->get();

    $historial = (clone $filtradas)
        ->latest()
        ->limit(100)
        ->get();

    $semanasDisponibles = collect();
    for ($offset = 11; $offset >= 0; $offset--) {
        $inicio = $semanaActual->copy()->subWeeks($offset);
        $semanasDisponibles->push([
            'valor' => $inicio->format('Y-m-d'),
            'label' => $inicio->format('d/m/Y') . ' - ' . $inicio->copy()->endOfWeek(Carbon::SUNDAY)->format('d/m/Y'),
        ]);
    }

    if ($request->filled('semana')) {
        try {
            $inicioGrafica = Carbon::createFromFormat('Y-m-d', $request->semana, 'America/Lima')->startOfWeek(Carbon::MONDAY)->startOfDay();
        } catch (\Throwable $exception) {
            $inicioGrafica = $semanaActual;
        }
    } else {
        $inicioGrafica = $semanaActual;
    }

    $diasGrafica = collect();
    $nombresDias = ['Lun', 'Mar', 'MiÃ©', 'Jue', 'Vie', 'SÃ¡b', 'Dom'];
    for ($offset = 0; $offset < 7; $offset++) {
        $dia = $inicioGrafica->copy()->addDays($offset);
        $inicioDiaUtc = $dia->copy()->startOfDay()->timezone('UTC');
        $finDiaUtc = $dia->copy()->endOfDay()->timezone('UTC');
        $total = (clone $filtradas)
            ->where('created_at', '>=', $inicioDiaUtc)
            ->where('created_at', '<=', $finDiaUtc)
            ->count();

        $diasGrafica->push([
            'fecha' => $dia->format('Y-m-d'),
            'dia' => $nombresDias[$offset],
            'label' => $dia->format('d/m'),
            'total' => $total,
        ]);
    }

    $finGrafica = $inicioGrafica->copy()->endOfWeek(Carbon::SUNDAY);
    $semanaAnterior = $inicioGrafica->copy()->subWeek()->format('Y-m-d');
    $semanaSiguiente = $inicioGrafica->copy()->addWeek()->format('Y-m-d');
    $totalSemana = $diasGrafica->sum('total');

    return view('admin-dashboard', compact(
        'totalProductos',
        'totalCategorias',
        'totalBanners',
        'totalUsuarios',
        'totalInteracciones',
        'topProductos',
        'topServicios',
        'historial',
        'diasGrafica',
        'semanasDisponibles',
        'inicioGrafica',
        'finGrafica',
        'semanaAnterior',
        'semanaSiguiente',
        'totalSemana',
        'itemsDisponibles'
    ));
})->middleware('auth')->name('admin.dashboard');


// ==========================================
// RUTAS DE GESTIÃ“N DE USUARIOS (Solo Administradores)
// ==========================================
Route::middleware(['auth', 'can:manage-admin'])->group(function () {
    Route::get('/admin/usuarios', [UserController::class, 'index'])->name('admin.usuarios.index');
    Route::get('/admin/usuarios/{id}/edit', [UserController::class, 'edit'])->name('admin.usuarios.edit');
    Route::put('/admin/usuarios/{id}', [UserController::class, 'update'])->name('admin.usuarios.update');
    Route::delete('/admin/usuarios/{id}', [UserController::class, 'destroy'])->name('admin.usuarios.destroy');
});

// ==========================================
// RUTAS DE GESTIÃ“N DE PRODUCTOS (Solo Administradores)
// ==========================================
Route::middleware(['auth', 'can:manage-admin'])->group(function () {
    Route::get('/admin/productos', [ProductoController::class, 'adminIndex'])->name('admin.productos.index');
    Route::get('/admin/productos/crear', [ProductoController::class, 'create'])->name('admin.productos.create');
    Route::post('/admin/productos', [ProductoController::class, 'store'])->name('admin.productos.store');
    Route::get('/admin/productos/{id}/edit', [ProductoController::class, 'edit'])->name('admin.productos.edit');
    Route::put('/admin/productos/{id}', [ProductoController::class, 'update'])->name('admin.productos.update');
    Route::delete('/admin/productos/{id}', [ProductoController::class, 'destroy'])->name('admin.productos.destroy');
});

// ==========================================
// RUTAS DE GESTIÃ“N DE CATEGORÃAS (Solo Administradores)
// ==========================================
Route::middleware(['auth', 'can:manage-admin'])->group(function () {
    Route::get('/admin/categorias', [CategoriaController::class, 'index'])->name('admin.categorias.index');
    Route::get('/admin/categorias/crear', [CategoriaController::class, 'create'])->name('admin.categorias.create');
    Route::post('/admin/categorias', [CategoriaController::class, 'store'])->name('admin.categorias.store');
    Route::get('/admin/categorias/{id}/edit', [CategoriaController::class, 'edit'])->name('admin.categorias.edit');
    Route::put('/admin/categorias/{id}', [CategoriaController::class, 'update'])->name('admin.categorias.update');
    Route::delete('/admin/categorias/{id}', [CategoriaController::class, 'destroy'])->name('admin.categorias.destroy');
});

// ==========================================
// RUTAS DE GESTIÃ“N DE BANNERS (Solo Administradores)
// ==========================================
Route::middleware(['auth', 'can:manage-admin'])->group(function () {
    Route::get('/admin/banners', [BannerController::class, 'index'])->name('admin.banners.index');
    Route::get('/admin/banners/crear', [BannerController::class, 'create'])->name('admin.banners.create');
    Route::post('/admin/banners', [BannerController::class, 'store'])->name('admin.banners.store');
    Route::get('/admin/banners/{id}/edit', [BannerController::class, 'edit'])->name('admin.banners.edit');
    Route::put('/admin/banners/{id}', [BannerController::class, 'update'])->name('admin.banners.update');
    Route::delete('/admin/banners/{id}', [BannerController::class, 'destroy'])->name('admin.banners.destroy');

    Route::get('/admin/configuracion', function () {
        return view('admin.configuracion');
    })->name('admin.configuracion');
});


// ==========================================
// RUTAS DE AUTENTICACIÃ“N (Solo para invitados)
// ==========================================
Route::middleware(['guest'])->group(function () {
    
    // Vistas de AutenticaciÃ³n (GET)
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');

    // Procesar Registro (POST)
    Route::post('/register', function (Request $request) {
        $validated = $request->validate([
            'tipo_usuario' => ['required', 'in:persona,empresa'],
            'name' => 'required|string|max:255',
            'documento' => [
                'required',
                'digits:' . ($request->input('tipo_usuario') === 'empresa' ? 11 : 8),
                'unique:users,documento',
            ],
            'fecha_nacimiento' => ['exclude_if:tipo_usuario,empresa', 'required_if:tipo_usuario,persona', 'date', 'before:today'],
            'telefono' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'legal_acceptance' => ['required', 'accepted'],
        ], [
            'documento.digits' => $request->input('tipo_usuario') === 'empresa'
                ? 'El RUC debe contener exactamente 11 dÃ­gitos.'
                : 'El DNI debe contener exactamente 8 dÃ­gitos.',
            'documento.unique' => 'Este documento ya estÃ¡ registrado.',
            'fecha_nacimiento.required_if' => 'La fecha de nacimiento es obligatoria para personas.',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'rol' => 'Cliente',
            'tipo_usuario' => $validated['tipo_usuario'],
            'documento' => $validated['documento'],
            'fecha_nacimiento' => $validated['fecha_nacimiento'] ?? null,
            'telefono' => $validated['telefono'],
        ]);

        try {
            $user->sendEmailVerificationNotification();
        } catch (\Throwable $exception) {
            report($exception);

            return redirect()->route('verification.notice')
                ->with('verification_email', $user->email)
                ->with('verification_error', 'Tu cuenta fue registrada, pero no se pudo enviar el correo. Puedes intentarlo nuevamente.');
        }

        return redirect()->route('verification.notice')
            ->with('verification_email', $user->email)
            ->with('status', 'Cuenta creada. Revisa tu correo y confirma la direcciÃ³n para poder iniciar sesiÃ³n.');
    })->middleware('throttle:3,1');

    // Procesar Login (POST)
    Route::post('/login', function (Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (! Auth::user()->hasVerifiedEmail()) {
                Auth::logout();

                return back()->withErrors([
                    'email' => 'Debes verificar tu correo antes de iniciar sesiÃ³n. Revisa el enlace que te enviamos.',
                ])->withInput($request->only('email'));
            }

            $request->session()->regenerate();
            return redirect()->intended('/'); 
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->withInput();
    })->middleware('throttle:5,1');
});