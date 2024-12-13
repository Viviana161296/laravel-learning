## COMPLIANCE HUB

Plataforma ecommerce para cursos.


## Ambiente de desarrollo

Para levantar de manera agíl y rápido el ambiente de desarrollo se recomienda usar [docker](https://www.docker.com/get-started),
una vez instalado esta herramienta solo es necesario ejecutar lo siguiente:


1. Descargar repositorio e instalar de manera local dependecias de php. Es preferible tener de un principio los vendor files en el host
porque en muchas ocaciones es más facil conocer la biblioteca desde el código fuente que en la documentación.
```
git clone git@github.com:wearetherobots/compliancehub.git
cd compliancehub
cp .env.example .env
docker pull composer:latest
docker run -v $HOME/.cache/composer:/tmp --rm -v $(pwd):/app -w /app composer:latest composer install --ignore-platform-reqs
```

2. Hacer build de las imagenes y creación de container este paso se requiere la primera vez y sólo cuando algo del directorio de ``.docker``
tenga algún cambio.

```
docker-compose up --build
```

Para quitar los servicios con sólo:

```
docker-compose down
```

O bien para volverlos a levantar sin hacer build

```
docker-compose up
```

3. Ejecutar migraciones:

```
docker-compose run artisan migrate
```

4. Importar datos de sepomex:

```
docker-compose run artisan sepomex:import
```

5. Tener los datos de las membresias de stripe en la base de datos, para pruebas y con las mismas credenciales del env
se pueden usar estas:

```
INSERT INTO `subscription_plans` (`id`, `code`, `product_api_id`, `monthly_price`, `monthly_price_api_id`, `yearly_price`, `yearly_price_api_id`, `created_at`, `updated_at`) VALUES
('1', 'plan_user', 'prod_IFKZ92aEo2u9gs', '150.00', 'price_1HeptxDwz6d8cBxpRrRsZUdm', '1650.00', 'price_1HeptxDwz6d8cBxpEvH94oe9', '2020-10-22 17:40:19', '2020-10-22 17:40:19'),
('2', 'plan_member', 'prod_IFKaJfxziZ46Wj', '350.00', 'price_1Hepv1Dwz6d8cBxp2OsxH7HF', '3850.00', 'price_1Hepv0Dwz6d8cBxpCsBkUpAA', '2020-10-22 17:40:19', '2020-10-22 17:40:19'),
('3', 'plan_partner', 'prod_IFKafneuAgoBD5', '750.00', 'price_1HepviDwz6d8cBxpqs8mWwS5', '8250.00', 'price_1HepviDwz6d8cBxpOAqSBSo0', '2020-10-22 17:40:19', '2020-10-22 17:40:19');
```

6. Instalar bibliotecas npm y hacer build de los public assets js y css principalmente:

```
docker-compose run node npm install
docker-compose run node npm run dev
```

7. Visitar ``http://127.0.0.1:8080/`` y listo.

## Extra Nova Vue DevTools
Por default el JavaScript de Nova está compilado para producción. Por lo cual, no podrás acceder a Vue DevTools sin compilar el JavaScript de desarrollo de Nova. Para lograr esto, ejecuta los siguientes comandos en la terminal desde la raíz del proyecto:

````
cd ./vendor/laravel/nova
mv webpack.mix.js.dist webpack.mix.js
npm install
npm run dev
rm -rf node_modules
cd -
php artisan nova:publish
```

## Para crear un nuevo administrador de nova usar el siguiente comando
`````
php artisan nova:user
````

## Autores

- Aftab Hussain Miranda (aftab@watr.mx)
- Cinthia Vicente Cruz (cinthia@watr.mx)
