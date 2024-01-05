<div class="container is-fluid mb-6">
    <h1 class="title">Usuarios</h1>
    <h2 class="subtitle">Nuevo usuario</h2>
</div>
<div class="container pb-7 pt-5" style="max-width: 85%;">
    <div class="form-rest mb-6 mt-6"></div>
    <form action="./php/usuario_guardar.php" method="POST" autocomplete="off" class="FormularioAjax">
        <div class="columns">
            <div class="column">
                <div class="control">
                    <label for="usNombre">Nombres</label>
                    <input type="text" class="input" name="usuario_nombre" id="usNombre"
                    pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" placeholder="Escribe tu nombre aquí" required>
                </div>
            </div>
            <div class="column">
                <div class="control">
                    <label for="usApellido">Apellidos</label>
                    <input type="text" class="input" name="usuario_apellido" id="usApellido"
                    pattern="[a-zA-ZáéíóúÁÉÓÍÚñÑ ]{3,40}" placeholder="Escribe tu Apellido aquí"
                     maxlength="40" required>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="control">
                    <label>Usuarios</label>
                    <input type="text" class="input" name="usuario_usuario"
                    pattern="[a-zA-Z0-9]{4,20}" placeholder="Escribe tu usuario aquí"
                     maxlength="20" required>
                </div>
            </div>
            <div class="column">
                <div class="control">
                    <label for="email">Email</label>
                    <input type="email" class="input" name="usuario_email"
                    placeholder="Escribe tu email aquí" maxlength="70" id>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="control">
                    <label>Clave</label>
                    <input class="input" type="password" name="usuario_clave_1" pattern="[a-zA-Z0-9$@.-]{7,100}"
                    maxlength="100" placeholder="Escriba su clave aquí" required>
                </div>
            </div>
            <div class="column">
                <div class="control">
                    <label>Repetir clave</label>
                    <input type="password" class="input"
                    name="usuario_clave_2" pattern="[a-zA-Z0-9$@.-]{7,100}"
                    maxlength="100" placeholder="Vuelva a escribir su clave aquí" required>
                </div>
            </div>
        </div>
        <p class="has-text-centered">
            <button type="submit" class="button is-info is-rounded">Guardar</button>
        </p>
    </form>
</div>