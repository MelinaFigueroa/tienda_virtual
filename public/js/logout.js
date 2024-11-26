// document.addEventListener('DOMContentLoaded', () => {
//     const logoutLink = document.getElementById('logoutLink');

//     if (logoutLink) {
//         logoutLink.addEventListener('click', (event) => {
//             event.preventDefault(); // Prevenir la acción por defecto del enlace

//             // Mostrar el modal de confirmación usando configureModal
//             configureModal({
//                 title: 'Cerrar Sesión',
//                 message: '¿Estás seguro de que deseas cerrar sesión?',
//                 confirmText: 'Cerrar Sesión',
//                 confirmAction: async () => {
//                     try {
//                         // Llamar al endpoint de logout
//                         const response = await fetch('../../controllers/auth/logout.php', {
//                             method: 'POST',
//                         });

//                         if (response.ok) {
//                             // Redirigir al inicio después del logout
//                             window.location.href = '../index.php';
//                         } else {
//                             alert('Error al cerrar sesión. Inténtalo de nuevo.');
//                         }
//                     } catch (error) {
//                         console.error('Error al cerrar sesión:', error);
//                         alert('Hubo un problema al cerrar sesión. Inténtalo de nuevo.');
//                     }
//                 },
//                 cancelText: 'Cancelar',
//                 cancelAction: () => {
//                     console.log('Logout cancelado por el usuario.');
//                 },
//             });
//         });
//     }
// });
