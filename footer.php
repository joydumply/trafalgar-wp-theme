

</div><!-- #page -->
<footer class="footer">
    <div class="footer_wrap">
        <div class="footer_info">
            <div class="footer_logo">
                <div class="pseudo_logo">
                    T
                </div>
                Trafalgar
            </div>

            <div class="info">
                Trafalgar provides progressive, and affordable healthcare, accessible on mobile and online for everyone
            </div>

            <div class="copyright">
                ©Trafalgar PTY LTD <?= date('Y') ?>. All rights reserved
            </div>
        </div>

        <div class="footer_menu_section">
            <div class="footer_menu_section_title">
                Company
            </div>
            <div class="footer_menu">
                    <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'footer-menu1'
                            )
                        );
                    ?>
            </div>
        </div>
        <div class="footer_menu_section">
            <div class="footer_menu_section_title">
                Region
            </div>
            <div class="footer_menu">
                    <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'footer-menu2'
                            )
                        );
                    ?>
            </div>
        </div>
        <div class="footer_menu_section">
            <div class="footer_menu_section_title">
                Help
            </div>
            <div class="footer_menu">
                    <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'footer-menu3'
                            )
                        );
                    ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
