<footer class="footer"><!--Footer-->    
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <p class="pull-right">Copyright © 2015</p>
                        <p class="pull-right"></p>
                    </div>
                </div>
            </div>
        </footer><!--/Footer-->



        <script src="/templates/js/jquery.js"></script>
        <script src="/templates/js/bootstrap.min.js"></script>
        <script src="/templates/js/jquery.scrollUp.min.js"></script>
        <script src="/templates/js/price-range.js"></script>
        <script src="/templates/js/jquery.prettyPhoto.js"></script>
        <script src="/templates/main.js"></script>
        <script>
            $(document).ready(function(){
                $(".add-to-cart").click(function(){
                    var id = $(this).attr("data-id");
                    $.post("/cart/add/"+id, {}, function(data) {
                        $("#cart-count").html(data);
                    });
                return false;
                });
            });
        </script>
    </body>
</html>