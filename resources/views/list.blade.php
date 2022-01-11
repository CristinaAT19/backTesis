<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Documentacion de ERP</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<body class="antialiased">
    <div class=" mx-auto sm:px-6 lg:px-8">

        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
            <h1>
                Documentacion API: ERP
            </h1>
        </div>

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">


            <div class="d-flex align-items-start">
                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                    <button class="nav-link active" id="v-pills-listarUnidadesDepartamento-tab" data-bs-toggle="pill" data-bs-target="#v-pills-listarUnidadesDepartamento" type="button" role="tab" aria-controls="v-pills-listarUnidadesDepartamento" aria-selected="true">Listar unidades = Departamento</button>
                    <button class="nav-link" id="v-pills-muestraPerfiles-tab" data-bs-toggle="pill" data-bs-target="#v-pills-muestraPerfiles" type="button" role="tab" aria-controls="v-pills-muestraPerfiles" aria-selected="false">Muestra perfiles</button>
                    <button class="nav-link" id="v-pills-mostrarDatosPerfil-tab" data-bs-toggle="pill" data-bs-target="#v-pills-mostrarDatosPerfil" type="button" role="tab" aria-controls="v-pills-mostrarDatosPerfil" aria-selected="false">Mostrar datos por perfil</button>
                    <button class="nav-link" id="v-pills-actualizarPuntuacionCV-tab" data-bs-toggle="pill" data-bs-target="#v-pills-actualizarPuntuacionCV" type="button" role="tab" aria-controls="v-pills-actualizarPuntuacionCV" aria-selected="false">Actualizar puntuacion CV</button>
                    <button class="nav-link" id="v-pills-actualizarPuntuacionConducta-tab" data-bs-toggle="pill" data-bs-target="#v-pills-actualizarPuntuacionConducta" type="button" role="tab" aria-controls="v-pills-actualizarPuntuacionConducta" aria-selected="false">Actualizar puntuacion Conducta</button>
                    <button class="nav-link" id="v-pills-actualizarPuntuacionEntrevista-tab" data-bs-toggle="pill" data-bs-target="#v-pills-actualizarPuntuacionEntrevista" type="button" role="tab" aria-controls="v-pills-actualizarPuntuacionEntrevista" aria-selected="false">Actualizar puntuacion Entrevista</button>
                    <button class="nav-link" id="v-pills-actualizarPuntuacionConocimiento-tab" data-bs-toggle="pill" data-bs-target="#v-pills-actualizarPuntuacionConocimiento" type="button" role="tab" aria-controls="v-pills-actualizarPuntuacionConocimiento" aria-selected="false">Actualizar puntuacion Conocimientos</button>
                    <button class="nav-link" id="v-pills-listarRevisionCV-tab" data-bs-toggle="pill" data-bs-target="#v-pills-listarRevisionCV" type="button" role="tab" aria-controls="v-pills-listarRevisionCV" aria-selected="false">Listar revisión Cv</button>
                    <button class="nav-link" id="v-pills-listarObsevacionConducta-tab" data-bs-toggle="pill" data-bs-target="#v-pills-listarObsevacionConducta" type="button" role="tab" aria-controls="v-pills-listarObsevacionConducta" aria-selected="false">Listar observación conducta</button>
                    <button class="nav-link" id="v-pills-listarEntrevistaStar-tab" data-bs-toggle="pill" data-bs-target="#v-pills-listarEntrevistaStar" type="button" role="tab" aria-controls="v-pills-listarEntrevistaStar" aria-selected="false">Listar entrevista STAR</button>
                    <button class="nav-link" id="v-pills-listarEvaluacionConocimientos-tab" data-bs-toggle="pill" data-bs-target="#v-pills-listarEvaluacionConocimientos" type="button" role="tab" aria-controls="v-pills-listarEvaluacionConocimientos" aria-selected="false">Listar evaluación de conocimientos</button>

                </div>

                <div class="tab-content paddding-bottom:3px paddding-right:3px" id="v-pills-tabContent">

                    <div class="tab-pane fade" id="v-pills-listarUnidadesDepartamento" role="tabpanel" aria-labelledby="v-pills-listarUnidadesDepartamento-tab">
                        <strong>Ruta: </strong>
                        <label id="p1"></label>https://desarrollo.consigueventas.com/Backend/public/api/unidades</br>

                        <label><strong>Descripcion: </strong>Muestra las unidades disponibles - unidades = departamentos</label></br>
                        <label><strong>Requisitos: </strong>---</label></br>
                        <label><strong>Metodos: </strong><strong>GET</strong></label></br>
                        <label><strong>Campos Requeridos: </strong>- - -</label></br>
                        <label><strong>Ejemplo: </strong></br>
                            "Unidades": [
                            "Administración y Calidad",
                            "Comercial",
                            "Consigueventas",
                            "Inprendi",
                            "Jhoel Fernández",
                            "Producción",
                            "Relaciones Publicas",
                            "Sistemas",
                            "Talento Humano"
                            ]
                        </label></br>

                        <button onclick="copyToClipboard('#p1')"><i class="far fa-copy"></i></button>
                        <br />
                        <br />
                        <label><strong>Token: </strong>Bearer</label></br>
                        <label><strong>Tipo de Usuario: </strong>Reclutamiento</label>
                    </div>


                    <div class="tab-pane fade" id="v-pills-muestraPerfiles" role="tabpanel" aria-labelledby="v-pills-muestraPerfiles-tab">
                        <strong>Ruta: </strong>
                        <label id="p1"></label>https://desarrollo.consigueventas.com/Backend/public/api/perfil</br>

                        <label><strong>Descripcion: </strong>Muestra los perfiles</label></br>
                        <label><strong>Requisitos: </strong>- - -</label></br>
                        <label><strong>Metodos: </strong><strong>GET</strong></label></br>
                        <label><strong>Campos Requeridos: </strong>- - -</label></br>
                        <label><strong>Ejemplo: </strong></br>
                            "perfiles": [
                            {
                            "perfil_Id": "1",
                            "perfil_nombre": "Diseñador web",
                            "perfil_Id_Sub_Area_fk": "2"
                            },
                            {
                            "perfil_Id": "2",
                            "perfil_nombre": "Maquetador web",
                            "perfil_Id_Sub_Area_fk": "2"
                            },
                        </label></br>

                        <button onclick="copyToClipboard('#p1')"><i class="far fa-copy"></i></button>
                        <br />
                        <br />
                        <label><strong>Token: </strong>Bearer</label></br>
                        <label><strong>Tipo de Usuario: </strong>Reclutamiento</label>
                    </div>

                    <div class="tab-pane fade" id="v-pills-mostrarDatosPerfil" role="tabpanel" aria-labelledby="v-pills-mostrarDatosPerfil-tab">
                        <strong>Ruta: </strong>
                        <label id="p1"></label>https://desarrollo.consigueventas.com/Backend/public/api/perfil/{id}</br>

                        <label><strong>Descripcion: </strong>Muestra areas, subareas y toda la informacion segun el perfil</label></br>
                        <label><strong>Requisitos: </strong>{id}: Es el id del perfil</label></br>
                        <label><strong>Metodos: </strong><strong>GET</strong></label></br>
                        <label><strong>Campos Requeridos: </strong>- - -</label></br>
                        <label><strong>Ejemplo: </strong></br>
                            "perfiles": [
                            {
                            "Marca": "Grupo Consigueventas Inversiones E.I.R.L",
                            "Unidad": "Sistemas",
                            "Area": "Desarrollo de sistemas",
                            "SubArea": "Fronted",
                            "IdPerfil": "1",
                            "Perfil": "Diseñador web"
                            }
                            ]
                        </label></br>

                        <button onclick="copyToClipboard('#p1')"><i class="far fa-copy"></i></button>
                        <br />
                        <br />
                        <label><strong>Token: </strong>Bearer</label></br>
                        <label><strong>Tipo de Usuario: </strong>Reclutamiento</label>
                    </div>

                    <div class="tab-pane fade" id="v-pills-actualizarPuntuacionCV" role="tabpanel" aria-labelledby="v-pills-actualizarPuntuacionCV-tab">
                        <strong>Ruta: </strong>
                        <label id="p1"></label>https://desarrollo.consigueventas.com/Backend/public/api/actualizarPuntajeCv/{id}</br>

                        <label><strong>Descripcion: </strong>Modifica la puntuacion del cv de un postulante</label></br>
                        <label><strong>Requisitos: </strong>{id}: Es el id del postulante</label></br>
                        <label><strong>Metodos: </strong><strong>POST</strong></label></br>
                        <label><strong>Campos Requeridos: </strong>Puntaje1, Puntaje2, Puntaje3, Puntaje4, Puntaje5, Puntaje6, Puntaje7, Puntaje8</label></br>
                        <label><strong>Ejemplo: </strong></br>
                            {
                            "Puntaje1" : 2,
                            "Puntaje2" : 2,
                            "Puntaje3" : 2,
                            "Puntaje4" : 2,
                            "Puntaje5" : 2,
                            "Puntaje6" : 2,
                            "Puntaje7" : 2,
                            "Puntaje8" : 2
                            }
                            NOTA: los campos deben ser enteros entre 0 y 2
                        </label></br>

                        <button onclick="copyToClipboard('#p1')"><i class="far fa-copy"></i></button>
                        <br />
                        <br />
                        <label><strong>Token: </strong>Bearer</label></br>
                        <label><strong>Tipo de Usuario: </strong></label>
                    </div>

                    <div class="tab-pane fade" id="v-pills-actualizarPuntuacionConducta" role="tabpanel" aria-labelledby="v-pills-actualizarPuntuacionConducta-tab">
                        <strong>Ruta: </strong>
                        <label id="p1"></label>https://desarrollo.consigueventas.com/Backend/public/api/actualizarPuntajeConducta/{id}</br>

                        <label><strong>Descripcion: </strong>Modifica la puntuacion de conducta de un postulante</label></br>
                        <label><strong>Requisitos: </strong>{id}: Es el id del postulante</label></br>
                        <label><strong>Metodos: </strong><strong>POST</strong></label></br>
                        <label><strong>Campos Requeridos: </strong>Puntaje1, Puntaje2, Puntaje3, Puntaje4, Puntaje5, Puntaje6, Puntaje7, Puntaje8, Puntaje9, Puntaje10, Puntaje11, Observaciones</label></br>
                        <label><strong>Ejemplo: </strong></br>
                            {
                            "Puntaje1" : 2,
                            "Puntaje2" : 2,
                            "Puntaje3" : 2,
                            "Puntaje4" : 2,
                            "Puntaje5" : 2,
                            "Puntaje6" : 2,
                            "Puntaje7" : 2,
                            "Puntaje8" : 2,
                            "Puntaje9" : 2,
                            "Puntaje10" : 2,
                            "Puntaje11" : 2,
                            "Observaciones" : "sin observaciones"
                            } NOTA: los campos deben ser enteros entre 0 y 1
                        </label></br>

                        <button onclick="copyToClipboard('#p1')"><i class="far fa-copy"></i></button>
                        <br />
                        <br />
                        <label><strong>Token: </strong>Bearer</label></br>
                        <label><strong>Tipo de Usuario: </strong></label>
                    </div>

                    <div class="tab-pane fade" id="v-pills-actualizarPuntuacionEntrevista" role="tabpanel" aria-labelledby="v-pills-actualizarPuntuacionEntrevista-tab">
                        <strong>Ruta: </strong>
                        <label id="p1"></label>https://desarrollo.consigueventas.com/Backend/public/api/actualizarPuntajeEntrevista/{id}</br>

                        <label><strong>Descripcion: </strong>Modifica la puntuacion de entrevista de un postulante</label></br>
                        <label><strong>Requisitos: </strong>{id}: Es el id del postulante</label></br>
                        <label><strong>Metodos: </strong><strong>POST</strong></label></br>
                        <label><strong>Campos Requeridos: </strong>Puntaje1, Puntaje2, Puntaje3, Puntaje4, Puntaje5, Puntaje6, Puntaje7, Puntaje8</label></br>
                        <label><strong>Ejemplo: </strong></br>
                            {
                            "Puntaje1" : 1,
                            "Puntaje2" : 1,
                            "Puntaje3" : 1,
                            "Puntaje4" : 1,
                            "Puntaje5" : 1,
                            "Puntaje6" : 1,
                            "Puntaje7" : 1,
                            "Puntaje8" : 1
                            }
                            NOTA: los campos deben ser enteros entre 0 y 5
                        </label></br>

                        <button onclick="copyToClipboard('#p1')"><i class="far fa-copy"></i></button>
                        <br />
                        <br />
                        <label><strong>Token: </strong>Bearer</label></br>
                        <label><strong>Tipo de Usuario: </strong></label>
                    </div>

                    <div class="tab-pane fade" id="v-pills-actualizarPuntuacionConocimiento" role="tabpanel" aria-labelledby="v-pills-actualizarPuntuacionConocimiento-tab">
                        <strong>Ruta: </strong>
                        <label id="p1"></label>https://desarrollo.consigueventas.com/Backend/public/api/actualizarPuntajeConocimientos/{id}</br>

                        <label><strong>Descripcion: </strong>Modifica la puntuacion de conocimientos de un postulante</label></br>
                        <label><strong>Requisitos: </strong>{id}: Es el id del postulante</label></br>
                        <label><strong>Metodos: </strong><strong>POST</strong></label></br>
                        <label><strong>Campos Requeridos: </strong>Puntaje1, Puntaje2, Puntaje3, Puntaje4</label></br>
                        <label><strong>Ejemplo: </strong></br>
                            {
                            "Puntaje1" : 1,
                            "Puntaje2" : 1,
                            "Puntaje3" : 1,
                            "Puntaje4" : 1
                            }
                            NOTA: los campos deben ser enteros entre 0 y 2
                        </label></br>

                        <button onclick="copyToClipboard('#p1')"><i class="far fa-copy"></i></button>
                        <br />
                        <br />
                        <label><strong>Token: </strong>Bearer</label></br>
                        <label><strong>Tipo de Usuario: </strong></label>
                    </div>

                    <div class="tab-pane fade" id="v-pills-listarRevisionCV" role="tabpanel" aria-labelledby="v-pills-listarRevisionCV-tab">
                        <strong>Ruta: </strong>
                        <label id="p1"></label>https://desarrollo.consigueventas.com/Backend/public/api/listarRevisionCv</br>

                        <label><strong>Descripcion: </strong>Muestra los puntajes del Cv de todos los postulantes</label></br>
                        <label><strong>Requisitos: </strong>- - -</label></br>
                        <label><strong>Metodos: </strong><strong>GET</strong></label></br>
                        <label><strong>Campos Requeridos: </strong>- - -</label></br>
                        <label><strong>Ejemplo: </strong></br>
                            "evaluacion": [
                            {
                            "Id": "1",
                            "Nombres y Apellido": "Isai Aliaga",
                            "Edad": "21",
                            "Dni": "75033283",
                            "Tipo de Puesto a Postular": "Desarrollador Laravel",
                            "¿Se aprecia con precisión el objetivo profesional?": "2",
                            "¿Se ha expuesto la titulación principal y el detalle de los estudios?": "2",
                            "¿Se ha dado tres o cuatro datos importantes que lo definan profesionalmente?": "2",
                            "Orden (cronológico/funcional)": "2",
                            "Redacción, Ortografía": "2",
                            "Presentación general: tipo de letra y estructura": "2",
                            "Correo: ¿La dirección de correo electrónico facilitada transmite seriedad?": "2",
                            "Foto: ¿La fotografía es reciente? ¿Sugiere optimismo y formalismo? ¿Es de buena calidad?": "2",
                            "Puntaje Total": "16",
                            "Resultado final": "Aprobado"
                            }
                            ]
                        </label></br>

                        <button onclick="copyToClipboard('#p1')"><i class="far fa-copy"></i></button>
                        <br />
                        <br />
                        <label><strong>Token: </strong>Bearer</label></br>
                        <label><strong>Tipo de Usuario: </strong></label>
                    </div>

                    <div class="tab-pane fade" id="v-pills-listarObsevacionConducta" role="tabpanel" aria-labelledby="v-pills-listarObsevacionConducta-tab">
                        <strong>Ruta: </strong>
                        <label id="p1"></label>https://desarrollo.consigueventas.com/Backend/public/api/listarObservacionConducta/</br>

                        <label><strong>Descripcion: </strong>Muestra los puntajes de conducta de todos los postulantes</label></br>
                        <label><strong>Requisitos: </strong>- - -</label></br>
                        <label><strong>Metodos: </strong><strong>GET</strong></label></br>
                        <label><strong>Campos Requeridos: </strong>- - -</label></br>
                        <label><strong>Ejemplo: </strong></br>
                            "evaluacion": [
                            {
                            "Id": "1",
                            "Nombres y Apellido": "Isai Aliaga",
                            "Edad": "21",
                            "Dni": "75033283",
                            "Tipo de Puesto a Postular": "Desarrollador Laravel",
                            "Está atento/a a las explicaciones que se le da": "2",
                            "Comprende las instrucciones de forma rápida": "2",
                            "Pregunta ante la presencia de alguna dificultad.": "2",
                            "Muestra interés durante el desarrollo de las sesiones.": "2",
                            "Mantiene una postura adecuada.": "2",
                            "NO Utiliza un lenguaje soez y/o vulgar para expresarse.": "2",
                            "Responde de manera asertiva.": "2",
                            "NO Se muestra tenso/a y/o nervioso/a.": "2",
                            "NO Muestra fatiga y/o irritabilidad durante las sesiones.": "2",
                            "NO Usa objetos distractores durante las sesiones (teléfono, MP4, tablet, etc)": "2",
                            "Se presenta con ropa adecuada a la entrevista": "2",
                            "Observaciones": "sin observaciones",
                            "Puntaje Total": "22",
                            "Resultado final": "Aprobado"
                            }
                            ]
                        </label></br>

                        <button onclick="copyToClipboard('#p1')"><i class="far fa-copy"></i></button>
                        <br />
                        <br />
                        <label><strong>Token: </strong>Bearer</label></br>
                        <label><strong>Tipo de Usuario: </strong></label>
                    </div>

                    <div class="tab-pane fade" id="v-pills-listarEntrevistaStar" role="tabpanel" aria-labelledby="v-pills-listarEntrevistaStar-tab">
                        <strong>Ruta: </strong>
                        <label id="p1"></label>https://desarrollo.consigueventas.com/Backend/public/api/listarEntrevistaStar</br>

                        <label><strong>Descripcion: </strong>Muestra los puntajes de la entrevista STAR de todos los postulantes</label></br>
                        <label><strong>Requisitos: </strong>- - -</label></br>
                        <label><strong>Metodos: </strong>GET<strong></strong></label></br>
                        <label><strong>Campos Requeridos: </strong>- - -</label></br>
                        <label><strong>Ejemplo: </strong></br>
                            "evaluacion": [
                            {
                            "Id": "1",
                            "Nombres y Apellido": "Isai Aliaga",
                            "Edad": "21",
                            "Dni": "75033283",
                            "Tipo de Puesto a Postular": "Desarrollador Laravel",
                            "Trabajo en equipo": "1",
                            "Capacidad para aprender": "1",
                            "Comunicación efectiva": "1",
                            "Capacidad de Planificación y de organización": "1",
                            "Liderazgo para el cambio": "1",
                            "Adaptabilidad al cambio": "1",
                            "Creatividad e Innovación": "1",
                            "Resolución de Conflictos": "1",
                            "Puntaje Total": "1.00",
                            "Resultado final": "Desaprobado"
                            }
                            ]
                        </label></br>

                        <button onclick="copyToClipboard('#p1')"><i class="far fa-copy"></i></button>
                        <br />
                        <br />
                        <label><strong>Token: </strong>Bearer</label></br>
                        <label><strong>Tipo de Usuario: </strong></label>
                    </div>

                    <div class="tab-pane fade" id="v-pills-listarEvaluacionConocimientos" role="tabpanel" aria-labelledby="v-pills-listarEvaluacionConocimientos-tab">
                        <strong>Ruta: </strong>
                        <label id="p1"></label>https://desarrollo.consigueventas.com/Backend/public/api/listarEvaluacionConocimientos</br>

                        <label><strong>Descripcion: </strong>Muestra los puntajes de conocimientos de todos los postulantes</label></br>
                        <label><strong>Requisitos: </strong>- - -</label></br>
                        <label><strong>Metodos: </strong><strong>GET</strong></label></br>
                        <label><strong>Campos Requeridos: </strong>- - -</label></br>
                        <label><strong>Ejemplo: </strong></br>
                            "evaluacion": [
                            {
                            "Id": "1",
                            "Nombres y Apellido": "Isai Aliaga",
                            "Edad": "21",
                            "Dni": "75033283",
                            "Tipo de Puesto a Postular": "Desarrollador Laravel",
                            "(1) PREGUNTA DE CONOCIMIENTOS": "1",
                            "(2) PREGUNTA DE CONOCIMIENTOS": "1",
                            "(3) PREGUNTA DE CONOCIMIENTOS": "1",
                            "(4) PREGUNTA DE CONOCIMIENTOS": "1",
                            "Puntaje Total": "4",
                            "Resultado final": "Desaprobado"
                            }
                            ]
                        </label></br>

                        <button onclick="copyToClipboard('#p1')"><i class="far fa-copy"></i></button>
                        <br />
                        <br />
                        <label><strong>Token: </strong>Bearer</label></br>
                        <label><strong>Tipo de Usuario: </strong></label>
                    </div>


                </div>
            </div>

        </div>
    </div>

    <div class=" mx-auto sm:px-6 lg:px-8 d-flex align-items-start">
        <button type="button">
            <strong> <a href="./asistencia">Ir a Documentacion Asistencia</a></strong>
        </button>
        <button type="button">
            <strong> <a href="./ERP">Ir a Documentacion ERP</a></strong>
        </button>
    </div>
    <script>
        function copyToClipboard(elemento) {
            var $temp = $("<input>")
            $("body").append($temp);
            $temp.val($(elemento).text()).select();
            document.execCommand("copy");
            $temp.remove();
        }
    </script>
</body>

</html>