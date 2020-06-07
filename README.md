# Trabajo Práctico Nro 3 - PAW

### Persistencia y MVC
***Autor:*** Leonardo Ariel Sequeira <br>
***Legajo:*** 112776 <br>
**Objetivo:** Construir una aplicación web que utilice un servicio de persistencia externo (SGBD) y buenas prácticas de código basadas en patrones conocidos, como MVC y OOP.

* * *
#### 1. Extienda el sistema de gestión de turnos médicos para que los datos sean persistidos sobre una base de datos MySQL usando PDO. La generación del número de turno debe hacerse vía motor de base de datos.

El ejercicio se encuentra en la carpeta: *Punto_1* del branch *master*.

##### ¿Qué cambios hubo que realizar para la generación del id?
Se realizó la generacion del ID del turno mediante el SGBD y solo hubo que configurar en la tabla que el campo id_turno sea de tipo INT AUTOINCREMENTAL. El SGBD se encarga de insertar el valor correcto y autoincremental entre inserts.


* * *
#### 2. Modifique el sistema para permitir que las imágenes sean persistidas sobre la base de datos. El software debe permitir cargar imágenes de hasta 10 MB. Si la imagen pesa más, se le debe informar al usuario este inconveniente, y pre-cargando el formulario con los datos ingresados, solicitar una nueva imagen.

El ejercicio se encuentra en la carpeta: *xxxx* del branch *master*.


* * *
#### 3. Implemente Modificación y Baja de los registros del sistema de turnos. 

El ejercicio se encuentra en la carpeta: *xxxx* del branch *master*.


* * *
#### 4. Cada acción del ABM debe ser registrada usando el Logger del framework. Cada log debe ser de tipo INFO y almacenar fecha y hora, operación (ABM), y turno afectado (id). En los casos de modificación y baja, almacene el registro completo. 

El ejercicio se encuentra en la carpeta: *xxxx* del branch *master*.

##### ¿Considera esto util? ¿En que casos puede llegar a utilizarse? 

