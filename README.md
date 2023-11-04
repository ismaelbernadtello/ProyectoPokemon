# Proyecto de Gestión de Pokémon

Este repositorio alberga el trabajo realizado en la asignatura de Bases de Datos como parte de mi primer año de grado superior en Salesianos Zaragoza. El proyecto consiste en una página web que permite la gestión de una base de datos de Pokémon.

## Objetivos

El proyecto se centra en una serie de objetivos clave:

- **Incluye Listados**: Ofrece funcionalidades que permiten la creación de listados que cruzan información a través de varias tablas, brindando una visión completa de los datos.

- **Incorpora Filtros Complejos**: Implementa filtros complejos que permiten a los usuarios realizar búsquedas y filtrar datos en función de varios campos o rangos de datos.

- **Permite Ordenación de Columnas**: Ofrece la capacidad de ordenar elementos en las tablas haciendo clic en la cabecera de la tabla, lo que facilita la visualización de datos.

- **Contiene Inserciones y Borrados**: Proporciona formularios que permiten la inserción, actualización y eliminación de datos en varias tablas relacionadas, lo que brinda una gestión completa de los registros.

- **Hace Uso de Funciones**: Algunas consultas, triggers o procedimientos hacen uso de una o varias funciones para mejorar la funcionalidad de la base de datos.

- **Incluye Procedimientos**: El proyecto incorpora procedimientos, algunos de los cuales son llamados en la activación de triggers, lo que mejora la automatización de tareas.

- **Utiliza Índices Eficaces**: Se han implementado índices que realmente aceleran las consultas utilizadas en la aplicación, incluyendo el uso de [`MATCH AGAINST`](https://dev.mysql.com/doc/refman/8.0/en/fulltext-boolean.html) en modo booleano para realizar búsquedas de texto completo.

- **Incorpora Triggers**: Se han incluido varios triggers, algunos de los cuales tienen funciones de auditoría al realizar borrados y actualizaciones de datos, y otros actúan en la inserción de nuevos datos.

- **Utiliza Cursores**: El proyecto utiliza al menos 2 cursores con un propósito específico en la base de datos.

- **Atractiva Maquetación y Ampliación de Datos**: Se ha añadido una maquetación atractiva, se han incluido nuevas tablas y columnas, y la aplicación se ha desplegado en [AWS](https://aws.amazon.com/) para ofrecer una experiencia completa y rica en recursos.

## Tecnologías Utilizadas

El proyecto se basa en las siguientes tecnologías y lenguajes:

- **HTML**: La estructura y los elementos de la página se definen en HTML.
- **PHP**: Se utiliza para la lógica de la aplicación y la comunicación con la base de datos.
- **CSS**: El diseño y la presentación de la página web se gestionan con CSS.
- **JavaScript (JS)**: Para mejorar la interactividad de la página web.
- **MySQL**: La base de datos utilizada para almacenar y gestionar la información de Pokémon.


## Instrucciones de Uso

Para ejecutar el proyecto en tu entorno local, sigue estos pasos:

1. Clona, haz un fork o descarga el proyecto desde este [repositorio](https://github.com/ismaelbernadtello/ProyectoPokemon).

2. Opción 1: Aloja la base de datos de forma local o en un servidor externo.

   - Opción 2: Crea una base de datos de MySQL con un contenedor de Docker. Utiliza el siguiente comando, reemplazando `<tu-contraseña>` con una contraseña segura:

     ```bash
     docker run --name some-mysql -e MYSQL_ROOT_PASSWORD=<tu-contraseña> -p 3306:3306 -d mysql:latest
     ```

3. Para conectarte a la base de datos, modifica el archivo `abrirConexion` que se encuentra dentro de la carpeta `config`.

4. Una vez creada la base de datos, ejecuta los archivos que se encuentran dentro de la carpeta `SQL` y sus respectivas carpetas de `functions`, `procedimientos` y `triggers` en la base de datos.

5. Una vez realizados los pasos previos, ya estarías listo para abrir el archivo `index.html` localmente o la URL donde hayas alojado los archivos HTML.

Sigue estos pasos y podrás utilizar el proyecto de gestión de Pokémon en tu entorno local o en la ubicación que elijas para su implementación.

## Contribuciones

Este proyecto fue creado como parte de un trabajo de clase y no acepta contribuciones externas. Sin embargo, si tienes preguntas o sugerencias, no dudes en contactarme.

## Licencia

Este proyecto está bajo Licencia GNU GPL (General Public License). Consulta el archivo `LICENSE` para obtener más información.

## Contacto

Si necesitas más información o tienes alguna pregunta, puedes contactarme:

- Correo electrónico: [ismaelbernadtello@gmail.com](mailto:ismaelbernadtello@gmail.com)

¡Gracias por explorar mi proyecto de gestión de Pokémon!
