# 📋 Checklist de Despliegue Final

## ✅ Archivos verificados en public_html

- ✅ `index.html`
- ✅ `_astro/` (CSS y JS compilados)
- ✅ `video/`
- ✅ `favicon.svg`

## ❌ Archivos FALTANTES (Críticos)

### **1. contact.php** - ¡MUY IMPORTANTE!

**Ubicación del archivo:** `C:\Users\saial\OneDrive\Escritorio\DIVCAL-FRONT\contact.php`

**Cómo subirlo:**
1. En File Manager de cPanel, asegúrate de estar en `public_html`
2. Haz clic en **"Upload"** (arriba)
3. Selecciona `contact.php` de tu computadora
4. Espera a que se suba
5. Verifica que esté al mismo nivel que `index.html`

**Sin este archivo, el formulario de contacto NO funcionará.**

---

### **2. Carpeta img/** - Verificar

No se ve en la captura. Verifica que exista:
- Navega dentro de `public_html`
- Busca la carpeta `img/`
- Si no existe, puede que esté dentro de otra carpeta o no se extrajo del zip

---

## 🗑️ Archivos a eliminar

- `DIVCAL.PAGE.zip` - Ya no se necesita

---

## 🧪 Después de subir contact.php

1. Visita `https://divcalpe.com`
2. Ve al formulario de contacto
3. Llena con datos de prueba
4. Envía
5. Verifica que llegue el email a `contacto@divcalpe.com`
