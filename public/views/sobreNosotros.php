<!-- sobreNosotros.php -->
<?php
require_once '../components/header.php';
require_once '../components/footer.php';

renderHeader('nosotros');
?>

<body class="flex flex-col min-h-screen">
    <main class="flex-grow container mx-auto px-4 py-8">
        <section class="mb-8">
            <h2 class="text-3xl font-bold text-green-600 mb-4">Sobre Nosotros</h2>
            <div class="space-y-6">
                <div>
                    <h3 class="text-xl font-bold text-gray-800">Misión</h3>
                    <p class="text-gray-600">Ofrecer productos de calidad para el cultivo y la jardinería, brindando a nuestros clientes las herramientas necesarias para obtener un crecimiento óptimo y saludable.</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-800">Visión</h3>
                    <p class="text-gray-600">Ser el GrowShop líder en la región, reconocido por la calidad y eficacia de nuestros productos y por nuestro compromiso con la satisfacción del cliente.</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-800">Valores</h3>
                    <p class="text-gray-600">Calidad, confianza, sostenibilidad, y compromiso con el cliente son los pilares que nos guían para ofrecer productos y servicios excepcionales en el sector de la jardinería.</p>
                </div>
            </div>
        </section>
    </main>

    <?php renderFooter(); ?>
</body>
