# 🚀 Guía de Despliegue DIVCAL con PHP

## 🎯 Sistema simplificado con PHP

Se migró el backend de Node.js a PHP para evitar problemas de configuración en cPanel.

---

## ✅ Ventajas de usar PHP:

- ✅ Ya viene instalado en cPanel (no requiere configuración)
- ✅ No hay problemas de "lock" ni permisos
- ✅ Funciona inmediatamente después de subir el archivo
- ✅ Más compatible con cPanel
- ✅ Más simple de mantener

---

## 📦 Paso 1: Compilar el Frontend

En tu computadora, abre PowerShell en la carpeta del proyecto:

```powershell
cd C:\Users\saial\OneDrive\Escritorio\DIVCAL-FRONT
npm run build
```

Esto creará la carpeta `dist/` con todos los archivos del sitio web.

---

## 📤 Paso 2: Comprimir archivos para subir

```powershell
# Comprimir el contenido de dist/
Compress-Archive -Path dist\* -DestinationPath divcal-frontend.zip

# También necesitas el archivo PHP
# (Ya está en la carpeta del proyecto: contact.php)
```

---

## 🌐 Paso 3: Subir al cPanel

### A) Subir el frontend:

1. Ve al **File Manager** de cPanel
2. Navega a **`public_html`**
3. **Sube** el archivo `divcal-frontend.zip`
4. Haz clic derecho sobre el archivo → **Extract**
5. Verifica que veas `index.html` y las carpetas `_astro`, `img`, etc.

### B) Subir el archivo PHP:

1. En el **File Manager**, sigue en **`public_html`**
2. **Sube** el archivo `contact.php` (está en la raíz de tu proyecto)
3. Verifica que esté al mismo nivel que `index.html`

---

## 📂 Estructura final en public_html:

```
public_html/
├── index.html           ← Página principal
├── contact.php          ← ✨ Procesador del formulario
├── _astro/              ← CSS y JS
├── img/                 ← Imágenes
├── video/               ← Videos
└── favicon.svg
```

---

## ⚙️ Paso 4: Verificar permisos del archivo PHP

1. En el **File Manager**, haz clic derecho en `contact.php`
2. Selecciona **"Change Permissions"** o **"Permisos"**
3. Asegúrate de que tenga permisos **644** o **755**
4. Haz clic en **"Change Permissions"**

---

## ✨ Paso 5: Probar el formulario

1. Visita **https://divcalpe.com**
2. Ve a la sección de **Contacto**
3. **Llena** el formulario con datos de prueba
4. Haz clic en **"Entremos en contacto"**
5. Deberías ver el mensaje **"Mensaje enviado correctamente"**
6. Revisa tu email **contacto@divcalpe.com** para confirmar que llegó

---

## 🔍 Solución de problemas

### Error 500 - Error interno del servidor

**Causa:** Permisos incorrectos del archivo PHP o error de sintaxis

**Solución:**
- Verifica que `contact.php` tenga permisos 644 o 755
- Revisa los logs de error de PHP en cPanel (Error Log)

### No llega el email

**Causa 1:** La función `mail()` de PHP no está configurada

**Solución:** Contacta a soporte para verificar configuración de email

**Causa 2:** El email va a spam

**Solución:** Revisa la carpeta de spam de `contacto@divcalpe.com`

### Error de CORS

**Causa:** El archivo PHP no está en el dominio correcto

**Solución:** 
- Verifica que `contact.php` esté en `public_html`
- O ajusta los headers CORS en el archivo PHP si es necesario

---

## 🎯 Checklist Final

- [ ] Compilar frontend: `npm run build`
- [ ] Comprimir archivos: `divcal-frontend.zip`
- [ ] Subir frontend a `public_html`
- [ ] Extraer `divcal-frontend.zip`
- [ ] Subir `contact.php` a `public_html`
- [ ] Verificar permisos de `contact.php` (644 o 755)
- [ ] Probar formulario en https://divcalpe.com
- [ ] Confirmar recepción de email

---

## 🎉 ¡Listo!

Tu sitio web DIVCAL ahora funciona con PHP, mucho más simple que Node.js.

### ⚡ Para futuras actualizaciones:

1. Haz cambios en tu código local
2. Ejecuta `npm run build`
3. Sube solo los archivos modificados de `dist/` (o todo si prefieres)
4. ¡Listo!

---

## 📝 Notas adicionales

**¿Por qué PHP es mejor para cPanel?**
- No requiere configuración de variables de entorno
- No necesita instalar módulos npm
- No hay problemas de versiones de Node.js
- Funciona de inmediato
- Es el lenguaje nativo de cPanel

**Ya no necesitas:**
- ❌ Setup Node.js App
- ❌ Variables de entorno en cPanel
- ❌ La carpeta `nodeapp`
- ❌ Preocuparte por errores de "lock"
