$('#generated_code').keyup(function(){    
            var code_in = $(this).val();
            var code_out = <?php echo json_encode($keycode); ?>;
                if (code_in == code_out) {
                //  alert(Code is matched! Bigup!);
                    window.open("pwdResset.php", "_self");
            } 
        });
