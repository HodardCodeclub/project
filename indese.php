<html>
   <head>
   
      <script type="text/javascript">
         <!--
            function getConfirmation(){
            	var x=document.getElementById('txt1').value;
               var retVal = confirm("Do you want to sell "+x+"eggs");
               
               if( retVal == true ){
                  window.open('login.php','_self')
                  return true;
               }
               else{
                  window.open('indese.php','_self')
                  return false;
               }
            }
         //-->
      </script>
      
   </head>
   <body>
      <p>Click the following button to see the result: </p>
      
      <form>
       <td>first</td><td><input type="number" id="txt1" required=""></td>
         <input type="submit" value="Click Me" onclick="getConfirmation();" />
      </form>
      
   </body>
</html>