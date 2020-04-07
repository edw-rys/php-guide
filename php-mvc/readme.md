# MVC (Model View Controller - Modelo Vista Controlador)
## ¿Qué es?
_Es un patrón de arquitectura de software la cual separa la aplicación en tres capas:_<br>
* Capa de Modelo.- Manejo de datos.
* Controlador.- Lógica de negocio
* Vista.- Presentación de los datos.<br>

<img src="img/pic_mvc.png">

## Problemática que resuelve
_En las aplicaciones, las cuales deben manejar gran cantidad de módulos, los cuales podrían ser independientes o dependientes de otros, sería muy complejo controlar cada uno de los módulos si la aplicación se centrara en tener el código de la estructura de la vista (formularios, presentación de datos, etc.), la lógica con la cuál se manejan los datos y la lógica de almacenamiento y consulta de datos en un sólo archivo._
<br>
_A todo esto la solución sería separar cada módulo y a la lógica de programación (tratamiento de datos), presentación y almacenamiento de datos._
<br>
_Pero para ello tendremos que basarnos en la arquitectura MVC (Model View Controller), que será explicado en el siguiente escenario:._

**1. Supongamos que un usuario intenta acceder al siguiente link desde un navegador:**<br>
_https://beautifull-cat.com/_<br>
<center><img src="img/user_female.png"><br></center>
**2. Ahora el navegador se denominará "CIENTE", el cuál hace una petición al servidor por medio de ese link.**<br>
**3. El servidor recibirá esa petición hecha por el cliente, luego interactuará con la arquitectura MVC.**

## Lógica del controlador
**4. La petición hecha llegará directo al controlador, a al que se haya indicado, esto se podrá definir de diferentes maneras, por ejemplo:**<br>
<img src="img/url_mvc.png">
<br>
En la imágen tenemos dos url algo direfentes, pero eso se define en la lógica de programación de cómo se va a hacer el control de la url y el llamado de métodos.
<br>
_Url -> a_<br>
_Observaremos una url normal, pero nosotros tomaremos en cuenta de lo que irá después del ".com/", ya que según los siguientes campos se hará la llamada a algún controlador y se ejecutará un método del mismo._
* 1a. En este primer campo el cuál se llama en la url va a cambiar según se requiera un controlador (Es decir, este campo es el cuál llamará al controlador, en caso de que haya un controlador para usuario, otro para las ventas, se tendrá que saber a que controlador llamar y ese campo lo indicará).
* 2a. Ya que sabemos a qué controlador entraremos, debemos saber qué acción realizar dentro del mismo, ya que hará uno para agregar, otro para consusltar, etc., y dependemos de este campo el cuál nos indicará qué acción realizar.

<br>
_Url ->b_<br>

_En esta url vemos algo diferentes, en primer lugar se observa que no es una url nada amigable, ya que lleva parámetros, pero esta url se puede observar compleja de tratar, pero es más fácil de adaptar al momento de obtener los datos, ya que son parámetros enviados por GET -> **controlador=shop** y **method=all**_
* 1b.- En esto vemos un campo enviado por get llamado controller, y el valor nos indicará el controlador a invocar.
* 2b.- En esto vemos el campo method que también es enviado por get, nos indicará el método a ejecutar del controlador que fue indicado.
<br>
<hr>
**Ejemplo**<br>

_Supongamos que tenemos desarrollado un sistema el cual dispondrá de cuatro controladores, los cuales tendrá el control de cada acción disponibleen el sistema:_<br>
* GatoController.- Este controlador contiene métodos para agregar, eliminar, editar o consultar gatos y sus razas.
* ShoptController.- Este controlador dispone de dos métodos, estos se encargarán de mostrar diferentes mascotas y su venta.
* UserController.- Este controlador se encargará de las funciones de iniciar sesión, cerrar sesión, etc.
* ProductosController.- Control de productos.

<img src="img/controller_init_ex.png"><br>
_Ahora que están listos, podremos usarlos y la manera de hacerlo en la web es por medio de una url, la url que nos indica el dominio nunca va a cambiar -> https://beautifull-cat.com/, pero los argumentos a enviar si._<br>
Tendremos dos escenarios:<br>
**1 => https://beautifull-cat.com/shop/all** <br>
En esta url hacemos un llamado a shop, es decir, de todos los controladores que tenemos nos centraremos sólo en el de Shop Controller, listos, ahora se sabe a que controlador instanciar, pero no a qué método, para eso está el segundo valor, el cuál es all, y por medio de la lógica de programación se invocará a ese método y listo, ahora sabremos como se invoca un controlador.

<br>
**2 => https://beautifull-cat.com/index.php?controller=gato&method=agregar**<br>
Aquí no habrá mucha diferencia.<br>
Tenemos el archivo llamado index.php, el cual recibe dos parámetros (controller y methos), y ya sabemos como va, el valor de controller llamará al controlador y el valor de methos invocará al método.
<br>
<br>
El resultado será así:
<br>
<br>
<img src="img/controller_init_url.png">
<br>

