<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Refugio - PanitasPet</title>
    @vite(['resources/css/stylessadmin.css'])

    <style>
        /* Form Styles */
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #5a3a1a;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-family: inherit;
        }

        .form-control:focus {
            border-color: #eeba30;
            outline: none;
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            background: #eeba30;
            color: #5a3a1a;
            font-weight: 700;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn-submit:hover {
            background: #d4a015;
        }

        .header {
            background: #fff;
            padding: 15px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }

        .back-link {
            color: #5a3a1a;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
    </style>
</head>

<body>
    <div class="main-container">
        <header class="header">
            <a href="{{ route('refugio.dashboard') }}" class="back-link">&larr; Volver al Panel</a>
        </header>

        <main class="form-container">
            <h1 style="color:#5a3a1a; margin-bottom:25px; text-align:center;">Gestionar Perfil del Refugio</h1>

            <form action="{{ route('refugio.storeProfile') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="nombre">Nombre del Refugio</label>
                    <input type="text" id="nombre" name="nombre" class="form-control"
                        value="{{ old('nombre', $refugio->nombre ?? '') }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="direccion">Dirección</label>
                    <input type="text" id="direccion" name="direccion" class="form-control"
                        value="{{ old('direccion', $refugio->direccion ?? '') }}">
                </div>

                <div class="form-group">
                    <label class="form-label" for="telefono">Teléfono de Contacto</label>
                    <input type="text" id="telefono" name="telefono" class="form-control"
                        value="{{ old('telefono', $refugio->telefono ?? '') }}">
                </div>

                <div class="form-group">
                    <label class="form-label" for="email">Email Público</label>
                    <input type="email" id="email" name="email" class="form-control"
                        value="{{ old('email', $refugio->email ?? '') }}">
                </div>

                <div class="form-group">
                    <label class="form-label" for="descripcion">Descripción / Misión</label>
                    <textarea id="descripcion" name="descripcion" class="form-control" rows="5">{{ old('descripcion', $refugio->descripcion ?? '') }}</textarea>
                </div>

                <button type="submit" class="btn-submit">Guardar Perfil</button>
            </form>
        </main>
    </div>
</body>

</html>
