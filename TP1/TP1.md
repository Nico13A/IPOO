# Trabajo Práctico 1

1. **Definir los siguientes términos: Objeto, clase , método, atributos.**

**OBJETO** 
Es una instancia de una clase. 
Es una entidad concreta que tiene propiedades y comportamientos definidos por su clase.

**CLASE**
Una clase es como una plantilla o un modelo que define las propiedades y métodos 
que caracterizan a un objeto. 

En otras palabras, es una definición de cómo se deben estructurar los objetos de un tipo 
específico. 
Las clases pueden contener propiedades (variables) y métodos (funciones) que describen el 
comportamiento de los objetos creados a partir de esa clase.

**MÉTODO**
Es una función que pertenece a una clase y define un comportamiento específico 
que puede realizar el objeto.

**ATRIBUTO**
Un atributo, también conocido como propiedad, es una variable que pertenece a una clase. 
Representa las características o cualidades distintivas de cada objeto creado a partir de esa 
clase. 

Los atributos almacenan información sobre el estado del objeto y pueden ser modificados 
mediante los métodos de la clase. 

2. **Que diferencia existe entre: Variable instancia e instancia de una clase.** 
**El significado es el mismo? Justificar.**

**Variable instancia**
Se refiere a una variable que es un atributo de un objeto, es decir, una variable que ha sido 
declarada dentro de una clase y está asociada a una instancia particular de esa clase.

Esta variable existe para cada instancia individual de la clase y puede contener datos únicos 
para esa instancia.

Por ejemplo, en una clase Persona, una variable instancia podría ser nombre, 
que almacena el nombre específico de cada instancia de persona.

**Instancia de una clase**
Se refiere al proceso de crear un objeto a partir de una clase. 
Cuando se crea un objeto, se dice que se ha instanciado la clase. 

La instancia de una clase es un objeto específico que tiene su propio conjunto de variables 
de instancia y puede acceder a los métodos definidos en la clase. 

Por ejemplo, si tienes una clase Coche, puedes crear una instancia de esa clase 
con $miCoche = new Coche();. 
En este caso, $miCoche es una instancia de la clase Coche.

```
En resumen, mientras que una "variable instancia" se refiere a una variable específica 
dentro de una clase que pertenece a cada instancia individual, 
una "instancia de una clase" se refiere al objeto real creado a partir de esa clase. 
```

3. **Clasificar las siguientes palabras en Clases (C), atributos (A) o métodos(M):**
mouse (C)
televisor (C)
darCanalActual (M)
configurarDespertador (M)
reloj (C)
mover (M)
fechaNacimiento (A)
encender (M)
persona (C)
darHoraActual (M)
irCanalTv (M)
fechaNacimiento (A)
inalambrico (A)
ponerHora (M)
documento (C)
darPosicionActual (M)

4. **Enumere 5 objetos con los que interactúa durante su rutina diaria.** 
**Enumere sus atributos y las acciones que realiza en la interacción con cada objeto.**

## Teléfono móvil
**Atributos**
* Marca/modelo.
* Nivel de batería.
* Conexión de red (WiFi, datos móviles).
**Acciones**
* Llamar.
* Enviar mensajes de texto.
* Navegar por internet.
* Tomar fotografías.
* Reproducir música o videos.

## Taza de café
**Atributos**
* Material (porcelana, vidrio, plástico).
* Capacidad (en ml).
* Temperatura del líquido contenido.
**Acciones**
* Verter líquido.
* Beber.
* Calentar en el microondas.
* Lavar.

## Llaves del automóvil
**Atributos**
* Marca/modelo del automóvil asociado.
* Botones de apertura/cierre remoto.
**Acciones**
* Abrir/Cerrar las puertas.
* Encender el motor.
* Activar/desactivar la alarma.
* Guardar en el bolsillo o bolso.

## Portátil (laptop)
**Atributos**
* Marca/modelo.
* Tamaño de la pantalla.
* Almacenamiento disponible.
**Acciones**
* Encender/apagar.
* Navegar por internet.
* Escribir documentos.
* Reproducir contenido multimedia.
* Conectar a dispositivos externos (por ejemplo, impresoras).

## Mochila
**Atributos**
* Material (cuero, tela, plástico).
* Capacidad (en litros).
* Número de compartimentos.
**Acciones**
* Guardar objetos personales (teléfono, billetera, llaves, etc.).
* Llevar sobre los hombros o en la mano.
* Abrir/Cerrar cremalleras o broches.

6. **Cuáles son los métodos que debemos encontrar implementados en una clase?**
Los métodos que debemos encontrar implementados en una clase son:

* **__construct**: Se utiliza para crear objetos y establecer sus propiedades iniciales. 

El constructor se llama automáticamente cuando se crea un nuevo objeto a partir de una clase 
y permite la inicialización de variables y la ejecución de código necesario para configurar el 
objeto correctamente.

* **GETTERS**: Son métodos que permiten recuperar el valor de una propiedad privada de una clase. 
No reciben parámetros y deben devolver el valor de la propiedad. 

* **SETTERS**: Permiten modificar el valor de una propiedad privada de una clase. 
Reciben un parámetro con el nuevo valor de la propiedad y no devuelven nada.

* **__toString**: Para visualizar el valor de las variables instancias de un objeto en PHP.
Este método debe retornar una cadena de caracteres con la informacion que se desea visualizar. 
El método se invoca cada vez que se llama a la función echo.

* **__destruct**: Función especial que se llama automáticamente cuando un objeto es destruido 
o cuando el script se detiene o sale.

Útil para realizar tareas de limpieza antes de que un objeto sea destruido, 
asegurando que los recursos se liberen adecuadamente y mejorando la eficiencia y 
la gestión de memoria de las aplicaciones PHP.

7. **Cuál es la razón de implementar el método _ _toString() en una clase?**
La razón principal para implementar el método __toString() en una clase en PHP 
es permitir que los objetos de esa clase sean tratados como cadenas de texto.

8. Cómo se denomina y con qué nombre debe implementarse en PHP, al método que se ejecuta 
cuando se crea una instancia de una clase?
En PHP, el constructor se nombra utilizando __construct().

9. **Cuando utilizamos $this como parámetro de un método, a que se esta referenciando?**
Cuando utilizas $this como parámetro de un método en PHP, te estás refiriendo 
al objeto actual de la clase.



### OBSERVACIÓN DE CLASES DE CONSULTA.
Entender enunciado.
Definir clases.
Pienso las caracteristicas que necesito para las clases.
Atributos de acceso privado.
Implementar el get y set por cada atributo que defino.
Metodo get nos permite acceder al valor que se encuentra guardado en ese atributo.
El metodo set me permite modificar el valor.
Metodo tostring.
Metodo construct.
Si en el parcial accedo a un atributo sin los metodos, desaprobado de toque.
Los métodos especiales no deben retornar strings, no puedo hacer algo para que 
el usuario interactue, a lo sumo si quiero interactuar despues lo hago en el test, y en el
método devuelvo un booleano.