* 1c. Se indica el controlador a invocar de la lista de controladores disponible.
* 2c. Se indica el método a invocar dentro del controlador al que se instancia.

Para los de "d" es la misma lógica, sólo que los valores serán tomados de los parámetros controller y method enviados por get.
<hr>

_Nota: habrá ciertas url las cuales sólo tendrán hasta la dirección hasta ".com" y no habrá campos que indiquen al controlador y el método que se ejecutará, esto se debe a que se ha implementado una lógica de programació, la cuál verificará si exiten los campos, caso contrario se asignará algún controlador o método por defecto:._<br>

En la url
**https://beautifull-cat.com/** 
podemos observar que no existe ningún texto después del ".com/" que indique el controlador o método a ejecutar, entonces se tendrá que definir en la lógica de programación a qué controlador y qué método ejecutar, es decir, ya que no existen los nombres del controlador en la URL, se definirá que se invoque al controlador llamado "GatosControlller", la cuál será una clase, y ya que el método no existe, se ejecutará uno por defecto, entonces le indicamos que el método se llamará index, listo.
<hr>

_Ahora que se sabe a qué controlador se instanciará y cuál sera el método a invocar se puede saber qué procesos va a hacer dicho método._<br>
<center><img src="img/pas_mvc_1.png" width="350"></center>
<br>

**5. Ahora, ese controlador lo siguiente que hará es llamar al modelo (Model of MVC) que será del mismo módulo que el controlador.**
<center><img src="img/mv_img.png" width=""></center><br>

_Cada controlador llamará a un respectivo modelo, o en caso de ser nacesario podrá invocar a otro modelo._
<br>
Listo, ahora supongamos que se quiere mostrar todos los gatos que se han registrado, el controlador recibe esa orden, este mismo invoca al modelo de dato, el cuál se encarga de manejar la lógica con la base de datos, ya sea para guardar, eliminar, consultar o editar los datos, el controlador invoca un método de ese modelo, en este caso el de "query", obtendrá todos los datos almacenados, el modelo terminó su trabajo, pero el controlador todavía no finaliza.<br>
El controlador tiene los datos, ahora este mismo podrá hacerle algunas modificaciones, como la limpieza de datos, condicionar si hubo datos o el modelo no devolvió nada, según eso puede hacer varias cosas, como preparar un mensaje de "Datos no encontrados" o "error interno", en caso de tener los datos simplemente los tiene listo para poder pintarlos.
<br>
<center><img src="img/pas_mvc_2.png" width="350"></center>
<br>
**6. Entonces, ya obtenido los datos y limpios no queda nada más que pintarlos en una plantilla HTML, pero controlador no se encarga de eso, él llama a una vista (View of MVC).**<br>

_La vista es la que se encarga de presentar los datos en una plantilla HTML al cliente._<br>

Los datos que tiene el controlador los envía a la vista:<br>
<center><img src="img/mvc_complete_pic.png" width=""></center>
<br>
Listo, ahora esa vista en HTML con los datos pintados será devuelto al cliente (Navegador).
<br><center><img src="img/pas_mvc_3.png" width="350"></center><br>

_Repaso: MVC es una arquitectura, en la cuál nos podemos basar como estandar para desarrollar sistemas complejos, separar módulos y la lógica de cada uno de ellos._<br>

**Resumen**
* Usuario envía peticiones al controlador (LAS PETICIONES LLEGAN AL CONTROLADOR). 
* El controlador  se encarga de solicitar o enviar datos al modelo y pasárselos a la vista.
* El modelo realiza el trabajo con los datos (comúnmente conectándose a una base de datos), realiza consultas, inserciones, actualizaciones, etc.
* La vista se encarga de la presentación de los datos.

<br><center><img src="img/MVC_FIG.png" width="350"></center><br>

**Capa Modelo**<br>
Model (Business process layer)
* Representa los datos, lógica de acceso y manejo de datos.

* Responsable por:
    * Representación de los datos
    * Desempeñar consultas en la base de datos
    * Actualizaciones, inserciones, consultas, búsquedas, etc..

**Capa Vista**<br>
View (Presentation layer)
* Mostrar información de acuerdo al tipo de clientes. (manejo de perfiles)

* Son la representación visual de los datos.
* Ni el modelo ni el controlador se preocupan de cómo se verán los datos, esa responsabilidad es únicamente de la vista.

**Capa Controlador**<br>
* Controller (Control layer)

* Conexión entre el modelo y la vista.

* Recibe peticiones del usuario y se encarga de solicitar los datos al modelo y de comunicárselos a la vista. 

* Contiene la lógica del flujo de ventanas– es decir cual es la siguiente vista que debe ser mostrada.


## MVC y PHP
