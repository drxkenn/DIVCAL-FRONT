# DIVCAL - Sitio Web Corporativo

Sitio web para DIVCAL desarrollado con Astro + React + TailwindCSS.

## 🚀 Sistema de Contacto

El formulario de contacto utiliza **PHP** para procesar los envíos.

- **Frontend**: Astro (compilado a HTML estático)
- **Backend**: PHP (`contact.php`)
- **Hosting**: cPanel

## 📦 Instalación Local

```bash
npm install
npm run dev
```

## 🏗️ Compilar para Producción

```bash
npm run build
```

Esto genera la carpeta `dist/` con todos los archivos estáticos.

## 🌐 Despliegue a cPanel

Sigue las instrucciones en [DEPLOY_PHP.md](./DEPLOY_PHP.md)

### Resumen rápido:

1. Compilar: `npm run build`
2. Comprimir: `Compress-Archive -Path dist\* -DestinationPath divcal-frontend.zip`
3. Subir a cPanel:
   - `divcal-frontend.zip` → extraer en `public_html/`
   - `contact.php` → subir a `public_html/`

## 📂 Estructura del Proyecto

```
DIVCAL-FRONT/
├── src/
│   ├── components/      # Componentes Astro/React
│   ├── layouts/         # Layouts
│   └── pages/           # Páginas
├── public/              # Assets estáticos
├── contact.php          # Backend del formulario
├── DEPLOY_PHP.md        # Guía de despliegue
└── dist/               # Build de producción (generado)
```

## 🛠️ Tecnologías

- **Astro** - Framework web
- **React** - Componentes interactivos
- **TailwindCSS** - Estilos
- **PHP** - Backend de contacto

## 📧 Configuración del Formulario

El archivo `contact.php` envía emails a: **contacto@divcalpe.com**

Para cambiar el destinatario, edita la línea 49 de `contact.php`:

```php
$destinatario = 'tu-nuevo-email@ejemplo.com';
```
