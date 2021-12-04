
  <!-- start trade item modal -->
  <div class="content">
    <!-- The Modal -->
    <div id="myModal" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-header">
          <span class="close">&times;</span> <!-- close -->
          <h2>Trade Your Item</h2> <!-- Title -->
        </div>
        <div class="modal-body"> <!-- modal content -->
        <form method="post" enctype="multipart/form-data"><br>
          <div class="form-inline">
          <input name="file" type="file" required>&nbsp;&nbsp;&nbsp;&nbsp;
           <input name="quantity" type="number" class="" placeholder="Quantity" required style="float: right;width: auto;height: 20px;">
         </div>
          <p style=" margin-left:51%; color:gray; font-size:11px; margin-bottom:-10px;">Optional &nbsp; &nbsp; </p>
          <div style="display: flex;">
            <input name="title" type="text" class="trade_btn" placeholder="Title" required>&nbsp;&nbsp;
            <input name="variant" type="text" class="trade_btn" placeholder="Add item Variant" onclick="myFunction()">
          </div>
            <p id="demo" style=" margin-left:51%; color:gray; font-size:11px; margin-top:1px;"></p>
            <script>
              function myFunction() {
                document.getElementById("demo").innerHTML = "Example: Color / Size";
              }
              </script>

          
               <p style="color:gray; font-size:11px; margin-bottom:-10px;">Category &nbsp; &nbsp; </p>
          <div style="display: flex;">

            <select name="categories" class="trade_btn" placeholder="category" required>
              <option></option>
              <option>Electronic</option>
              <option>Hobbies</option>
              <option>Vehicles</option>
              <option>Apparel</option>
              <option>Home</option>
              <option>Pets</option>
              <option>Entertainment</option>
              <option>Instrument</option>
              <option>Games</option>
              <option>Sports</option>
            </select>&nbsp;&nbsp;

            <select name="location" class="trade_btn" required>
              <option> <?php echo $user_data['address']?></option>
                  <option>Agno, Pangasinan</option>
                  <option>Aguilar, Pangasinan</option>
                  <option>Alcala, Pangasinan</option>
                  <option>Anda, Pangasinan</option>
                  <option>Asingan, Pangasinan</option>
                  <option>Balungao, Pangasinan</option>
                  <option>Bani, Pangasinan</option>
                  <option>Basista, Pangasinan</option>
                  <option>Bautista, Pangasinan</option>
                  <option>Bayambang, Pangasinan</option>
                  <option>Binalonan, Pangasinan</option>
                  <option>Binmaley, Pangasinan</option>
                  <option>Bolinao, Pangasinan</option>
                  <option>Bugallon, Pangasinan</option>
                  <option>Burgos, Pangasinan</option>
                  <option>Calasiao, Pangasinan</option>
                  <option>Dasol, Pangasinan</option>
                  <option>Dasol, Pangasinan</option>
                  <option>Infanta, Pangasinan</option>
                  <option>Labrador, Pangasinan</option>
                  <option>Laoac, Pangasinan</option>
                  <option>Lingayen, Pangasinan</option>
                  <option>Mabini, Pangasinan</option>
                  <option>Malasiqui, Pangasinan</option>
                  <option>Manaoag, Pangasinan</option>
                  <option>Mangaldan, Pangasinan</option>
                  <option>Mangatarem, Pangasinan</option>
                  <option>Mapandan, Pangasinan</option>
                  <option>Natividad, Pangasinan</option>
                  <option>Template, Pangasinan</option>
                  <option>Pozorrubio, Pangasinan</option>
                  <option>Rosales, Pangasinan</option>
                  <option>San Fabian, Pangasinan</option>
                  <option>San Jacinto, Pangasinan</option>
                  <option>San Manuel, Pangasinan</option>          
                  <option>San Nicolas, Pangasinan</option>          
                  <option>San Quintin, Pangasinan</option>
                  <option>Santa Barbara, Pangasinan</option>                    
                  <option>Santa Maria, Pangasinan</option>          
                  <option>Santo Tomas, Pangasinan</option>          
                  <option>Sison, Pangasinan</option>          
                  <option>Sual, Pangasinan</option>          
                  <option>Tayug, Pangasinan</option>          
                  <option>Umingan, Pangasinan</option>          
                  <option>Urbiztondo, Pangasinan</option>        
                  <option>Villasis, Pangasinan</option>                            
            </select>

          </div>

          <textarea name="post" type="text" class="trade_btn" placeholder="Description" required></textarea>
            <input name="status" type="hidden" value="Active">

        </div><br>
        <div class="modal-footer">
          <input type="submit" style="width: 100px; height: 40px; margin-left: 40%; font-size: 16px; " value="Trade">
        </div><br>
        </form>
      </div>
    </div>


  <script>
  // Get the modal
  var modal = document.getElementById("myModal");

  // Get the button that opens the modal
  var btn = document.getElementById("myBtn");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks the button, open the modal 
  btn.onclick = function() {
    modal.style.display = "block";
  }

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>
<!--  end of trade item modal-->  