            <!-- Footer na stranicata -->
            <div id="footer">
                <?php echo '&copy;' , date("Y"); ?>
                <div id="feedback">
                    <a href="<?php echo(rel_path("feedback/index.php")) ?>"><?php langPrint("Отзиви", "Feedback"); ?></a>
                </div>
            </div>
            <!-- Vikane na faila otgovoren za responsive dizaina -->
            <script src="<?php echo rel_path("design/js/responsive.js", $dir); ?>"></script>
