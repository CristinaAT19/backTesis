<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Documentacion de API</title>

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
                Documentacion API: Asistencia
            </h1>
        </div>

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">


            <div class="d-flex align-items-start">
                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-marcarAsistencia-tab" data-bs-toggle="pill" data-bs-target="#v-pills-marcarAsistencia" type="button" role="tab" aria-controls="v-pills-marcarAsistencia" aria-selected="true">Marcar Asistencia</button>
                    <button class="nav-link" id="v-pills-acceder-tab" data-bs-toggle="pill" data-bs-target="#v-pills-acceder" type="button" role="tab" aria-controls="v-pills-acceder" aria-selected="false">Acceder </button>
                    <button class="nav-link" id="v-pills-cerrarSesion-tab" data-bs-toggle="pill" data-bs-target="#v-pills-cerrarSesion" type="button" role="tab" aria-controls="v-pills-cerrarSesion" aria-selected="false">Cerrar sesión</button>
                    <button class="nav-link" id="v-pills-mostrarAsistencia-tab" data-bs-toggle="pill" data-bs-target="#v-pills-mostrarAsistencia" type="button" role="tab" aria-controls="v-pills-mostrarAsistencia" aria-selected="false">Mostrar asistencia - Tarde</button>
                    <button class="nav-link" id="v-pills-asistenciaDiaria-tab" data-bs-toggle="pill" data-bs-target="#v-pills-asistenciaDiaria" type="button" role="tab" aria-controls="v-pills-asistenciaDiaria" aria-selected="false">Asistencia diaria | Sin marcar | Ambos turnos</button>
                    <button class="nav-link" id="v-pills-listarFaltas-tab" data-bs-toggle="pill" data-bs-target="#v-pills-listarFaltas" type="button" role="tab" aria-controls="v-pills-listarFaltas" aria-selected="false">Listar faltas</button>
                    <button class="nav-link" id="v-pills-cambiarEstadoFaltas-tab" data-bs-toggle="pill" data-bs-target="#v-pills-cambiarEstadoFaltas" type="button" role="tab" aria-controls="v-pills-cambiarEstadoFaltas" aria-selected="false">Cambiar estado de faltas</button>
                    <button class="nav-link" id="v-pills-mostrarAsistenciaMañana-tab" data-bs-toggle="pill" data-bs-target="#v-pills-mostrarAsistenciaMañana" type="button" role="tab" aria-controls="v-pills-asistenciaDiaria" aria-selected="false">Mostrar asistencia - Mañana</button>
                    <button class="nav-link" id="v-pills-listarAdministrador-tab" data-bs-toggle="pill" data-bs-target="#v-pills-listarAdministrador" type="button" role="tab" aria-controls="v-pills-listarAdministrador" aria-selected="false">Listar Administrador</button>
                    <button class="nav-link" id="v-pills-resetearPassword-tab" data-bs-toggle="pill" data-bs-target="#v-pills-resetearPassword" type="button" role="tab" aria-controls="v-pills-resetearPassword" aria-selected="false">Resetear Password</button>
                    <button class="nav-link" id="v-pills-cambiarTipoUsuario-tab" data-bs-toggle="pill" data-bs-target="#v-pills-cambiarTipoUsuario" type="button" role="tab" aria-controls="v-pills-cambiarTipoUsuario" aria-selected="false">Cambiar Tipo de Usuario</button>
                    <button class="nav-link" id="v-pills-listarEmpleados-tab" data-bs-toggle="pill" data-bs-target="#v-pills-listarEmpleados" type="button" role="tab" aria-controls="v-pills-listarEmpleados" aria-selected="false">Listar Empleados</button>
                    <button class="nav-link" id="v-pills-insertarEmpleado-tab" data-bs-toggle="pill" data-bs-target="#v-pills-insertarEmpleado" type="button" role="tab" aria-controls="v-pills-insertarEmpleado" aria-selected="false">Insertar Empleado</button>
                    <button class="nav-link" id="v-pills-actualizarEmpleado-tab" data-bs-toggle="pill" data-bs-target="#v-pills-actualizarEmpleado" type="button" role="tab" aria-controls="v-pills-actualizarEmpleado" aria-selected="false">Actualizar Empleado</button>
                    <button class="nav-link" id="v-pills-cambiarPassword-tab" data-bs-toggle="pill" data-bs-target="#v-pills-cambiarPassword" type="button" role="tab" aria-controls="v-pills-cambiarPassword" aria-selected="false">Cambiar Password</button>
                    <button class="nav-link" id="v-pills-mostrarDisboardPersonal-tab" data-bs-toggle="pill" data-bs-target="#v-pills-mostrarDisboardPersonal" type="button" role="tab" aria-controls="v-pills-mostrarDisboardPersonal" aria-selected="false">Mostrar dashboard personal</button>
                    <button class="nav-link" id="v-pills-mostrarCalendarioUsuario-tab" data-bs-toggle="pill" data-bs-target="#v-pills-mostrarCalendarioUsuario" type="button" role="tab" aria-controls="v-pills-mostrarCalendarioUsuario" aria-selected="false">Mostrar calendario usuario</button>
                    <button class="nav-link" id="v-pills-mostrarTipoUsuario-tab" data-bs-toggle="pill" data-bs-target="#v-pills-mostrarTipoUsuario" type="button" role="tab" aria-controls="v-pills-mostrarTipoUsuario" aria-selected="false">Mostrar tipo de usuario</button>
                    <button class="nav-link" id="v-pills-mostrarAsistenciasConFiltradoDeFecha-tab" data-bs-toggle="pill" data-bs-target="#v-pills-mostrarAsistenciasConFiltradoDeFecha" type="button" role="tab" aria-controls="v-pills-mostrarAsistenciasConFiltradoDeFecha" aria-selected="false">Mostrar asistencias con filtrado de fecha</button>
                    <button class="nav-link" id="v-pills-mostrarTodasAsistencias-tab" data-bs-toggle="pill" data-bs-target="#v-pills-mostrarTodasAsistencias" type="button" role="tab" aria-controls="v-pills-mostrarTodasAsistencias" aria-selected="false">Mostrar todas las asistencias</button>
                    <button class="nav-link" id="v-pills-mostrarAreas-tab" data-bs-toggle="pill" data-bs-target="#v-pills-mostrarAreas" type="button" role="tab" aria-controls="v-pills-mostrarAreas" aria-selected="false">Mostrar areas</button>
                    <button class="nav-link" id="v-pills-mostrarUnidades-tab" data-bs-toggle="pill" data-bs-target="#v-pills-mostrarUnidades" type="button" role="tab" aria-controls="v-pills-mostrarUnidades" aria-selected="false">Mostrar unidades</button>
                    <button class="nav-link" id="v-pills-mostrarPerfiles-tab" data-bs-toggle="pill" data-bs-target="#v-pills-mostrarPerfiles" type="button" role="tab" aria-controls="v-pills-mostrarPerfiles" aria-selected="false">Mostrar perfiles</button>
                    <button class="nav-link" id="v-pills-mostrarMarcas-tab" data-bs-toggle="pill" data-bs-target="#v-pills-mostrarMarcas" type="button" role="tab" aria-controls="v-pills-mostrarMarcas" aria-selected="false">Mostrar marcas</button>
                </div>

                <div class="tab-content paddding-bottom:3px paddding-right:3px" id="v-pills-tabContent">

                    <div class="tab-pane fade" id="v-pills-marcarAsistencia" role="tabpanel" aria-labelledby="v-pills-marcarAsistencia-tab">
                        <strong>Ruta: </strong>
                        <label id="p1">https://desarrollo.consigueventas.com/Backend/public/api/marcar</label></br>

                        <label><strong>Descripcion: </strong>Sirve para marcar asistencia</label></br>
                        <label><strong>Requisitos: </strong>Todos los datos deben ser varchar</label></br>
                        <label><strong>Metodos: </strong><strong>POST</strong></label></br>
                        <label><strong>Campos Requeridos: </strong>"dni,plataforma,useragent,usertime"</label></br>
                        <label><strong>Ejemplo: </strong></br>
                            {
                            "dni" : "73615048",
                            "plataforma" : "web",
                            "useragent" : "agente",
                            "usertime" : "tiempo marcado"
                            }
                        </label></br>

                        <button onclick="copyToClipboard('#p1')"><i class="far fa-copy"></i></button>
                        <br />
                        <br />
                        <input type="text" placeholder="Pega aquí para probar" />
                        <label><strong>Token: </strong>No</label></br>
                        <label><strong>Tipo de Usuario: </strong>Administrador</label>
                    </div>


                    <div class="tab-pane fade" id="v-pills-acceder" role="tabpanel" aria-labelledby="v-pills-acceder-tab">
                        <label><strong>Ruta: </strong> https://desarrollo.consigueventas.com/Backend/public/api/acceso </label></br>
                        <label><strong>Descripcion: </strong>Sirve para marcar asistencia</label></br>
                        <label><strong>Requisitos: </strong>Para iniciar sesion solo se necesita dni y password, los datos son varchar y por defecto el usuario y la contraseña son su dni</label></br>
                        <label><strong>Metodos: </strong><strong>POST</strong></label></br>
                        <label><strong>Campos Requeridos: </strong>dni,password</label></br>
                        <label><strong>Ejemplo: </strong></br>
                            {
                            "dni":"77273141",
                            "password":"77273141"
                            }
                        </label></br>
                        <label><strong>Token: </strong>No</label> </br>
                        <label><strong>Tipo de Usuario: </strong>Cualquiera</label>
                    </div>



                    <div class="tab-pane fade" id="v-pills-cerrarSesion" role="tabpanel" aria-labelledby="v-pills-cerrarSesion-tab">
                        <label><strong>Ruta: </strong> https://desarrollo.consigueventas.com/Backend/public/api/cerrarsesion </label></br>
                        <label><strong>Descripcion: </strong>Sirve para cerrar sesion, elimina el token de acceso</label></br>
                        <label><strong>Requisitos: </strong>Token Bearer</label></br>
                        <label><strong>Metodos: </strong><strong>POST</strong></label></br>
                        <label><strong>Campos Requeridos: </strong>- - -</label></br>
                        <label><strong>Ejemplo: </strong></br>
                            - - -
                        </label></br>
                        <label><strong>Token: </strong>Si</label> </br>
                        <label><strong>Tipo de Usuario: </strong>Cualquiera</label>
                    </div>


                    <div class="tab-pane fade" id="v-pills-mostrarAsistencia" role="tabpanel" aria-labelledby="v-pills-mostrarAsistencia-tab">
                        <label><strong>Ruta: </strong> https://desarrollo.consigueventas.com/Backend/public/api/dashboard_ta </label></br>
                        <label><strong>Descripcion: </strong>Esta ruta es para mostrar todas las asistencias del turno tarde</label></br>
                        <label><strong>Requisitos: </strong>Token Bearer</label></br>
                        <label><strong>Metodos: </strong><strong>GET</strong></label></br>
                        <label><strong>Campos Requeridos: </strong>- - -</label></br>
                        <label><strong>Ejemplo: </strong></br>
                            - - -
                        </label></br>
                        <label><strong>Token: </strong>Si</label> </br>
                        <label><strong>Tipo de Usuario: </strong>Administrador</label>
                    </div>


                    <div class="tab-pane fade" id="v-pills-asistenciaDiaria" role="tabpanel" aria-labelledby="v-pills-asistenciaDiaria-tab">
                        <label><strong>Ruta: </strong> https://desarrollo.consigueventas.com/Backend/public/api/tablas_administrador </label></br>
                        <label><strong>Descripcion: </strong>Esta ruta te devuelve las asistencias de los empleados diarios. Tambien devuleve los empleados sin marcar de ambos turnos</label></br>
                        <label><strong>Requisitos: </strong>Token Bearer</label></br>
                        <label><strong>Metodos: </strong><strong>GET</strong></label></br>
                        <label><strong>Campos Requeridos: </strong>- - - </label></br>
                        <label><strong>Ejemplo: </strong></br>
                            - - -
                        </label></br>
                        <label><strong>Token: </strong>Si</label> </br>
                        <label><strong>Tipo de Usuario: </strong>Administrador</label>
                    </div>


                    <div class="tab-pane fade" id="v-pills-listarFaltas" role="tabpanel" aria-labelledby="v-pills-listarFaltas-tab">
                        <label><strong>Ruta: </strong> https://desarrollo.consigueventas.com/Backend/public/api/tabla_faltas/{id} </label></br>
                        <label><strong>Descripcion: </strong>Lista todas las faltas en la base de datos de cualquier turno</label></br>
                        <label><strong>Requisitos: </strong>Token Bearer</label></br>
                        <label><strong>Metodos: </strong><strong>GET</strong></label></br>
                        <label><strong>Campos Requeridos: </strong>- - -</label></br>
                        <label><strong>Ejemplo: </strong></br>
                            - - -
                        </label></br>
                        <label><strong>Token: </strong>Si</label> </br>
                        <label><strong>Tipo de Usuario: </strong>Administrador</label>
                    </div>


                    <div class="tab-pane fade" id="v-pills-cambiarEstadoFaltas" role="tabpanel" aria-labelledby="v-pills-cambiarEstadoFaltas-tab">
                        <label><strong>Ruta: </strong> https://desarrollo.consigueventas.com/Backend/public/api/tabla_faltas/{id} </label></br>
                        <label><strong>Descripcion: </strong>Esta ruta es para actualizar el tipo de falta(justificada o injustificada)</label></br>
                        <label><strong>Requisitos: </strong>
                            Se tiene que enviar el token de seguridadad con el prefijo Bearer.
                            La url {id} se tiene que remplazar por el del registro de la falta
                        </label></br>
                        <label><strong>Metodos: </strong><strong>POST</strong></label></br>
                        <label><strong>Campos Requeridos: </strong>
                            cambio_estado
                            //este campo
                            tiene que ser un
                            (3=justificado)
                            (4=injustificada)
                        </label></br>
                        <label><strong>Ejemplo: </strong></br>
                            {
                            "cambio_estado":4
                            }
                        </label></br>
                        <label><strong>Token: </strong>Si</label> </br>
                        <label><strong>Tipo de Usuario: </strong>Administrador</label>
                    </div>


                    <div class="tab-pane fade" id="v-pills-mostrarAsistenciaMañana" role="tabpanel" aria-labelledby="v-pills-mostrarAsistenciaMañana-tab">
                        <label><strong>Ruta: </strong> https://desarrollo.consigueventas.com/Backend/public/api/dashboard_ma </label></br>
                        <label><strong>Descripcion: </strong>Esta ruta es para mostrar todas las asistencias del turno mañana</label></br>
                        <label><strong>Requisitos: </strong>Token Bearer</label></br>
                        <label><strong>Metodos: </strong><strong>GET</strong></label></br>
                        <label><strong>Campos Requeridos: </strong>- - - </label></br>
                        <label><strong>Ejemplo: </strong></br>
                            - - -
                        </label></br>
                        <label><strong>Token: </strong>Si</label> </br>
                        <label><strong>Tipo de Usuario: </strong>Administrador</label>
                    </div>


                    <div class="tab-pane fade" id="v-pills-listarAdministrador" role="tabpanel" aria-labelledby="v-pills-listarAdministrador-tab">
                        <label><strong>Ruta: </strong> https://desarrollo.consigueventas.com/Backend/public/api/listarAdministrador </label></br>
                        <label><strong>Descripcion: </strong>Esta ruta permite listar a todos los administradores</label></br>
                        <label><strong>Requisitos: </strong>Token Bearer</label></br>
                        <label><strong>Metodos: </strong><strong>GET</strong></label></br>
                        <label><strong>Campos Requeridos: </strong>- - -</label></br>
                        <label><strong>Ejemplo: </strong></br>
                            - - -
                        </label></br>
                        <label><strong>Token: </strong>SI</label> </br>
                        <label><strong>Tipo de Usuario: </strong>Administrador</label>
                    </div>


                    <div class="tab-pane fade" id="v-pills-resetearPassword" role="tabpanel" aria-labelledby="v-pills-resetearPassword-tab">
                        <label><strong>Ruta: </strong> hthttps://desarrollo.consigueventas.com/Backend/public/api/resetearPassword </label></br>
                        <label><strong>Descripcion: </strong>Actualiza la contraseña y la pone igual que el dni del usuario</label></br>
                        <label><strong>Requisitos: </strong>Token Bearer</label></br>
                        <label><strong>Metodos: </strong><strong>POST</strong></label></br>
                        <label><strong>Campos Requeridos: </strong>DNI</label></br>
                        <label><strong>Ejemplo: </strong></br>
                            {
                            "dni" : "73615048"
                            }
                        </label></br>
                        <label><strong>Token: </strong>SI</label> </br>
                        <label><strong>Tipo de Usuario: </strong>Cualquiera</label>
                    </div>


                    <div class="tab-pane fade" id="v-pills-cambiarTipoUsuario" role="tabpanel" aria-labelledby="v-pills-cambiarTipoUsuario-tab">
                        <label><strong>Ruta: </strong> https://desarrollo.consigueventas.com/Backend/public/api/cambiarTipoUsuario </label></br>
                        <label><strong>Descripcion: </strong>Cambiar el tipo de usuario de administrador a empleado y visceversa</label></br>
                        <label><strong>Requisitos: </strong>Token Bearer</label></br>
                        <label><strong>Metodos: </strong><strong>POST</strong></label></br>
                        <label><strong>Campos Requeridos: </strong>DNI | TIPOUSUARIO(1,2)</label></br>
                        <label><strong>Ejemplo: </strong></br>
                            {
                            "dni":"77273141",
                            "tipoUsuario":1
                            }
                        </label></br>
                        <label><strong>Token: </strong>SI</label> </br>
                        <label><strong>Tipo de Usuario: </strong>Administrador</label>
                    </div>


                    <div class="tab-pane fade" id="v-pills-listarEmpleados" role="tabpanel" aria-labelledby="v-pills-listarEmpleados-tab">
                        <label><strong>Ruta: </strong> https://desarrollo.consigueventas.com/Backend/public/api/listarEmpleados </label></br>
                        <label><strong>Descripcion: </strong>Esta ruta permite mostrar a todos los empleados</label></br>
                        <label><strong>Requisitos: </strong>Token Bearer</label></br>
                        <label><strong>Metodos: </strong><strong>GET</strong></label></br>
                        <label><strong>Campos Requeridos: </strong>- - -</label></br>
                        <label><strong>Ejemplo: </strong></br>
                            - - -
                        </label></br>
                        <label><strong>Token: </strong>Si</label> </br>
                        <label><strong>Tipo de Usuario: </strong>Administrador</label>
                    </div>


                    <div class="tab-pane fade" id="v-pills-insertarEmpleado" role="tabpanel" aria-labelledby="v-pills-insertarEmpleado-tab">
                        <label><strong>Ruta: </strong> https://desarrollo.consigueventas.com/Backend/public/api/insertarEmpleado </label></br>
                        <label><strong>Descripcion: </strong>Esta ruta permite insertar un nuevo empleado</label></br>
                        <label><strong>Requisitos: </strong>Token Bearer</label></br>
                        <label><strong>Metodos: </strong><strong>POST</strong></label></br>
                        <label><strong>Campos Requeridos: </strong>
                            emp_nombre, emp_apellido, emp_fechabaja, emp_fec_inicio_prueba,
                            emp_Fec_fin_pruebaemp_TurnoId, emp_AreaId, emp_dni, emp_carrera,
                            emp_email, emp_telefono,emp_link_cv, Emp_Id_Condicion_capacitacion_fk,
                            emp_link_calificaciones, Emp_Id_Convenio_fk, emp_link_convenio, emp_fechanac,
                            emp_dias_extra
                        </label></br>
                        <label><strong>Ejemplo: </strong></br>
                            { "emp_nombre": "Joaquin",
                            "emp_apellido": "Ruiz",
                            "emp_fechabaja": "2021-10-10",
                            "emp_fec_inicio_prueba": "2021-10-12",
                            "emp_Fec_fin_prueba": "2022-12-01",
                            "emp_TurnoId": 1,
                            "emp_AreaId": 1,
                            "emp_dni" : "48964896",
                            "emp_carrera": "ing sistemas",
                            "emp_email": "joaquin@mail.com",
                            "emp_telefono": "978978111",
                            "emp_link_cv":"https://www.ejemplos.co/",
                            "Emp_Id_Condicion_capacitacion_fk": 3,
                            "emp_link_calificaciones": "https://www.ejemplos.co/",
                            "Emp_Id_Convenio_fk":5,
                            "emp_link_convenio": "https://www.ejemplos.co/",
                            "emp_fechanac":"1996-09-12",
                            "emp_dias_extra": 5 }
                        </label></br>
                        <label><strong>Token: </strong>Si</label> </br>
                        <label><strong>Tipo de Usuario: </strong>Administrador</label>
                    </div>


                    <div class="tab-pane fade" id="v-pills-actualizarEmpleado" role="tabpanel" aria-labelledby="v-pills-actualizarEmpleado-tab">
                        <label><strong>Ruta: </strong> https://desarrollo.consigueventas.com/Backend/public/api/actualizarEmpleado/{id} </label></br>
                        <label><strong>Descripcion: </strong>Esta ruta permite actualizar un empleado</label></br>
                        <label><strong>Requisitos: </strong>Token Bearer. La url {id} se tiene que remplazar por el ID del empleado a actualizar</label></br>
                        <label><strong>Metodos: </strong><strong>POST</strong></label></br>
                        <label><strong>Campos Requeridos: </strong>
                            emp_nombre, emp_apellido, emp_fechabaja, emp_fec_inicio_prueba, emp_Fec_fin_pruebaemp_TurnoId,
                            emp_AreaId, emp_dni, emp_carrera, emp_email, emp_telefono,emp_link_cv, Emp_Id_Condicion_capacitacion_fk,
                            emp_link_calificaciones, Emp_Id_Convenio_fk, emp_link_convenio, emp_fechanac, emp_dias_extra
                        </label></br>
                        <label><strong>Ejemplo: </strong></br>
                            { "emp_nombre": "Joaquin Markos",
                            "emp_apellido": "Ruiz Gonzales",
                            "emp_fechabaja": "2021-10-10",
                            "emp_fec_inicio_prueba": "2021-10-12",
                            "emp_Fec_fin_prueba": "2022-12-01",
                            "emp_TurnoId": 1,
                            "emp_AreaId": 1,
                            "emp_dni" : "48964896",
                            "emp_carrera": "ing sistemas",
                            "emp_email": "joaquinRG@mail.com",
                            "emp_telefono": "978978111",
                            "emp_link_cv":"https://www.ejemplos.co/",
                            "Emp_Id_Condicion_capacitacion_fk": 3,
                            "emp_link_calificaciones": "https://www.ejemplos.co/",
                            "Emp_Id_Convenio_fk":5,
                            "emp_link_convenio": "https://www.ejemplos.co/",
                            "emp_fechanac":"1996-09-12",
                            "emp_dias_extra": 5 }
                        </label></br>
                        <label><strong>Token: </strong>Si</label> </br>
                        <label><strong>Tipo de Usuario: </strong>Administrador</label>
                    </div>


                    <div class="tab-pane fade" id="v-pills-cambiarPassword" role="tabpanel" aria-labelledby="v-pills-cambiarPassword-tab">
                        <label><strong>Ruta: </strong> https://desarrollo.consigueventas.com/Backend/public/api/cambiarPassword </label></br>
                        <label><strong>Descripcion: </strong>Esta ruta, cambia la contraseña</label></br>
                        <label><strong>Requisitos: </strong>Token Bearer</label></br>
                        <label><strong>Metodos: </strong><strong>POST</strong></label></br>
                        <label><strong>Campos Requeridos: </strong>dni,oldPassword,newPassword</label></br>
                        <label><strong>Ejemplo: </strong></br>
                            {
                            "oldPassword" : "12345",
                            "newPassword" : "73073101"
                            }
                        </label></br>
                        <label><strong>Token: </strong>Si</label> </br>
                        <label><strong>Tipo de Usuario: </strong>Cualquiera</label>
                    </div>


                    <div class="tab-pane fade" id="v-pills-mostrarDisboardPersonal" role="tabpanel" aria-labelledby="v-pills-mostrarDisboardPersonal-tab">
                        <label><strong>Ruta: </strong> https://desarrollo.consigueventas.com/Backend/public/api/dashboardUsuario/{dni} </label></br>
                        <label><strong>Descripcion: </strong>Esto devulve el total de la asistencia diaria de un solo usuario</label></br>
                        <label><strong>Requisitos: </strong>
                            -Se tiene que enviar el token de seguridadad con el prefijo Bearer</br>
                            -Se tiene que enviar por url el dni del usuario
                        </label></br>
                        <label><strong>Metodos: </strong><strong>GET</strong></label></br>
                        <label><strong>Campos Requeridos: </strong>---</label></br>
                        <label><strong>Ejemplo: </strong></br>
                            https://desarrollo.consigueventas.com/Backend/public/api/dashboardUsuario/77670509
                        </label></br>
                        <label><strong>Token: </strong>Si</label> </br>
                        <label><strong>Tipo de Usuario: </strong>Cualquiera</label>
                    </div>


                    <div class="tab-pane fade" id="v-pills-mostrarCalendarioUsuario" role="tabpanel" aria-labelledby="v-pills-mostrarCalendarioUsuario-tab">
                        <label><strong>Ruta: </strong> https://desarrollo.consigueventas.com/Backend/public/api/calendario/{dni} </label></br>
                        <label><strong>Descripcion: </strong>
                            Esto devulve las asistencias de un solo usuario
                        </label></br>
                        <label><strong>Requisitos: </strong>
                            -Se tiene que enviar el token de seguridadad con el prefijo Bearer
                            -Se tiene que enviar por url el dni del usuario
                        </label></br>
                        <label><strong>Metodos: </strong><strong>GET</strong></label></br>
                        <label><strong>Campos Requeridos: </strong>---</label></br>
                        <label><strong>Ejemplo: </strong></br>https://desarrollo.consigueventas.com/Backend/public/api/calendario/77670509</label></br>
                        <label><strong>Token: </strong>Si</label> </br>
                        <label><strong>Tipo de Usuario: </strong>Cualquiera</label>
                    </div>


                    <div class="tab-pane fade" id="v-pills-mostrarTipoUsuario" role="tabpanel" aria-labelledby="v-pills-mostrarTipoUsuario-tab">
                        <label><strong>Ruta: </strong> https://desarrollo.consigueventas.com/Backend/public/api/asdasdasdasdadasdasdasdasdasdsadasdsadsaasdsaasdasdasdasdasdsadasdasdasdasdasd-noHayLink </label></br>
                        <label><strong>Descripcion: </strong> </label></br>
                        <label><strong>Requisitos: </strong> </label></br>
                        <label><strong>Metodos: </strong><strong> </strong></label></br>
                        <label><strong>Campos Requeridos: </strong> </label></br>
                        <label><strong>Ejemplo: </strong></br>

                        </label></br>
                        <label><strong>Token: </strong> </label> </br>
                        <label><strong>Tipo de Usuario: </strong> </label>
                    </div>


                    <div class="tab-pane fade" id="v-pills-mostrarAsistenciasConFiltradoDeFecha" role="tabpanel" aria-labelledby="v-pills-mostrarAsistenciasConFiltradoDeFecha-tab">
                        <label><strong>Ruta: </strong> https://desarrollo.consigueventas.com/Backend/public/api/filtradoFecha </label></br>
                        <label><strong>Descripcion: </strong>Devuelve las asistencias de todos los usuarios con un rango de fecha</label></br>
                        <label><strong>Requisitos: </strong>
                            -Se tiene que enviar el token de seguridadad con el prefijo Bearer
                            -Se tiene que enviar una fecha de inicio y fin
                        </label></br>
                        <label><strong>Metodos: </strong><strong>GET</strong></label></br>
                        <label><strong>Campos Requeridos: </strong> </label></br>
                        <label><strong>Ejemplo: </strong></br>
                            {
                            "fecha_inicio" : "2021-12-22",
                            "fecha_fin" : "2021-12-28"
                            }
                        </label></br>
                        <label><strong>Token: </strong>Si</label> </br>
                        <label><strong>Tipo de Usuario: </strong>Cualquiera</label>
                    </div>

                    <div class="tab-pane fade" id="v-pills-mostrarTodasAsistencias" role="tabpanel" aria-labelledby="v-pills-mostrarTodasAsistencias-tab">
                        <label><strong>Ruta: </strong> https://desarrollo.consigueventas.com/Backend/public/api/asistenciaTotal </label></br>
                        <label><strong>Descripcion: </strong>Devuelve las asistencias de todos los empleados</label></br>
                        <label><strong>Requisitos: </strong>
                            -Se tiene que enviar el token de seguridadad con el prefijo Bearer
                        </label></br>
                        <label><strong>Metodos: </strong><strong>GET</strong></label></br>
                        <label><strong>Campos Requeridos: </strong> </label></br>
                        <label><strong>Ejemplo: </strong></br>


                        </label></br>
                        <label><strong>Token: </strong>Si</label> </br>
                        <label><strong>Tipo de Usuario: </strong>Cualquiera</label>
                    </div>

                    <div class="tab-pane fade" id="v-pills-mostrarAreas" role="tabpanel" aria-labelledby="v-pills-mostrarAreas-tab">
                        <label><strong>Ruta: </strong> https://desarrollo.consigueventas.com/Backend/public/api/areas </label></br>
                        <label><strong>Descripcion: </strong>Permite ver las areas de la empresa</label></br>
                        <label><strong>Requisitos: </strong>No necesita token</label></br>
                        <label><strong>Metodos: </strong><strong>GET</strong></label></br>
                        <label><strong>Campos Requeridos: </strong> </label></br>
                        <label><strong>Ejemplo: </strong></br>


                        </label></br>
                        <label><strong>Token: </strong>No</label> </br>
                        <label><strong>Tipo de Usuario: </strong>Cualquiera</label>
                    </div>

                    <div class="tab-pane fade" id="v-pills-mostrarUnidades" role="tabpanel" aria-labelledby="v-pills-mostrarUnidades-tab">
                        <label><strong>Ruta: </strong> https://desarrollo.consigueventas.com/Backend/public/api/unidades </label></br>
                        <label><strong>Descripcion: </strong>Permite ver las unidades</label></br>
                        <label><strong>Requisitos: </strong>No necesita token</label></br>
                        <label><strong>Metodos: </strong><strong>GET</strong></label></br>
                        <label><strong>Campos Requeridos: </strong> </label></br>
                        <label><strong>Ejemplo: </strong></br>


                        </label></br>
                        <label><strong>Token: </strong>No</label> </br>
                        <label><strong>Tipo de Usuario: </strong>Cualquiera</label>
                    </div>

                    <div class="tab-pane fade" id="v-pills-mostrarPerfiles" role="tabpanel" aria-labelledby="v-pills-mostrarPerfiles-tab">
                        <label><strong>Ruta: </strong> https://desarrollo.consigueventas.com/Backend/public/api/perfil </label></br>
                        <label><strong>Descripcion: </strong>Permite ver los perfiles</label></br>
                        <label><strong>Requisitos: </strong>No necesita token</label></br>
                        <label><strong>Metodos: </strong><strong>GET</strong></label></br>
                        <label><strong>Campos Requeridos: </strong> </label></br>
                        <label><strong>Ejemplo: </strong></br>


                        </label></br>
                        <label><strong>Token: </strong>No</label> </br>
                        <label><strong>Tipo de Usuario: </strong>Cualquiera</label>
                    </div>

                    <div class="tab-pane fade" id="v-pills-mostrarMarcas" role="tabpanel" aria-labelledby="v-pills-mostrarMarcas-tab">
                        <label><strong>Ruta: </strong> https://desarrollo.consigueventas.com/Backend/public/api/marcas </label></br>
                        <label><strong>Descripcion: </strong>Permite ver las marcas</label></br>
                        <label><strong>Requisitos: </strong>No necesita token</label></br>
                        <label><strong>Metodos: </strong><strong>GET</strong></label></br>
                        <label><strong>Campos Requeridos: </strong> </label></br>
                        <label><strong>Ejemplo: </strong></br>
                        </label></br>
                        <label><strong>Token: </strong>No</label> </br>
                        <label><strong>Tipo de Usuario: </strong>Cualquiera</label>
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