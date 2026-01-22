<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicar Mascota</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f3e9;
            color: #333;
            padding: 20px;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }
        
        .container {
            width: 100%;
            max-width: 900px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            padding: 30px;
        }
        
        h1 {
            color: #9b6b01;
            font-size: 24px;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #ebdcbb;
        }
        
        .modal-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        
        .form-row {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }
        
        .form-group {
            flex: 1;
            min-width: 200px;
        }
        
        .full-width {
            flex: 0 0 100%;
        }
        
        label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
        }
        
        input, select, textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e1e5e9;
            border-radius: 8px;
            font-size: 15px;
            font-family: inherit;
            background-color: white;
        }
        
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #af7700;
        }
        
        textarea {
            resize: vertical;
        }
        
        .photo-box {
            border: 2px dashed #ebdcbb;
            border-radius: 10px;
            padding: 25px;
            text-align: center;
            background-color: #fcf9f0;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }
        
        .photo-upload-area {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }
        
        .photo-preview {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }
        
        .char-counter {
            text-align: right;
            font-size: 13px;
            color: #666;
            margin-top: 5px;
        }
        
        .file-input-hidden {
            display: none;
        }
        
        .file-input-label {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 15px;
            border: 2px solid #e1e5e9;
            border-radius: 8px;
            background-color: white;
            cursor: pointer;
        }
        
        .file-input-text {
            color: #666;
        }
        
        .file-icon {
            color: #af7700;
            font-size: 18px;
        }
        
        .submit-btn {
            background-color: #9b6b01;
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 20px;
            align-self: flex-start;
            transition: background-color 0.2s;
        }
        
        .submit-btn:hover {
            background-color: #af7700;
        }
        
        @media (max-width: 768px) {
            .form-row {
                flex-direction: column;
                gap: 15px;
            }
            
            .form-group {
                min-width: 100%;
            }
            
            .container {
                padding: 20px;
            }
            
            body {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Publicar Mascota para Adopción</h1>
        
        <form class="modal-form" id="publicarForm" method="POST" action="{{ route('vistavacia.add') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group" style="flex:0 0 220px;">
                    <div class="photo-box" aria-hidden="true">
                        <div class="photo-upload-area">
                            <input type="file" id="fotoMascota" name="foto" accept="image/*" >
                            <div class="photo-preview" id="photoPreview">
                                
                                <i class="fas fa-camera" style="font-size:34px;color:#af7700"></i>
                                
                                <p style="color:#af7700">Añadir foto</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="flex:1; display:flex; flex-direction:column; gap:14px;">
                    <div class="form-group">
                        <label for="nombre" style="color:#af7700">Nombre</label>
                        <input type="text" id="nombre" name="nombre" placeholder="Nombre del panita" required>
                    </div>

                    <div>
                        <div class="form-group">
                            <label for="especie" style="color:#af7700">Especie</label>
                           <select name="id_especies" required>
    <option value="">Seleccione una especie</option>
    @foreach($especies as $especie)
        <option value="{{ $especie->id }}">
            {{ $especie->nombre }}
        </option>
    @endforeach
</select>
                        </div>

                        <div class="form-row" style="margin-top:8px;">
                            <div class="form-group" style="flex:0 0 140px;">
                                <label for="edad" style="color:#af7700">Edad</label>
                                <input type="number" name="edad" id="edad" min="0" max="30" placeholder="Años" required>
                            </div>

                            <div class="form-group" style="flex:0 0 140px;">
                                <label for="peso" style="color:#af7700">Peso (LB)</label>
                                <input type="number" name="peso" id="peso" min="0" max="100" placeholder="Peso" required>                                          
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="tamano" style="color:#af7700">Tamaño</label>
                    <select id="tamano" name="tamano" required>
                        <option value="" disabled selected>Tamaño de la mascota</option>
                        <option value="Pequeño">Pequeño</option>
                        <option value="Mediano">Mediano</option>
                        <option value="Grande">Grande</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="sexo" style="color:#af7700">Sexo</label>
                    <select id="sexo" name="genero" required>
                        <option value="" disabled selected>Sexo de la mascota</option>
                        <option value="Macho">Macho</option>
                        <option value="Hembra">Hembra</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group full-width">
                    <label for="descripcion" style="color:#af7700">Descripción</label>
                    <textarea id="descripcion" name="descripcion" rows="5" placeholder="Descripción de la mascota" required maxlength="500"></textarea>
                    <div class="char-counter"><span id="charCount">0</span> / 500</div>
                </div>
            </div>

            <div class="form-row">
                <div style="flex:1; display:flex; flex-direction:column; gap:14px;">
                    <div class="form-group">
                        <label for="historial" style="color:#af7700">Historial médico</label>
                        <input type="file" id="historial" class="file-input-hidden" name="documentacion" multiple accept=".pdf,.jpg,.jpeg,.png,.doc,.docx" />
                        <label for="historial" class="file-input-label" title="Añadir archivos">
                            <span class="file-input-text">Seleccionar archivos...</span>
                            <i class="fas fa-paperclip file-icon" aria-hidden="true"></i>
                        </label>
                    </div>

                    <div>
                        <div class="form-group">
                            <label for="raza" style="color:#af7700">Raza</label>
                            <select id="raza" name="raza" required>
                                <option value="" disabled selected>Raza de la mascota</option>
                                <option value="criollo">Criollo</option>
                                <option value="labrador">Labrador</option>
                                <option value="pastor">Pastor Alemán</option>
                                <option value="siames">Siamés</option>
                                <option value="persa">Persa</option>
                                <option value="otro">Otra raza</option>
                            </select>
                        </div>

                        <div class="form-row" style="margin-top:8px;">
                            <div class="form-group" style="flex:0 0 300px;">
                                <label for="otros_animales" style="color:#af7700">¿Se lleva bien con otros animales?</label>
                                <select id="otros_animales" name="otros_animales" required>
                                    <option value=""  disabled selected>Si/No</option>                                                
                                    <option value="0">Sí</option>
                                    <option value="1">No</option>
                                </select>
                            </div>

                            <div class="form-group" style="flex:0 0 300px;">
                                <label for="personas" style="color:#af7700">¿Se lleva bien con personas?</label>
                                <select id="personas" name="personas" required>
                                    <option value="" disabled selected>Si/No</option>                                                
                                    <option value="0">Sí</option>
                                    <option value="1">No</option>
                                </select>                                      
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-row">                                 
                <div class="form-group" style="flex:0 0 631px;">
                    <label for="ubicacion" style="color:#af7700">Ubicación del responsable</label>
                    <select id="ubicacion" name="ubicacion" required>
                        <option value="" disabled selected>Coloque la ubicación del responsable</option>                                                
                        <option value="Caracas">Caracas</option>
                        <option value="Miranda">Miranda</option>
                        <option value="La Guaira">La Guaira</option>
                        <option value="Zulia">Zulia</option>
                        <option value="Lara">Lara</option>
                        <option value="Carabobo">Carabobo</option>
                        <option value="Sucre">Sucre</option>
                        <option value="Anzoátegui">Anzoátegui</option>
                        <option value="Nueva Esparta">Nueva Esparta</option>
                    </select>
                </div>
            </div>

            <div class="form-row" style="margin-top:8px;">
                <div class="form-group" style="flex:0 0 300px;">
                    <label for="vacunado" style="color:#af7700">¿Está vacunado el panita?</label>
                    <select id="vacunado" name="vacunado" required>
                        <option value="" disabled selected>Si/No</option>                                                
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <div class="form-group" style="flex:0 0 300px;">
                    <label for="esterilizado" style="color:#af7700">¿Está esterilizado el panita?</label>
                    <select id="esterilizado" name="esterilizado" required>
                        <option value="" disabled selected>Si/No</option>                                                
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>    
                </div>
            </div>

            <button type="submit" class="submit-btn">Publicar Mascota</button>
        </form>
    </div>
      @if ($errors->any())
    <div class="alert alert-error" style="background:#ffe5e5; color:#8b0000; padding:12px; border-radius:8px; margin-bottom:16px;">
        <strong>❌ Ocurrieron errores al publicar la mascota:</strong>
        <ul style="margin-top:8px; padding-left:20px;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</body>
</html>