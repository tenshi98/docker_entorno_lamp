# Entorno de trabajo LAMP para Docker

![screenshot](https://raw.githubusercontent.com/tenshi98/docker_entorno_lamp/refs/heads/main/www/.dash/assets/images/preview.png)


## Especificaciones

- Apache con vhosts y SSL (<http://localhost> & <https://localhost>)
- PHP [Versiones actuales soportadas] (8.1.x, 8.2.x, 8.3.x)
- PHP [Fin de ciclo de vida / no recomendadas] (5.4.x, 5.6.x, 7.0.x, 7.1.x, 7.2.x, 7.3.x, 7.4.x, 8.0.x)
- MySQL (5.7, 8.x)
- MariaDB (lts, latest, 10.x, 10.3, 10.4, 10.5, 10.6, 10.7, 10.8, 10.9, 10.10, 10.11, 11.x, 11.0, 11.1, 11.2, 11.3-rc)
- phpMyAdmin
- XDebug
- Imagick
- Redis

## Licencia

Este Software es distribuido bajo la licencia GNU General Public License v3.0. Por favor lea la [LICENCIA](LICENSE) para mas información.

## Instalación

### Instalación Docker

- Debian/Ubuntu

```bash
sudo apt install docker
sudo apt install docker-compose
```

- Arch/Manjaro

```bash
sudo pacman -S docker
sudo pacman -S docker-compose
```

- Fedora

```bash
sudo dnf install docker
sudo dnf install docker-compose
```


### Inicio de Servicios al encender el equipo

```bash
sudo systemctl start docker.service
sudo systemctl enable docker.service
```

### Descarga y ejecución

#### Se recomienda que una vez clonado el repositorio, editar el archivo .env para cambiar la configuración que trae por defecto

```bash
### Clonar repositorio:
git clone https://github.com/tenshi98/docker_entorno_lamp.git

### Entrar a la carpeta:
cd docker_entorno_lamp/

### Añadir permisos de ejecución a un script:
chmod +x build.sh
chmod +x start.sh
chmod +x stop.sh

### Construir e iniciar el entorno
### Esta tarea toma su tiempo ya que descarga los contenedores
### Esta tarea se ejecuta solo la primera vez:
sudo ./build.sh

### Iniciar el entorno, en el caso de que no se inicie automáticamente:
sudo ./start.sh

### Detener el entorno:
sudo ./stop.sh
```

## Instalación Software de Gestión de Docker

#### Permite el control y gestión de los contenedores, ademas de su estado y los archivos de configuración que tiene, ideal para eliminar los volúmenes residuales que quedan en cada reinicio del entorno

```cmd
### Instalación de docker.io:
sudo apt install docker.io

### Instalación de portainer:
sudo docker volume create portainer_data
sudo docker run -d -p 8000:8000 -p 9443:9443 --name portainer --restart=always -v /var/run/docker.sock:/var/run/docker.sock -v portainer_data:/data portainer/portainer-ce:latest

#repositorios portainer (opciones varias)
https://raw.githubusercontent.com/Lissy93/portainer-templates/main/templates.json
https://raw.githubusercontent.com/technorabilia/portainer-templates/main/lsio/templates/templates-2.0.json
https://raw.githubusercontent.com/ntv-one/portainer/main/template.json
https://raw.githubusercontent.com/portainer/templates/master/templates-2.0.json
```

## Post Instalación

### Visitar la URL

- Dashboard
  - [http://localhost -> Sin certificado SSL](http://localhost)
  - [https://localhost -> Con certificado SSL](https://localhost)


Si se visualiza el dashboard correctamente entonces todo quedo bien instalado.

Algunas aplicaciones darán problemas al no utilizar SSL, favor tenerlo en cuenta.

### Configuración Aplicaciones PHP

```php
<?php
//Nombre del host de base de datos
const MySQL = [
    'HOSTNAME' => 'database', /* En el caso de no funcionar utilizar 127.0.0.1 */
    'USERNAME' => 'root',     /* Usuario administrador*/
    'PASSWORD' => 'docker',   /* Contraseña por defecto */
    'DATABASE' => 'db_Name',  /* Nombre de la base de datos a acceder */
    'PORT'     => 3306,       /* Puerto de acceso */
];

$db_hostname="";
?>
```

### Configuración Gestores de Base de Datos (DBeaver, DbVisualizer, Navicat, etc.)

```text
Nombre de la conexión: INGRESAR UN NOMBRE
Host: 127.0.0.1
Puerto: 3306
Usuario: root
Contraseña: docker (por defecto en el archivo .env, se recomienda cambiarlo)
```

### Configuración Redis

Si se trabaja con redis, éste corre por defecto en el puerto `6379`.

## Uso de este Stack en producción

En producción, se deben modificar como mínimo los siguientes aspectos:

- php handler: mod_php=> php-fpm
- Proteger a los usuarios de MySQL con limitaciones de IP de origen adecuadas

