<!-- components/footer.php -->
<?php
function renderFooter()
{
?>
    <footer class="bg-gray-800 text-white py-6 mt-auto">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="space-x-4 mb-4 md:mb-0">
                    <a href="https://instagram.com/candykao8" target="_blank" rel="noopener"
                        class="hover:text-blue-400">Instagram</a>
                    <a href="mailto:candykao.arg@gmail.com" class="hover:text-blue-400">Email</a>
                </div>
                <p class="text-sm">&copy; <?php echo date('Y'); ?> Armonía Verde. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
    </body>

    </html>
<?php
}
?>