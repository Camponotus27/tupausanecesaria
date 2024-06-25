# Configuración de Autenticación Git en Docker

## Crear un Token de Acceso Personal en GitHub

1. Ve a tu [perfil de GitHub](https://github.com/settings/tokens).
2. Haz clic en **New personal access token (classic)**.
3. Selaciona en Expiration en **No Expiration**
4. Selecciona los permisos necesarios (como `repo` para acceso completo a los repositorios).
5. Genera el token y cópialo. **No lo compartas con nadie y guárdalo en un lugar seguro**.

## Configurar Git para Usar el Token en el Contenedor

### A. Añadir el token al comando de push

Puedes configurar Git para que use tu token de acceso personal al clonar el repositorio:

```bash
# Reemplaza <TOKEN> con tu token de acceso personal
git remote set-url origin https://<TOKEN>@github.com/Camponotus27/tupausanecesaria.git
´´´