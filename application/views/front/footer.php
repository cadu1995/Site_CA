

<!-- Footer -->
<footer id="footer" class="container">
    <div class="row 200%">
        <div class="12u">

            <!-- About -->
            <section>
                <h2 class="major"><span>Contato</span></h2>
                <ul class="contact">
                    <li><a class="icon fa-facebook" href="https://www.facebook.com/ca.comp.muz"  target="_blank"><span class="label">Facebook</span></a></li>
<!--                                <li><a class="icon fa-twitter" href="#"  target="_blank"><span class="label">Twitter</span></a></li>
                    <li><a class="icon fa-instagram" href="#"  target="_blank"><span class="label">Instagram</span></a></li>
                    <li><a class="icon fa-dribbble" href="#"  target="_blank"><span class="label">Dribbble</span></a></li>-->
                    <li><a class="icon fa-google-plus" href="https://plus.google.com/u/0/112967438506633495744" target="_blank"><span class="label">Google+</span></a></li>
                </ul>
            </section>

        </div>
    </div>
    <!-- Copyright -->
    <div id="copyright">
        <ul class="menu">
            <li>&copy; Centro Acadêmico <a href="<?php echo base_url(); ?>">Alan Turing</a>.</li>
        </ul>
    </div>

</footer>

</div>
<?php
echo script_tag('assets/js/jquery.min.js', 'text/javascript');
lnbreak();
echo script_tag('assets/js/jquery.dropotron.min.js', 'text/javascript');
lnbreak();
echo script_tag('assets/js/skel.min.js', 'text/javascript');
lnbreak();
echo script_tag('assets/js/skel-viewport.min.js', 'text/javascript');
lnbreak();
echo script_tag('assets/js/util.js', 'text/javascript');
lnbreak();
echo script_tag('assets/js/main.js', 'text/javascript');
lnbreak();

echo script_tag('assets/js/jquery.min.js', 'text/javascript');
lnbreak();

echo script_tag('assets/js/slide/bxslider.js', 'text/javascript');
lnbreak();

echo script_tag('assets/js/slide/slide.js', 'text/javascript');
lnbreak();

if (isset($js) && is_array($js)) {

    foreach ($js as $j) {

        echo script_tag('assets/js/' . $j . '.js', 'text/javascript');
        lnbreak();
    }
}
?>

</body>
</html>
